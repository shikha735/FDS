
<?php

ob_start();

// session_start();
$current_file = $_SERVER['SCRIPT_NAME'];

if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER']))
{
	$http_referer = $_SERVER['HTTP_REFERER'];
}

require('dbconnect.php');
require("checksession.php");


if(!in_session()){
	header("location:login.php");
	die();
}


$TimeOutMinutes = 1; // This is your TimeOut period in minutes
$LogOff_URL = "login.php"; // If timed out, it will be redirected to this page

$TimeOutSeconds = $TimeOutMinutes * 60; // TimeOut in Seconds
if (isset($_SESSION['SessionStartTime'])) {
    $InactiveTime = time() - $_SESSION['SessionStartTime'];
    if ($InactiveTime >= $TimeOutSeconds) {
        session_destroy();
        header("Location: $LogOff_URL");
    }
}

$employee_id = $_SESSION['employee_id'];

$query_user="SELECT * FROM bankers where employee_id=".$employee_id;
$result_user=mysqli_query($mysql_connect, $query_user);

$query="SELECT * FROM transactions ORDER BY txnid DESC LIMIT 5";
$result=mysqli_query($mysql_connect, $query);

$query_msg = "SELECT * FROM messages";
$result_msg=mysqli_query($mysql_connect, $query_msg);
$count_msg = mysqli_num_rows($result_msg);

$query_fraud="SELECT * FROM fraudtxn ORDER BY txnid DESC LIMIT 1";
$result_fraud = mysqli_query($mysql_connect, $query_fraud);

$query_users="SELECT * FROM accounts";
$result_users=mysqli_query($mysql_connect, $query_users);
$num_users=mysqli_num_rows($result_users);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Main page</title>

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
	<link rel="stylesheet" href="css/libs/daterangepicker.css" type="text/css" />
	<link rel="stylesheet" href="css/libs/jquery-jvectormap-1.2.2.css" type="text/css" />
	<link rel="stylesheet" href="css/libs/weather-icons.css" type="text/css" />

	<!-- Favicon -->
	<link type="image/x-icon" href="favicon.png" rel="shortcut icon" />

	<!-- google font libraries -->
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,600,700,300' rel='stylesheet' type='text/css'>

	<!--[if lt IE 9]>
		<script src="js/html5shiv.js"></script>
		<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<div id="theme-wrapper">
		<header class="navbar" id="header-navbar">
			<div class="container">
				<a href="index.php" id="logo" class="navbar-brand">
					<img src="img/logo.png" alt="" class="normal-logo logo-white"/>
					<img src="img/logo-black.png" alt="" class="normal-logo logo-black"/>
					<img src="img/logo-small.png" alt="" class="small-logo hidden-xs hidden-sm hidden"/>
				</a>

				<div class="clearfix">
				<button class="navbar-toggle" data-target=".navbar-ex1-collapse" data-toggle="collapse" type="button">
					<span class="sr-only">Toggle navigation</span>
					<span class="fa fa-bars"></span>
				</button>

				<div class="nav-no-collapse navbar-left pull-left hidden-sm hidden-xs">
					<ul class="nav navbar-nav pull-left">
						<li>
							<a class="btn" id="make-small-nav">
								<i class="fa fa-bars"></i>
							</a>
						</li>
						<li class="dropdown hidden-xs">
							<a class="btn dropdown-toggle" data-toggle="dropdown">
								<i class="fa fa-bell"></i>
								<span class="count">5</span>
							</a>
							<ul class="dropdown-menu notifications-list">
								<li class="pointer">
									<div class="pointer-inner">
										<div class="arrow"></div>
									</div>
								</li>
								<li class="item-header">You have 5 new notifications</li>
								<li class="item">
									<a href="#">
										<i class="fa fa-comment"></i>
										<span class="content">New approval for blockage</span>
									</a>
								</li>
								<li class="item">
									<a href="transactions.php">
										<i class="fa fa-plus"></i>
										<span class="content">Transactions retrieved from bank server</span>
									</a>
								</li>

								<li class="item">
									<a href="fraud-transactions.php">
										<i class="fa fa-eye"></i>
										<span class="content">Algorithms applied on the transactions</span>
									</a>
								</li>
								<li class="item">
									<a href="#">
										<i class="fa fa-envelope"></i>
										<span class="content">Mails sent to the card holders</span>
									</a>
								</li>
								<li class="item">
									<a href="fraud-transactions.php#bottom">
										<i class="fa fa-shopping-cart"></i>
										<span class="content">Fraud detected with transaction id: 
											<?php
												while ($row = $result_fraud->fetch_row()) 
												{
													$f7 = $row[16];
												}
												echo $f7;
  											?>

										</span>
									</a>
								</li>
								<li class="item-footer">
									<a href="notifications.php">
										View all notifications
									</a>
								</li>
							</ul>
						</li>
						<li class="dropdown hidden-xs">
							<a class="btn dropdown-toggle" data-toggle="dropdown">
								<i class="fa fa-envelope-o"></i>
								<span class="count"><?php echo $count_msg?></span>
							</a>
						
							<ul class="dropdown-menu notifications-list messages-list">
								<li class="pointer">
									<div class="pointer-inner">
										<div class="arrow"></div>
									</div>
								</li>
								<?php
									while ($row_msg = $result_msg->fetch_row()) 
									{
										$f1=$row_msg[3];
										$f2=$row_msg[4];
								?>
								<li class="item first-item">
								
									<a href="#">
										<img src="img/samples/message-image.png" width="40" height=40 alt=""/>
										<span class="content">
											<span class="content-headline">
												&nbsp;&nbsp;
												<?php echo $f1; ?>
											</span>
											<span class="content-text">
												&nbsp;&nbsp;
												<?php echo $f2; ?>
											</span>
										</span>
									</a>
								</li>
								<?php
								}
								?>
								<li class="item-footer">
									<a href="messages.php">
										View all messages
									</a>
								</li>
							</ul>
						</li>
							</ul>
						</li>
					</ul>
				</div>

				<div class="nav-no-collapse pull-right" id="header-nav">
					<ul class="nav navbar-nav pull-right">
						<li class="dropdown profile-dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img src="img/samples/admin.jpg" alt=""/>
								<span class="hidden-xs"></span>
								<?php
									while($row = $result_user->fetch_row()){
										$u1=$row[2];
									}
									echo $u1;
	 							?>
	 							<b class="caret"></b>
							</a>
							<ul class="dropdown-menu dropdown-menu-right">
								<li><a href="user-profile.php"><i class="fa fa-user"></i>Profile</a></li>
								<li><a href="messages.php"><i class="fa fa-envelope-o"></i>Messages</a></li>
								<li><a href="logout.php"><i class="fa fa-power-off"></i>Logout</a></li>
							</ul>
						</li>
						<li class="hidden-xxs">
							<a class="btn" href="logout.php">
								<i class="fa fa-power-off"></i>
							</a>
						</li>
					</ul>
				</div>
				</div>
			</div>
		</header>
		<div id="page-wrapper" class="container">
			<div class="row">
				<div id="nav-col">
					<section id="col-left" class="col-left-nano">
						<div id="col-left-inner" class="col-left-nano-content">
							<div id="user-left-box" class="clearfix hidden-sm hidden-xs dropdown profile2-dropdown">
								<img alt="" src="img/samples/admin.jpg" />
								<div class="user-box">
									<span class="name">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">
											<?php
									while($row = $result_user->fetch_row()){
										$u1=$row[2];
									}
									echo $u1;
	 							?>
											<i class="fa fa-angle-down"></i>
										</a>
										<ul class="dropdown-menu">
											<li><a href="user-profile.php"><i class="fa fa-user"></i>Profile</a></li>
											<li><a href="messages.php"><i class="fa fa-envelope-o"></i>Messages</a></li>
											<li><a href="logout.php"><i class="fa fa-power-off"></i>Logout</a></li>
										</ul>
									</span>
									<span class="status">
										<i class="fa fa-circle"></i> Online
									</span>
								</div>
							</div>
							<div class="collapse navbar-collapse navbar-ex1-collapse" id="sidebar-nav">
								<ul class="nav nav-pills nav-stacked">
									<li class="nav-header nav-header-first hidden-sm hidden-xs">
										Navigation
									</li>
									<li>
										<a href="index.php">
											<i class="fa fa-dashboard"></i>
											<span>Dashboard</span>
											<span class="label label-primary label-circle pull-right">28</span>
										</a>
									</li>
									<li>
										<a href="transactions.php">
											<i class="fa fa-table"></i>
											<span>Transaction details</span>
										</a>
									</li>
									<li>
										<a href="fraud-transactions.php">
											<i class="fa fa-table"></i>
											<span>Fraudulent transactions</span>
										</a>
									</li>
									<li class="active">
										<a href="users.php">
											<i class="fa fa-user"></i>
											<span>Users</span>
										</a>
									</li>
									<li>
										<a href="email-inbox.php">
											<i class="fa fa-envelope"></i>
											<span>Mailbox</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</section>
					<div id="nav-col-submenu"></div>
				</div>
				<div id="content-wrapper"><div class="row">
						<div class="col-lg-12">
							
							<div class="row">
								<div class="col-lg-12">
									<ol class="breadcrumb">
										<li><a href="#">Home</a></li>
										<li class="active"><span>Users</span></li>
									</ol>
									
									<div class="clearfix">
										<h1 class="pull-left">Users</h1>
										
										<div class="pull-right top-page-ui">
											<a href="#" class="btn btn-primary pull-right">
												<i class="fa fa-plus-circle fa-lg"></i> Add user
											</a>
										</div>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-lg-12">
									<div class="main-box no-header clearfix">
										<div class="main-box-body clearfix">
											<div class="table-responsive">
												<table class="table user-list table-hover">
													<thead>
														<tr>
															<th class="text-center"><span>Name</span></th>
															<th><span>Account No</span></th>
															<th class="text-center"><span>Card no</span></th>
															<th><span>Expiry date</span></th>
															<th><span>Balance</span></th>
															<th><span>Email</span></th>
														</tr>
													</thead>

													<tbody>
														
														
														<?php
													//$i=0;
													while ($row_users = $result_users->fetch_row()) 
													{
														$f1=$row_users[0];
 														$f2=$row_users[1];
 														$f3=$row_users[2];
  														$f4=$row_users[4];
  														$f5=$row_users[6];
  														$f6=$row_users[7];
  													?>
														<tr> 

														    <td><a href="#" class="user-link"><?php echo $f2; ?>	</a></td>
														    <td><?php echo $f1; ?></td>
															<td><?php echo $f3; ?></td>
                                                            
															<td><?php echo $f4; ?></td>
															<td><?php echo $f5; ?></td>
															<td><?php echo $f6; ?></td>
														</tr>
														<?php
														//$i++;
														}?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						
						</div>
					</div>
					
					<footer id="footer-bar" class="row">
						<p id="footer-copyright" class="col-xs-12">
							&copy; ADS
						</p>
					</footer>
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
	<script src="js/pace.min.js"></script>
	
	<!-- this page specific inline scripts -->
	
</body>
</html>