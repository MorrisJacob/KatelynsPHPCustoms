<?php
$products = ExecuteSQL("Select KeyProduct, ProductName, ImageURL, Quantity, Description, Price, CategoryName, IsSoldOut" .
						" FROM products WHERE KeyProduct = " . GetSafeString($_GET["KeyProduct"]) . ";");

$add_to_cart = '';

if ($products->num_rows > 0) {
	$prodCount = $products->num_rows;
    // output data of each row
    while($row = $products->fetch_assoc()) {

        $keyproduct = $row["KeyProduct"];
        $productname = $row["ProductName"];
        $productdesc = $row["Description"];
        $productprice = $row["Price"];
        $productstock = $row["Quantity"];
        $category = $row["CategoryName"];
        $imageURL = $row["ImageURL"];
	$isSoldOut = $row["IsSoldOut"];

	$add_to_cart = '<a id="CartLink" href="php/actions/addtocart.php?KeyProduct=' . $keyproduct . '" onclick="AddQuantity();" class="btn btn-large btn-primary pull-right"> Add To Cart ' .
				'<i class="icon-shopping-cart"></i>' .
			'</a>';
	if($isSoldOut == 1){
		$add_to_cart = '<span class="pull-right" style="color:red;font-weight:bold;">SOLD OUT</span>';
	}

    }

}

$relatedProducts = ExecuteSQL("Select p.KeyProduct, p.ProductName, p.ImageURL, p.Description, p.Price, p.Quantity" .
						" FROM products p INNER JOIN productcategories c ON p.CategoryName = c.CategoryName" .
                        " WHERE c.CategoryName = '" . $category . "';");
$relatedHTMLBlock = "";
$relatedHTMLList = "";


if ($relatedProducts->num_rows > 0) {

    // output data of each row
    while($relrow = $relatedProducts->fetch_assoc()) {

		if(strlen($relrow["Description"]) > 100){
			$relrow["Description"] = substr($relrow["Description"], 0, 95) . "...";
		}

        $relatedHTMLList .= '<div class="row">' .
					            '<div class="span2">' .
						            '<img src="' . $relrow["ImageURL"] . '" alt=""/>' .
					            '</div>' .
					            '<div class="span4">' .
						            '<h3>' . $relrow["ProductName"] . '</h3>' .			
						            '<hr class="soft"/>' .
						            '<h5>' . $relrow["Description"] . '</h5>' .
						            '<p>' .
						                $relrow["Quantity"] . ' Available' .
						            '</p>' .
						            '<a class="btn btn-small pull-right" href="product_details.php?KeyProduct=' . $relrow["KeyProduct"] . '">View Details</a>' .
						            '<br class="clr"/>' .
					            '</div>' .
					            '<div class="span3 alignR">' .
					                '<h3>$' . $relrow["Price"] . '</h3>' .
					                '<div class="btn-group">' .
					                    '<a href="php/actions/addtocart.php?KeyProduct=' . $relrow["KeyProduct"] . '" class="btn btn-large btn-primary" style="margin-right:10px"> Add to <i class=" icon-shopping-cart"></i></a>' .
					                    '<button type="button" onclick="OpenPhotoSwipe(\'' . $relrow["ImageURL"] . '\');" class="btn"><i class="icon-zoom-in"></i></button>' .
					                '</div>' .
					            '</div>' .
			                '</div>' .
			                '<hr class="soft"/>';

        $relatedHTMLBlock .= '<li class="span3">' .
					            '<div class="thumbnail featured-thumb">' .
						            '<div class="thumbpic"><a href="product_details.php?KeyProduct=' . $relrow["KeyProduct"] . '">' .
									'<img src="' . $relrow["ImageURL"] . '" alt=""/></a></div>' .
						            '<div class="caption">' .
						            '<h5>' . $relrow["ProductName"] . '</h5>' .
						            '<p>' .
							            $relrow["Description"] .
						            '</p>' .
						            '<h4 style="text-align:center">' .
                                        '<button type="button" onclick="OpenPhotoSwipe(\'' . $relrow["ImageURL"] . '\');" class="btn"><i class="icon-zoom-in"></i></button>' .
                                        ' <a class="btn" href="php/actions/addtocart.php?KeyProduct=' . $relrow["KeyProduct"] . '">Add to <i class="icon-shopping-cart"></i></a>' .
                                        '$' . $relrow["Price"] . '</h4>' .
						            '</div>'.
					            '</div>' .
					          '</li>';

    }

}
        

?>
