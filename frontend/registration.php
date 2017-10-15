<?php

require('dbconnect.php');
require("checksession.php");

$current_file = $_SERVER['SCRIPT_NAME'];

if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER']))
{
	$http_referer = $_SERVER['HTTP_REFERER'];
}

if(in_session()){
	header("location:index.php");
	die();
}
else {
	if(isset($_POST['employee_id'])&&isset($_POST['sso_password'])&&isset($_POST['confirm'])&&isset($_POST['username'])&&isset($_POST['email']))
	{
		echo "All fields set";
		$employee_id = trim($_POST['employee_id']);

		$username = trim($_POST['username']);
		$sso_password = trim($_POST['sso_password']);
		$sso_password_again = trim($_POST['confirm']);


		$email = trim($_POST['email']);
		if(!empty($employee_id)&&!empty($username)&&!empty($sso_password)&&!empty($sso_password_again)&&!empty($email))
		{
			echo "Not Empty";
			if(strlen($employee_id)>20||strlen($username)>30||strlen($sso_password)>20)
			{
				echo 'Please adhere to maxlength of fields.';
			}
			else
			{
				if($sso_password!=$sso_password_again)
				{
					echo 'Passwords do not match.';
				}
				else
				{
					$password_hash = md5($sso_password);

					$query = "SELECT username FROM bankers WHERE username='".$username."'AND email='".$email."'";
					$query_run = mysqli_query($mysql_connect, $query);
					$query_num_rows = mysqli_num_rows($query_run);
					if($query_num_rows>=1)
					{
						echo 'The username '.$username.' already exists.';
					}
					else
					{
					 $query = "INSERT INTO bankers(employee_id, sso_password, username, email) VALUES ('".mysqli_real_escape_string($mysql_connect, $employee_id)."','".mysqli_real_escape_string($mysql_connect, $password_hash)."','".mysqli_real_escape_string($mysql_connect, $username)."',
					 '".mysqli_real_escape_string($mysql_connect, $email)."')";

				    	if($query_run = mysqli_query($mysql_connect, $query))
					    {
					    	echo "reg success";
								$_SESSION['employee_id'] = $employee_id;
					    	header('location:login.php');
				    	}
				   		else
				   		{
								echo 'Sorry, we couldn\'t register you at this time. Try again later.';
				  		}
				    }
			   }
			}
		}
		else
		{
			echo 'All fields are required.';
		}
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Registration</title>

	<!-- bootstrap -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.min.css" />

	<!-- RTL support - for demo only -->
	<script src="js/demo-rtl.js"></script>
	<!--
	If you need RTL support just include here RTL CSS file <link rel="stylesheet" type="text/css" href="css/libs/bootstrap-rtl.min.css" />
	And add "rtl" class to <body> element - e.g. <body class="rtl">
	-->

	<!-- libraries -->
	<link rel="stylesheet" type="text/css" href="css/libs/font-awesome.css" />
	<link rel="stylesheet" type="text/css" href="css/libs/nanoscroller.css" />

	<!-- global styles -->
	<link rel="stylesheet" type="text/css" href="css/compiled/theme_styles.css" />

	<!-- this page specific styles -->

	<!-- google font libraries -->
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,600,700,300|Titillium+Web:200,300,400' rel='stylesheet' type='text/css'>

	<!-- Favicon -->
	<link type="image/x-icon" href="favicon.png" rel="shortcut icon"/>

	<!--[if lt IE 9]>
		<script src="js/html5shiv.js"></script>
		<script src="js/respond.min.js"></script>

	<![endif]-->
	<style type="text/css">
      body
			{
				background-image: url('img/loginimg.png');
				height: 100%;

			}
     </style>
</head>
<body id="login-page-full" >
	<div id="login-full-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div id="login-box">
						<div class="row">
							<div class="col-xs-12">
								<header id="login-header">
									<div id="login-logo">
										<img src="img/logo.png" alt=""/>
									</div>
								</header>
								<div id="login-box-inner">
								   <span id="error">
								   	
								   </span>
									<form role="form" action="registration.php" method="POST">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-user"></i></span>
											<input name="employee_id" class="form-control" type="text" placeholder="Enter Employee Id">
										</div>
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
											<input name="email" class="form-control" type="text" placeholder="Enter email address">
										</div>
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-user"></i></span>
											<input name="username" class="form-control" type="text" placeholder="Enter username">
										</div>
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-lock"></i></span>
											<input name="sso_password" type="password" class="form-control" placeholder="Enter SSO Password">
										</div>
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-unlock-alt"></i></span>
											<input name="confirm" type="password" class="form-control" placeholder="Re-enter SSO Password">
										</div>

										
										<div class="row">
											<div class="col-xs-12">
												<input type="submit" class="btn btn-success col-xs-12" value="Register">
											</div>
										</div>


									</form>
								</div>
							</div>
						</div>
					</div>

					<div id="login-box-footer">
							<div class="row">
								<div class="col-xs-12">
									Already have an account?
									<a href="login.php">
										Login now
									</a>
								</div>
							</div>
						</div>
				</div>
			</div>
		</div>
	</div>

	<div id="config-tool" class="closed">
		<a id="config-tool-cog">
			<i class="fa fa-cog"></i>
		</a>

		<div id="config-tool-options">
			<h4>Layout Options</h4>
			<ul>
				<li>
					<div class="checkbox-nice">
						<input type="checkbox" id="config-fixed-header" />
						<label for="config-fixed-header">
							Fixed Header
						</label>
					</div>
				</li>
				<li>
					<div class="checkbox-nice">
						<input type="checkbox" id="config-fixed-sidebar" />
						<label for="config-fixed-sidebar">
							Fixed Left Menu
						</label>
					</div>
				</li>
				<li>
					<div class="checkbox-nice">
						<input type="checkbox" id="config-fixed-footer" />
						<label for="config-fixed-footer">
							Fixed Footer
						</label>
					</div>
				</li>
				<li>
					<div class="checkbox-nice">
						<input type="checkbox" id="config-boxed-layout" />
						<label for="config-boxed-layout">
							Boxed Layout
						</label>
					</div>
				</li>
				<li>
					<div class="checkbox-nice">
						<input type="checkbox" id="config-rtl-layout" />
						<label for="config-rtl-layout">
							Right-to-Left
						</label>
					</div>
				</li>
			</ul>
			<br/>
			<h4>Skin Color</h4>
			<ul id="skin-colors" class="clearfix">
				<li>
					<a class="skin-changer" data-skin="" data-toggle="tooltip" title="Default" style="background-color: #34495e;">
					</a>
				</li>
				<li>
					<a class="skin-changer" data-skin="theme-white" data-toggle="tooltip" title="White/Green" style="background-color: #2ecc71;">
					</a>
				</li>
				<li>
					<a class="skin-changer blue-gradient" data-skin="theme-blue-gradient" data-toggle="tooltip" title="Gradient">
					</a>
				</li>
				<li>
					<a class="skin-changer" data-skin="theme-turquoise" data-toggle="tooltip" title="Green Sea" style="background-color: #1abc9c;">
					</a>
				</li>
				<li>
					<a class="skin-changer" data-skin="theme-amethyst" data-toggle="tooltip" title="Amethyst" style="background-color: #9b59b6;">
					</a>
				</li>
				<li>
					<a class="skin-changer" data-skin="theme-blue" data-toggle="tooltip" title="Blue" style="background-color: #2980b9;">
					</a>
				</li>
				<li>
					<a class="skin-changer" data-skin="theme-red" data-toggle="tooltip" title="Red" style="background-color: #e74c3c;">
					</a>
				</li>
				<li>
					<a class="skin-changer" data-skin="theme-whbl" data-toggle="tooltip" title="White/Blue" style="background-color: #3498db;">
					</a>
				</li>
			</ul>
		</div>
	</div>

	<!-- global scripts -->
	<script src="js/demo-skin-changer.js"></script> <!-- only for demo -->

	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/jquery.nanoscroller.min.js"></script>

	<script src="js/demo.js"></script> <!-- only for demo -->

	<!-- this page specific scripts -->


	<!-- theme scripts -->
	<script src="js/scripts.js"></script>

	<!-- this page specific inline scripts -->



</body>
</html>

<?php
// }
// else if(loggedin())
// 	{
// 	echo 'You\'re already registered and logged in.';
// }
?>
