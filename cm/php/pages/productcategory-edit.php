<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $keyCategory = GetSafeString($_POST["hdnKeyProduct"]);
    $CategoryName = GetSafeString($_POST["CatName"]);
    if($keyCategory > 0){
        ExecuteSQL("UPDATE productcategories SET CategoryName = '" . $CategoryName . "' WHERE KeyCategory = '" . $keyCategory . "';");

    }else{
        ExecuteSQL("INSERT INTO productcategories (CategoryName) VALUES ('" . $CategoryName . "');");
    }

    echo "<script>location='products.php'</script>";

}else{

    $keyCategory = GetSafeString($_GET["KeyCategory"]);
    $CategoryName = GetSingleValueDB("SELECT CategoryName FROM productcategories WHERE KeyCategory = " . $keyCategory . " LIMIT 1;", "CategoryName");
}

?>
