<?php

$vendorInfo = ExecuteSQL("SELECT v.id, v.Name, v.CompanyName, v.LocatedFrom, v.Description, v.PhoneNumber, s.ShowName FROM Vendor v " .
			  "INNER JOIN `show` s ON v.show_id = s.id;");
$vendorsHTML = "";

if ($vendorInfo->num_rows > 0) {
    // output data of each row
    while($row = $vendorInfo->fetch_assoc()) {
        $vendorsHTML .= '<div class="row table-responsive-row">' .
                                            '<div class="col-xs-12 col-md-3">' .
                                                '<span class="hidden-md-up bold">Vendor Name: </span>' . $row["Name"] .
                                            '</div>' .
                                            '<div class="col-xs-12 col-md-2">' .
                                                '<span class="hidden-md-up bold">Company Name: </span>' . $row["CompanyName"] .
                                            '</div>' .
                                            '<div class="col-xs-12 col-md-2">' .
                                                '<span class="hidden-md-up bold">Contact Details: </span>' . $row["LocatedFrom"] . '<br/><a href="tel:' . $row["PhoneNumber"] . '">' . $row["PhoneNumber"] . '</a>' .
                                            '</div>' .
                                            '<div class="col-xs-12 col-md-3">' .
                                                '<span class="hidden-md-up bold">Description: </span>' . $row["Description"] .
                                            '</div>' .
                                            '<div class="col-xs-12 col-md-2">' .
                                                '<span class="hidden-md-up bold">Show: </span>' . $row["ShowName"] .
                                            '</div>';
	//grab uploaded photos related to vendor
	$vendorImgs = ExecuteSQL("SELECT ImageURL FROM vendor_images " .
			  "WHERE vendor_id = " . $row["id"] . ";");

	if ($vendorImgs->num_rows > 0){
		//They had images. Let's show
		while($imgrow = $vendorImgs->fetch_assoc()) {
			$vendorsHTML .= '<div class="col-xs-12 col-md-2"><img class="img img-responsive" src="../' . $imgrow["ImageURL"] . '" style="width:100%;" /></div>';
		}
	}	

	$vendorsHTML .= '</div>';

    }
} else {
    $vendorsHTML .=  "No Vendors";
}

?>
