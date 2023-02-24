<?php

$accountInfo = ExecuteSQL("SELECT EmailAddress, FirstName, LastName, IFNULL(Company, '') Company, PhoneNumber FROM users");
$accountHTML = "";

if ($accountInfo->num_rows > 0) {
    // output data of each row
    while($row = $accountInfo->fetch_assoc()) {
        $accountHTML .= '<div class="row table-responsive-row">' .
                                            '<div class="col-xs-12 col-md-4">' .
                                                '<span class="hidden-md-up bold">Email Address: </span>' . $row["EmailAddress"] .
                                            '</div>' .
                                            '<div class="col-xs-12 col-md-3">' .
                                                '<span class="hidden-md-up bold">Name: </span>' . $row["FirstName"] . " " . $row["LastName"] .
                                            '</div>' .
                                            '<div class="col-xs-12 col-md-2">' .
                                                '<span class="hidden-md-up bold">Company: </span>' . $row["Company"] .
                                            '</div>' .
                                            '<div class="col-xs-12 col-md-3">' .
                                                '<span class="hidden-md-up bold">Phone Number: </span>' . $row["PhoneNumber"] .
                                            '</div>' .
                                        '</div>';

    }
} else {
    $accountHTML +=  "No Accounts";
}

?>
