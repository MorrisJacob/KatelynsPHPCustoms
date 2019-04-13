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
                  <td colspan="3" style="text-align:right"><strong>TOTAL ($<?php echo number_format($total,2); ?> + $<?php echo number_format($shipping,2); ?>) =</strong></td>
                  <td class="label label-important" style="display:block"> <strong> $<?php echo number_format($total + $shipping,2); ?> </strong></td>
                </tr>
				</tbody>
            </table>

		
            <!--<table class="table table-bordered">
			<tbody>
				 <tr>
                  <td> 
				<form class="form-horizontal">
				<div class="control-group">
				<label class="control-label"><strong> VOUCHERS CODE: </strong> </label>
				<div class="controls">
				<input type="text" class="input-medium" placeholder="CODE">
				<button type="submit" class="btn"> ADD </button>
				</div>
				</div>
				</form>
				</td>
                </tr>
				
			</tbody>
			</table>-->

	<a href="products.php" class="btn btn-large"><i class="icon-arrow-left"></i> Continue Shopping </a>
	<form name="_xclick" action="https://www.paypal.com/cgi-bin/webscr" method="post" style="display:inline; text-align:right;">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="bethelight@katelynscustoms.com">
<input type="hidden" name="currency_code" value="USD">
<input type='hidden' name='rm' value='2'>
<input type="hidden" name="item_name" value="<?php echo $keyOrder ?>">
<input type="hidden" name="amount" value="<?php echo number_format($total + $shipping,2); ?>">
<input type="image" src="http://www.paypal.com/en_GB/i/btn/x-click-but01.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
</form>
	
</div>
</div></div>
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->
<?php include('master/footer.php');?>