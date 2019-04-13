<?php 
include('master/header.php');
include('php/pages/productcategory-edit.php');
 ?>
<form action="productcategory-edit.php" method="post">
<input type="hidden" name="hdnKeyProduct" value="<?php echo $keyCategory; ?>" />
<div class="container">
<div class="row" style="margin:10px 0;">
    <div class="col-xs-12" style="text-decoration:underline;">
        <h3>Edit Product Category</h3>
    </div>
</div>
<div class="row" style="margin:10px 0;">
    <div class="col-xs-12" style="text-align:center;">
        <h2><?php echo $CategoryName; ?></h2>
    </div>
</div>

<hr/>

<div class="row">

    <div class="col-xs-12 col-sm-2">
        Category Name:
    </div>
    <div class="col-xs-12 col-sm-6">
        <input type="text" name="CatName" class="form-control" value="<?php echo $CategoryName; ?>" />
    </div>
</div>

<div class="row" style="margin:40px 0;">
    <div class="col-xs-6">
        <input type="submit" class="btn btn-success" />
    </div>
    <div class="col-xs-6">
        <a href="products.php" class="btn btn-secondary">Cancel</a>
    </div>
</div>

</div>

</form>

 <?php include('master/footer.php'); ?>