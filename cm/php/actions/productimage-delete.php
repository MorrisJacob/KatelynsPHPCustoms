<?php
include("../plumbing/sqlconn.php");
include("../plumbing/generalfunctions.php");

$keyImg = GetSafestring($_GET["KeyImage"]);

$key_prod = GetSingleValueDB("SELECT KeyProduct FROM productimages WHERE KeyImage = " . $keyImg . ";", "KeyProduct");

ExecuteSQL("DELETE FROM productimages WHERE KeyImage = " . $keyImg . ";");

header("Location: ../../product-edit.php?KeyProduct=" . $key_prod); /* Redirect browser */
exit();
?>