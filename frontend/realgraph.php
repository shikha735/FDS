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
	
	<!-- Favicon -->
	<link type="image/x-icon" href="favicon.png" rel="shortcut icon"/>

	<!-- google font libraries -->
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,600,700,300|Titillium+Web:200,300,400' rel='stylesheet' type='text/css'>

	<!--[if lt IE 9]>
		<script src="js/html5shiv.js"></script>
		<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<div id="theme-wrapper">
		<header class="navbar" id="header-navbar">
			<div class="container">
				<a href="index.html" id="logo" class="navbar-brand">
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
								<span class="count">8</span>
							</a>
							<ul class="dropdown-menu notifications-list">
								<li class="pointer">
									<div class="pointer-inner">
										<div class="arrow"></div>
									</div>
								</li>
								<li class="item-header">You have 6 new notifications</li>
								<li class="item">
									<a href="#">
										<i class="fa fa-comment"></i>
										<span class="content">New comment on ‘Awesome P...</span>
										<span class="time"><i class="fa fa-clock-o"></i>13 min.</span>
									</a>
								</li>
								<li class="item">
									<a href="#">
										<i class="fa fa-plus"></i>
										<span class="content">New user registration</span>
										<span class="time"><i class="fa fa-clock-o"></i>13 min.</span>
									</a>
								</li>
								<li class="item">
									<a href="#">
										<i class="fa fa-envelope"></i>
										<span class="content">New Message from George</span>
										<span class="time"><i class="fa fa-clock-o"></i>13 min.</span>
									</a>
								</li>
								<li class="item">
									<a href="#">
										<i class="fa fa-shopping-cart"></i>
										<span class="content">New purchase</span>
										<span class="time"><i class="fa fa-clock-o"></i>13 min.</span>
									</a>
								</li>
								<li class="item">
									<a href="#">
										<i class="fa fa-eye"></i>
										<span class="content">New order</span>
										<span class="time"><i class="fa fa-clock-o"></i>13 min.</span>
									</a>
								</li>
								<li class="item-footer">
									<a href="#">
										View all notifications
									</a>
								</li>
							</ul>
						</li>
						<li class="dropdown hidden-xs">
							<a class="btn dropdown-toggle" data-toggle="dropdown">
								<i class="fa fa-envelope-o"></i>
								<span class="count">16</span>
							</a>
							<ul class="dropdown-menu notifications-list messages-list">
								<li class="pointer">
									<div class="pointer-inner">
										<div class="arrow"></div>
									</div>
								</li>
								<li class="item first-item">
									<a href="#">
										<img src="img/samples/messages-photo-1.png" alt=""/>
										<span class="content">
											<span class="content-headline">
												George Clooney
											</span>
											<span class="content-text">
												Look, just because I don't be givin' no man a foot massage don't make it 
												right for Marsellus to throw...
											</span>
										</span>
										<span class="time"><i class="fa fa-clock-o"></i>13 min.</span>
									</a>
								</li>
								<li class="item">
									<a href="#">
										<img src="img/samples/messages-photo-2.png" alt=""/>
										<span class="content">
											<span class="content-headline">
												Emma Watson
											</span>
											<span class="content-text">
												Look, just because I don't be givin' no man a foot massage don't make it 
												right for Marsellus to throw...
											</span>
										</span>
										<span class="time"><i class="fa fa-clock-o"></i>13 min.</span>
									</a>
								</li>
								<li class="item">
									<a href="#">
										<img src="img/samples/messages-photo-3.png" alt=""/>
										<span class="content">
											<span class="content-headline">
												Robert Downey Jr.
											</span>
											<span class="content-text">
												Look, just because I don't be givin' no man a foot massage don't make it 
												right for Marsellus to throw...
											</span>
										</span>
										<span class="time"><i class="fa fa-clock-o"></i>13 min.</span>
									</a>
								</li>
								<li class="item-footer">
									<a href="#">
										View all messages
									</a>
								</li>
							</ul>
						</li>
						<li class="dropdown hidden-xs">
							<a class="btn dropdown-toggle" data-toggle="dropdown">
								New Item
								<i class="fa fa-caret-down"></i>
							</a>
							<ul class="dropdown-menu">
								<li class="item">
									<a href="#">
										<i class="fa fa-archive"></i> 
										New Product
									</a>
								</li>
								<li class="item">
									<a href="#">
										<i class="fa fa-shopping-cart"></i> 
										New Order
									</a>
								</li>
								<li class="item">
									<a href="#">
										<i class="fa fa-sitemap"></i> 
										New Category
									</a>
								</li>
								<li class="item">
									<a href="#">
										<i class="fa fa-file-text"></i> 
										New Page
									</a>
								</li>
							</ul>
						</li>
						<li class="dropdown hidden-xs">
							<a class="btn dropdown-toggle" data-toggle="dropdown">
								English
								<i class="fa fa-caret-down"></i>
							</a>
							<ul class="dropdown-menu">
								<li class="item">
									<a href="#">
										Spanish
									</a>
								</li>
								<li class="item">
									<a href="#">
										German
									</a>
								</li>
								<li class="item">
									<a href="#">
										Italian
									</a>
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
								<img src="img/samples/scarlet-159.png" alt=""/>
								<span class="hidden-xs">Scarlett Johansson</span> <b class="caret"></b>
							</a>
							<ul class="dropdown-menu dropdown-menu-right">
								<li><a href="user-profile.html"><i class="fa fa-user"></i>Profile</a></li>
								<li><a href="#"><i class="fa fa-cog"></i>Settings</a></li>
								<li><a href="#"><i class="fa fa-envelope-o"></i>Messages</a></li>
								<li><a href="#"><i class="fa fa-power-off"></i>Logout</a></li>
							</ul>
						</li>
						<li class="hidden-xxs">
							<a class="btn">
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
								<img alt="" src="img/samples/scarlet-159.png" />
								<div class="user-box">
									<span class="name">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">
											Scarlett J. 
											<i class="fa fa-angle-down"></i>
										</a>
										<ul class="dropdown-menu">
											<li><a href="user-profile.html"><i class="fa fa-user"></i>Profile</a></li>
											<li><a href="#"><i class="fa fa-cog"></i>Settings</a></li>
											<li><a href="#"><i class="fa fa-envelope-o"></i>Messages</a></li>
											<li><a href="#"><i class="fa fa-power-off"></i>Logout</a></li>
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
										<a href="index.html">
											<i class="fa fa-dashboard"></i>
											<span>Dashboard</span>
											<span class="label label-primary label-circle pull-right">28</span>
										</a>
									</li>
									<li>
										<a href="#" class="dropdown-toggle">
											<i class="fa fa-table"></i>
											<span>Tables</span>
											<i class="fa fa-angle-right drop-icon"></i>
										</a>
										<ul class="submenu">
											<li>
												<a href="tables.html">
													Simple
												</a>
											</li>
											<li>
												<a href="tables-advanced.html">
													Advanced
												</a>
											</li>
											<li>
												<a href="users.html">
													Users
												</a>
											</li>
										</ul>
									</li>
									<li>
										<a href="#" class="dropdown-toggle">
											<i class="fa fa-envelope"></i>
											<span>Email</span>
											<i class="fa fa-angle-right drop-icon"></i>
										</a>
										<ul class="submenu">
											<li>
												<a href="email-inbox.html">
													Inbox
												</a>
											</li>
											<li>
												<a href="email-detail.html">
													Detail
												</a>
											</li>
											<li>
												<a href="email-compose.html">
													Compose
												</a>
											</li>
										</ul>
									</li>
									<li class="active">
										<a href="#" class="dropdown-toggle">
											<i class="fa fa-bar-chart-o"></i>
											<span>Graphs</span>
											<i class="fa fa-angle-right drop-icon"></i>
										</a>
										<ul class="submenu">
											<li>
												<a href="graphs-morris.html">
													Morris &amp; Mixed
												</a>
											</li>
											<li>
												<a href="graphs-flot.html" class="active">
													Flot
												</a>
											</li>
											<li>
												<a href="graphs-dygraphs.html">
													Dygraphs
												</a>
											</li>
											<li>
												<a href="graphs-xcharts.html">
													xCharts
												</a>
											</li>
										</ul>
									</li>
									<li>
										<a href="widgets.html">
											<i class="fa fa-th-large"></i>
											<span>Widgets</span>
											<span class="label label-success pull-right">New</span>
										</a>
									</li>
									<li>
										<a href="#" class="dropdown-toggle">
											<i class="fa fa-copy"></i>
											<span>Pages</span>
											<i class="fa fa-angle-right drop-icon"></i>
										</a>
										<ul class="submenu">
											<li>
												<a href="calendar.html">
													Calendar
												</a>
											</li>
											<li>
												<a href="gallery.html">
													Gallery
												</a>
											</li>
											<li>
												<a href="gallery-v2.html">
													Gallery v2
												</a>
											</li>
											<li>
												<a href="pricing.html">
													Pricing
												</a>
											</li>
											<li>
												<a href="projects.html">
													Projects
												</a>
											</li>
											<li>
												<a href="team-members.html">
													Team Members
												</a>
											</li>
											<li>
												<a href="timeline.html">
													Timeline
												</a>
											</li>
											<li>
												<a href="timeline-grid.html">
													Timeline Grid
												</a>
											</li>
											<li>
												<a href="user-profile.html">
													User Profile
												</a>
											</li>
											<li>
												<a href="search.html">
													Search Results
												</a>
											</li>
											<li>
												<a href="invoice.html">
													Invoice
												</a>
											</li>
											<li>
												<a href="intro.html">
													Tour Layout
												</a>
											</li>
										</ul>
									</li>
									<li class="nav-header hidden-sm hidden-xs">
										Components
									</li>
									<li>
										<a href="#" class="dropdown-toggle">
											<i class="fa fa-edit"></i>
											<span>Forms</span>
											<i class="fa fa-angle-right drop-icon"></i>
										</a>
										<ul class="submenu">
											<li>
												<a href="form-elements.html">
													Elements
												</a>
											</li>
											<li>
												<a href="x-editable.html">
													X-Editable
												</a>
											</li>
											<li>
												<a href="form-wizard.html">
													Wizard
												</a>
											</li>
											<li>
												<a href="form-wizard-popup.html">
													Wizard popup
												</a>
											</li>
											<li>
												<a href="form-wysiwyg.html">
													WYSIWYG
												</a>
											</li>
											<li>
												<a href="form-summernote.html">
													WYSIWYG Summernote
												</a>
											</li>
											<li>
												<a href="form-ckeditor.html">
													WYSIWYG CKEditor
												</a>
											</li>
											<li>
												<a href="form-dropzone.html">
													Multiple File Upload
												</a>
											</li>
										</ul>
									</li>
									<li>
										<a href="#" class="dropdown-toggle">
											<i class="fa fa-desktop"></i>
											<span>UI Kit</span>
											<i class="fa fa-angle-right drop-icon"></i>
										</a>
										<ul class="submenu">
											<li>
												<a href="ui-elements.html">
													Elements
												</a>
											</li>
											<li>
												<a href="notifications.html">
													Notifications &amp; Alerts
												</a>
											</li>
											<li>
												<a href="modals.html">
													Modals
												</a>
											</li>
											<li>
												<a href="video.html">
													Video
												</a>
											</li>
											<li>
												<a href="#" class="dropdown-toggle">
													Icons
													<i class="fa fa-angle-right drop-icon"></i>
												</a>
												<ul class="submenu">
													<li>
														<a href="icons-awesome.html">
															Awesome Icons
														</a>
													</li>
													<li>
														<a href="icons-halflings.html">
															Halflings Icons
														</a>
													</li>
												</ul>
											</li>
											<li>
												<a href="ui-nestable.html">
													Nestable List
												</a>
											</li>
											<li>
												<a href="typography.html">
													Typography
												</a>
											</li>
											<li>
												<a href="#" class="dropdown-toggle">
													3 Level Menu
													<i class="fa fa-angle-right drop-icon"></i>
												</a>
												<ul class="submenu">
													<li>
														<a href="#">
															3rd Level
														</a>
													</li>
													<li>
														<a href="#">
															3rd Level
														</a>
													</li>
													<li>
														<a href="#">
															3rd Level
														</a>
													</li>
												</ul>
											</li>
										</ul>
									</li>
									<li>
										<a href="maps.html">
											<i class="fa fa-map-marker"></i>
											<span>Google Maps</span>
											<span class="label label-danger pull-right">Updated</span>
										</a>
									</li>
									<li>
										<a href="#" class="dropdown-toggle">
											<i class="fa fa-file-text-o"></i>
											<span>Extra pages</span>
											<i class="fa fa-angle-right drop-icon"></i>
										</a>
										<ul class="submenu">
											<li>
												<a href="faq.html">
													FAQ
												</a>
											</li>
											<li>
												<a href="emails.html">
													Email Templates
												</a>
											</li>
											<li>
												<a href="login.html">
													Login
												</a>
											</li>
											<li>
												<a href="login-full.html">
													Login Full
												</a>
											</li>
											<li>
												<a href="registration.html">
													Registration
												</a>
											</li>
											<li>
												<a href="registration-full.html">
													Registration Full
												</a>
											</li>
											<li>
												<a href="forgot-password.html">
													Forgot Password
												</a>
											</li>
											<li>
												<a href="forgot-password-full.html">
													Forgot Password Full
												</a>
											</li>
											<li>
												<a href="lock-screen.html">
													Lock Screen
												</a>
											</li>
											<li>
												<a href="lock-screen-full.html">
													Lock Screen Full
												</a>
											</li>
											<li>
												<a href="error-404.html">
													Error 404
												</a>
											</li>
											<li>
												<a href="error-404-v2.html">
													Error 404 Nested
												</a>
											</li>
											<li>
												<a href="error-500.html">
													Error 500
												</a>
											</li>
											<li>
												<a href="extra-grid.html">
													Grid
												</a>
											</li>
										</ul>
									</li>
									<li>
										<a href="/angularjs">
											<i class="fa fa-google"></i>
											<span>AngularJS Demo</span>
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
									<ol class="breadcrumb">
										<li><a href="#">Home</a></li>
										<li><a href="#"><span>Graphs</span></a></li>
										<li class="active"><span>Flot Charts</span></li>
									</ol>
									
									<h1>Flot Charts</h1>
								</div>
							</div>
							
							<div class="row">
								<div class="col-lg-12">
									<div class="main-box">
										<header class="main-box-header clearfix">
											<h2>Flot Bar chart</h2>
										</header>
										
										<div class="main-box-body clearfix">
											<div id="graph-bar" style="height: 300px; padding: 0px; position: relative;"></div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-lg-12">
									<div class="main-box">
										<header class="main-box-header clearfix">
											<h2>Flot Line chart</h2>
										</header>
										
										<div class="main-box-body clearfix">
											<div id="graph-flot-sin" style="height: 300px; padding: 0px; position: relative;"></div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-lg-6">
									<div class="main-box">
										<header class="main-box-header clearfix">
											<h2 class="pull-left">Stack charts</h2>
											
											<div class="icon-box pull-right">
												<p class="stackControls">
													<button class="btn">With stacking</button>
													<button class="btn">Without stacking</button>
												</p>
												<p class="graphControls">
													<button class="btn">Bars</button>
													<button class="btn">Lines</button>
													<button class="btn">Lines with steps</button>
												</p>
											</div>
										</header>
										
										<div class="main-box-body clearfix">
											<div id="graph-flot-stacking" style="height: 400px; padding: 0px; position: relative;"></div>
										</div>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="main-box">
										<header class="main-box-header clearfix">
											<h2>Horizontal bar charts</h2>
										</header>
										
										<div class="main-box-body clearfix">
											<div id="graph-flot-bar-horizontal" style="height: 435px; padding: 0px; position: relative;"></div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-lg-12">
									<div class="main-box">
										<header class="main-box-header clearfix">
											<h2>Realtime example</h2>
										</header>
										
										<div class="main-box-body clearfix">
											<div id="graph-flot-realtime" style="height: 400px; padding: 0px; position: relative;"></div>
											
											<br/>
											<p>
												You can update a chart periodically to get a real-time effect by using a timer to insert the new 
												data in the plot and redraw it.
											</p>
			
											<p>
												Time between updates: 
												<input id="updateInterval" class="form-control inline" type="text" value="" style="text-align: right; width:5em; display: inline-block;"> 
												milliseconds
											</p>
										</div>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-lg-6">
									<div class="main-box">
										<header class="main-box-header clearfix">
											<h2>Facebook fans</h2>
										</header>
										
										<div class="main-box-body clearfix">
											<div id="graph-flot-points" style="height: 400px; padding: 0px; position: relative;"></div>
										</div>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="main-box">
										<header class="main-box-header clearfix">
											<h2>Pie chart</h2>
										</header>
										
										<div class="main-box-body clearfix">
											<div id="graph-flot-donut" style="height: 400px; padding: 0px; position: relative;"></div>
										</div>
									</div>
								</div>
							</div>
							
						</div>
					</div>
					
					<footer id="footer-bar" class="row">
						<p id="footer-copyright" class="col-xs-12">
							Powered by Cube Theme.
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
					<a class="skin-changer" data-skin="theme-white" data-toggle="tooltip" title="White/Green" style="background-color: #8bc34a;">
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
					<a class="skin-changer" data-skin="theme-amethyst" data-toggle="tooltip" title="Amethyst" style="background-color: #9c27b0;">
					</a>
				</li>
				<li>
					<a class="skin-changer" data-skin="theme-blue" data-toggle="tooltip" title="Blue" style="background-color: #2980b9;">
					</a>
				</li>
				<li>
					<a class="skin-changer" data-skin="theme-red" data-toggle="tooltip" title="Red" style="background-color: #e84e40;">
					</a>
				</li>
				<li>
					<a class="skin-changer" data-skin="theme-whbl" data-toggle="tooltip" title="White/Blue" style="background-color: #03a9f4;">
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
	<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot/excanvas.min.js"></script><![endif]-->
	<script src="js/flot/jquery.flot.min.js"></script>
	<script src="js/flot/jquery.flot.pie.min.js"></script>
	
	<!-- theme scripts -->
	<script src="js/scripts.js"></script>
	<script src="js/pace.min.js"></script>
	
	<!-- this page specific inline scripts -->
	<script>
	$(function() {
		
		// bar chart
		if ($('#graph-bar').length) {
			var db1 = [];
			for (var i = 0; i <= 10; i += 1) {
				db1.push([i, parseInt(Math.random() * 30)]);
			}

			var db2 = [];
			for (var i = 0; i <= 10; i += 1) {
				db2.push([i, parseInt(Math.random() * 30)]);
			}

			var db3 = [];
			for (var i = 0; i <= 10; i += 1) {
				db3.push([i, parseInt(Math.random() * 30)]);
			}
			
			var series = new Array();

			series.push({
				data : db1,
				bars : {
					show : true,
					barWidth : 0.2,
					order : 1,
					lineWidth: 1,
					fill: 1
				}
			});
			series.push({
				data : db2,
				bars : {
					show : true,
					barWidth : 0.2,
					order : 2,
					lineWidth: 1,
					fill: 1
				}
			});
			series.push({
				data : db3,
				bars : {
					show : true,
					barWidth : 0.2,
					order : 3,
					lineWidth: 1,
					fill: 1
				}
			}); 

			$.plot("#graph-bar", series, {
				colors: ['#e84e40', '#ffc107', '#8bc34a', '#03a9f4', '#9c27b0', '#90a4ae'],
				grid: {
					tickColor: "#ddd",
					borderWidth: 0
				},
				shadowSize: 0
			});
		}
		
		// bar chart - horizontal
		if ($('#graph-flot-bar-horizontal').length) {
			var db1 = [];
			for (var i = 0; i <= 4; i += 1) {
				db1.push([parseInt(Math.random() * 30), i]);
			}

			var db2 = [];
			for (var i = 0; i <= 4; i += 1) {
				db2.push([parseInt(Math.random() * 30), i]);
			}

			var db3 = [];
			for (var i = 0; i <= 4; i += 1) {
				db3.push([parseInt(Math.random() * 30), i]);
			}
			
			var series = new Array();

			series.push({
				data : db1,
				bars : {
					show : true,
					barWidth : 0.2,
					order : 1,
					lineWidth: 1,
					horizontal: true,
					fill: 1
				}
			});
			series.push({
				data : db2,
				bars : {
					show : true,
					barWidth : 0.2,
					order : 2,
					lineWidth: 1,
					horizontal: true,
					fill: 1
				}
			});
			series.push({
				data : db3,
				bars : {
					show : true,
					barWidth : 0.2,
					order : 3,
					lineWidth: 1,
					horizontal: true,
					fill: 1
				}
			}); 

			$.plot("#graph-flot-bar-horizontal", series, {
				colors: ['#e84e40', '#ffc107', '#8bc34a', '#03a9f4', '#9c27b0', '#90a4ae'],
				grid: {
					tickColor: "#ddd",
					borderWidth: 0
				},
				shadowSize: 0
			});
		}
		
		// graph with points - sin/cos example
		if ($('#graph-flot-sin').length) {
			var sin = [],
				cos = [];

			for (var i = 0; i < 14; i += 0.5) {
				sin.push([i, Math.sin(i)]);
				cos.push([i, Math.cos(i)]);
			}

			var plot = $.plot("#graph-flot-sin", [
				{ data: sin, label: "sin(x)"},
				{ data: cos, label: "cos(x)"}
			], {
				series: {
					lines: {
						show: true,
						lineWidth: 2
					},
					points: {
						show: true
					}
				},
				grid: {
					hoverable: true,
					clickable: true,
					tickColor: "#ddd",
					borderWidth: 0
				},
				yaxis: {
					min: -1.2,
					max: 1.2
				},
				colors: ['#e84e40', '#8bc34a', '#ffc107', '#03a9f4', '#9c27b0', '#90a4ae'],
				shadowSize: 0
			});

			function showTooltip(x, y, contents) {
				$("<div id='tooltip'>" + contents + "</div>").css({
					position: "absolute",
					display: "none",
					top: y + 5,
					left: x + 5,
					border: "1px solid #fdd",
					padding: "2px",
					"background-color": "#fee",
					opacity: 0.80
				}).appendTo("body").fadeIn(200);
			}

			var previousPoint = null;
			$("#graph-flot-sin").bind("plothover", function (event, pos, item) {

				if ($("#enablePosition:checked").length > 0) {
					var str = "(" + pos.x.toFixed(2) + ", " + pos.y.toFixed(2) + ")";
					$("#hoverdata").text(str);
				}

				if ($("#enableTooltip:checked").length > 0) {
					if (item) {
						if (previousPoint != item.dataIndex) {

							previousPoint = item.dataIndex;

							$("#tooltip").remove();
							var x = item.datapoint[0].toFixed(2),
							y = item.datapoint[1].toFixed(2);

							showTooltip(item.pageX, item.pageY,
							    item.series.label + " of " + x + " = " + y);
						}
					} else {
						$("#tooltip").remove();
						previousPoint = null;            
					}
				}
			});

			$("#graph-flot-sin").bind("plotclick", function (event, pos, item) {
				if (item) {
					$("#clickdata").text(" - click point " + item.dataIndex + " in " + item.series.label);
					plot.highlight(item.series, item.datapoint);
				}
			});
		}

		// stack graph
		if ($('#graph-flot-stacking').length) {
			var d1 = [];
			for (var i = 0; i <= 10; i += 1) {
				d1.push([i, parseInt(Math.random() * 30)]);
			}

			var d2 = [];
			for (var i = 0; i <= 10; i += 1) {
				d2.push([i, parseInt(Math.random() * 30)]);
			}

			var d3 = [];
			for (var i = 0; i <= 10; i += 1) {
				d3.push([i, parseInt(Math.random() * 30)]);
			}

			var stack = 0,
				bars = true,
				lines = false,
				steps = false;

			function plotWithOptions() {
				$.plot("#graph-flot-stacking", [ d1, d2, d3 ], {
					series: {
						stack: stack,
						lines: {
							show: lines,
							fill: true,
							steps: steps,
							lineWidth: 1,
							fill: 1
						},
						bars: {
							show: bars,
							barWidth: 0.3,
							lineWidth: 1,
							fill: 1
						}
					},
					colors: ['#e84e40', '#ffc107', '#8bc34a', '#03a9f4', '#9c27b0', '#90a4ae'],
					grid: {
						tickColor: "#ddd",
						borderWidth: 0
					},
					shadowSize: 0
				});
			}

			plotWithOptions();

			$(".stackControls button").click(function (e) {
				e.preventDefault();
				stack = $(this).text() == "With stacking" ? true : null;
				plotWithOptions();
			});

			$(".graphControls button").click(function (e) {
				e.preventDefault();
				bars = $(this).text().indexOf("Bars") != -1;
				lines = $(this).text().indexOf("Lines") != -1;
				steps = $(this).text().indexOf("steps") != -1;
				plotWithOptions();
			});
		}

		// donut chart
		if ($('#graph-flot-donut').length) {
			var dataDonut = [
				{ label: "Series1",  data: 10},
				{ label: "Series2",  data: 30},
				{ label: "Series3",  data: 90},
				{ label: "Series4",  data: 70},
				{ label: "Series5",  data: 80},
				{ label: "Series6",  data: 110}
			];
			
			$.plot('#graph-flot-donut', dataDonut, {
			    series: {
			        pie: {
			            show: true,
			            innerRadius: 0.5,
			            label: {
			                show: true,
			            }
			        }
			    },
				colors: ['#e84e40', '#ffc107', '#8bc34a', '#03a9f4', '#9c27b0', '#90a4ae'],
			    legend: {
			        show: false,
			    }
			});
		}

		// graph with points
		if ($('#graph-flot-points').length) {
			var likes = [[1, 5], [2, 10], [3, 15], [4, 20],[5, 25],[6, 30],[7, 35],[8, 40],[9, 45],[10, 50],[11, 55],[12, 60],[13, 65],[14, 70],[15, 75],[16, 80],[17, 85],[18, 90],[19, 85],[20, 80],[21, 75],[22, 80],[23, 75],[24, 70],[25, 65],[26, 75],[27,80],[28, 85],[29, 90], [30, 95]];

			var plot = $.plot($("#graph-flot-points"),
				   [ { data: likes, label: "Fans"} ], {
					   series: {
						   lines: { 
							   show: true,
								lineWidth: 2,
								fill: true, 
								fillColor: { colors: [ { opacity: 0.3 }, { opacity: 0.3 } ] }
						 	},
						   points: { show: true, 
									 lineWidth: 2 
								 },
						   shadowSize: 0
					   },
					   grid: { hoverable: true, 
							   clickable: true, 
							   tickColor: "#f9f9f9",
							   borderWidth: 0
							 },
					   colors: ["#03a9f4"],
						xaxis: {ticks:6, tickDecimals: 0},
						yaxis: {ticks:3, tickDecimals: 0},
					 });

			function showTooltip(x, y, contents) {
				$('<div id="tooltip">' + contents + '</div>').css( {
					position: 'absolute',
					display: 'none',
					top: y + 5,
					left: x + 5,
					border: '1px solid #fdd',
					padding: '2px',
					'background-color': '#dfeffc',
					opacity: 0.80
				}).appendTo("body").fadeIn(200);
			}

			var previousPoint = null;
			$("#graph-flot-points").bind("plothover", function (event, pos, item) {
				$("#x").text(pos.x.toFixed(2));
				$("#y").text(pos.y.toFixed(2));

					if (item) {
						if (previousPoint != item.dataIndex) {
							previousPoint = item.dataIndex;

							$("#tooltip").remove();
							var x = item.datapoint[0].toFixed(2),
								y = item.datapoint[1].toFixed(2);

							showTooltip(item.pageX, item.pageY,
										item.series.label + " of " + x + " = " + y);
						}
					}
					else {
						$("#tooltip").remove();
						previousPoint = null;
					}
			});
		}

		// graph real time
		if ($('#graph-flot-realtime').length) {
		
			var data = [],
				totalPoints = 300;

			function getRandomData() {

				if (data.length > 0)
					data = data.slice(1);

				// Do a random walk

				while (data.length < totalPoints) {

					var prev = data.length > 0 ? data[data.length - 1] : 50,
						y = prev + Math.random() * 10 - 5;

					if (y < 0) {
						y = 0;
					} else if (y > 100) {
						y = 100;
					}

					data.push(y);
				}

				// Zip the generated y values with the x values

				var res = [];
				for (var i = 0; i < data.length; ++i) {
					res.push([i, data[i]])
				}

				return res;
			}

			// Set up the control widget

			var updateInterval = 30;
			$("#updateInterval").val(updateInterval).change(function () {
				var v = $(this).val();
				if (v && !isNaN(+v)) {
					updateInterval = +v;
					if (updateInterval < 1) {
						updateInterval = 1;
					} else if (updateInterval > 2000) {
						updateInterval = 2000;
					}
					$(this).val("" + updateInterval);
				}
			});

			var plot = $.plot("#graph-flot-realtime", [ getRandomData() ], {
				series: {
					lines: { 
						show: true,
						lineWidth: 2,
						fill: true, 
						fillColor: { colors: [ { opacity: 0.3 }, { opacity: 0.3 } ] }
					},
					shadowSize: 0	// Drawing is faster without shadows
				},
				colors: ["#e84e40"],
				yaxis: {
					min: 0,
					max: 100
				},
				xaxis: {
					show: false
				}
			});

			function update() {

				plot.setData([getRandomData()]);

				// Since the axes don't change, we don't need to call plot.setupGrid()

				plot.draw();
				setTimeout(update, updateInterval);
			}

			update();
		}
	});
	
	function labelFormatter(label, series) {
		return "<div style='font-size:8pt; text-align:center; padding:2px; color:white;'>" + label + "<br/>" + Math.round(series.percent) + "%</div>";
	}
	</script>
	
</body>
</html>