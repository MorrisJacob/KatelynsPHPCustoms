<?php
if((!isset($_SESSION["email"])) || (strtolower($_SESSION["email"]) != "bethelight@katelynscustoms.com")){

	// Use this line instead of header
	//echo "<script>location='invalidlogin.php'</script>";

}

?>