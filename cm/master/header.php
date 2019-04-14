<?php
error_reporting(E_ALL ^ E_NOTICE);  
session_start();
include('php/plumbing/sqlconn.php');
include('php/plumbing/generalfunctions.php');
include('php/master/header.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Katelyn's Customs - Content Manager</title>
<!--
Classic Template
http://www.templatemo.com/tm-488-classic
-->
    <!-- load stylesheets -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">  <!-- Google web font "Open Sans" -->
    <link rel="stylesheet" href="wwwroot/css/bootstrap.min.css">                                      <!-- Bootstrap style -->
    <link rel="stylesheet" href="wwwroot/css/templatemo-style.css">                                   <!-- Templatemo style -->
    <link rel="stylesheet" href="wwwroot/css/site.css">                                               <!-- MorrisProgramming style -->
    <link rel="stylesheet" href="wwwroot/css/font-awesome.css">                                       <!-- Font Awesome style -->
        <!-- load JS files -->
        <script src="wwwroot/js/jquery-1.11.3.min.js"></script>             <!-- jQuery (https://jquery.com/download/) -->
        <script src="https://www.atlasestateagents.co.uk/javascript/tether.min.js"></script> <!-- Tether for Bootstrap, http://stackoverflow.com/questions/34567939/how-to-fix-the-error-error-bootstrap-tooltips-require-tether-http-github-h --> 
        <script src="wwwroot/js/bootstrap.min.js"></script>                 <!-- Bootstrap (http://v4-alpha.getbootstrap.com/) -->
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
          <![endif]-->
</head>

    <body>
       
        <div class="tm-header">
            <div class="container-fluid">
                                    <div class="row" style="margin: 15px 0;">
                        <a class="btn btn-success" href="http://www.katelynscustoms.com/"><< Take Me Back To Public Site</a>
                    </div>    
                <div class="tm-header-inner">
                    <a href="index.php" class="navbar-brand tm-site-name">Content Management</a>
                    
                    <!-- navbar -->
                    <nav class="navbar tm-main-nav">

                        <button class="navbar-toggler hidden-md-up" type="button" data-toggle="collapse" data-target="#tmNavbar">
                            &#9776;
                        </button>
                        
                        <div class="collapse navbar-toggleable-sm" id="tmNavbar">
                            <ul class="nav navbar-nav">
                                <li class="nav-item">
                                    <a href="products.php" class="nav-link">Products</a>
                                </li>
                                <li class="nav-item">
                                    <a href="orders.php" class="nav-link">Orders</a>
                                </li>
                                <li class="nav-item">
                                    <a href="accounts.php" class="nav-link">Accounts</a>
                                </li>
                                <li class="nav-item">
                                    <a href="coupons.php" class="nav-link">Coupons</a>
                                </li>
                            </ul>                        
                        </div>
                        
                    </nav>  

                </div>                                  
            </div>            
        </div>
        <hr/>
