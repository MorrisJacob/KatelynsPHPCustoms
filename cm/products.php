<?php 
include('master/header.php');
include('php/pages/products.php');
 ?>

        <div class="tm-blog-img-container">
            
        </div>

        <section class="tm-section">
            <div class="container">
                <div class="row" style="margin:20px 0;">
                    <div class="col-xs-8">
                        <input type="text" id="prod-search" class="form-control" placeholder="Search for a product or product category..." />
                    </div>
                </div>
                <div class="row" style="margin:20px 0;">
                    <div class="col-xs-12">
                        Please select a product or product category to edit.
                    </div>
                </div>
                <div class="row tm-gold-text text-center">

                    <div class="col-xs-4">
                        <h3 class="header">Product Categories</h3>
                        <?php echo $productcategoriesHTML; ?>

                        <div class="row tm-gold-text-imp" style="margin: 10px 0;">
                            <a href="productcategory-edit.php?KeyCategory=0">
			                        <div class="col-xs-8">
                                        Add A New Category
                                    </div>
                                    <div class='col-xs-4'>
                                    <div class="btn btn-success"  style="padding:2px 8px;">
                                    <i class="fa fa-plus" aria-hidden="true"></i></div>
			                        </div>
                            </a>
		                </div>
                    </div>


                    <div class="col-xs-7 col-xs-push-1">
                        <h3 class="header">Products</h3>
                        <?php echo $productsHTML; ?>

                        <div class="row tm-gold-text-imp" style="margin: 10px 0;">
                        <a href="product-edit.php?KeyProduct=0">
			                <div class="col-xs-10">
                                 Add A New Product
			                </div>
                            <div class="col-xs-2">
                                <div class="btn btn-success"  style="padding:2px 8px;">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
			                    </div>
                            </div>
                        </a>
		                </div>

                    </div>
                </div>
                
            </div>
        </section>


<div class="modal fade" id="deleteProductModal" tabindex="-1" role="dialog" aria-labelledby="deleteProductModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="width:90%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteProductModalLabel">Delete Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this product? Once complete this operation cannot be undone!
            </div>
            <div class="modal-footer">
                <a id="prodadel" href="php/actions/product-delete.php" class="btn btn-danger">Yes, Delete This Product</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteCategoryModal" tabindex="-1" role="dialog" aria-labelledby="deleteCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="width:90%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteCategoryModalLabel">Delete Product Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this product category? Once complete this operation cannot be undone!
            </div>
            <div class="modal-footer">
                <a id="catadel" href="php/actions/productcategory-delete.php" class="btn btn-danger">Yes, Delete This Product Category</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>


<script>
$(function(){
    $(document).on("click", ".catdel", function () {
         var catDel = $(this).data('id');
         var href = $("#catadel").attr("href");
         $("#catadel").attr("href", href + '?KeyCategory=' + catDel);
    });

    $(document).on("click", ".proddel", function () {
        var prodDel = $(this).data('id');
        var href = $("#prodadel").attr("href");
        $("#prodadel").attr("href", href + '?KeyProduct=' + prodDel);
    });

    $('#prod-search').on('keyup', function() {
        let items = $('.prod-search');
        let searchVal = $('#prod-search').val().toLowerCase();

        if(searchVal == ''){
            $('.prod-search').css('display', 'block');
        }else{
            $('.prod-search').each(function(i,e){
                thisVal = $(this).first('div').html().toLowerCase();
                if(thisVal.includes(searchVal)){
                    $(this).css('display', 'block');
                }else {
                    $(this).css('display', 'none');
                }
            });
        }
    });
});
</script>


<?php include('master/footer.php'); ?>
