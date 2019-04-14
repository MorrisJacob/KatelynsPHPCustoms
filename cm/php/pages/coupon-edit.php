<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $keyCoupon = GetSafeString($_POST["hdnKeyCoupon"]);
    $CouponName = GetSafeString($_POST["CoupName"]);
    $Amount = GetSafeString($_POST["CoupAmount"]);

    if($keyCoupon > 0){

        ExecuteSQL("UPDATE coupon SET CouponCode = '" . $CouponName . 
        "', DiscountAmount = " . $Amount .
        " WHERE KeyCoupon = " . $keyCoupon . ";");

    }else{

        ExecuteSQL("INSERT INTO coupon (CouponCode, DiscountAmount, IsActive) VALUES " .
        "('" . $CouponName . "', " . $Amount . ", 1);");

    }
    echo "<script>location='coupons.php'</script>";

}

$keyCoupon = GetSafeString($_GET["KeyCoupon"]);

$coupInfo = ExecuteSQL("SELECT CouponCode, DiscountAmount" .
                            " FROM coupon WHERE KeyCoupon = " . $keyCoupon . " AND IsActive = 1 LIMIT 1;");

if ($coupInfo->num_rows > 0) {

    $coupRow = $coupInfo->fetch_assoc();

    $CouponName = $coupRow["CouponCode"];
    $DiscountAmount = $coupRow["DiscountAmount"];
}

?>

