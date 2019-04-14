<?php 
include('master/header.php');
include('php/pages/coupon-edit.php');
 ?>
<form action="coupon-edit.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="hdnKeyCoupon" value="<?php echo $keyCoupon; ?>" />
<div class="container">
    <div class="row" style="margin:10px 0;">
        <div class="col-xs-12" style="text-decoration:underline;">
            <h3>Edit Coupon</h3>
        </div>
    </div>
    <div class="row" style="margin:10px 0;">
        <div class="col-xs-12" style="text-align:center;">
            <h2><?php echo $CouponName; ?></h2>
        </div>
    </div>

    <hr/>

    <div class="row" style="margin:10px 0;">

        <div class="col-xs-12 col-sm-2">
            Coupon Name:
        </div>
        <div class="col-xs-12 col-sm-6">
            <input type="text" name="CoupName" class="form-control" value="<?php echo $CouponName; ?>" />
        </div>
    </div>
    <div class="row" style="margin:10px 0;">

        <div class="col-xs-12 col-sm-2">
            Amount:
        </div>
        <div class="col-xs-12 col-sm-6">
            <input type="number" name="CoupAmount" class="form-control" value="<?php echo $DiscountAmount; ?>" step="0.01" />
        </div>
    </div>
    <div class="row" style="margin:40px 0;">
        <div class="col-xs-6">
            <input type="submit" class="btn btn-success" />
        </div>
        <div class="col-xs-6">
            <a href="coupons.php" class="btn btn-secondary">Cancel</a>
        </div>
    </div>

</div>

</form>

 <?php include('master/footer.php'); ?>
