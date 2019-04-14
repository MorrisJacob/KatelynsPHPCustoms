<?php
include("../plumbing/sqlconn.php");
include("../plumbing/generalfunctions.php");

$keyCoup = GetSafestring($_GET["KeyCoupon"]);


ExecuteSQL("Update coupon SET IsActive = 0 WHERE KeyCoupon = " . $keyCoup . ";");

  echo "<script>location='../../coupons.php'</script>";
?>
