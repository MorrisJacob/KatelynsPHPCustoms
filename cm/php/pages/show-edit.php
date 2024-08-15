<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $ShowId = GetSafeString($_POST["hdnShowId"]);
    $ShowName = GetSafeString($_POST["ShowName"]);
    $ShowDate = GetSafeString($_POST["ShowDate"]);
    $ShowDescription = GetSafeString($_POST["ShowDescription"]);

    $ImageURL = UploadImage($ShowName);

    if($ImageURL != ""){
	    if($ShowId > 0){
		ExecuteSQL("UPDATE `show` SET ShowName = '" . $ShowName . "', ShowDate = '" . $ShowDate . "', Description = '" . $ShowDescription . "', ImageURL = '" . $ImageURL . "' WHERE Id = '" . $ShowId . "';");

	    }else{
		ExecuteSQL("INSERT INTO `show` (ShowName, ShowDate, Description, ImageURL) VALUES ('" . $ShowName . "', '" . $ShowDate . "', '" . $ShowDescription . "', '" . $ImageURL . "');");
	    }

	    echo "<script>location='shows.php'</script>";
    }
}else{

    $ShowId = GetSafeString($_GET["ShowId"]);

    $showInfo = ExecuteSQL("SELECT ShowName, ShowDate, Description, ImageURL FROM `show` WHERE Id = " . $ShowId . " LIMIT 1;");

    if ($showInfo->num_rows > 0) {

        $showRow = $showInfo->fetch_assoc();

        $ShowName = $showRow["ShowName"];
        $ShowDate = $showRow["ShowDate"];
        $ShowDescription = $showRow["Description"];
        $ImageURL = $showRow["ImageURL"];
    }

}


function UploadImage($showName){
    $showName = str_replace(' ', '', $showName);
	$target_dir = "../wwwroot/images/";
	$target_file = $target_dir . $showName;
	$uploadOk = 1;
	$imageFileType = pathinfo($target_dir . basename($_FILES["fileToUpload"]["name"]),PATHINFO_EXTENSION);
	if($imageFileType==''){
		echo "Sorry, the file type could not be found";
		return '';
	}
	$target_file = $target_file . "." . $imageFileType;
	// Check if image file is a actual image or fake image
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		if($check !== false) {
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			echo "File is not an image.";
			$uploadOk = 0;
		}
	// Check if file already exists
	if (file_exists($target_file)) {
		// we used to fail here. Now, delete old pic and upload new
		unlink($target_file);
		// echo "Sorry, file already exists.";
		// $uploadOk = 0;
	}
	// Check file size
	//if ($_FILES["fileToUpload"]["size"] > 500000) {
	//	echo "Sorry, your file is too large.";
	//	$uploadOk = 0;
	//}

	// Allow certain file formats
	
	$imageFileType = strtolower($imageFileType);
	
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
        if($imageFileType == ""){
            echo "An image is required for new shows!";
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
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			echo "The file ". $showName . " has been uploaded.";
		} else {
			echo "Sorry, there was an error uploading your file.";
            return "";
		}
	}

	return str_replace('..', '', $target_file);

}

?>
