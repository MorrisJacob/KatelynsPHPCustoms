<?php
include("../plumbing/sqlconn.php");
include("../plumbing/generalfunctions.php");

$ShowId = GetSafestring($_GET["ShowId"]);

ExecuteSQL("DELETE FROM `show` WHERE Id = " . $ShowId . ";");

header("Location: ../../shows.php"); /* Redirect browser */
exit();
?>
