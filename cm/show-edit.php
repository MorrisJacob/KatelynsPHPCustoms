<?php 
include('master/header.php');
include('php/pages/show-edit.php');
 ?>
<form id="show-form" action="show-edit.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="hdnShowId" value="<?php echo $ShowId; ?>" />
<div class="container">
<div class="row" style="margin:10px 0;">
    <div class="col-xs-12" style="text-decoration:underline;">
        <h3>Edit Show</h3>
    </div>
</div>
<div class="row" style="margin:10px 0;">
    <div class="col-xs-12" style="text-align:center;">
        <h2><?php echo $ShowName; ?></h2>
    </div>
</div>

<hr/>

<div class="row" style="margin-bottom:10px;">

    <div class="col-xs-12 col-sm-2">
        Show Name:
    </div>
    <div class="col-xs-12 col-sm-6">
        <input type="text" name="ShowName" class="form-control" value="<?php echo $ShowName; ?>" />
    </div>
</div>

<div class="row" style="margin-bottom:10px;">

    <div class="col-xs-12 col-sm-2">
        Show Date:
    </div>
    <div class="col-xs-12 col-sm-6">
        <input type="date" name="ShowDate" class="form-control" value="<?php echo $ShowDate; ?>" />
    </div>
</div>

<div class="row" style="margin:10px 0;">
	<div class="col-sm-2 col-xs-12">
        	Show Image:
	</div>
	<div class="col-sm-9 col-xs-12">
		<img src="../<?php echo $ImageURL; ?>" class="img img-fluid" style="max-width:100px;max-height:100px;display:inline;" /> New Image: <input type="file" name="fileToUpload" id="fileToUpload">
	</div>
</div>

<div class="row">

    <div class="col-xs-12 col-sm-2">
        Description:
    </div>
    <div class="col-xs-12 col-sm-6">
	<textarea id="ShowDescription" form="show-form" name="ShowDescription" class="form-control"><?php echo $ShowDescription; ?></textarea>
    </div>
</div>

<div class="row" style="margin:40px 0;">
    <div class="col-xs-6">
        <input type="submit" class="btn btn-success" />
    </div>
    <div class="col-xs-6">
        <a href="shows.php" class="btn btn-secondary">Cancel</a>
    </div>
</div>

</div>

</form>

 <?php include('master/footer.php'); ?>
