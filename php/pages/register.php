<?php

$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $firstname = GetSafeString($_POST['firstname']);
    $lastname = GetSafeString($_POST['lastname']);
    $phone = GetSafeString($_POST['phone']);
    $email = GetSafeString($_POST['email']);
    $company = GetSafeString($_POST['company']);
    $paswd = GetSafeString($_POST['password']);
    $birthmonth = GetSafeString($_POST['birthmonth']);
    
    $birthday = GetSafeString($_POST['birthday']);
    $birthyear = GetSafeString($_POST['birthyear']);
    $address1 = GetSafeString($_POST['Address1']);
    $address2 = GetSafeString($_POST['Address2']);
    $city = GetSafeString($_POST['city']);
    $state = GetSafeString($_POST['state']);
    $zip = GetSafeString($_POST['Zip']);

    //first, we need to check to ensure this user doesn't already exist
    $sqlstr = "SELECT * FROM users WHERE EmailAddress = '" . $email . "'";
    $sql = ExecuteSQL($sqlstr);

    if($sql != ""){

        $error = "<div style='color:red;'>An account already exists for this email address. Forgot your password? <a href='forgetpass.php'>Let us help!</a></div>";
    }else{
        //we're good!
        
        //now, let's get a salt for that ol' pass
        $salt = GetSalt();

        //now, hash up that pass! Remember that this returns $salt + $hashpass, which is exactly what we want in our hashpass field
        $hashpass = HashPass($paswd, $salt);


        //lastly, let's insert this user

        $insql = "INSERT INTO users (EmailAddress, HashPass, FirstName, LastName, DateOfBirth, Company, PhoneNumber) " . 
        "VALUES ('" . $email . "','" . $hashpass . "','" . $firstname . "','" . $lastname . "'," . $birthyear . "-" . $birthmonth . "-" . $birthday . 
        ", '" . $company . "','" . $phone . "')";
        
        ExecuteSQL($insql);

        //get that userID back out now!
        $userid = GetSingleValueDB("SELECT UserID FROM users WHERE EmailAddress = '" . $email . "' LIMIT 1", "UserID");
        //sweet! now, let's insert their address. This is in another table because they may add a second address later!
        ExecuteSQL("INSERT INTO address (UserID, City, State, Zip, Address1, Address2) " . 
        "VALUES (" . $userid . ", '" . $city . "', '" . $state . "', '" . $zip . "', '" . $address1 . "', '" . $address2 . "');");

        $error = "<div style='color:green;'>Your account has been created!</div>";
    }

}

?>