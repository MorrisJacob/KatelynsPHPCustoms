<?php
include("../plumbing/sqlconn.php");
include("../plumbing/generalfunctions.php");

$keyProd = GetSafestring($_GET["KeyProduct"]);

$filename = "../../../" . GetSingleValueDB("SELECT ImageURL FROM products WHERE KeyProduct = " . $keyProd . " LIMIT 1;", "ImageURL");

if (file_exists($filename)) {
    unlink($filename);
    echo 'File '.$filename.' has been deleted';
  } else {
    echo 'Could not delete '.$filename.', file does not exist';
  }

ExecuteSQL("DELETE FROM products WHERE KeyProduct = " . $keyProd . ";");
ExecuteSQL("DELETE FROM cart WHERE KeyProduct = " . $keyProd . ";");

  echo "<script>location='../../products.php'</script>";
?>