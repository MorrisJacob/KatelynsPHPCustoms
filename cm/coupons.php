<?php 
include('master/header.php');
include('php/pages/coupons.php');
 ?>

        <div class="tm-blog-img-container">
            
        </div>

        <section class="tm-section">
            <div class="container">
                <div class="row" style="margin:20px 0;">
                    <div class="col-xs-12">
                        Please select a coupon to edit.
                    </div>
                </div>
                <div class="row tm-gold-text text-center">

                    <div class="col-xs-11 col-xs-push-1">
                        <h3 class="header">Coupons</h3>
                        <div class="row" style="margin: 10px 0;">
                            <div class="col-xs-4">
                                Coupon Name
                            </div>
                            <div class="col-xs-4">
                                Discount
                            </div>
                            <div class="col-xs-2">
                                # of Uses
                            </div>
                            <div class="col-xs-2">
                                Actions
                            </div>
                        </div>
                        <?php echo $couponsHTML; ?>

                        <div class="row tm-gold-text-imp" style="margin: 10px 0;">
                        <a href="coupon-edit.php?KeyCoupon=-1">
			                <div class="col-xs-10">
                                 Add A New Coupon
			                </div>
                            <div class="col-xs-2">
                                <div class="btn btn-success"  style="padding:2px 8px;">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
			                    </div>
                            </div>
                        </a>
		                </div>

                    </div>
                </div>
                
            </div>
        </section>


<div class="modal fade" id="deleteCouponModal" tabindex="-1" role="dialog" aria-labelledby="deleteCouponModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="width:90%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteCouponModalLabel">Delete Coupon</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this coupon? Once complete this operation cannot be undone!
            </div>
            <div class="modal-footer">
                <a id="coupadel" href="php/actions/coupon-delete.php" class="btn btn-danger">Yes, Delete This Coupon</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<script>
$(function(){

    //add which specific object is being deleted (by id) to the delete url
    $(document).on("click", ".coupdel", function () {
        let coupDel = $(this).data('id');
        let href = $("#coupadel").attr("href");
        $("#coupadel").attr("href", href + '?KeyCoupon=' + coupDel);
    });
});
</script>


<?php include('master/footer.php'); ?>
