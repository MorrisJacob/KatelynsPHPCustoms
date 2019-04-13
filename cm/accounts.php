<?php 
include('master/header.php'); 
include('php/pages/accounts.php');
?>

        <div class="tm-blog-img-container">
            
        </div>

        <section class="tm-section">
            <div class="container-fluid">
                <div class="row">

                    <div class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" href="#AccountsPanel"><h4>Accounts</h4></a>
                                </h4>
                            </div>
                            <div id="AccountsPanel" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <div class="table-responsive-wrapper">
                                        <div class="row table-responsive-header">
                                            <div class="col-xs-4">
                                                Email Address
                                            </div>
                                            <div class="col-xs-3">
                                                Name
                                            </div>
                                            <div class="col-xs-2">
                                                Company
                                            </div>
                                            <div class="col-xs-3">
                                                Phone Number
                                            </div>
                                        </div>
                                        <?php echo $accountHTML; ?>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                
                </div>
            </div>
        </section>
        
<?php include('master/footer.php'); ?>