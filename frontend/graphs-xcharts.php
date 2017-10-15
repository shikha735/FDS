<?php
require('dbconnect.php');
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
	<link rel="stylesheet" href="css/libs/xcharts.css" type="text/css" />

	<style>
	.xchart .errorLine path {
		stroke: #C6080D;
		stroke-width: 3px;
	}
	</style>
	
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
												12345432678434
											</span>
											<span class="content-text">
												Fraudulent activity identified
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
												1236789765434567
											</span>
											<span class="content-text">
												card has been blocked
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
												9876543456787654
											</span>
											<span class="content-text">
												suspicious activity verified
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
								<img src="img/samples/admin.jpg" alt=""/>
								<span class="hidden-xs">Admin</span> <b class="caret"></b>
							</a>
							<ul class="dropdown-menu dropdown-menu-right">
								<li><a href="user-profile.php"><i class="fa fa-user"></i>Profile</a></li>
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
								<img alt="" src="img/samples/admin.jpg" />
								<div class="user-box">
									<span class="name">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">
											Admin
											<i class="fa fa-angle-down"></i>
										</a>
										<ul class="dropdown-menu">
											<li><a href="user-profile.php"><i class="fa fa-user"></i>Profile</a></li>
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
										<a href="index.php">
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
												<a href="tables.php">
													Simple
												</a>
											</li>
											<li>
												<a href="tables-advanced.php">
													Advanced
												</a>
											</li>
											<li>
												<a href="users.php">
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
												<a href="email-inbox.php">
													Inbox
												</a>
											</li>
											<li>
												<a href="email-detail.php">
													Detail
												</a>
											</li>
											<li>
												<a href="temp/sendmail.php">
													Compose
												</a>
											</li>
										</ul>
									</li>
									<li class="active">
										<a href="graphs-xcharts.php" class="dropdown-toggle">
											<i class="fa fa-bar-chart-o"></i>
											<span>Graphs</span>
											<i class="fa fa-angle-right drop-icon"></i>
										</a>
										
									</li>
									
									
									
									
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
										<li class="active"><span>xCharts Graphs</span></li>
									</ol>
									
									<h1>xCharts Graphs</h1>
								</div>
							</div>
							
							<div class="row">
								<div class="col-lg-12">
									<div class="main-box">
										<header class="main-box-header clearfix">
											<h2>Weekly stats</h2>
										</header>
										
										<div class="main-box-body clearfix">
											<img alt="" src="img/amount_img.png" />
										</div>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-lg-12">
									<div class="main-box">
										<header class="main-box-header clearfix">
											<h2>Time-Series Line</h2>
										</header>
										
										<div class="main-box-body clearfix">
											<img alt="" src="img/amount_img.png" />
										</div>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-lg-6">
									<div class="main-box">
										<header class="main-box-header clearfix">
											<h2>Your Basic Bar Chart</h2>
										</header>
										
										<div class="main-box-body clearfix">
											<img alt="" src="img/time_amount_img.png" />
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
	<script src="js/d3.min.js"></script>
	<script src="js/xcharts.js"></script>
	<script src="js/rainbow.min.js"></script>
	
	<!-- theme scripts -->
	<script src="js/scripts.js"></script>
	<script src="js/pace.min.js"></script>
	
	<!-- this page specific inline scripts -->
	<script>
	$(function () {
		
		/* Time-Series Line */
		var tt = document.createElement('div'),
			leftOffset = -(~~$('html').css('padding-left').replace('px', '') + ~~$('body').css('margin-left').replace('px', '')),
			topOffset = -32;
		tt.className = 'ex-tooltip';
		document.body.appendChild(tt);
	
		var data = {
			"xScale": "time",
			"yScale": "linear",
			"main": [
			{
				"className": ".pizza",
				"data": [
				{
					"x": "2012-11-05",
					"y": 6
				},
				{
					"x": "2012-11-06",
					"y": 6
				},
				{
					"x": "2012-11-07",
					"y": 8
				},
				{
					"x": "2012-11-08",
					"y": -3
				},
				{
					"x": "2012-11-09",
					"y": 4
				},
				{
					"x": "2012-11-10",
					"y": 9
				},
				{
					"x": "2012-11-11",
					"y": 6
				}
				]
			}
			]
		};
		var opts = {
			"dataFormatX": function (x) { return d3.time.format('%Y-%m-%d').parse(x); },
			"tickFormatX": function (x) { return d3.time.format('%A')(x); },
			"mouseover": function (d, i) {
			var pos = $(this).offset();
			$(tt).text(d3.time.format('%A')(d.x) + ': ' + d.y)
				.css({top: topOffset + pos.top, left: pos.left + leftOffset})
				.show();
			},
			"mouseout": function (x) {
			$(tt).hide();
			}
		};
		var myChart = new xChart('line-dotted', data, '#graph-xchart-line', opts);
	
		/* Your Basic Bar Chart */
	
		var data = {
			"xScale": "ordinal",
			"yScale": "linear",
			"main": [
			{
				"className": ".pizza",
				"data": [
				{
					"x": "Pepperoni",
					"y": 4
				},
				{
					"x": "Cheese",
					"y": 8
				}
				]
			}
			]
		};
		var myChart = new xChart('bar', data, '#graph-xchart-bar');
		
		/* Error bars */
		
		var errorBar = {
			enter: function (self, storage, className, data, callbacks) {
				var insertionPoint = xChart.visutils.getInsertionPoint(9),
				container,
				eData = data.map(function (d) {
					d.data = d.data.map(function (d) {
					return [{x: d.x, y: d.y - d.e}, {x: d.x, y: d.y}, {x: d.x, y: d.y + d.e}];
					});
					return d;
				}),
				paths;

				container = self._g.selectAll('.errorLine' + className)
				.data(eData, function (d) {
					return d.className;
				});

				container.enter().insert('g', insertionPoint)
				.attr('class', function (d, i) {
					return 'errorLine' + className.replace(/\./g, ' ') + ' color' + i;
				});

				paths = container.selectAll('path')
				.data(function (d) {
					return d.data;
				}, function (d) {
					return d[0].x;
				});

				paths.enter().insert('path')
				.style('opacity', 0)
				.attr('d', d3.svg.line()
					.x(function (d) {
					return self.xScale(d.x) + self.xScale.rangeBand() / 2;
					})
					.y(function (d) { return self.yScale(d.y); })
				);

				storage.containers = container;
				storage.paths = paths;
			},
			update: function (self, storage, timing) {
				storage.paths.transition().duration(timing)
				.style('opacity', 1)
				.attr('d', d3.svg.line()
					.x(function (d) {
					return self.xScale(d.x) + self.xScale.rangeBand() / 2;
					})
					.y(function (d) { return self.yScale(d.y); })
				);
			},
			exit: function (self, storage, timing) {
				storage.paths.exit()
				.transition().duration(timing)
				.style('opacity', 0);
			},
			destroy: function (self, storage, timing) {
				storage.paths.transition().duration(timing)
				.style('opacity', 0)
				.remove();
			}
		};

		xChart.setVis('error', errorBar);

		var data2 = [{
			"xScale": "ordinal",
			"yScale": "linear",
			"main": [
			{
				"className": ".errorExample",
				"data": [
				{
					"x": "Ponies",
					"y": 12
				},
				{
					"x": "Unicorns",
					"y": 23
				},
				{
					"x": "Trolls",
					"y": 1
				}
				]
			}
			],
			"comp": [
			{
				"type": "error",
				"className": ".comp.errorBar",
				"data": [
				{
					"x": "Ponies",
					"y": 12,
					"e": 5
				},
				{
					"x": "Unicorns",
					"y": 23,
					"e": 2
				},
				{
					"x": "Trolls",
					"y": 1,
					"e": 1
				}
				]
			}
			]
		},
		{
			"xScale": "ordinal",
			"yScale": "linear",
			"main": [
			{
				"className": ".errorExample",
				"data": [
				{
					"x": "Ponies",
					"y": 76
				},
				{
					"x": "Unicorns",
					"y": 45
				},
				{
					"x": "Trolls",
					"y": 82
				}
				]
			}
			],
			"comp": [
			{
				"type": "error",
				"className": ".comp.errorBar",
				"data": [
				{
					"x": "Ponies",
					"y": 76,
					"e": 12
				},
				{
					"x": "Unicorns",
					"y": 45,
					"e": 3
				},
				{
					"x": "Trolls",
					"y": 82,
					"e": 12
				}
				]
			}
			]
		}
		];

		var myChart = new xChart('bar', data2[0], '#graph-xchart-error-bar'),
		i = 0;
			
		/* First demo chart */	
				
		var data = [{"xScale":"ordinal","comp":[],"main":[{"className":".main.l1","data":[{"y":15,"x":"2012-11-19T00:00:00"},{"y":11,"x":"2012-11-20T00:00:00"},{"y":8,"x":"2012-11-21T00:00:00"},{"y":10,"x":"2012-11-22T00:00:00"},{"y":1,"x":"2012-11-23T00:00:00"},{"y":6,"x":"2012-11-24T00:00:00"},{"y":8,"x":"2012-11-25T00:00:00"}]},{"className":".main.l2","data":[{"y":29,"x":"2012-11-19T00:00:00"},{"y":33,"x":"2012-11-20T00:00:00"},{"y":13,"x":"2012-11-21T00:00:00"},{"y":16,"x":"2012-11-22T00:00:00"},{"y":7,"x":"2012-11-23T00:00:00"},{"y":18,"x":"2012-11-24T00:00:00"},{"y":8,"x":"2012-11-25T00:00:00"}]}],"type":"line-dotted","yScale":"linear"},{"xScale":"ordinal","comp":[],"main":[{"className":".main.l1","data":[{"y":12,"x":"2012-11-19T00:00:00"},{"y":18,"x":"2012-11-20T00:00:00"},{"y":8,"x":"2012-11-21T00:00:00"},{"y":7,"x":"2012-11-22T00:00:00"},{"y":6,"x":"2012-11-23T00:00:00"},{"y":12,"x":"2012-11-24T00:00:00"},{"y":8,"x":"2012-11-25T00:00:00"}]},{"className":".main.l2","data":[{"y":29,"x":"2012-11-19T00:00:00"},{"y":33,"x":"2012-11-20T00:00:00"},{"y":13,"x":"2012-11-21T00:00:00"},{"y":16,"x":"2012-11-22T00:00:00"},{"y":7,"x":"2012-11-23T00:00:00"},{"y":18,"x":"2012-11-24T00:00:00"},{"y":8,"x":"2012-11-25T00:00:00"}]}],"type":"cumulative","yScale":"linear"},{"xScale":"ordinal","comp":[],"main":[{"className":".main.l1","data":[{"y":12,"x":"2012-11-19T00:00:00"},{"y":18,"x":"2012-11-20T00:00:00"},{"y":8,"x":"2012-11-21T00:00:00"},{"y":7,"x":"2012-11-22T00:00:00"},{"y":6,"x":"2012-11-23T00:00:00"},{"y":12,"x":"2012-11-24T00:00:00"},{"y":8,"x":"2012-11-25T00:00:00"}]},{"className":".main.l2","data":[{"y":29,"x":"2012-11-19T00:00:00"},{"y":33,"x":"2012-11-20T00:00:00"},{"y":13,"x":"2012-11-21T00:00:00"},{"y":16,"x":"2012-11-22T00:00:00"},{"y":7,"x":"2012-11-23T00:00:00"},{"y":18,"x":"2012-11-24T00:00:00"},{"y":8,"x":"2012-11-25T00:00:00"}]}],"type":"bar","yScale":"linear"}];
		var order = [2, 0, 1, 0],
		i = 0,
		xFormat = d3.time.format('%A'),
		chartDemo = new xChart('line-dotted', data[order[i]], '#graph-xchart-demo', {
			axisPaddingTop: 5,
			dataFormatX: function (x) {
			return new Date(x);
			},
			tickFormatX: function (x) {
			return xFormat(x);
			},
			timing: 1250
		}),
		rotateTimer,
		toggles = d3.selectAll('.multi button'),
		t = 3500;

		function updateChart(i) {
			var d = data[i];
			chartDemo.setData(d);
			toggles.classed('toggled', function () {
				return (d3.select(this).attr('data-type') === d.type);
			});
			return d;
		}

		toggles.on('click', function (d, i) {
			clearTimeout(rotateTimer);
			updateChart(i);
		});

		function rotateChart() {
			i += 1;
			i = (i >= order.length) ? 0 : i;
			var d = updateChart(order[i]);
			rotateTimer = setTimeout(rotateChart, t);
		}
		rotateTimer = setTimeout(rotateChart, t);
	});
	</script>
	
</body>
</html>