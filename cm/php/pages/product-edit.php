<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $keyProduct = GetSafeString($_POST["hdnKeyProduct"]);
    $ProductName = GetSafeString($_POST["ProdName"]);
    $Description = GetSafeString($_POST["Desc"]);
    $Price = GetSafeString($_POST["Price"]);
    $Quantity = GetSafeString($_POST["Quantity"]);
    $CategoryName = GetSafeString($_POST["CatName"]);
    $IsFeatured = GetSafeString($_POST["Featured"]);

    if($IsFeatured == ""){
        $IsFeatured = "false";
    }

    if($keyProduct > 0){

        ExecuteSQL("UPDATE products SET ProductName = '" . $ProductName . 
        "', Description = '" . $Description .
        "', Price = " . $Price .
        ", Quantity = " . $Quantity .
        ", CategoryName = '" . $CategoryName .
        "', IsFeatured = " . $IsFeatured . " WHERE KeyProduct = " . $keyProduct . ";");

    }else{

		$ImageURL = UploadImage($ProductName);

        if($ImageURL != "")
        {
                    ExecuteSQL("INSERT INTO products (ProductName, Description, ImageURL, Price, Quantity, CategoryName, IsFeatured) VALUES " .
        "('" . $ProductName . "', '" . $Description . "', '" . $ImageURL . "', " . $Price . ", " . $Quantity . ", '" . $CategoryName . "', " . $IsFeatured . ");");

            echo "<script>location='products.php'</script>";
        }

        
    }

		

}

    $keyProduct = GetSafeString($_GET["KeyProduct"]);

    $catddl = "";
    $prodInfo = ExecuteSQL("SELECT ProductName, Description, Price, Quantity, CategoryName, CAST(IsFeatured AS unsigned int) IsFeatured" .
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




function UploadImage($productName){
    $productName = str_replace(' ', '', $productName);
	$target_dir = "../wwwroot/images/";
	$target_file = $target_dir . $productName;
	$uploadOk = 1;
	$imageFileType = pathinfo($target_dir . basename($_FILES["fileToUpload"]["name"]),PATHINFO_EXTENSION);

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
		echo "Sorry, file already exists.";
		$uploadOk = 0;
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

	return str_replace('../', '', $target_file);

}
?>