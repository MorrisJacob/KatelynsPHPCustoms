<?php include('master/header.php');?>
<!-- Header End====================================================================== -->
<?php include('controls/carousel.php');?>
<div id="mainBody">
	<div class="container">
	<div class="row">
<!-- Sidebar ================================================== -->
<?php include('controls/sidebar.php');?>
<!-- Sidebar end=============================================== -->
	<div class="span9">
    <?php include('controls/breadcrumbs.php');?>
	<h3> Products Comparison <small class="pull-right"> 2 products are compared </small></h3>	
	<hr class="soft"/>

	<table id="compairTbl" class="table table-bordered">
              <thead>
                <tr>
                  <th>Features</th>
                  <th>Lighter</th>
                  <th>Bath Bombs</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>&nbsp;</td>
                  <td style="text-align:center">
					<p class="justify">
						This is a lighter. It is painted. So I guess you could say it's a painted lighter.
            But who would want to say that? We would. Painted lighter. Boom.
					</p>
				<img class="compareimg" src="wwwroot/images/lighters.jpg" alt=""/>
				<form class="form-horizontal qtyFrm">
				<h3> $12.00</h3><br/>
				 <a href="product_details.php" class="btn btn-large btn-primary"> Add to <i class=" icon-shopping-cart"></i></a>
				 <a href="product_details.php" class="btn btn-large"><i class="icon-zoom-in"></i></a>
				</form>
				</td>
                  <td>
				  <p class="justify">
					This is a bath bomb. Wait... why are you comparing these items? That's a strange comparison. In no way should 
          you be using a bath bomb and a lighter in the same fashion. You are strange. Strange strange stranger.
				</p>
				<img class="compareimg" src="wwwroot/images/bathbombs.jpg" alt=""/>
				
				<form class="form-horizontal qtyFrm">
				<h3> $15.00</h3>
				<br/>
				 <a href="product_details.php" class="btn btn-large btn-primary"> Add to <i class=" icon-shopping-cart"></i></a>
				 <a href="product_details.php" class="btn btn-large"><i class="icon-zoom-in"></i></a>
				</form>
				  </td>
                </tr>
                <tr>
                  <td>Height</td>
                  <td>2"</td>
                  <td>4"</td>
                </tr>
                <tr>
                  <td>Depth</td>
                  <td>5"</td>
                  <td>3"</td>
                </tr>
				<tr>
                  <td>Dimension</td>
                  <td>2" X 5" X 3"</td>
                  <td>4" X 3" X 4"</td>
                </tr>
				<tr>
                  <td>Width</td>
                  <td>3"</td>
                  <td>4"</td>
                </tr>
				<tr>
                  <td>Weight</td>
                  <td>1 lbs</td>
                  <td>4 lbs</td>
                </tr>
              </tbody>
            </table>		
	<a href="products.php" class="btn btn-large pull-right">Back Products Page</a>
	
	
</div>
</div>
</div>
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->
<?php include('master/footer.php');?>