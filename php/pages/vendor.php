<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Name = GetSafeString($_POST['Name']);
    $companyName = GetSafeString($_POST['CompanyName']);
    $phoneNumber = GetSafeString($_POST['PhoneNumber']);
    $location = GetSafeString($_POST['Location']);
    $description = GetSafeString($_POST['Description']);


    $show_id = GetSafeString($_POST['Show']);

    ExecuteSQL("INSERT INTO Vendor " .
    "(Name, CompanyName, PhoneNumber, LocatedFrom, Description, show_id) VALUES " .
    "('" . $Name . "', '" . $companyName . "', '" . $phoneNumber . "', '" . $location . "', '" . $description . "', " . $show_id . ");");

    $vendorURLs = UploadImages($companyName);
                
    if($vendorURLs == ''){
	$success = "We're sorry. Your request could not go through. Please try uploading a different file, or submitting with no files.";
    }else{
	    if(count($vendorURLs) > 0){
		for($x=0; $x < count($vendorURLs); $x++){
			ExecuteSQL("INSERT INTO vendor_images (ImageURL, vendor_id) VALUES " .
				" ('" . $vendorURLs[$x] . "', (SELECT MAX(id) FROM Vendor));");
		}   
	    }
	
	    SendEmail("myerskatelyn675@gmail.com", "A New Vendor has Filled out an application!", "A new vendor (" . $companyName . ") has filled out a new application on your website.");

	    $success = "Thank you very much! We will be reaching out to you soon.";

    }

}else{

    $showlist = "";

    $shows = ExecuteSQL("SELECT id, ShowName, DATE_FORMAT(ShowDate,'%m/%d/%Y') ShowDate, Description, ImageURL FROM `show`;");

    if ($shows->num_rows > 0) {
	    // output data of each row
	    while($row = $shows->fetch_assoc()) {
		$showlist .= "<label for='radio-" . $row["id"] . "'>" .
				"<div class='span3 text-center show-option' style='border: 1px solid black;padding:8px;'><input id='radio-" . $row["id"] . "' type='radio' style='margin-top:-10px;' name='Show' value='" . $row["id"] . "'/><br/>";
		if(!is_null($row["ImageURL"])){
			$showlist .= "<img src='../" . $row["ImageURL"] . "' class='img img-responsive' style='width:100%' />";
		}
		$showlist .=	"<h3 style='display:inline;'> " . $row["ShowName"] . "</h3>" .
				"<hr/>" . 
				"<h4>" . $row["ShowDate"] . "</h4>" .
				"<p>" . $row["Description"] . "</p>" .
			     "</div></label>";
				

	    }
    }

}

function UploadImages($vendorName){
	$inputName = 'vendorImages';
        $target_dir = "wwwroot/images/";

        $total = count($_FILES[$inputName]['name']);

        $image_array = array();

        // Loop through each file
        for( $i=0 ; $i < $total ; $i++ ) {
                // since we're doing multiple files here, append a random number
                $target_file = $target_dir . $vendorName . rand();
                $uploadOk = 1;
                $imageFileType = pathinfo($target_dir . basename($_FILES[$inputName]["name"][$i]),PATHINFO_EXTENSION);
                if($imageFileType == ''){
                        continue;
                }
                $target_file = $target_file . "." . $imageFileType;
                // Check if image file is a actual image or fake image
                        $check = getimagesize($_FILES[$inputName]["tmp_name"][$i]);
                        if($check !== false) {
                                //echo "File is an image - " . $check["mime"] . ".";
                                $uploadOk = 1; } else {
                                echo "File is not an image.";
                                $uploadOk = 0;
                        }
                // Check if file already exists
                if (file_exists($target_file)) {
                        echo "Sorry, file already exists.";
                        $uploadOk = 0;
                }

                // Allow certain file formats
                
                $imageFileType = strtolower($imageFileType);
                
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                if($imageFileType == ""){
                    //echo "An image is required for new products!";
                }else{
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed. yours was a " . $imageFileType . ".";
                }
                
                        $uploadOk = 0;
                }
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                        echo "Sorry, your file was not uploaded.";
                        return "";
                // if everything is ok, try to upload file
                } else {
                        if (move_uploaded_file($_FILES[$inputName]["tmp_name"][$i], $target_file)) {
                                //echo "The file ". $vendorName . " has been uploaded.";
                        } else {
                                echo "Sorry, there was an error uploading your file.";
                    return "";
                        }
                }

                $image_array[$i] = str_replace('..', '', $target_file);
        }

        return $image_array;


}

?>
