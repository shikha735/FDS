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

$query="SELECT * FROM transactions ORDER BY txnid DESC LIMIT 5";
$result=mysqli_query($mysql_connect, $query);

$query_msg = "SELECT * FROM messages";
$result_msg=mysqli_query($mysql_connect, $query_msg);
$count_msg = mysqli_num_rows($result_msg);

$query_fraud="SELECT * FROM fraudtxn ORDER BY txnid DESC LIMIT 1";
$result_fraud = mysqli_query($mysql_connect, $query_fraud);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Mail</title>

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
						<li class="mobile-search">
							<a class="btn">
								<i class="fa fa-search"></i>
							</a>

							<div class="drowdown-search">
								<form role="search">
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Search...">
										<i class="fa fa-search nav-search-icon"></i>
									</div>
								</form>
							</div>

						</li>
						<li class="dropdown profile-dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img src="img/samples/admin.jpg" alt=""/>
								<span class="hidden-xs"></span>Admin <b class="caret"></b>
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
		<div id="page-wrapper" class="container nav-small">
			<div class="row">
				<div id="nav-col">
					<section id="col-left" class="col-left-nano">
						<div id="col-left-inner" class="col-left-nano-content">
							<div id="user-left-box" class="clearfix hidden-sm hidden-xs dropdown profile2-dropdown">
								<img alt="" src="img/samples/admin.jpg" />
								<div class="user-box">
									<span class="name">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">
											Admin
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
										<a href="fraud-transactions.php">
											<i class="fa fa-table"></i>
											<span>Fraudulent transactions</span>
										</a>
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
				<div id="content-wrapper" class="email-inbox-wrapper">
					<div class="row">
						<div class="col-lg-12">
							
							<div id="email-box" class="clearfix">
								<div class="row">
									<div class="col-lg-12">
											
										<div id="email-header-mobile" class="visible-xs visible-sm clearfix">
											<div id="email-header-title-mobile" class="pull-left">
												<i class="fa fa-inbox"></i> Inbox
											</div>
											
											<a href="email-compose.php" class="btn btn-success email-compose-btn pull-right">
												<i class="fa fa-pencil-square-o"></i> Compose email
											</a>
										</div>
											
										<header id="email-header" class="clearfix">
											<div id="email-header-title" class="visible-md visible-lg">
												<i class="fa fa-inbox"></i> Inbox
											</div>
											
											<div id="email-header-tools">
												<div class="btn-group">
													<a href="email-inbox.php" class="btn btn-primary">
														<i class="fa fa-chevron-left"></i> Back to inbox
													</a>
												</div>
												
												<div class="btn-group">
													<button class="btn btn-primary" type="button" title="Refresh" data-toggle="tooltip" data-placement="bottom">
														<i class="fa fa-refresh"></i>
													</button>
													<button class="btn btn-primary" type="button" title="Spam" data-toggle="tooltip" data-placement="bottom">
														<i class="fa fa-exclamation-circle"></i>
													</button>
													<button class="btn btn-primary" type="button" title="Erase" data-toggle="tooltip" data-placement="bottom">
														<i class="fa fa-trash-o"></i>
													</button>
												</div>
												
												<div class="btn-group">
													<button data-toggle="dropdown" class="btn btn-primary dropdown-toggle has-tooltip" type="button" title="Labels">
														<i class="fa fa-tag"></i> <span class="caret"></span>
													</button>
													<ul class="dropdown-menu dropdown-menu-right">
														<li><a href="#"><i class="fa fa-circle green"></i> Work</a></li>
														<li><a href="#"><i class="fa fa-circle red"></i> Home</a></li>
														<li><a href="#"><i class="fa fa-circle yellow"></i> Personal</a></li>
														<li><a href="#"><i class="fa fa-circle purple"></i> Documents</a></li>
													</ul>
												</div>
											</div>
											
											<div id="email-header-pagination" class="pull-right hidden-xs">
												<div class="btn-group pagination pull-right">
													<button class="btn btn-primary" type="button" title="Previous" data-toggle="tooltip" data-placement="bottom">
														<i class="fa fa-chevron-left"></i>
													</button>
													<button class="btn btn-primary" type="button" title="Next" data-toggle="tooltip" data-placement="bottom">
														<i class="fa fa-chevron-right"></i>
													</button>
												</div>
												
												<div class="num-items pull-right hidden-xs">
													1-50 from 5,912
												</div>
											</div>
											
										</header>
									</div>
								</div>
								
								<div class="row">
									<div class="col-lg-12">
										<div id="email-navigation" class="email-nav-nano hidden-xs hidden-sm">
											<div class="email-nav-nano-content">
												<a href="email-compose.php" class="btn btn-success email-compose-btn">
													<i class="fa fa-pencil-square-o"></i> Compose email
												</a>
												
												<ul id="email-nav-items" class="clearfix">
													<li class="active">
														<a href="email-inbox.php">
															<i class="fa fa-inbox"></i>
															Inbox 
														</a>
													</li>
													<li>
														<a href="email-inbox.php">
															<i class="fa fa-envelope"></i>
															Sent 
														</a>
													</li>
													<li>
														<a href="#">
															<i class="fa fa-trash-o"></i>
															Trash  
														</a>
													</li>
												</ul>
												
												
											</div>
											
										</div>
										<div id="email-detail" class="email-detail-nano">
											<div class="email-detail-nano-content">
												<div id="email-detail-inner">
													<div id="email-detail-subject" class="clearfix">
														<span class="subject">FW: Fraud Alert! Action required</span>
														<span class="label label-success">Work</span>
													</div>
													
													<div id="email-detail-sender" class="clearfix">
														<div class="picture hidden-xs">
															<img src="img/samples/angelina-300.jpg" alt=""/>
														</div>
														
														<div class="users">
															<div class="from clearfix">
																<div class="name">
																	Shikha Sharma
																</div>
																<div class="email hidden-xs">
																	&lt;shikha@bank.com&gt;
																</div>
															</div>
															
															<div class="to">
																To: <span>Me, Cardholder</span>
															</div>
														</div>
														
														<div class="tools">
															<div class="date">
																May 19 (6 days ago)
															</div>
															<div class="btns">
																<div class="btn-group">
																	<button class="btn btn-success" type="button">
																		<i class="fa fa-mail-reply"></i>
																	</button>
																	<button data-toggle="dropdown" class="btn btn-success dropdown-toggle" type="button">
																		<span class="caret"></span>
																	</button>
																	<ul class="dropdown-menu">
																		<li>
																			<a href="#">
																				<i class="fa fa-mail-reply"></i> Reply
																			</a>
																		</li>
																		<li>
																			<a href="#">
																				<i class="fa fa-mail-reply-all"></i> Reply all
																			</a>
																		</li>
																		<li>
																			<a href="#">
																				<i class="fa fa-mail-forward"></i> Forward
																			</a>
																		</li>
																		<li>
																			<a href="#">
																				<i class="fa fa-print"></i> Print
																			</a>
																		</li>
																	</ul>
																</div>
															</div>
														</div>
														
													</div>
													
													<div id="email-body">
														<p>
															Dear Cardholder,
														</p>
														<p>
															Thank you for the approval!
														</p>
														
														
													</div>
													
													
													
												</div>
											</div>
										</div>
									</div>
								</div>
								
							</div>
							
						</div>
					</div>
					
					<footer id="footer-bar" class="row hidden-md hidden-lg">
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
	<script>
	$(document).ready(function() {
		$('#email-list li > .star > a').on('click', function() {
			$(this).toggleClass('starred');
		});
		
		$(".has-tooltip").each(function (index, el) {
			$(el).tooltip({
				placement: $(this).data("placement") || 'bottom'
			});
		});
		
		setHeightEmailContent();
		
		initEmailScroller();
	});
	
	$(window).smartresize(function(){
		setHeightEmailContent();
		
		initEmailScroller();
	});
	
	function setHeightEmailContent() {
		if ($( document ).width() >= 992) {
			var windowHeight = $(window).height();
			var staticContentH = $('#header-navbar').outerHeight() + $('#email-header').outerHeight();
			staticContentH += ($('#email-box').outerHeight() - $('#email-box').height());
	
			$('#email-detail').css('height', windowHeight - staticContentH);
		}
		else {
			$('#email-detail').css('height', '');
		}
	}
	
	function initEmailScroller() {
		if ($( document ).width() >= 992) {
			$('#email-navigation').nanoScroller({
		    	alwaysVisible: false,
		    	iOSNativeScrolling: false,
		    	preventPageScrolling: true,
		    	contentClass: 'email-nav-nano-content'
		    });
			
			$('#email-detail').nanoScroller({
		    	alwaysVisible: false,
		    	iOSNativeScrolling: false,
		    	preventPageScrolling: true,
		    	contentClass: 'email-detail-nano-content'
		    });
		}
	}
	</script>
</body>
</html>