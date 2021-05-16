<?php
$prodcatddl = "<option>All</option>";
$sideHTML = "";
$userid = GetSafeString($_SESSION["UserID"]);

if($userid == ""){
	$userid = 0;
}

$categories = ExecuteSQL("Select pc.CategoryName, Count(p.KeyProduct) CategoryCount" .
						" FROM productcategories pc LEFT JOIN products p on pc.CategoryName = p.CategoryName GROUP BY pc.CategoryName ORDER BY pc.CategoryName");

$cartCount = GetSingleValueDB("Select IFNULL(ROUND(SUM(c.Quantity),0),0) quantity FROM cart c INNER JOIN orders o ON c.KeyOrder = o.KeyOrder" . 
				" WHERE o.KeyOrder = " . GetKeyOrder($userid) . ";", 'quantity');
$cartCost = GetSingleValueDB("select IFNULL(ROUND(sum(p.price * c.Quantity),2),0) price from cart c inner join products p on c.KeyProduct = p.KeyProduct " .
			" INNER JOIN orders o ON c.KeyOrder = o.KeyOrder where o.KeyOrder = " . GetKeyOrder($userid) . ";", "price");

if ($categories->num_rows > 0) {

    while($catrow = $categories->fetch_assoc()) {
        
        $prodcatddl .= "<option>" . $catrow["CategoryName"] . "</option>";
		//sidehtml used for the side navbar
		$sideHTML .= '<li class="subMen"><a href="products.php?searchField=&searchSelect=' . urlencode($catrow["CategoryName"]) . '"> ' . $catrow["CategoryName"] . ' [' . $catrow["CategoryCount"] . '] </a>' . '</li>';
    }

}

if(isset($_GET["searchSelect"])){

	$searchSelect = GetValidString($_GET["searchSelect"]);

	$prodcatddl = str_replace('<option>' . $searchSelect,
						 '<option selected="selected">' . $searchSelect, $prodcatddl);
}
?>
