<?php
include("php/controls/sidebar.php");
?>
<div id="sidebar" class="span3">
		<div class="well well-small"><a id="myCart" href="product_summary.php"><img src="themes/images/ico-cart.png" alt="cart">
		<?php echo $cartCount; ?> Items in your cart  <span class="badge badge-warning pull-right">$<?php echo $cartCost; ?></span>
		</a></div>
		<ul id="sideManu" class="nav nav-tabs nav-stacked">
			<?php echo $sideHTML; ?>
		</ul>
		<br/>
		  <!--<div class="thumbnail">
			<img src="themes/images/products/panasonic.jpg" alt="Bootshop panasonoc New camera"/>
			<div class="caption">
			  <h5>Panasonic</h5>
				<h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">$222.00</a></h4>
			</div>
		  </div><br/>
			<div class="thumbnail">
				<img src="themes/images/products/kindle.png" title="Bootshop New Kindel" alt="Bootshop Kindel">
				<div class="caption">
				  <h5>Kindle</h5>
				    <h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">$222.00</a></h4>
				</div>
			</div><br/>-->
			<div class="thumbnail">
				<img src="themes/images/payment_methods.png" title="Payment Methods" class="img img-responsive" alt="Payments Methods" style="width:50%;">
				<div class="caption">
				  <h5>We accept Paypal!</h5>
				</div>
			</div>
	</div>