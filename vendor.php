<?php
 include('master/header.php');
include('php/pages/vendor.php');
 ?>

<form action="vendor.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
<div id="mainBody">
	<div class="container">
		<div class="row row-margin">
			<div class="span12">		
				<h1>Vendor Application</h1>
			</div>
		</div>
		<div class="row row-margin">
			<div class="span12">
				<?php echo $success; ?>
			</div>
		</div>
		<div class="row row-margin">
			<div class="span12">		
				<h3>Please fill out this vendor application.</h3>
			</div>
		</div>
		<div class="row row-margin">
			<div class="span3 text-right bold">		
				Name: 			
			</div>
			<div class="span5 text-right">		
				<input name="Name" class="form-control" Placeholder="Name" />
			</div>
		</div>
		<div class="row row-margin">
			<div class="span3 text-right bold">		
				Company Name: 			
			</div>
			<div class="span5 text-right">		
				<input name="CompanyName" class="form-control" Placeholder="Company Name" />
			</div>
		</div>
		<div class="row row-margin">
			<div class="span3 text-right bold">		
				Phone Number: 			
			</div>
			<div class="span5 text-right">		
				<input name="PhoneNumber" class="form-control" Placeholder="Phone Number" />
			</div>
		</div>
		<div class="row row-margin">
			<div class="span3 text-right bold">		
				Located From: 			
			</div>
			<div class="span5 text-right">		
				<input name="Location" class="form-control" Placeholder="Located" />
			</div>
		</div>
		<div class="row row-margin">
			<div class="span3 text-right bold">		
				Describe what you do: 			
			</div>
			<div class="span5 text-right">		
				<textarea name="Description" class="form-control" Placeholder="What do you do?"></textarea>
			</div>
		</div>
		<div class="row row-margin">
			<div class="span3 text-right bold">		
				Upload some images: 			
			</div>
			<div class="span5 text-right">		
				<input type="file" name="vendorImages[]" id="vendorImages" multiple>
			</div>
		</div>
		<div class="row row-margin">
			<div class="span3 text-right bold">		
				Select an upcoming show:
			</div>
				<?php echo $showlist; ?>
		</div>
		<div class="row row-margin">
			<div class="span12">		
				<input type="submit" value="submit" class="btn btn-success" />
			</div>
		</div>
	</div>
</div>
</form>
<style>
.row-margin{margin:10px;}
.bold{font-weight:bold;}
.text-right { text-align: right;}
.form-control { width:100%;}
</style>
<?php include('master/footer.php');?>
