<?php
include("actionbase.php");

session_destroy();

if (isset($_SERVER["HTTP_REFERER"])) {
    echo "<script>location='" .$_SERVER["HTTP_REFERER"] . "'</script>"; /* Redirect browser */
}

?>
