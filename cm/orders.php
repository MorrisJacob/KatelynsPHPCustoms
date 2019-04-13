<?php
include('master/header.php');
include('php/pages/orders.php');
?>

        <div class="tm-about-img-container">
            
        </div>

        <section class="tm-section">
            <form action="orders.php" method="post">
            <div class="container-fluid" style="word-break:break-word;">
                <div class="row" style="margin-bottom:15px;">
                    <div class="col-xs-12">
                        <input type="submit" class="btn btn-success" value="Mark Checked As Shipped" />
                    </div>
                </div>
            
                <?php echo $orderHTML; ?>

            </div>
            </form>
        </section>

<?php include('master/footer.php'); ?>