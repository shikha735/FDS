<?php
require('dbconnect.php');
require("checksession.php");
session_start();
$_SESSION['locked'] = true;
echo "PHP entered";

if(isset($_POST['password']))
{
	echo "If entered";
	$employee_id = $_SESSION['employee_id'];
	$password = $_POST['password'];

	if(!empty($password))
	{	
		echo "Password not empty";
		$password_hash = md5($password);
		$query = "SELECT * FROM bankers WHERE employee_id ='".$employee_id."' AND sso_password ='".$password_hash."'";

		if($query_run = mysqli_query($mysql_connect, $query))
		{
			$query_run = mysqli_query($mysql_connect, $query);

			$query_num_rows = mysqli_num_rows($query_run);
			if($query_num_rows==0)
			{
				echo 'Invalid username/password.';
			}
			else if($query_num_rows==1)
			{
				$_SESSION['locked'] = false;
				header('Location: index.php');
			}
		}
	}
	else
	{
		echo 'You must enter sso_password.';
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Cube - Bootstrap Admin Template</title>
	
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
</head>
<body id="login-page-full" class="lock-screen">
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
									<div id="lock-screen-user">
										<img src="img/samples/admin.jpg" alt="">
										<div class="user-box">
											<span class="name">
												<?php 
													$query_name = "SELECT username FROM bankers WHERE employee_id='".$_SESSION['$employee_id']."'";
													$result_name = mysqli_query($mysql_connect, $query_name);
													while($row = $result_name->fetch_row()){
														$f1=$row[0];
													}
													echo $f1;
												?>
											</span>
										</div>
									</div>
									
									<form role="form" action="lock-screen-full.php" method="POST">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-lock"></i></span>
											<input type="password" class="form-control" name="password" placeholder="Enter SSO Password">
										</div>
										<div class="row">
											<div class="col-xs-12">
												<input type="submit" class="btn btn-success col-xs-12" value="Unlock">
											</div>
										</div>
									</form>
								</div>
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
