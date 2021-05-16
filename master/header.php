<?php session_start();
error_reporting(E_ALL ^ E_NOTICE);  
include('php/plumbing/sqlconn.php');
include('php/plumbing/generalfunctions.php');
include('php/master/header.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Creative Oddities & Curiosities</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
<!--Less styles -->
   <!-- Other Less css file //different less files has different color scheam
	<link rel="stylesheet/less" type="text/css" href="themes/less/simplex.less">
	<link rel="stylesheet/less" type="text/css" href="themes/less/classified.less">
	<link rel="stylesheet/less" type="text/css" href="themes/less/amelia.less">  MOVE DOWN TO activate
	-->
	<!--<link rel="stylesheet/less" type="text/css" href="themes/less/bootshop.less">
	<script src="themes/js/less.js" type="text/javascript"></script> -->

<!--JQUERY-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!--Photoswipe-->
<link rel="stylesheet" type="text/css" href="wwwroot/css/photoswipe.css" />
<link rel="stylesheet" type="text/css" href="wwwroot/css/default-skin/default-skin.css" />
<script src="wwwroot/js/photoswipe.js"></script>
<script src="wwwroot/js/photoswipe-ui-default.js"></script>
<script src="wwwroot/js/photoswipe-custom.js"></script>
<script src="wwwroot/js/header.js"></script>

<!-- Bootstrap style --> 
    <link id="callCss" rel="stylesheet" href="themes/bootshop/bootstrap.min.css" media="screen"/>
    <link href="themes/css/base.css" rel="stylesheet" media="screen"/>
<!-- Bootstrap style responsive -->	
	<link href="themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
	<link href="themes/css/font-awesome.css" rel="stylesheet" type="text/css">
<!-- Google-code-prettify -->	
	<link href="themes/js/google-code-prettify/prettify.css" rel="stylesheet"/>
<!-- fav and touch icons -->
    <link rel="shortcut icon" href="wwwroot/images/companyname.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="themes/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="themes/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="themes/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="themes/images/ico/apple-touch-icon-57-precomposed.png">
	<style type="text/css" id="enject"></style>

	<link href="wwwroot/css/site.css" rel="stylesheet" />
  </head>
<body>
<div id="header">
<div class="container">
<div id="welcomeLine" class="row">
	<div class="span6">Welcome!<strong> <?php if(isset($_SESSION["email"])){echo $_SESSION["email"];} else { echo "Guest";}  ?></strong></div>
	<div class="span6">
	<div class="pull-right">
		Current Total:
		<span><?php echo "$" . $cartCost; ?></span>
		<a href="product_summary.php"><span class="btn btn-mini btn-primary"><i class="icon-shopping-cart icon-white"></i> <?php echo $cartCount; ?> Item(s) in your cart </span> </a> 
	</div>
	</div>
</div>

<!--Photoswipe html-->
<!-- Root element of PhotoSwipe. Must have class pswp. -->
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

    <!-- Background of PhotoSwipe. 
         It's a separate element as animating opacity is faster than rgba(). -->
    <div class="pswp__bg"></div>

    <!-- Slides wrapper with overflow:hidden. -->
    <div class="pswp__scroll-wrap">

        <!-- Container that holds slides. 
            PhotoSwipe keeps only 3 of them in the DOM to save memory.
            Don't modify these 3 pswp__item elements, data is added later on. -->
        <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>

        <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
        <div class="pswp__ui pswp__ui--hidden">

            <div class="pswp__top-bar">

                <!--  Controls are self-explanatory. Order can be changed. -->

                <div class="pswp__counter"></div>

                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

                <button class="pswp__button pswp__button--share" title="Share"></button>

                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                <!-- Preloader demo http://codepen.io/dimsemenov/pen/yyBWoR -->
                <!-- element will get class pswp__preloader--active when preloader is running -->
                <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                      <div class="pswp__preloader__cut">
                        <div class="pswp__preloader__donut"></div>
                      </div>
                    </div>
                </div>
            </div>

            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                <div class="pswp__share-tooltip"></div> 
            </div>

            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
            </button>

            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
            </button>

            <div class="pswp__caption">
                <div class="pswp__caption__center"></div>
            </div>

        </div>

    </div>

</div>
<!-- Navbar ================================================== -->
<div id="logoArea" class="navbar">
<a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
</a>
  <div class="navbar-inner">
    <a class="nav-title" href="index.php">Creative Curiosities</a>
		<!--<a class="brand" href="index.php">Katelyn's Customs</a>-->
		<form class="form-inline navbar-search" method="get" action="products.php" >
		<input id="srchFld" name="searchField" class="srchTxt" type="text" value="<?php if(isset($_GET["searchField"])){ echo $_GET["searchField"]; } ?>" />
		  <select class="srchTxt" name="searchSelect">
			<?php echo $prodcatddl;?>
		</select> 
		  <button type="submit" id="submitButton" class="btn btn-primary btn-go">Go</button>
    </form>
    <ul id="topMenu" class="nav pull-right">
	 <!--<li class=""><a href="special_offer.html">Specials Offer</a></li>-->
   <li class=""><a href="products.php">Products</a></li>
	 <li class=""><a href="delivery.php">Delivery</a></li>
	 <li class=""><a href="contact.php">Contact</a></li>
	 <li class="">
	 <?php
		if($userid ==0){
			echo '<a href="#login" role="button" data-toggle="modal" style="padding-right:0"><span class="btn btn-large btn-success btn-white">Login</span></a>';
		}else{
            echo '<a href="php/actions/logout.php">Logout</a>';
		}
	 ?>
     </li>
     <?php
        //Katelyn (owner) or Jacob (Developer)
        if($userid == 1 || $userid == 2){
            echo '<li><a href="cm/index.php" style="padding-right:0" target="_blank"><span class="btn btn-large btn-success btn-white">Manage</span></a></li>';
        }
     ?>
	 
	<div id="login" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" >
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3>Login Block</h3>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal loginFrm" action="login.php" method="POST">
			  <div class="control-group">								
				<input type="text" id="inputEmail" name="email" placeholder="Email">
			  </div>
			  <div class="control-group">
				<input type="password" name="password" id="inputPassword" placeholder="Password">
			  </div>
			  <!--<div class="control-group">
				<label class="checkbox">
				<input type="checkbox"> Remember me
				</label>
			  </div>-->		
        <br/>
			<button type="submit" class="btn btn-success">Sign in</button>
			<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
      			</form>
		  </div>
	</div>
	</li>
    </ul>
  </div>
</div>
</div>
</div>
