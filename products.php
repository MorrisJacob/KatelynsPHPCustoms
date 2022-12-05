<?php
include('master/header.php');

include('php/pages/products.php');
?>
<script src="wwwroot/js/products.js"></script>
<!-- Header End====================================================================== -->
<div id="mainBody">
	<div class="container">
	<div class="row">
<!-- Sidebar ================================================== -->
<?php include('controls/sidebar.php');?>
<!-- Sidebar end=============================================== -->
	<div class="span9">
    <?php include('controls/breadcrumbs.php');?>
	<h3> Products <small class="pull-right"> <?php echo $prodCount; ?> product(s) are available </small></h3>	
	<hr class="soft"/>
	<p>
        Most of our products are sent as is. Wet specimens will be shipped WITHOUT fluid which will need replaced as soon as the item is shipped. If there are any specimens or custom works that you are interested in requesting, find your preferred method of communication under the contact tab ! If you have any comments, questions or concerns, please let us know!

	</p>
    <p>
         Products photographed by Hayden Scott. Find their info on our <a href="/contact.php">Contact page</a>. 
    </p>
	<hr class="soft"/>
	<form method="GET" action="products.php" class="form-horizontal span6">
		<div class="control-group">
		  <label class="control-label alignL">Sort By </label>
			<select name="orderselect" onchange="this.form.submit();">
              <?php echo $orderDdl ?>
            </select>
		</div>
	  </form>
	  
<div id="myTab" class="pull-right">
 <a href="#listView" data-toggle="tab"><span class="btn btn-large viewbtn"><i class="icon-list"></i></span></a>
 <a href="#blockView" data-toggle="tab"><span class="btn btn-large btn-primary viewbtn"><i class="icon-th-large"></i></span></a>
</div>
<br class="clr"/>
<div class="tab-content">
	<div class="tab-pane" id="listView">
		<?php echo $producthtml_listview ?>
	</div>

	<div class="tab-pane  active" id="blockView">
		
		<ul class="thumbnails">
			<?php echo $producthtml_blockview ?>
		</ul>
	<hr class="soft"/>
	</div>
</div>

	<!--<a href="compare.php" class="btn btn-large pull-right">Compare Product</a>
	<div class="pagination">
			<ul>
			<li><a href="#">&lsaquo;</a></li>
			<li><a href="#">1</a></li>
			<li><a href="#">2</a></li>
			<li><a href="#">3</a></li>
			<li><a href="#">4</a></li>
			<li><a href="#">...</a></li>
			<li><a href="#">&rsaquo;</a></li>
			</ul>
			</div>-->
			<br class="clr"/>
</div>
</div>
</div>
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->
<?php include('master/footer.php');?>
