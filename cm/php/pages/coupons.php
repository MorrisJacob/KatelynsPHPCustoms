<?php
$couponsHTML = "";

//first let's load up the Coupons
$coupons = ExecuteSQL("SELECT c.CouponCode, c.DiscountAmount, c.KeyCoupon, COUNT(o.KeyCoupon) CodeUsedCount
FROM coupon c
LEFT JOIN orders o ON c.KeyCoupon = o.KeyCoupon WHERE c.IsActive = 1
GROUP BY c.CouponCode, c.DiscountAmount, c.KeyCoupon");

if ($coupons->num_rows > 0) {
    //output data of each row
    while ($row = $coupons->fetch_assoc()) {
        $couponsHTML .= '<div class="row" style="margin: 10px 0;">' .
                            '<div class="col-xs-4">' .
                               $row["CouponCode"] .
                            '</div>' .
                            '<div class="col-xs-4">$' .
                                number_format($row["DiscountAmount"],2) .
                            '</div>' .
                            '<div class="col-xs-2">' .
                                $row["CodeUsedCount"] .
                            '</div>' .
                            '<div class="col-xs-2">' .
                            '<a class = "btn btn-info" href="coupon-edit.php?KeyCoupon=' . $row["KeyCoupon"] . '" style="padding:2px 8px;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp' .
                            '<a class="btn btn-danger coupdel" data-toggle="modal" data-id="' . $row["KeyCoupon"] . '" data-target="#deleteCouponModal" style="padding:2px 8px;">X</a>' .
                            '</div>' .
                        '</div><hr/>';
    }
} else {
    $couponsHTML .= "No Coupons Available";
}
?>
