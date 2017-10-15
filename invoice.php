<?php
require('./frontend/dbconnect.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Security Alert</title>
	
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

	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			
			<div class="row">
				<div class="col-lg-12">
					<br/>
					<h1>Security Alert</h1>
				</div>
			</div>
			
			<div class="row">
					<div class="main-box clearfix">
						<header class="main-box-header clearfix" style="background-color:#FF070B"><br/>
							 <h1 class="pull-left" style="color:#FFFFFF">Suspicious transaction identified</h1> 
						
						</header>
						
						<div class="main-box-body clearfix">
							<div id="invoice-companies" class="row">
								<div class="col-sm-6 invoice-box">
									<div class="invoice-icon hidden-sm">
										<i class="fa fa-home"></i> From
									</div>
									<div class="invoice-company">
										<h4>Scarlett Johansson</h4>
										<p>
											10880 Malibu Point,<br/>
											Malibu, Calif., 90265<br/>
											USA
										</p>
									</div>
								</div>
								<div class="col-sm-6 invoice-box invoice-box-dates">
									<div class="invoice-dates">
										<div class="invoice-number clearfix">
											<strong>Transaction id.</strong>
											<span class="pull-right"> 20140566 </span>
										</div>
										<div class="invoice-date clearfix">
											<strong>Date:</strong>
											<span class="pull-right"> 12/04/2014  </span>
										</div>
										<!--<div class="invoice-date invoice-due-date clearfix">
											<strong>Due date:</strong>
											<span class="pull-right">12/05/2014</span>
										</div>-->
									</div>
								</div>
							</div>
							
							
							<div class="invoice-summary row ">
								<div class="col-md-6 col-md-offset-3">
									<div class="invoice-summary-item">
										<span>Account No.</span>
										<div>IBAN 12345678900</div>
									</div>
								</div>
								<!-- <div class="col-md-3 col-sm-6 col-xs-12">
									<div class="invoice-summary-item">
										<span>Invoice No.</span>
										<div>20140566</div>
									</div>
								</div>
								<div class="col-md-3 col-sm-6 col-xs-12">
									<div class="invoice-summary-item">
										<span>Due Date</span>
										<div>12/05/2014</div>
									</div>
								</div> -->
								<div class="col-md-6 col-md-offset-3">
									<div class="invoice-summary-item">
										<span>Transaction Amount</span>
										<div>&dollar; 8550.91</div>
									</div>
								</div>
							</div>
							
							<div class="clearfix" align="center">
	                        <h2> <b> Are you aware of this transaction? </b> <h2/> <br/>
								<a href="http://localhost/fds/frontend/temp/surveyResult.php?result=yes" class="btn btn-success">
									Yes
								</a>
	                            <a href="http://localhost/fds/frontend/temp/surveyResult.php?result=no" class="btn btn-success">
									NO
								</a>
								<div><textarea name="message" placeholder="enter your feedback"></textarea></div>
								
								
							</div>
							
						</div>
					</div>
			</div>
			
		</div>
	</div>	

	<!-- global scripts -->
	<script src="js/demo-skin-changer.js"></script> <!-- only for demo -->
	
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/jquery.nanoscroller.min.js"></script>
	
	<script src="js/demo.js"></script> <!-- only for demo -->

	
</body>
</html>