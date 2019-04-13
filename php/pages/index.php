<?php

//start featured products

$featuredproducts = ExecuteSQL("Select ProductName, KeyProduct, ImageURL, Price" .
						" FROM Products WHERE IsFeatured = 1;");
$displayfeatured = "none";
$featuredHTML = "";
$featuredcount = 0;
$featurednum = $featuredproducts->num_rows;
if ($featuredproducts->num_rows > 0) {
    //there are featured products, so show featured
    $displayfeatured = "block";
    //now, loop through the featured
    $featuredHTML = '<div class="item active">' .
			  				'<ul class="thumbnails">';
    while($featuredrow = $featuredproducts->fetch_assoc()) {

        $featuredHTML .= '<li class="span3">' .
				  		    '<div class="thumbnail">' .
				  				'<i class="tag"></i>' .
								'<a href="product_details.php?KeyProduct=' . $featuredrow["KeyProduct"] . '">' .   
                                    '<img src="' . $featuredrow["ImageURL"] . '" alt="' . $featuredrow["ProductName"] . '">' . 
                                '</a>' .
								'<div class="caption">' .
					 				'<h5>' . $featuredrow["ProductName"] . '</h5>' .
					  				'<h4><a class="btn" href="product_details.php?KeyProduct=' . $featuredrow["KeyProduct"] . '">VIEW</a>' . 
                                    '<span class="pull-right"> $' . $featuredrow["Price"] . ' Each</span></h4>' .
								'</div>' .
				  			'</div>' .
						 '</li>';

        $featuredcount += $featuredcount;
        //every four products we need to start a new item row
        if($featuredcount % 4 == 0){
            $featuredHTML .= "</div></ul><div class='item'><ul class='thumbnails'>";
        }

    }

    $featuredHTML .= "</div></ul>";

}


//end featured products






//start latest products
$latestproducts = ExecuteSQL("Select ProductName, KeyProduct, ImageURL, Description, Price" .
						" FROM products ORDER BY DateAdded desc LIMIT 6;");
$latestHTML = "";
if ($latestproducts->num_rows > 0) {
    // output data of each row
    while($latestrow = $latestproducts->fetch_assoc()) {

		if(strlen($latestrow["Description"]) > 100){
			$latestrow["Description"] = substr($latestrow["Description"], 0, 95) . "...";
		}

        $latestHTML .= '<li class="span3">' .
				  	        '<div class="thumbnail featured-thumb">' .
                              '<div class="thumbpic">' .
							    '<a href="product_details.php?KeyProduct=' . $latestrow["KeyProduct"] . '">' .
                                    '<img src="' . $latestrow["ImageURL"] . '" class="img img-responsive" alt="' . $latestrow["ProductName"] . '"/>' . 
                                '</a>' .
                              '</div>' . 
							    '<div class="caption">' .
					  		        '<h5>' . $latestrow["ProductName"] . '</h5>' .
					  		            '<p>' .
									        $latestrow["Description"] .
					 			        '</p>' .
					  		        '<h4 style="text-align:center">' .
									    '<button type="button" onclick="OpenPhotoSwipe(\'' . $latestrow["ImageURL"] . '\');" class="btn"><i class="icon-zoom-in"></i></button>' .
									    '<a class="btn" href="php/actions/addtocart.php?KeyProduct=' . $latestrow["KeyProduct"] . '">' . 
										'Add to <i class="icon-shopping-cart"></i></a>' .
                                        '<span> $' . $latestrow["Price"] . '</span>' .
								    '</h4>' .
							    '</div>' .
				  	        '</div>' .
					    '</li>';

    }

}

//end latest products
?>