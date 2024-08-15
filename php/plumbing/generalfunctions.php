<?php
function GetValidString($str){
    if((isset($str)) && !empty($str))
    {
        return $str;
    }else{
        return "";
    }

}

function GetSafeString($str){
    $str = GetValidString($str);

    $str = str_replace("'", "", $str);
    $str = str_replace('"', "", $str);
    $str = str_replace(";", "", $str);

    return $str;
}

function SendEmail($toAddress, $subject, $message){
    $sendingEmail = "DoNotReply@creativeodditiesandcuriosities.com";

    // use wordwrap() if lines are longer than 70 characters
    $message = wordwrap($message,70);

    $headers = 'From: ' . $sendingEmail . "\r\n" .
    'Reply-To: ' . $sendingEmail . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

    // send email
    mail($toAddress,$subject,$message, $headers, "-f" . $sendingEmail);
}

function GetKeyOrder($userid){

    //if they are not logged in, key order will be 0
    if($userid == ""){
        return 0;
    }
    //first, let's see if they have an unpaid cart set up
    $keyOrder = GetSingleValueDB("SELECT IFNULL(KeyOrder,0) KeyOrder FROM orders WHERE UserID = " . $userid . " AND DatePaid IS NULL;", "KeyOrder");

    if($keyOrder == 0){
        //they don't. let's set up a cart
        ExecuteSQL("INSERT INTO orders (UserID, DatePaid, DateShipped) VALUES (" . $userid . ", NULL, NULL);");
        $keyOrder = GetSingleValueDB("SELECT KeyOrder FROM orders WHERE UserID = " . $userid . " AND DatePaid IS NULL;", "KeyOrder");
    }

    return $keyOrder;
}

function AddToCart($userid, $KeyProduct, $Quantity){

    //first, let's get their keyorder
    $keyOrder = GetKeyOrder($userid);
    //next, let's see if they have this product in their cart
    $productCheck = GetSingleValueDB("SELECT Count(*) exrow FROM cart c INNER JOIN orders o " .
    " ON c.KeyOrder = o.KeyOrder WHERE o.KeyOrder = " . $keyOrder . " AND c.KeyProduct = " . $KeyProduct . ";", "exrow");

    if($productCheck > 0){
                 ExecuteSQL("Update cart SET Quantity = Quantity + " . $Quantity . 
                " WHERE KeyOrder = " . $keyOrder . " AND KeyProduct = " . $KeyProduct . ";");
    }else{
             ExecuteSQL("INSERT INTO cart (KeyOrder, KeyProduct, Quantity) " . 
        "VALUES (" . $keyOrder . ", " . $KeyProduct . ", " . $Quantity . ");");

    }

}

?>
