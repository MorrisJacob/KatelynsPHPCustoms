<?php

//https://developer.paypal.com/docs/classic/ipn/integration-guide/IPNandPDTVariables/


//Currency must be in USD
$curr = $_POST["mc_currency"];
//payment must be fee billed from cart (where datepaid is null, then we will set to 1)
$payment = $_POST["mc_gross"];
//payment status must be Completed
$status = $_POST["payment_status"];
//receiver ID must be related to this account (XZS876HWCDKP4)
$acctID = $_POST["receiver_id"];
//I pass the keyOrder as the item name. That means this has to come back so I can verify the correct keyOrder.
$keyOrder = $_POST["item_name"];

if($curr == "USD" && $status == "Completed" && $acctID == "XZS876HWCDKP4"){
    //They passed the static variables. Not check their personal transaction
    $gross = GetSingleValueDB("select SUM(p.Price * c.Quantity * 1.07) + 10 AS GrossPrice" .
    " FROM cart c inner join products p on c.KeyProduct = p.KeyProduct inner join orders o" .
    " on c.KeyOrder = o.KeyOrder where o.UserID = " . $userid . ";", "GrossPrice");

    $trueKey = GetSingleValueDB("SELECT KeyOrder FROM orders WHERE UserID = " . $userid . " AND DatePaid IS NULL LIMIT 1;", "KeyOrder");

    if(number_format($gross,2) == $payment && $keyOrder == $trueKey){
        //alright, that's good enough! Mark it as paid and Katelyn will ship it soon.
        ExecuteSQL("UPDATE orders SET DatePaid = NOW() WHERE KeyOrder = " . $keyOrder . ";");

        ExecuteSQL("UPDATE products p INNER JOIN cart c on p.KeyProduct = c.KeyProduct INNER JOIN orders o on o.KeyOrder = c.KeyOrder " .
            "SET p.Quantity = p.Quantity - c.Quantity " .
            "WHERE o.KeyOrder = " . $keyOrder . ";");

        SendEmail("myerskatelyn675@gmail.com", "An order has been entered!", "An order for $" . $payment . " has been paid for on your site!");
    }else{
        //it seems weird to me that they would make it this far and not pay. Let's send an email for a manual check
        SendEmail("myerskatelyn675@gmail.com", "Hmm.. That's odd", "An order has gone through half of the validation. However, " . 
        "It failed at payment and keyOrder. The payment info from Paypal said $" . $payment . " for order " . $keyOrder . ". However, our DB says $" .
        number_format($gross,2) . " for order " . $trueKey);
    }


}

?>
