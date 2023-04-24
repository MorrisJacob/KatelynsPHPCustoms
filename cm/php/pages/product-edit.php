<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $keyProduct = GetSafeString($_POST["hdnKeyProduct"]);
    $ProductName = GetSafeString($_POST["ProdName"]);
    $Description = GetSafeString($_POST["Desc"]);
    $Price = GetSafeString($_POST["Price"]);
    $Quantity = GetSafeString($_POST["Quantity"]);
    $CategoryName = GetSafeString($_POST["CatName"]);
    $IsFeatured = GetSafeString($_POST["Featured"]);
    $IsSoldOut = GetSafeString($_POST["IsSoldOut"]);

    if($IsFeatured == ""){
        $IsFeatured = "false";
    }
    if($IsSoldOut == ""){
	$IsSoldOut = "false";
    }

    if($keyProduct > 0){
	//Allow user to upload a new primary image if applicable

	$ImageURL = UploadImage($ProductName);
	$ImageUpdate = "";
	if($ImageURL != "") {
	    $ImageUpdate = ", ImageURL = '" . $ImageURL . "'";
	}

	// end primary image logic

        ExecuteSQL("UPDATE products SET ProductName = '" . $ProductName . 
        "', Description = '" . $Description .
        "', Price = " . $Price .
        ", Quantity = " . $Quantity .
        ", CategoryName = '" . $CategoryName .
        "', IsSoldOut = " . $IsSoldOut .
        ", IsFeatured = " . $IsFeatured . $ImageUpdate . " WHERE KeyProduct = " . $keyProduct . ";");
        
	//Allow user to upload additional images
	
	$AdditionalURLs = UploadImages($ProductName);

	if(count($AdditionalURLs) > 0){
		for($x=0; $x < count($AdditionalURLs); $x++){
			ExecuteSQL("INSERT INTO productimages (KeyProduct, ImageURL) VALUES " .
        		" (" . $keyProduct . ", '" . $AdditionalURLs[$x] . "');");
		}
		
	}

	//End additional images logic

        echo "<script>location='products.php'</script>";

    }else{
	$ImageURL = UploadImage($ProductName);
        if($ImageURL != "")
        {
                    ExecuteSQL("INSERT INTO products (ProductName, Description, ImageURL, Price, Quantity, CategoryName, IsFeatured, IsSoldOut) VALUES " .
        "('" . $ProductName . "', '" . $Description . "', '" . $ImageURL . "', " . $Price . ", " . $Quantity . ", '" . $CategoryName . "', " . $IsFeatured . ", " . $IsSoldOut . ");");
       

        }

	// Additional Photos
	if(count($_FILES['fileToUploadAdditional']['name']) > 0){
		$key_prod = GetSingleValueDB("SELECT KeyProduct FROM products WHERE ProductName = '" . $ProductName . "' AND Description = '" . $Description . "';", "KeyProduct");
		$AdditionalImageURLs = UploadImages($ProductName);
        	if(count($AdditionalImageURLs) > 0)
        	{
			for($x=0; $x < count($AdditionalImageURLs); $x++){
				ExecuteSQL("INSERT INTO productimages (KeyProduct, ImageURL) VALUES " .
        		" (" . $key_prod . ", '" . $AdditionalImageURLs[$x] . "');");
			}

        	}
	}

	echo "<script>location='products.php'</script>";
        
    }
		

} else {

    $keyProduct = GetSafeString($_GET["KeyProduct"]);

    if ($keyProduct == ''){
        $keyProduct = 0;
    }

    $catddl = "";
    $prodInfo = ExecuteSQL("SELECT ProductName, Description, Price, Quantity, CategoryName, " . 
			   " CAST(IsFeatured AS unsigned int) IsFeatured, CAST(IsSoldOut AS unsigned int) IsSoldOut, ImageURL" .
                                " FROM products WHERE KeyProduct = " . $keyProduct . " LIMIT 1;");
    $selected = "";
    $catChoices = ExecuteSQL("SELECT KeyCategory, CategoryName FROM productcategories");

    if ($prodInfo->num_rows > 0) {

        $prodRow = $prodInfo->fetch_assoc();

        $ProductName = $prodRow["ProductName"];
        $Description = $prodRow["Description"];
        $Price = $prodRow["Price"];
        $Quantity = $prodRow["Quantity"];
        $CategoryName = $prodRow["CategoryName"];
        $IsFeatured = $prodRow["IsFeatured"];
	$ImageURL = $prodRow["ImageURL"];
	$IsSoldOut = $prodRow["IsSoldOut"];
    }
    if ($catChoices->num_rows > 0) {
        // output data of each row
        while($catRow = $catChoices->fetch_assoc()) {
            if($catRow["CategoryName"] == $CategoryName){
                $selected = "selected";
            }else{
                $selected = "";
            }
            $catddl .= '<option value="' . $catRow["CategoryName"] . '" ' . $selected . '>' . $catRow["CategoryName"] . "</option>";

        }
    }

    $secondaryImages = ExecuteSQL("SELECT KeyImage, ImageURL FROM productimages WHERE KeyProduct = " . $keyProduct . ";");
    $secondaryImageHTML = "<b>No additional images</b>";
    if ($secondaryImages->num_rows > 0) {
	$secondaryImageHTML = "";
	while($imgRow = $secondaryImages->fetch_assoc()) {
            $secondaryImageHTML .= '<img src="../' . $imgRow['ImageURL'] . '" class="img img-fluid" style="max-height:100px;max-width:100px;display:inline;padding:5px;" />' . 
		'<a class="btn btn-danger imgdel" data-toggle="modal" data-id="' . $imgRow["KeyImage"] . '" data-target="#deleteImageModal" style="padding: 2px 5px;margin-top: -75px;margin-left: -20px;font-size: 6px;">X</a>';

        }

    }


}



function UploadImage($productName){
    $productName = str_replace(' ', '', $productName);
	$target_dir = "../wwwroot/images/";
	$target_file = $target_dir . $productName;
	$uploadOk = 1;
	$imageFileType = pathinfo($target_dir . basename($_FILES["fileToUpload"]["name"]),PATHINFO_EXTENSION);
	if($imageFileType==''){
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
            echo "An image is required for new products!";
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
			echo "The file ". $productName . " has been uploaded.";
		} else {
			echo "Sorry, there was an error uploading your file.";
            return "";
		}
	}

	return str_replace('..', '', $target_file);

}



function UploadImages($productName){
    $productName = str_replace(' ', '', $productName);
	$target_dir = "../wwwroot/images/";

	$total = count($_FILES['fileToUploadAdditional']['name']);

	$image_array = array();

	// Loop through each file
	for( $i=0 ; $i < $total ; $i++ ) {
		// since we're doing multiple files here, append a random number
		$target_file = $target_dir . $productName . rand();
		$uploadOk = 1;
		$imageFileType = pathinfo($target_dir . basename($_FILES["fileToUploadAdditional"]["name"][$i]),PATHINFO_EXTENSION);
		if($imageFileType == ''){
			continue;
		}
		$target_file = $target_file . "." . $imageFileType;
		// Check if image file is a actual image or fake image
			$check = getimagesize($_FILES["fileToUploadAdditional"]["tmp_name"][$i]);
			if($check !== false) {
				echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} else {
				echo "File is not an image.";
				$uploadOk = 0;
			}
		// Check if file already exists
		if (file_exists($target_file)) {
			echo "Sorry, file already exists.";
			$uploadOk = 0;
		}
		// Check file size
		//if ($_FILES["fileToUploadAdditional"]["size"][$I] > 500000) {
		//	echo "Sorry, your file is too large.";
		//	$uploadOk = 0;
		//}

		// Allow certain file formats
		
		$imageFileType = strtolower($imageFileType);
		
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
	        if($imageFileType == ""){
	            echo "An image is required for new products!";
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
			if (move_uploaded_file($_FILES["fileToUploadAdditional"]["tmp_name"][$i], $target_file)) {
				echo "The file ". $productName . " has been uploaded.";
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
