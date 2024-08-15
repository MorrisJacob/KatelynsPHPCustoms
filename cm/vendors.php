<?php
include('master/header.php');
include('php/pages/vendors.php');
?>
<h1 style="text-align:center;">Vendor Applicants</h1>
<hr/>
        <section class="tm-section">
            <div class="container-fluid" style="word-break:break-word;">
                <div class="row" style="margin-bottom:15px;">
                    <div class="col-xs-12">
			<div class="row" style="font-weight:bold;">
			    <div class="col-xs-12 col-md-3 hidden-sm-down">
				Vendor Name
			    </div>
			    <div class="col-xs-12 col-md-2 hidden-sm-down">
				Company Name
			    </div>
			    <div class="col-xs-12 col-md-2 hidden-sm-down">
				Contact Info
			    </div>
			    <div class="col-xs-12 col-md-3 hidden-sm-down">
				Description
			    </div>
			    <div class="col-xs-12 col-md-2 hidden-sm-down">
				Show
			    </div>
			</div>

			<?php echo $vendorsHTML; ?>
                    </div>
                </div>
            </div>
        </section>

<?php include('master/footer.php'); ?>
