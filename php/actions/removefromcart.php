<?php
include("actionbase.php");

if($userid == 0){
    echo "<script>location='../../login.php'</script>"; /* Redirect browser */
    exit();
}else{
    if(isset($_GET["KeyProduct"])){
        ExecuteSQL("DELETE FROM cart WHERE KeyProduct=" . GetSafeString($_GET["KeyProduct"]) . " AND KeyOrder = " . GetKeyOrder($userid) . ";");
    }



    if (isset($_SERVER["HTTP_REFERER"])) {
        echo "<script>location='" .$_SERVER["HTTP_REFERER"] . "'</script>"; /* Redirect browser */
    }
}

?>
