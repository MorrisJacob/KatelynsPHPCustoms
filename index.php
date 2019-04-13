<?php
 include('master/header.php');
 include('php/pages/index.php');
 ?>
<!-- Header End====================================================================== -->
<?php include('controls/carousel.php');?>
<div id="mainBody">
	<div class="container">
		<div class="row">
<!-- Sidebar ================================================== -->
<?php include('controls/sidebar.php');?>
<!-- Sidebar end=============================================== -->
			<div class="span9">		
				<div class="well well-small" style="display:<?php echo $displayfeatured ?>;">
					<h4>Featured Products <small class="pull-right"><?php echo $featurednum; ?> featured product(s)</small></h4>
					<div class="row-fluid">
						<div id="featured" class="carousel slide">
							<div class="carousel-inner">
								<?php echo $featuredHTML; ?>
			  				</div>
			  				<a class="left carousel-control" href="#featured" data-slide="prev">‹</a>
			  				<a class="right carousel-control" href="#featured" data-slide="next">›</a>
			  			</div>
			  		</div>
				</div>
				<h4>Latest Products </h4>
			  	<ul class="thumbnails">
			  		<?php echo $latestHTML; ?>
			  	</ul>	

			</div>
		</div>
	</div>
</div>
<?php include('master/footer.php');?>