<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$name = GetValidString($_POST['contactname']);
$email = GetValidString($_POST['emailaddress']);
$subject = GetValidString($_POST['subject']);
$message = GetValidString($_POST['message']);

$msg = "Someone tried to contact you!\n" .
       "Name: " . $name . "\n" .
       "Email: " . $email . "\n" . 
       "Subject: " . $subject . "\n" . 
       "Message: " . $message . "\n";

SendEmail("bethelight@katelynscustoms.com", "Contact us Email", $msg);
}
?>