<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <link rel="icon" href="<?php echo base_url() ?>resources/logo/favicon.png">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Nafiza Bootic</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="<?php echo base_url() ?>resources/site/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/icomoon-social.css">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,600,800' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" href="<?php echo base_url() ?>resources/site/css/leaflet.css" />
		<!--[if lte IE 8]>
		    <link rel="stylesheet" href="css/leaflet.ie.css" />
		<![endif]-->
		<link rel="stylesheet" href="<?php echo base_url() ?>resources/site/css/main.css">
		
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

        <script src="<?php echo base_url() ?>resources/site/js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        <script src="<?php echo base_url() ?>resources/slider/jssor.slider-24.1.5.min.js"></script>
        <script src="<?php echo base_url() ?>resources/toaster/jquery.toaster.js"></script>

		<style>
			.customHeight{
				height:300px !important;
			}
		</style>
    </head>
    <body>

        

        <!-- Navigation & Logo-->
        <div class="mainmenu-wrapper">
	        <div class="container">
	        	<div class="menuextras">
                    <div class="row">
                        <div class="col-md-4" style="margin-top: 5px;"><b>EMAIL: nafizabootic@gmail.com , CALL US: +88-01633591928</b></div>
                        <div class="col-md-6"></div>
                        <div class="col-md-2" style="margin-top: 5px;"><a href="<?php echo base_url() ?>cart" class="btn btn-info"><span class="glyphicon glyphicon-shopping-cart"></span> (<span id="totalSelectedQuantity"></span>)</a> </div>
                    </div>
		        </div>
		        <nav id="mainmenu" class="mainmenu">
					<ul>
						<li class="logo-wrapper"><a href="<?php echo base_url() ?>home"><img style="width:80%" src="<?php echo base_url() ?>resources/logo/siteLogo.png"></a></li>
						<li class="active">
							<a href="<?php echo base_url() ?>home">Home</a>
						</li>
						<li>
							<a href="<?php echo base_url() ?>home/category/WO">Women's Fashion</a>
						</li>
						<li>
							<a href="<?php echo base_url() ?>home/category/HL">Home & Living</a>
						</li>
						<li class="has-submenu">
							<a href="#">Others +</a>
							<div class="mainmenu-submenu">
								<div class="mainmenu-submenu-inner"> 
									<div>
										<h4>Home & Living</h4>
										<ul>
											<li><a href="<?php echo base_url() ?>home/group/3">Bed Sheets</a></li>
										</ul>										
									</div>
									
										
								</div><!-- /mainmenu-submenu-inner -->
							</div><!-- /mainmenu-submenu -->
						</li>
<!--                        <li>-->
<!--                            <a href="--><?php //echo base_url() ?><!--/home/events">Events</a>-->
<!--                        </li>-->
						<li>
							<a href="<?php echo base_url() ?>home/about_us">About Us</a>
						</li>
						<li>
							<a href="<?php echo base_url() ?>home/contact_us">Contact Us</a>
						</li>


<!--						<li>-->
<!--							<a href="http://ac.grandchoicebd.com">Login</a>-->
<!--						</li>-->
						
					</ul>
				</nav>
			</div>
		</div>

        <script>

            $(document).ready(function () {
                $.post("<?php echo base_url() ?>cart/getTotalItemInCart",
                    function(data, status){
                        var cartData = JSON.parse(data);
                        $('#totalSelectedQuantity').text(cartData.totalItems);
                    });
            });


        </script>