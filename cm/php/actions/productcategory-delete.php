<?php
include("../plumbing/sqlconn.php");
include("../plumbing/generalfunctions.php");

$keyCat = GetSafestring($_GET["KeyCategory"]);

ExecuteSQL("DELETE FROM productcategories WHERE KeyCategory = " . $keyCat . ";");

header("Location: ../../products.php"); /* Redirect browser */
exit();
?>