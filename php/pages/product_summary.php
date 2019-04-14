<?php
//some variables are already created and reused from header.php

$cartItems = ExecuteSQL("select o.KeyOrder, p.KeyProduct, p.productname, p.Price, p.ImageURL, c.Quantity from " . 
                        "cart c inner join products p on c.KeyProduct = p.KeyProduct " .
                        "INNER JOIN orders o ON c.KeyOrder = o.KeyOrder where o.KeyOrder = " . GetKeyOrder($userid) . ";");

$cartItemsHTML = "";
$total = 0;
$shipping = 0;
$discount = 0;
$keyOrder = 0;
$refresh = false;
if ($cartItems->num_rows > 0) {

    while($cartrow = $cartItems->fetch_assoc()) {
            $keyOrder =  $cartrow["KeyOrder"];

            //while we're here, let's make sure the customer can actually buy this many of this product
            $productQuantity = GetSingleValueDB("SELECT Quantity FROM products WHERE KeyProduct = " . $cartrow["KeyProduct"], "Quantity");

            if($productQuantity < $cartrow["Quantity"]){
              //nope, not enough. They can only buy what we have available. If that's nothing, they can't buy this product
              if($productQuantity == 0){
                EXECUTESQL("DELETE FROM cart WHERE KeyOrder = " . $keyOrder . " AND KeyProduct = " . $cartrow["KeyProduct"] . ";");
              }else{
                EXECUTESQL("UPDATE cart SET Quantity = " . $productQuantity . " WHERE KeyOrder = " . $keyOrder . " AND KeyProduct = " . $cartrow["KeyProduct"] . ";");
              }

              $refresh = true;
            }

            $cartItemsHTML .= '<tr>' .
                  '<td><a href="php/actions/removefromcart.php?KeyProduct=' . $cartrow["KeyProduct"] . '" class="btn btn-danger">Remove</a>' .
                  '<img width="60" src="' . $cartrow["ImageURL"] . '" alt="' . $cartrow["ProductName"] . '"/></td>' .
                  '<td>' . $cartrow["productname"] . '</td>' .
				  '<td>' .
					'<div>' .
						$cartrow["Quantity"] .
					'</div>' .
				  '</td>' .
                  '<td>$' . number_format($cartrow["Price"] * $cartrow["Quantity"], 2) . '</td>' .
                '</tr>';
            $total += $cartrow["Price"] * $cartrow["Quantity"];
    }

    $shipping = 8;

}

if($refresh == true){
  echo "<script>location='product_summary.php'</script>"; /* Redirect browser */
}


?>
