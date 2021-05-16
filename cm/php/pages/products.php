<?php
$productsHTML = "";
$productcategoriesHTML = "";


//first let's load up the products
$products = ExecuteSQL("SELECT KeyProduct, ProductName FROM products");

if ($products->num_rows > 0) {
    // output data of each row
    while($row = $products->fetch_assoc()) {
        $productsHTML .= '<div class="row prod-search" style="margin: 10px 0;">' .
			                '<div class="col-xs-10">' .
                                 $row["ProductName"] .
			                '</div>' .
                            '<div class="col-xs-2">' .
                                '<a class="btn btn-info" href="product-edit.php?KeyProduct=' . $row["KeyProduct"] . '" style="padding:2px 8px;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;' .
                                '<a class="btn btn-danger proddel" data-toggle="modal" data-id="' . $row["KeyProduct"] . '" data-target="#deleteProductModal" style="padding:2px 8px;">X</a>' .
                            '</div><hr/>' .
		                  '</div>';

    }
} else {
    $productsHTML .=  "No Products Available";
}



//now, let's load up the categories
$productcategories = ExecuteSQL("SELECT KeyCategory, CategoryName FROM productcategories");

if ($productcategories->num_rows > 0) {
    // output data of each row
    while($catrow = $productcategories->fetch_assoc()) {
        $productcategoriesHTML .= '<div class="row prod-search" style="margin: 10px 0;">' .
			                        '<div class="col-xs-8">' .
                                        $catrow["CategoryName"] . 
                                    "</div>" . 
                                    "<div class='col-xs-4'>" .
                                    '<a class="btn btn-info" href="productcategory-edit.php?KeyCategory=' . $catrow["KeyCategory"] . '" style="padding:2px 8px;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;' .
                                        '<a class="btn btn-danger catdel" data-id="' . $catrow["KeyCategory"] . '" data-toggle="modal" data-target="#deleteCategoryModal" style="padding:2px 8px;">X</a>' .
			                        '</div><hr/>' .
		                           '</div>';

    }
} else {
    $productcategoriesHTML .=  "No Product Categories Available";
}


?>
