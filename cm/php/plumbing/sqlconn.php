<?php
$servername = "localhost";
$username = "MY_USERNAME";
$password = "MY_PASSWORD";
$dbname = "MY_DATABASE";

function ExecuteSQL($sql) {
    // Create connection
    $conn = new mysqli($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['dbname']);
    // Check connection
    if ($conn->connect_error) {
        return "Connection to DB Failed.";
    } 
    $result = $conn->query($sql);
    $numrows = 0;
    if($result){
        try{
            $numrows = $result->num_rows;
        }
        catch(Exception $e) {
            
        }
    }
    if ($numrows > 0) {
       return $result; 
    }else{
        return "";
    }

    $conn->close();
}

function GetSingleValueDB($sql, $fieldname){

    $returnval = ExecuteSQL($sql);

    if ($returnval) {


        $firstrow = mysqli_fetch_array($returnval);

        return $firstrow[$fieldname];

    }
}

function GetSalt(){
    $salt = GetSingleValueDB("SELECT SUBSTRING(SHA1(RAND()), 1, 6) as salt", "salt");
    return $salt;
}

function HashPass($password, $salt){
    $hashPass = GetSingleValueDB("SELECT CONCAT('" . $salt . "',SHA1(CONCAT('" . $salt . "', '" . $password . "'))) as hash;", "hash");

    return $hashPass;
}



?>
