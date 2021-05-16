<?php
include('master/header.php');
include('php/pages/product_summary.php'); 
 ?>
<!-- Header End====================================================================== -->
<div id="mainBody">
	<div class="container">
	<div class="row">
<!-- Sidebar ================================================== -->
<?php include('controls/sidebar.php');?>
<!-- Sidebar end=============================================== -->
	<div class="span9">
    <?php include('controls/breadcrumbs.php');?>
	<h3>  SHOPPING CART [ <?php echo $cartCount; ?> Item(s) ]<a href="products.php" class="btn btn-large pull-right"><i class="icon-arrow-left"></i> Continue Shopping </a></h3>	
	<hr class="soft"/>	
			
	<table class="table table-bordered">
              <thead>
                <tr>
                  <th>Product</th>
                  <th>Description</th>
                  <th>Quantity</th>
                  <th>Total</th>
		</tr>
              </thead>
              <tbody>
							<?php echo $cartItemsHTML ?>
				
                <tr>
                  <td colspan="3" style="text-align:right">Total Price:	</td>
                  <td> $<?php echo number_format($total, 2); ?></td>
                </tr>
                 <tr>
                  <td colspan="3" style="text-align:right">Total Shipping:	</td>
                  <td> $<?php echo number_format($shipping,2); ?></td>
                </tr>
                <tr>
                    <td colspan="3" style="text-align:right">Total Discount: </td>
                    <td>-$<?php echo number_format($discount,2); ?></td>
                </tr>
				 <tr>
                 <td colspan="3" style="text-align:right"><strong>TOTAL ($<?php echo number_format($total,2); ?> + $<?php echo number_format($shipping,2); ?> - $<?php echo number_format($discount,2) ?>) =</strong></td>
                  <td class="label label-important" style="display:block"> <strong> $<?php echo number_format($total + $shipping - $discount,2); ?> </strong></td>
                </tr>
				</tbody>
            </table>

    <div class="row">
        <div class="span6" style="text-align:right;">
            Have a Promo Code?
        </div>
        <div class="span3">
            <input id="txtPromo" type="text" class="form-control" style="width:100%;" />
        </div>
    </div>
    <div class="row">
        <div class="span9" style="text-align:right;">
            * Only one promo code can be used per order&nbsp;
            <input id="btnPromo" type="button" class="btn btn-primary" value="Apply" style="float:right;" />
        </div>
    </div>
		

	<a href="products.php" class="btn btn-large"><i class="icon-arrow-left"></i> Continue Shopping </a>
	<form name="_xclick" action="https://www.paypal.com/cgi-bin/webscr" method="post" style="display:inline; text-align:right;">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="bethelight@katelynscustoms.com">
<input type="hidden" name="currency_code" value="USD">
<input type='hidden' name='rm' value='2'>
<input type="hidden" name="item_name" value="<?php echo $keyOrder ?>">
<input type="hidden" name="amount" value="<?php echo number_format($total + $shipping - $discount,2); ?>">
<input type="image" src="http://www.paypal.com/en_GB/i/btn/x-click-but01.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
</form>
	
</div>
</div></div>
</div>

<script>
$(function(){
    $('#btnPromo').on('click', function(){
        let couponCode = $('#txtPromo').val();
        window.location.replace("php/actions/applydiscount.php?CouponCode=" + couponCode);
    });
});
</script>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->
<?php include('master/footer.php');?>
