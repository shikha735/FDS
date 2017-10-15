<?php

ob_start();
require('dbconnect.php');
require("checksession.php");

$current_file = $_SERVER['SCRIPT_NAME'];

if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER']))
{
	$http_referer = $_SERVER['HTTP_REFERER'];
}

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

$query_up_count = "UPDATE page_view SET view_count = view_count + 1";
mysqli_query($mysql_connect, $query_up_count);

$query="SELECT * FROM transactions ORDER BY txnid DESC LIMIT 5";
$result=mysqli_query($mysql_connect, $query);
$num_rows_txn = mysqli_num_rows($result);

$query_msg = "SELECT * FROM messages";
$result_msg=mysqli_query($mysql_connect, $query_msg);
$count_msg = mysqli_num_rows($result_msg);

$query_fraud="SELECT * FROM fraudtxn GROUP BY txnid";
$result_fraud = mysqli_query($mysql_connect, $query_fraud);
$num_rows_fraud = mysqli_num_rows($result_fraud);

$query_fraud_amt = "SELECT SUM(txnamt) as sum_amt FROM fraudtxn";
$result_fraud_amt = mysqli_query($mysql_connect, $query_fraud_amt);
$fraud_amt=mysqli_fetch_assoc($result_fraud_amt);

$employee_id = $_SESSION['employee_id'];

$query_user="SELECT * FROM bankers where employee_id=".$employee_id;
$result_user=mysqli_query($mysql_connect, $query_user);

$query_no_txn = "SELECT COUNT(txnid) as no_txn FROM transactions";
$result_no_txn = mysqli_query($mysql_connect, $query_no_txn);
$data_no_txn=mysqli_fetch_assoc($result_no_txn);

$query_countries = "SELECT terminalcountry, COUNT(terminalcountry), DATE(MAX(timestamp)) FROM fraudtxn GROUP BY terminalcountry";
$result_countries = mysqli_query($mysql_connect, $query_countries);

$query_monthwise_txn = "SELECT SUM(txnamt)/10000, MONTH(timestamp), COUNT(MONTH(timestamp)) FROM `transactions` GROUP BY MONTH(timestamp)";
$result_monthwise_txn = mysqli_query($mysql_connect, $query_monthwise_txn);

$query_monthwise_fraud = "SELECT SUM(txnamt)/10000, MONTH(timestamp), COUNT(MONTH(timestamp)) FROM `fraudtxn` GROUP BY MONTH(timestamp)";
$result_monthwise_fraud = mysqli_query($mysql_connect, $query_monthwise_fraud);



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
									<li class="active">
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
									<li>
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
				<div id="content-wrapper">
					<div class="row">
						<div class="col-lg-12">
							<div class="row">
								<div class="col-lg-12">
									<div id="content-header" class="clearfix">
										<div class="pull-left">
											<ol class="breadcrumb">
												<li><a href="#">Home</a></li>
												<li class="active"><span>Dashboard</span></li>
											</ol>

											<h1>Dashboard</h1>
										</div>

										<div class="pull-right hidden-xs">
											<div class="xs-graph pull-left">
												<div class="graph-label">
													<b><i class="fa fa-shopping-cart"></i> 
													<?php 
														echo $data_no_txn["no_txn"];
													?>
													</b> Transactions
												</div>
												<div class="graph-content spark-orders"></div>
											</div>

											<div class="xs-graph pull-left mrg-l-lg mrg-r-sm">
												<div class="graph-label">
													<b>&dollar;<?php echo number_format((float)$fraud_amt["sum_amt"]/1000000, 2, '.', ''); ?>m</b> Loss
												</div>
												<div class="graph-content spark-revenues"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-lg-3 col-sm-6 col-xs-12">
									<div class="main-box infographic-box colored emerald-bg">
										<i class="fa fa-envelope"></i>
										<span class="headline">Messages</span>
										<span class="value">
										<?php 
											$query_no_msg = "SELECT COUNT(message) as no_msg FROM messages";
											$result_no_msg = mysqli_query($mysql_connect, $query_no_msg);
											$data_no_msg=mysqli_fetch_assoc($result_no_msg);
											echo $data_no_msg["no_msg"];

										?>
										</span>
									</div>
								</div>

								<div class="col-lg-3 col-sm-6 col-xs-12">
									<div class="main-box infographic-box colored green-bg">
										<i class="fa fa-money"></i>
										<span class="headline">Transactions</span>
										<span class="value">
										<?php 
											echo $data_no_txn["no_txn"];
										?>
										</span>
									</div>
								</div>

								<div class="col-lg-3 col-sm-6 col-xs-12">
									<div class="main-box infographic-box colored red-bg">
										<i class="fa fa-user"></i>
										<span class="headline">Users</span>
										<span class="value">
										<?php 
											$query_no_users = "SELECT COUNT(*) as no_users FROM accounts";
											$result_no_users = mysqli_query($mysql_connect, $query_no_users);
											$data_no_users=mysqli_fetch_assoc($result_no_users);
											echo $data_no_users["no_users"];

										?>
										</span>
									</div>
								</div>

								<div class="col-lg-3 col-sm-6 col-xs-12">
									<div class="main-box infographic-box colored purple-bg">
										<i class="fa fa-globe"></i>
										<span class="headline">Visits</span>
										<span class="value">
										<?php 
											$query_no_visits = "SELECT view_count FROM page_view";
											$result_no_visits = mysqli_query($mysql_connect, $query_no_visits);
											$data_no_visits=mysqli_fetch_assoc($result_no_visits);
											echo $data_no_visits["view_count"];
										?>
										</span>
									</div>
								</div>
							</div>


							<div class="pull-right">
								<b>Last login</b>:&nbsp;
								<?php 
									$last_login =  $_SESSION['last_login'];
									echo $last_login;
								?>
							</div>


							<div class="row">
								<div class="col-md-12">
									<div class="main-box">
										<header class="main-box-header clearfix">
											<h2 class="pull-left">Processed Transactions &amp; Fraudulent Transactions</h2>
										</header>

										<div class="main-box-body clearfix">
											<div class="row">
												<div class="col-md-9">
													<div id="graph-bar" style="height: 240px; padding: 0px; position: relative;"></div>
												</div>
												<div class="col-md-3">
													<ul class="graph-stats">
														<li>
															<div class="clearfix">
																<div class="title pull-left">
																	Loss in Dollars
																</div>
																<div class="value pull-right" title="10% down" data-toggle="tooltip">
																	<?php 
																		echo $fraud_amt["sum_amt"];
																	?>
																	<i class="fa fa-level-down red"></i>
																</div>
															</div>
															<div class="progress">
																<div style="width: 69%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="69" role="progressbar" class="progress-bar">
																	<span class="sr-only">69% Complete</span>
																</div>
															</div>
														</li>
														<li>
															<div class="clearfix">
																<div class="title pull-left">
																	Fraudulent Transactions
																</div>
																<div class="value pull-right" title="24% up" data-toggle="tooltip">
																	<?php echo $num_rows_fraud; ?> <i class="fa fa-level-up green"></i>
																</div>
															</div>
															<div class="progress">
																<div style="width: 42%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="42" role="progressbar" class="progress-bar progress-bar-danger">
																	<span class="sr-only">42% Complete</span>
																</div>
															</div>
														</li>
														<li>
															<div class="clearfix">
																<div class="title pull-left">
																	New Transactions
																</div>
																<div class="value pull-right" title="8% up" data-toggle="tooltip">
																	57 <i class="fa fa-level-up green"></i>
																</div>
															</div>
															<div class="progress">
																<div style="width: 78%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="78" role="progressbar" class="progress-bar progress-bar-success">
																	<span class="sr-only">78% Complete</span>
																</div>
															</div>
														</li>
														<li>
															<div class="clearfix">
																<div class="title pull-left">
																	No of Transactions
																</div>
																<div class="value pull-right" title="17% down" data-toggle="tooltip">
																	<?php 
																		$query_no_txn = "SELECT COUNT(txnid) as no_txn FROM transactions";
																		$result_no_txn = mysqli_query($mysql_connect, $query_no_txn);
																		$data_no_txn=mysqli_fetch_assoc($result_no_txn);
																		echo $data_no_txn["no_txn"];

																	?>
																	<i class="fa fa-level-up green"></i> 
																</div>
															</div>
															<div class="progress">
																<div style="width: 94%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="94" role="progressbar" class="progress-bar progress-bar-warning">
																	<span class="sr-only">94% Complete</span>
																</div>
															</div>
														</li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>


							<div class="row">
								<div class="col-lg-12">
									<div class="main-box clearfix">
										<header class="main-box-header clearfix">
											<h2 class="pull-left">Last transactions</h2>

											<div class="filter-block pull-right">
												<a href="transactions.php" class="btn btn-primary pull-right">
													<i class="fa fa-eye fa-lg"></i> View all Transactions
												</a>
											</div>
										</header>

										<div class="main-box-body clearfix">
											<div class="table-responsive clearfix">
												<table id="table-example-fixed" class="table table-hover">
													<thead>
														<tr>
														    <th class="text-center">Transaction Id</th>
														    <th class="text-center">Card number</th>
															<th>Name</th>
															<th>Status</th>
															<th class="text-center">Location</th>
															<th class="text-center">Date</th>
															<th>Amount</th>
														</tr>
													</thead>
													<tbody>
													<?php
													//$i=0;
													while ($row = $result->fetch_row()) 
													{
														$f1=$row[0];
 														$f2=$row[2];
 														$f3=$row[18];
  														$f4=$row[4];
  														$f5=$row[15];
  														$f6=$row[1];
  														$f7 = $row[16];
  													?>
														<tr> 
														    <td class="text-center"><?php echo $f7; ?></td>
														    <td class="text-center"><?php echo $f1; ?></td>
															<td><?php echo $f2; ?></td>
															<td align="char">
															<?php
															switch($f3)
														    {
    															case "completed": $color="label label-success label-large";
                                                                                  break;
                                                                case "blocked": $color="label label-danger label-large";
                                                                                  break;

    															case "pending": $color="label label-primary label-large";
                                                                                  break;           
       
                                                                 case "detected": $color="label label-warning label-large";
                                                                                  break;
                                                            }
                                                            ?>

															<span class="<?php echo htmlspecialchars($color); ?>">

                                                           


															<?php echo $f3; ?></span></td>
                                                            
															<td class="text-center"><?php echo $f4; ?></td>
															<td class="text-center"><?php echo $f5; ?></td>
															<td>$ <?php echo $f6; ?></td>
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

							<div class="row">
								<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
									<div class="main-box feed">
										<header class="main-box-header clearfix">
											<h2 class="pull-left">Project feed</h2>
										</header>

										<div class="main-box-body clearfix">
											<ul>
												<li class="clearfix">
													<div class="img">
														<img src="img/samples/robert-300.jpg" alt=""/>
													</div>
													<div class="title">
														<a href="#">Robert Downey Jr.</a>Fraud Detected.
													</div>
													<div class="post-time">
														Today 5:22 pm
													</div>
													<div class="time-ago">
														<i class="fa fa-clock-o"></i> 5 min.
													</div>
												</li>
												<li class="clearfix">
													<div class="img">
														<img src="img/samples/lima-300.jpg" alt=""/>
													</div>
													<div class="title">
														<a href="#">Adriana Lima</a> Withdrawn money in  Las Vegas Oscars
													</div>
													<div class="post-time">
														Yesterday 11:38 am
													</div>
													<div class="photos clearfix">
														<div class="item">
															<a href="#">
																<img src="img/samples/robert-300.jpg" alt=""/>
															</a>
														</div>
														<div class="item">
															<a href="#">
																<img src="img/samples/emma-300.jpg" alt=""/>
															</a>
														</div>
														<div class="item">
															<a href="#">
																<img src="img/samples/scarlett-300.jpg" alt=""/>
															</a>
														</div>
													</div>
													<div class="time-ago">
														<i class="fa fa-clock-o"></i> 9 hours.
													</div>
												</li>
												<li class="clearfix">
													<div class="img">
														<img src="img/samples/emma-300.jpg" alt=""/>
													</div>
													<div class="title">
														<a href="#">Emma Watson</a> Email sent..Decision Pending.
													</div>
													<div class="post-time">
														Today 11:59 pm
													</div>
													<div class="time-ago">
														<i class="fa fa-clock-o"></i> 28 min.
													</div>
												</li>
												<li class="clearfix">
													<div class="img">
														<img src="img/samples/ryan-300.jpg" alt=""/>
													</div>
													<div class="title">
														<a href="#">Ryan Gosling</a> No Fraudulent Transactions detected.
													</div>
													<div class="post-time">
														Yesterday 9:43 pm
													</div>
													<div class="photos clearfix">
														<div class="item">
															<a href="#">
																<img src="img/samples/scarlett-300.jpg" alt=""/>
															</a>
														</div>
														<div class="item">
															<a href="#">
																<img src="img/samples/robert-300.jpg" alt=""/>
															</a>
														</div>
														<div class="item">
															<a href="#">
																<img src="img/samples/emma-300.jpg" alt=""/>
															</a>
														</div>
													</div>
													<div class="time-ago">
														<i class="fa fa-clock-o"></i> 5 hours.
													</div>
												</li>
												<li class="clearfix">
													<div class="img">
														<img src="img/samples/kunis-300.jpg" alt=""/>
													</div>
													<div class="title">
														<a href="#">Mila Kunis</a> Transaction Details pending.
													</div>
													<div class="post-time">
														Yesterday 7:50 am
													</div>
													<div class="time-ago">
														<i class="fa fa-clock-o"></i> 9 hours.
													</div>
												</li>
												<li class="clearfix">
													<div class="img">
														<img src="img/samples/emma-300.jpg" alt=""/>
													</div>
													<div class="title">
														<a href="#">Emma Watson</a> Approval to Block Card.
													</div>
													<div class="post-time">
														Today 11:59 pm
													</div>
													<div class="time-ago">
														<i class="fa fa-clock-o"></i> 28 min.
													</div>
												</li>
												<li class="clearfix">
													<div class="img">
														<img src="img/samples/lima-300.jpg" alt=""/>
													</div>
													<div class="title">
														<a href="#">Adriana Lima</a> Fraudulent Transaction detected.
													</div>
													<div class="post-time">
														Yesterday 11:38 am
													</div>
													<div class="photos clearfix">
														<div class="item">
															<a href="#">
																<img src="img/samples/robert-300.jpg" alt=""/>
															</a>
														</div>
														<div class="item">
															<a href="#">
																<img src="img/samples/emma-300.jpg" alt=""/>
															</a>
														</div>
														<div class="item">
															<a href="#">
																<img src="img/samples/scarlett-300.jpg" alt=""/>
															</a>
														</div>
													</div>
													<div class="time-ago">
														<i class="fa fa-clock-o"></i> 9 hours.
													</div>
												</li>
											</ul>
										</div>
									</div>
								</div>

								<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
									<div class="main-box clearfix">
										<header class="main-box-header clearfix">
											<h2>Todo</h2>
										</header>

										<div class="main-box-body clearfix">

											<ul class="widget-todo">
												<li class="clearfix">
													<div class="name">
														<div class="checkbox-nice">
															<input type="checkbox" id="todo-1" />
															<label for="todo-1">
																Check if database is up to date<span class="label label-danger">High Priority</span>
															</label>
														</div>
													</div>
												</li>
												<li class="clearfix">
													<div class="name">
														<div class="checkbox-nice">
															<input type="checkbox" id="todo-2" />
															<label for="todo-2">
																Check Messages<span class="label label-danger">High Priority</span>
															</label>
														</div>
													</div>
													<div class="actions">
														<a href="#" class="table-link">
															<i class="fa fa-pencil"></i>
														</a>
														<a href="#" class="table-link danger">
															<i class="fa fa-trash-o"></i>
														</a>
													</div>
												</li>
												<li class="clearfix">
													<div class="name">
														<div class="checkbox-nice">
															<input type="checkbox" id="todo-3" checked="checked" />
															<label for="todo-3">
																Check if mails have been sent<span class="label label-success">Medium Priority</span>
															</label>
														</div>
													</div>
													<div class="actions">
														<a href="#" class="table-link">
															<i class="fa fa-pencil"></i>
														</a>
														<a href="#" class="table-link danger">
															<i class="fa fa-trash-o"></i>
														</a>
													</div>
												</li>
												<li class="clearfix">
													<div class="name">
														<div class="checkbox-nice">
															<input type="checkbox" id="todo-4" />
															<label for="todo-4">
																Check the blocked cards<span class="label label-warning">Low Priority</span>
															</label>
														</div>
													</div>
												</li>
												<li class="clearfix">
													<div class="name">
														<div class="checkbox-nice">
															<input type="checkbox" id="todo-5" />
															<label for="todo-5">
																Message reply<span class="label label-success">Medium Priority</span>
															</label>
														</div>
													</div>
													<div class="actions">
														<a href="#" class="table-link badge">
															<i class="fa fa-cog"></i>
														</a>
													</div>
												</li>
												<li class="clearfix">
													<div class="name">
														<div class="checkbox-nice">
															<input type="checkbox" id="todo-6" />
															<label for="todo-6">
																Check notification<span class="label label-danger">High Priority</span>
															</label>
														</div>
													</div>
												</li>
											</ul>

										</div>
									</div>
								</div>

								<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
									<div class="main-box weather-box">
										<header class="main-box-header clearfix">
											<h2 >Processed Transactions</h2>
										</header>

										<div class="main-box-body clearfix">
											<div class="current">
												<div class="clearfix center-block" style="width: 220px;">

													<div class="temp-wrapper">
														<div class="temperature">
															<?php 
																$fraud_percent = ($num_rows_fraud)/$data_no_txn["no_txn"];
																echo number_format((float)$fraud_percent, 4, '.', '');
															?><span class="sign">%</span>
															
														</div>
														<div class="desc">
															<i class="fa fa-bug"></i> Frauds Detected
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="col-lg-8 col-md-12 col-xs-12">
									<div class="main-box">
										<header class="main-box-header clearfix">
											<h2 class="pull-left">Transaction Location</h2>

											<div class="icon-box pull-right">
												<a href="#" class="btn pull-left">
													<i class="fa fa-refresh"></i>
												</a>
												<a href="#" class="btn pull-left">
													<i class="fa fa-cog"></i>
												</a>
											</div>
										</header>

										<div class="main-box-body clearfix">
											<div class="row">
												<div class="col-md-5">
													<div class="map-stats">
														<div class="table-responsive">
															<table class="table table-condensed table-hover">
																<thead>
																	<tr>
																		<th><span>Country</span></th>
																		<th class="text-center"><span>Last Fraud</span></th>
																		<th class="text-center"><span>Status</span></th>
																	</tr>
																</thead>
																<tbody>
																	<?php
																		while ($row = $result_countries->fetch_row()) 
																		{
																			$c1=$row[0];
					 														$c2=$row[1];
					 														$c3=$row[2];
				  													?>
																	<tr>
																		<td>
																			<?php echo $c1; ?> 
																		</td>
																		<td class="text-center">
																			<?php echo $c3; ?>
																		</td>
																		<td class="text-center status black">
																			<?php
																				echo number_format((float)($c2*100)/$num_rows_fraud, 2, '.', '');
																			?>%
																		</td>
																	</tr>
																	<?php } ?>
																</tbody>
															</table>
														</div>
													</div>
												</div>
												<div class="col-md-7">
													<div id="world-map" style="width: 100%; height: 400px"></div>
												</div>
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
	<script src="js/moment.min.js"></script>
	<script src="js/jquery-jvectormap-1.2.2.min.js"></script>
	<script src="js/jquery-jvectormap-world-merc-en.js"></script>
	<script src="js/gdp-data.js"></script>
	<script src="js/flot/jquery.flot.min.js"></script>
	<script src="js/flot/jquery.flot.resize.min.js"></script>
	<script src="js/flot/jquery.flot.time.min.js"></script>
	<script src="js/flot/jquery.flot.threshold.js"></script>
	<script src="js/flot/jquery.flot.axislabels.js"></script>
	<script src="js/jquery.sparkline.min.js"></script>
	<script src="js/skycons.js"></script>

	<!-- theme scripts -->
	<script src="js/scripts.js"></script>
	<script src="js/pace.min.js"></script>

	<!-- this page specific inline scripts -->
	<script>
	$(document).ready(function() {

	    //CHARTS
	    function gd(year, day, month) {
			return new Date(year, month - 1, day).getTime();
		}

		if ($('#graph-bar').length) {
			var data1 = [
			    [
				    gd(2015, 1, 1), 
				    <?php 
					    $query_m1_txn = "SELECT SUM(txnamt)/10000, MONTH(timestamp) FROM `transactions` WHERE MONTH(timestamp) = 1";
						$result_m1_txn = mysqli_query($mysql_connect, $query_m1_txn);
						$m1=mysqli_fetch_array($result_m1_txn,MYSQLI_NUM);
					    echo $m1[0];
				    ?>
			    ], 
			    [
			    	gd(2015, 1, 2),  
				    <?php 
					    $query_m2_txn = "SELECT SUM(txnamt)/10000, MONTH(timestamp) FROM `transactions` WHERE MONTH(timestamp) = 2";
						$result_m2_txn = mysqli_query($mysql_connect, $query_m2_txn);
						$m2=mysqli_fetch_array($result_m2_txn,MYSQLI_NUM);
					    echo $m2[0];
				    ?>
			    ], 
			    [
			    	gd(2015, 1, 3),  
				    <?php 
					    $query_m3_txn = "SELECT SUM(txnamt)/10000, MONTH(timestamp) FROM `transactions` WHERE MONTH(timestamp) = 3";
						$result_m3_txn = mysqli_query($mysql_connect, $query_m3_txn);
						$m3=mysqli_fetch_array($result_m3_txn,MYSQLI_NUM);
					    echo $m3[0];
				    ?>
			    ], 
			    [
			    	gd(2015, 1, 4),  
				    <?php 
					    $query_m4_txn = "SELECT SUM(txnamt)/10000, MONTH(timestamp) FROM `transactions` WHERE MONTH(timestamp) = 4";
						$result_m4_txn = mysqli_query($mysql_connect, $query_m4_txn);
						$m4=mysqli_fetch_array($result_m4_txn,MYSQLI_NUM);
					    echo $m4[0];
				    ?>
			    ], 
			    [
			    	gd(2015, 1, 5),  
				    <?php 
					    $query_m5_txn = "SELECT SUM(txnamt)/10000, MONTH(timestamp) FROM `transactions` WHERE MONTH(timestamp) = 5";
						$result_m5_txn = mysqli_query($mysql_connect, $query_m5_txn);
						$m5=mysqli_fetch_array($result_m5_txn,MYSQLI_NUM);
					    echo $m5[0];
				    ?>
			    ], 
			    [
			    	gd(2015, 1, 6),  
				    <?php 
					    $query_m6_txn = "SELECT SUM(txnamt)/10000, MONTH(timestamp) FROM `transactions` WHERE MONTH(timestamp) = 6";
						$result_m6_txn = mysqli_query($mysql_connect, $query_m6_txn);
						$m6=mysqli_fetch_array($result_m6_txn,MYSQLI_NUM);
					    echo $m6[0];
				    ?>
			    ], 
			    [
			    	gd(2015, 1, 7),  
				    <?php 
					    $query_m7_txn = "SELECT SUM(txnamt)/10000, MONTH(timestamp) FROM `transactions` WHERE MONTH(timestamp) = 7";
						$result_m7_txn = mysqli_query($mysql_connect, $query_m7_txn);
						$m7=mysqli_fetch_array($result_m7_txn,MYSQLI_NUM);
					    echo $m7[0];
				    ?>
			    ], 
			    [
			    	gd(2015, 1, 8),  
				    <?php 
					    $query_m8_txn = "SELECT SUM(txnamt)/10000, MONTH(timestamp) FROM `transactions` WHERE MONTH(timestamp) = 8";
						$result_m8_txn = mysqli_query($mysql_connect, $query_m8_txn);
						$m8=mysqli_fetch_array($result_m8_txn,MYSQLI_NUM);
					    echo $m8[0];
				    ?>
			    ], 
			    [
			    	gd(2015, 1, 9),  
				    <?php 
					    $query_m9_txn = "SELECT SUM(txnamt)/10000, MONTH(timestamp) FROM `transactions` WHERE MONTH(timestamp) = 9";
						$result_m9_txn = mysqli_query($mysql_connect, $query_m9_txn);
						$m9=mysqli_fetch_array($result_m9_txn,MYSQLI_NUM);
					    echo $m9[0];
				    ?>
			    ], 
			    [
			    	gd(2015, 1, 10),  
				    <?php 
					    $query_m10_txn = "SELECT SUM(txnamt)/10000, MONTH(timestamp) FROM `transactions` WHERE MONTH(timestamp) = 10";
						$result_m10_txn = mysqli_query($mysql_connect, $query_m10_txn);
						$m10=mysqli_fetch_array($result_m10_txn,MYSQLI_NUM);
					    echo $m10[0];
				    ?>
			    ], 
			    [
			    	gd(2015, 1, 11),  
				    <?php 
					    $query_m11_txn = "SELECT SUM(txnamt)/10000, MONTH(timestamp) FROM `transactions` WHERE MONTH(timestamp) = 11";
						$result_m11_txn = mysqli_query($mysql_connect, $query_m11_txn);
						$m11=mysqli_fetch_array($result_m11_txn,MYSQLI_NUM);
					    echo $m11[0];
				    ?>
			    ], 
			    [
			    	gd(2015, 1, 12),  
				    <?php 
					    $query_m12_txn = "SELECT SUM(txnamt)/10000, MONTH(timestamp) FROM `transactions` WHERE MONTH(timestamp) = 12";
						$result_m12_txn = mysqli_query($mysql_connect, $query_m12_txn);
						$m12=mysqli_fetch_array($result_m12_txn,MYSQLI_NUM);
					    echo $m12[0];
				    ?>
			    ]
			];

			var data2 = [
			    [
				    gd(2015, 1, 1), 
				    <?php 
					    $query_m1_txn = "SELECT SUM(f.txnamt)/10000, MONTH(f.timestamp) 
										FROM (SELECT txnamt,timestamp FROM fraudtxn GROUP BY txnid) AS f 
										WHERE MONTH(f.timestamp) = 1";
						$result_m1_txn = mysqli_query($mysql_connect, $query_m1_txn);
						$m1=mysqli_fetch_array($result_m1_txn,MYSQLI_NUM);
					    echo $m1[0];
				    ?>
			    ], 
			    [
			    	gd(2015, 1, 2),  
				    <?php 
					    $query_m2_txn = "SELECT SUM(f.txnamt)/10000, MONTH(f.timestamp) 
										FROM (SELECT txnamt,timestamp FROM fraudtxn GROUP BY txnid) AS f 
										WHERE MONTH(f.timestamp) = 2";
						$result_m2_txn = mysqli_query($mysql_connect, $query_m2_txn);
						$m2=mysqli_fetch_array($result_m2_txn,MYSQLI_NUM);
					    echo $m2[0];
				    ?>
			    ], 
			    [
			    	gd(2015, 1, 3),  
				    <?php 
					    $query_m3_txn = "SELECT SUM(f.txnamt)/10000, MONTH(f.timestamp) 
										FROM (SELECT txnamt,timestamp FROM fraudtxn GROUP BY txnid) AS f 
										WHERE MONTH(f.timestamp) = 3";
						$result_m3_txn = mysqli_query($mysql_connect, $query_m3_txn);
						$m3=mysqli_fetch_array($result_m3_txn,MYSQLI_NUM);
					    echo $m3[0];
				    ?>
			    ], 
			    [
			    	gd(2015, 1, 4),  
				    <?php 
					    $query_m4_txn = "SELECT SUM(f.txnamt)/10000, MONTH(f.timestamp) 
										FROM (SELECT txnamt,timestamp FROM fraudtxn GROUP BY txnid) AS f 
										WHERE MONTH(f.timestamp) = 4";
						$result_m4_txn = mysqli_query($mysql_connect, $query_m4_txn);
						$m4=mysqli_fetch_array($result_m4_txn,MYSQLI_NUM);
					    echo $m4[0];
				    ?>
			    ], 
			    [
			    	gd(2015, 1, 5),  
				    <?php 
					    $query_m5_txn = "SELECT SUM(f.txnamt)/10000, MONTH(f.timestamp) 
										FROM (SELECT txnamt,timestamp FROM fraudtxn GROUP BY txnid) AS f 
										WHERE MONTH(f.timestamp) = 5";
						$result_m5_txn = mysqli_query($mysql_connect, $query_m5_txn);
						$m5=mysqli_fetch_array($result_m5_txn,MYSQLI_NUM);
					    echo $m5[0];
				    ?>
			    ], 
			    [
			    	gd(2015, 1, 6),  
				    <?php 
					    $query_m6_txn = "SELECT SUM(f.txnamt)/10000, MONTH(f.timestamp) 
										FROM (SELECT txnamt,timestamp FROM fraudtxn GROUP BY txnid) AS f 
										WHERE MONTH(f.timestamp) = 6";
						$result_m6_txn = mysqli_query($mysql_connect, $query_m6_txn);
						$m6=mysqli_fetch_array($result_m6_txn,MYSQLI_NUM);
					    echo $m6[0];
				    ?>
			    ], 
			    [
			    	gd(2015, 1, 7),  
				    <?php 
					    $query_m7_txn = "SELECT SUM(f.txnamt)/10000, MONTH(f.timestamp) 
										FROM (SELECT txnamt,timestamp FROM fraudtxn GROUP BY txnid) AS f 
										WHERE MONTH(f.timestamp) = 7";
						$result_m7_txn = mysqli_query($mysql_connect, $query_m7_txn);
						$m7=mysqli_fetch_array($result_m7_txn,MYSQLI_NUM);
					    echo $m7[0];
				    ?>
			    ], 
			    [
			    	gd(2015, 1, 8),  
				    <?php 
					    $query_m8_txn = "SELECT SUM(f.txnamt)/10000, MONTH(f.timestamp) 
										FROM (SELECT txnamt,timestamp FROM fraudtxn GROUP BY txnid) AS f 
										WHERE MONTH(f.timestamp) = 8";
						$result_m8_txn = mysqli_query($mysql_connect, $query_m8_txn);
						$m8=mysqli_fetch_array($result_m8_txn,MYSQLI_NUM);
					    echo $m8[0];
				    ?>
			    ], 
			    [
			    	gd(2015, 1, 9),  
				    <?php 
					    $query_m9_txn = "SELECT SUM(f.txnamt)/10000, MONTH(f.timestamp) 
										FROM (SELECT txnamt,timestamp FROM fraudtxn GROUP BY txnid) AS f 
										WHERE MONTH(f.timestamp) = 9";
						$result_m9_txn = mysqli_query($mysql_connect, $query_m9_txn);
						$m9=mysqli_fetch_array($result_m9_txn,MYSQLI_NUM);
					    echo $m9[0];
				    ?>
			    ], 
			    [
			    	gd(2015, 1, 10),  
				    <?php 
					    $query_m10_txn = "SELECT SUM(f.txnamt)/10000, MONTH(f.timestamp) 
										FROM (SELECT txnamt,timestamp FROM fraudtxn GROUP BY txnid) AS f 
										WHERE MONTH(f.timestamp) = 10";
						$result_m10_txn = mysqli_query($mysql_connect, $query_m10_txn);
						$m10=mysqli_fetch_array($result_m10_txn,MYSQLI_NUM);
					    echo $m10[0];
				    ?>
			    ], 
			    [
			    	gd(2015, 1, 11),  
				    <?php 
					    $query_m11_txn = "SELECT SUM(f.txnamt)/10000, MONTH(f.timestamp) 
										FROM (SELECT txnamt,timestamp FROM fraudtxn GROUP BY txnid) AS f 
										WHERE MONTH(f.timestamp) = 11";
						$result_m11_txn = mysqli_query($mysql_connect, $query_m11_txn);
						$m11=mysqli_fetch_array($result_m11_txn,MYSQLI_NUM);
					    echo $m11[0];
				    ?>
			    ], 
			    [
			    	gd(2015, 1, 12),  
				    <?php 
					    $query_m12_txn = "SELECT SUM(f.txnamt)/10000, MONTH(f.timestamp) 
										FROM (SELECT txnamt,timestamp FROM fraudtxn GROUP BY txnid) AS f 
										WHERE MONTH(f.timestamp) = 12";
						$result_m12_txn = mysqli_query($mysql_connect, $query_m12_txn);
						$m12=mysqli_fetch_array($result_m12_txn,MYSQLI_NUM);
					    echo $m12[0];
				    ?>
			    ]
			];
			

			var series = new Array();

			series.push({
				data: data1,
				bars: {
					show : true,
					barWidth: 24 * 60 * 60 * 12000,
					lineWidth: 1,
					fill: 1,
					align: 'center'
				},
				label: 'Transactions'
			});
			series.push({
				data: data2,
				color: '#e84e40',
				lines: {
					show : true,
					lineWidth: 3,
				},
				points: {
					fillColor: "#e84e40",
					fillColor: '#ffffff',
					pointWidth: 1,
					show: true
				},
				label: 'Frauds'
			});

			$.plot("#graph-bar", series, {
				colors: ['#03a9f4', '#f1c40f', '#2ecc71', '#3498db', '#9b59b6', '#95a5a6'],
				grid: {
					tickColor: "#f2f2f2",
					borderWidth: 0,
					hoverable: true,
					clickable: true
				},
				legend: {
					noColumns: 1,
					labelBoxBorderColor: "#000000",
					position: "ne"
				},
				shadowSize: 0,
				xaxis: {
					mode: "time",
					tickSize: [1, "month"],
					tickLength: 0,
					// axisLabel: "Date",
					axisLabelUseCanvas: true,
					axisLabelFontSizePixels: 12,
					axisLabelFontFamily: 'Open Sans, sans-serif',
					axisLabelPadding: 10
				}
			});

			var previousPoint = null;
			$("#graph-bar").bind("plothover", function (event, pos, item) {
				if (item) {
					if (previousPoint != item.dataIndex) {

						previousPoint = item.dataIndex;

						$("#flot-tooltip").remove();
						var x = item.datapoint[0],
						y = item.datapoint[1];

						showTooltip(item.pageX, item.pageY, item.series.label, y );
					}
				}
				else {
					$("#flot-tooltip").remove();
					previousPoint = [0,0,0];
				}
			});

			function showTooltip(x, y, label, data) {
				$('<div id="flot-tooltip">' + '<b>' + label + ': </b><i>' + data + '</i>' + '</div>').css({
					top: y + 5,
					left: x + 20
				}).appendTo("body").fadeIn(200);
			}
		}

		//WORLD MAP
		$('#world-map').vectorMap({
			map: 'world_merc_en',
			backgroundColor: '#ffffff',
			zoomOnScroll: false,
			regionStyle: {
				initial: {
					fill: '#e1e1e1',
					stroke: 'none',
					"stroke-width": 0,
					"stroke-opacity": 1
				},
				hover: {
					"fill-opacity": 0.8
				},
				selected: {
					fill: '#8dc859'
				},
				selectedHover: {
				}
			},
			markerStyle: {
				initial: {
					fill: '#e84e40',
					stroke: '#e84e40'
				}
			},
			markers: [
				{latLng: [38.35, -121.92], name: 'Los Angeles - 23'},
				{latLng: [53.35, -110.92], name: 'USA - 27'},
				{latLng: [39.36, -73.12], name: 'New York - 84'},
				{latLng: [50.49, -0.23], name: 'London - 43'},
				{latLng: [36.29, 138.54], name: 'Tokyo - 33'},
				{latLng: [23.63936, 80.34466], name: 'India - 91'},
				{latLng: [-32.59, 150.21], name: 'Sydney - 22'},
				{latLng: [9, 80.34466], name: 'Sri Lanka - 74'},
				{latLng: [34, 85.34466], name: 'China - 18'},
				{latLng: [60, 90.34466], name: 'Russia - 43'},
			],
			series: {
				regions: [{
					values: gdpData,
					scale: ['#6fc4fe', '#2980b9'],
					normalizeFunction: 'polynomial'
				}]
			},
			onRegionLabelShow: function(e, el, code){
				el.php(el.php()+' ('+gdpData[code]+')');
			}
		});

		/* SPARKLINE - graph in header */
		var orderValues = [10,8,5,7,4,4,3,8,0,7,10,6,5,4,3,6,8,9];

		$('.spark-orders').sparkline(orderValues, {
			type: 'bar',
			barColor: '#ced9e2',
			height: 25,
			barWidth: 6
		});

		var revenuesValues = [8,3,2,6,4,9,1,10,8,2,5,8,6,9,3,4,2,3,7];

		$('.spark-revenues').sparkline(revenuesValues, {
			type: 'bar',
			barColor: '#ced9e2',
			height: 25,
			barWidth: 6
		});

		/* ANIMATED WEATHER */
		var skycons = new Skycons({"color": "#03a9f4"});
		// on Android, a nasty hack is needed: {"resizeClear": true}

		// you can add a canvas by it's ID...
		skycons.add("current-weather", Skycons.SNOW);

		// start animation!
		skycons.play();

	});
	</script>

</body>
</html>
<?php
 // session_destroy();
?>
