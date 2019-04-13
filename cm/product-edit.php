<?php 
include('master/header.php');
include('php/pages/product-edit.php');
 ?>

<form action="product-edit.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="hdnKeyProduct" value="<?php echo $keyProduct; ?>" />
<div class="container">
    <div class="row" style="margin:10px 0;">
        <div class="col-xs-12" style="text-decoration:underline;">
            <h3>Edit Product</h3>
        </div>
    </div>
    <div class="row" style="margin:10px 0;">
        <div class="col-xs-12" style="text-align:center;">
            <h2><?php echo $ProductName; ?></h2>
        </div>
    </div>

    <hr/>

    <div class="row" style="margin:10px 0;">

        <div class="col-xs-12 col-sm-2">
            Product Name:
        </div>
        <div class="col-xs-12 col-sm-6">
            <input type="text" name="ProdName" class="form-control" value="<?php echo $ProductName; ?>" />
        </div>
    </div>
    <div class="row" style="margin:10px 0;">

        <div class="col-xs-12 col-sm-2">
            Description:
        </div>
        <div class="col-xs-12 col-sm-6">
            <textarea name="Desc" class="form-control"><?php echo $Description; ?></textarea>
        </div>
    </div>
	<?php
	if($keyProduct == 0){
		echo 	    '<div class="row" style="margin:10px 0;">' .
						'<div class="col-xs-12 col-sm-2">' .
							'Image Upload:' .
						'</div>' .
						'<div class="col-xs-12 col-sm-6">' .
							'<input type="file" name="fileToUpload" id="fileToUpload">' .
						'</div>' .
					'</div>';
	}
	?>
    <div class="row" style="margin:10px 0;">

        <div class="col-xs-12 col-sm-2">
            Price:
        </div>
        <div class="col-xs-12 col-sm-6">
            <input type="number" name="Price" step=".01" class="form-control" value="<?php echo $Price; ?>" />
        </div>
    </div>

        <div class="row" style="margin:10px 0;">

        <div class="col-xs-12 col-sm-2">
            Quantity:
        </div>
        <div class="col-xs-12 col-sm-6">
            <input type="number" name="Quantity" class="form-control" value="<?php echo $Quantity; ?>" />
        </div>
    </div>

    <div class="row" style="margin:10px 0;">

        <div class="col-xs-12 col-sm-2">
            Category Name:
        </div>
        <div class="col-xs-12 col-sm-6">
            <select name="CatName" class="form-control">
                <?php echo $catddl; ?>
            </select>
        </div>
    </div>

    <div class="row" style="margin:10px 0;">

        <div class="col-xs-12 col-sm-2">
            Featured:
        </div>
        <div class="col-xs-12 col-sm-6">
            <input type="checkbox" name="Featured" class="form-control" value="true" <?php if($IsFeatured){echo "checked";} ?> />
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