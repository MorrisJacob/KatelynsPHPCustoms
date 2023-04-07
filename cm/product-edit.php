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
							'Primary Image Upload:' .
						'</div>' .
						'<div class="col-xs-12 col-sm-6">' .
							'<input type="file" name="fileToUpload" id="fileToUpload">' .
						'</div>' .
					'</div>' .
				'<div class="row" style="margin:10px 0;">' .
						'<div class="col-xs-12 col-sm-2">' .
							'Additional Images:' .
						'</div>' .
						'<div class="col-xs-12 col-sm-6">' .
							'<input type="file" name="fileToUploadAdditional[]" id="fileToUploadAdditional" multiple>' .
						'</div>' .
					'</div>';
	} else {

	echo '<div class="row" style="margin:10px 0;"><div class="col-sm-2 col-xs-12">' .
              	'Primary Image:</div><div class="col-sm-9 col-xs-12"><img src="../' . $ImageURL . '" class="img img-fluid" style="max-width:100px;max-height:100px;display:inline;" /> New Primary Image: <input type="file" name="fileToUpload" id="fileToUpload">' .
	     '</div></div>';

	echo '<div class="row" style="margin:10px 0;"><div class="col-sm-2 col-xs-12">Additional Images:</div><div class="col-sm-9 col-xs-12">' . $secondaryImageHTML . ' Additional Images: <input type="file" name="fileToUploadAdditional[]" id="fileToUploadAdditional" multiple></div></div>';


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

    <div class="row" style="margin:10px 0;">

        <div class="col-xs-12 col-sm-2">
            Sold Out?:
        </div>
        <div class="col-xs-12 col-sm-6">
            <input type="checkbox" name="IsSoldOut" class="form-control" value="true" <?php if($IsSoldOut){echo "checked";} ?> />
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


<!-- Modal for deleting additional images -->
<div class="modal fade" id="deleteImageModal" tabindex="-1" role="dialog" aria-labelledby="deleteImageModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="width:90%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteImageModalLabel">Delete Product Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this image? Once complete this operation cannot be undone!
            </div>
            <div class="modal-footer">
                <a id="imgdel" href="php/actions/productimage-delete.php" class="btn btn-danger">Yes, Delete This Product Image</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>


<script>
$(function(){
    $(document).on("click", ".imgdel", function () {
         var imgDel = $(this).data('id');
         var href = $("#imgdel").attr("href");
         $("#imgdel").attr("href", href + '?KeyImage=' + imgDel);
    });
});
</script>




</form>

 <?php include('master/footer.php'); ?>
