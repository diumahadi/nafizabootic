<!DOCTYPE html>
<html>
  <head>
    <title>Please Sign in</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="<?php echo base_url() ?>resources/admin/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="<?php echo base_url() ?>resources/admin/css/styles.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
	
	<script>
		function validateForm() {
			var user_name     = document.forms["login_form"]["user_name"].value;
			var user_password = document.forms["login_form"]["user_password"].value;
			
			if (user_name == "") {
				alert("Insert Username ???");
				return false;
			} else if (user_password == "") {
				alert("Insert Password ???");
				return false;
			}
		} 
	</script>
  </head>
  <body class="login-bg">
  	<div class="header">
	     <div class="container">
	        <div class="row">
	           <div class="col-md-12">
	              <!-- Logo -->
	              <div class="logo">
	                 <h1><a href="<?php echo base_url() ?>home">Nafiza Bootic</a></h1>
	              </div>
	           </div>
	        </div>
	     </div>
	</div>

	<div class="page-content container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<form name="login_form" action="<?php echo base_url() ?>login/verifyUser" onsubmit="return validateForm()" method="POST">
					<div class="login-wrapper">
						<div class="box">
							<div class="content-wrap">
								<h3>Sign In</h3><hr>							                                
	                            <?php echo (!empty($error) && $error == "EE") ? "<div class='alert alert-danger'><strong>Unauthorized Access !!!</strong></div>":"" ?>
								<input class="form-control" name="user_name" type="text" placeholder="Username">
								<input class="form-control" name="user_password" type="password" placeholder="Password">
								<div class="action">
									<button type="submit" class="btn btn-lg btn-block btn-success">Login <i class="glyphicon glyphicon-chevron-right"></i></button>
								</div>                
							</div>
						</div>

						<div class="already">
							<p>Don't have an account yet?</p>
							<a href="#">Sign Up</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url() ?>resources/admin/js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url() ?>resources/admin/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>resources/admin/js/custom.js"></script>
  </body>
</html>