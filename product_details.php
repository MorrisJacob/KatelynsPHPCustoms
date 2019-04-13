<?php 
include('master/header.php');
include('php/pages/products_details.php');
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
	<div class="row">	  
			<div id="gallery" class="span3">
            <a href="<?php echo $imageURL; ?>" title="<?php echo $productdesc; ?>">
				<img src="<?php echo $imageURL; ?>" alt="<?php echo $productdesc; ?>"/>
            </a>
			<div id="differentview" class="moreOptopm carousel slide">
                <!--<div class="carousel-inner">
                  <div class="item active">
                   <a href="wwwroot/images/lighters.jpg"> <img style="width:29%" src="wwwroot/images/lighters.jpg" alt=""/></a>
                   <a href="wwwroot/images/lighters.jpg"> <img style="width:29%" src="wwwroot/images/lighters.jpg" alt=""/></a>
                   <a href="wwwroot/images/lighters.jpg" > <img style="width:29%" src="wwwroot/images/lighters.jpg" alt=""/></a>
                  </div>
                  <div class="item">
                   <a href="wwwroot/images/lighters.jpg" > <img style="width:29%" src="wwwroot/images/lighters.jpg" alt=""/></a>
                   <a href="wwwroot/images/lighters.jpg"> <img style="width:29%" src="wwwroot/images/lighters.jpg" alt=""/></a>
                   <a href="wwwroot/images/lighters.jpg"> <img style="width:29%" src="wwwroot/images/lighters.jpg" alt=""/></a>
                  </div>
                </div>-->
              <!--  
			  <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
              <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a> 
			  -->
              </div>
			  
			 <div class="btn-toolbar">
			  <div class="btn-group">
				<!--<span class="btn"><i class="icon-envelope"></i></span>
				<span class="btn" ><i class="icon-print"></i></span>
				<span class="btn" ><i class="icon-star"></i></span>
				<span class="btn" ><i class=" icon-thumbs-up"></i></span>
				<span class="btn" ><i class="icon-thumbs-down"></i></span>-->
				<span class="btn" onclick="OpenPhotoSwipe('<?php echo $imageURL; ?>');" ><i class="icon-zoom-in"></i></span>
			  </div>
			</div>
			</div>
			<div class="span6">
				<h3><?php echo $productname; ?></h3>
				<!--<small>Description</small>-->
				<hr class="soft"/>
				<form class="form-horizontal qtyFrm">
				  <div class="control-group">
					<label class="control-label"><span><?php echo "$" . $productprice; ?></span></label>
					<div class="controls">
					<input type="number" class="span1" id="ProdQuant" placeholder="Qty." value="1" />
					  <a id="CartLink" href="php/actions/addtocart.php?KeyProduct=<?php echo $keyproduct ?>" onclick="AddQuantity();" class="btn btn-large btn-primary pull-right"> Add to cart <i class=" icon-shopping-cart"></i></a>
					</div>
				  </div>
				</form>
				
				<hr class="soft"/>
				<h4><?php echo $productstock; ?> of this item left in stock</h4>
				<!--<form class="form-horizontal qtyFrm pull-right">
				  <div class="control-group">
					<label class="control-label"><span>Color</span></label>
					<div class="controls">
					  <select class="span2">
						  <option>Black</option>
						  <option>Red</option>
						  <option>Blue</option>
						  <option>Brown</option>
						</select>
					</div>
				  </div>
				</form>-->
				<hr class="soft clr"/>
				<p>
					<?php echo $productdesc; ?>
				</p>
				<!--<a class="btn btn-small pull-right" href="#detail">More Details</a>-->
				<br class="clr"/>
			<a href="#" name="detail"></a>
			<hr class="soft"/>
			</div>
			
			<div class="span9">
            <ul id="productDetail" class="nav nav-tabs">
              <!--<li><a href="#home" data-toggle="tab">Product Details</a></li>-->
              <li class="active"><a href="#profile" data-toggle="tab">Related Products</a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
        <!--<div class="tab-pane fade active in" id="home">
			  <h4>Product Information</h4>
                <table class="table table-bordered">
				<tbody>
				<tr class="techSpecRow"><th colspan="2">Product Details</th></tr>
				<tr class="techSpecRow"><td class="techSpecTD1">Brand: </td><td class="techSpecTD2">Bic</td></tr>
				<tr class="techSpecRow"><td class="techSpecTD1">Model:</td><td class="techSpecTD2">X250</td></tr>
				<tr class="techSpecRow"><td class="techSpecTD1">Released on:</td><td class="techSpecTD2"> 2017-01-28</td></tr>
				<tr class="techSpecRow"><td class="techSpecTD1">Dimensions:</td><td class="techSpecTD2"> 5.50" h x 5.50" w x 2.00" l, .75 pounds</td></tr>
				<tr class="techSpecRow"><td class="techSpecTD1">Display size:</td><td class="techSpecTD2">3</td></tr>
				</tbody>
				</table>
				
				<h5>Features</h5>
				<p>
				Fire. Other stuff.
				</p>

				<h4>Editorial Reviews</h4>
				<h5>Manufacturer's Description </h5>
				<p>
				This makes fire and whatnot.
				</p>

				<h5>Child Safety thing</h5>
				<p>
					Keep your kids safe, folks
				</p>
        </div>-->
		<div class="tab-pane fade active in" id="profile">
			<div id="myTab" class="pull-right">
		 		<a href="#listView" data-toggle="tab"><span class="btn btn-large viewbtn"><i class="icon-list"></i></span></a>
		 		<a href="#blockView" data-toggle="tab"><span class="btn btn-large btn-primary viewbtn"><i class="icon-th-large"></i></span></a>
			</div>
			<br class="clr"/>
			<hr class="soft"/>
			<div class="tab-content">
				<div class="tab-pane" id="listView">
					<?php echo $relatedHTMLList; ?>
				</div>
			<div class="tab-pane active" id="blockView">
				<ul class="thumbnails">
					<?php echo $relatedHTMLBlock; ?>
				</ul>
				<hr class="soft"/>
			</div>
		</div>
				<br class="clr">
					 </div>
		</div>
          </div>

	</div>
</div>
</div> </div>
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->

<script src="wwwroot/js/product_details.js"></script>

<?php include('master/footer.php');?>