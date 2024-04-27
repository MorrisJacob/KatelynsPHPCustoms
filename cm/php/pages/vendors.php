<?php

$vendorInfo = ExecuteSQL("SELECT v.Name, v.CompanyName, v.LocatedFrom, v.Description, s.ShowName FROM Vendor v " .
			  "INNER JOIN `show` s ON v.show_id = s.id;");
$vendorsHTML = "";

if ($vendorInfo->num_rows > 0) {
    // output data of each row
    while($row = $vendorInfo->fetch_assoc()) {
        $vendorsHTML .= '<div class="row table-responsive-row">' .
                                            '<div class="col-xs-12 col-md-2">' .
                                                '<span class="hidden-md-up bold">Vendor Name: </span>' . $row["Name"] .
                                            '</div>' .
                                            '<div class="col-xs-12 col-md-2">' .
                                                '<span class="hidden-md-up bold">Company Name: </span>' . $row["CompanyName"] .
                                            '</div>' .
                                            '<div class="col-xs-12 col-md-2">' .
                                                '<span class="hidden-md-up bold">Location: </span>' . $row["LocatedFrom"] .
                                            '</div>' .
                                            '<div class="col-xs-12 col-md-2">' .
                                                '<span class="hidden-md-up bold">Description: </span>' . $row["Description"] .
                                            '</div>' .
                                            '<div class="col-xs-12 col-md-2">' .
                                                '<span class="hidden-md-up bold">Show: </span>' . $row["ShowName"] .
                                            '</div>' .
                                        '</div>';

    }
} else {
    $vendorsHTML +=  "No Vendors";
}

?>
