<?php
if((!isset($_SESSION["UserID"])) || (intval(($_SESSION["UserID"])) != 2 && intval(($_SESSION["UserID"])) != 1)){

	// Use this line instead of header
	echo "<script>location='invalidlogin.php'</script>";

}

?>
