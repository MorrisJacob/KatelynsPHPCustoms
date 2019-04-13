<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $firstName = GetSafeString($_POST['FirstName']);
    $lastName = GetSafeString($_POST['LastName']);
    $phone = GetSafeString($_POST['PhoneNumber']);
    $company = GetSafeString($_POST['Company']);

    $address1 = GetSafeString($_POST['Address1']);
    $address2 = GetSafeString($_POST['Address2']);
    $city = GetSafeString($_POST['City']);
    $state = GetSafeString($_POST['state']);
    $zip = GetSafeString($_POST['Zip']);

    ExecuteSQL("UPDATE users SET FirstName = '" . $firstName . "'," . 
    "LastName = '" . $lastName . "', " .
    "PhoneNumber = '" . $phone . "', " .
    "Company = '" . $company . "' " .
    "WHERE UserID = " . $userid . ";");

    ExecuteSQL("UPDATE address SET Address1 = '" . $address1 . "'," . 
    "Address2 = '" . $address2 . "', " .
    "City = '" . $city . "', " .
    "State = '" . $state . "', " .
    "Zip = '" . $zip . "' " .
    "WHERE UserID = " . $userid . ";");

}else{
        if($userid == 0){
            echo "<script>location='login.php'</script>"; /* Redirect browser */
            exit();
        }
        $accountInfo = ExecuteSQL("SELECT FirstName, LastName, Company, PhoneNumber FROM users WHERE UserID = " . $userid . ";");


    if ($accountInfo->num_rows > 0) {
    // output data of each row
    while($row = $accountInfo->fetch_assoc()) {

        $firstName = $row["FirstName"];
        $lastName = $row["LastName"];
        $company = $row["Company"];
        $phone = $row["PhoneNumber"];

    }

    }

    $addressInfo = ExecuteSQL("SELECT City, State, Zip, Address1, Address2 FROM address WHERE UserID = " . $userid . " LIMIT 1;");


    if ($addressInfo->num_rows > 0) {
    // output data of each row
    while($addrow = $addressInfo->fetch_assoc()) {

        $city = $addrow["City"];
        $state = $addrow["State"];
        $zip = $addrow["Zip"];
        $address1 = $addrow["Address1"];
        $address2 = $addrow["Address2"];

    }

    }

}

?>