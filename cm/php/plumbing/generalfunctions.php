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
    // use wordwrap() if lines are longer than 70 characters
    $message = wordwrap($message,70);

    $headers = 'From: jacob@morrisprogramming.com' . "\r\n" .
    'Reply-To: jacob@morrisprogramming.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

    // send email
    mail($toAddress,$subject,$message, $headers);
}

?>