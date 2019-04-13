<?php
 include('master/header.php');
 include('php/pages/orderprocessed.php');
 ?>
<!-- Header End====================================================================== -->
<div id="mainBody">
	<div class="container">
		<div class="row">
<!-- Sidebar ================================================== -->
<?php include('controls/sidebar.php');?>
<!-- Sidebar end=============================================== -->
			<div class="span9">		
				<h1>Transaction successful!</h1>
                <hr/><br/>
                <div>Thank you for your payment. Your transaction has been completed, and a receipt for your purchase has been emailed to you. You may log into your account at
                <a href="http://www.paypal.com" target="_blank">www.paypal.com</a> to view details of this transaction.</div>
			</div>
		</div>
	</div>
</div>
<?php include('master/footer.php');?>