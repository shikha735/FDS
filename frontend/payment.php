<?php
	if(isset($_POST['cardnumber']) && isset($_POST['amount']) && isset($_POST['cvvnumber']) &&  isset($_POST['date']) && isset($_POST['pin']))
	{
		// echo "Submitted!";

		/*$cardnumber = $_POST['cardnumber'];
		$amount=$_POST['amount'];
		$cvvnumber=$_POST['cvvnumber'];
		$date=$_POST['date'];
		$password=$['password'];
		$query = "SELECT u FROM bankers WHERE username='".$username."'";
		$query_run = mysqli_query($mysql_connect, $query);
					$query_num_rows = mysqli_num_rows($query_run);
					if($query_num_rows>=1)
					{
						echo "welcome";
					}
					else
					{
						$query = "INSERT INTO bankers (answer1,answer2,answer3) VALUES ('".mysqli_real_escape_string($mysql_connect, $answer1)."','".mysqli_real_escape_string($mysql_connect, $answer2)."','".mysqli_real_escape_string($mysql_connect, $answer3)."') where username='".$username."'";
						$query = "SELECT *FROM bankers";
						if($query_run = mysqli_query($mysql_connect, $query))
						{
							header('Location: register_success.php');
						}
						else
						{
							echo 'Sorry, we couldn\'t register you at this time. Try again later.';
						}*/
	}
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Payment</title>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.min.css" />

	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,600,700,300|Titillium+Web:200,300,400' rel='stylesheet' type='text/css'>

	<link type="image/x-icon" href="favicon.png" rel="shortcut icon"/>

	<!-- global styles -->
	<link rel="stylesheet" type="text/css" href="css/compiled/theme_styles.css" />

	<!--jquery-->
	<script type="text/javascript" src="js/jquery.min.js"></script>

	<!-- Isolated Version of Bootstrap, not needed if your site already uses Bootstrap -->
	<link rel="stylesheet" href="css/bootstrap-iso.css" />

	<!-- Bootstrap Date-Picker Plugin -->
	<script type="text/javascript" src="js/bootstrap-datepicker.min.js"></script>
	<link rel="stylesheet" href="css/bootstrap-datepicker3.css"/>

	<!-- google font libraries -->
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,600,700,300|Titillium+Web:200,300,400' rel='stylesheet' type='text/css'>
	
	<!-- Favicon -->
	<link type="image/x-icon" href="favicon.png" rel="shortcut icon"/>
</head>
<body>
	<!--<div class="bootstrap-iso">-->
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6 col-sm-8 col-xs-12 col-md-offset-3 col-sm-offset-2">
				<div class="panel panel-primary" style="margin: 80px;">
					<header id="login-header">
						<div id="login-logo">
							<img src="img/logo.png" alt=""/>
						</div>
					</header>
	 				<div class="panel-heading text-center">Payment Form</div>
  						<div class="panel-body">
						    <!-- Form code begins -->
						    <form method="POST" id="paymentform" class="form-horizontal" action="payment.php">
						    	<div class="form-group">
						      		<label class="col-sm-3 control-label" for="cardnumber">Card Number </label>
						      		<div class="col-sm-8">
						      			<input class="form-control" id="cardnumber" name="cardnumber" type="text" placeholder="Enter Card Number">
						      		</div>
						      	</div>
						      	<div class="form-group">
						      		<label class="col-sm-3 control-label" for="amount">Amount </label>
						      		<div class="col-sm-8">
						      			<input class="form-control" name="amount" id="amount" type="text" placeholder="Enter Amount">
						      		</div>
						      	</div>
						      	<div class="form-group">
						      		<label class="col-sm-3 control-label" for="cvvnumber">CVV number </label>
						      		<div class="col-sm-8">
						      			<input class="form-control" name="cvvnumber" id="cvvnumber" type="password" placeholder="Enter CVV Number">
						      		</div>
						      	</div>
						      	<div class="form-group">
						       		<!-- Date input -->
						        	<label class="col-sm-3 control-label" for="date">Expiry Date</label>
						        	<div class="col-sm-8">
						        		<input class="form-control" id="date" name="date" placeholder="MM/DD/YYYY" type="text"/>
						        	</div>
						        </div>
						        <div class="form-group">
						        	<label class="col-sm-3 control-label" for="pin">Pin</label>
						        	<div class="col-sm-8">
						        		<input type="password" name="pin" id="pin" class="form-control" placeholder="Enter pin">
						        	</div>
						    	</div>
						      	<div class="row"> <!-- Submit button -->
						      		<div class="col-xs-8 col-xs-offset-4">
						        		<input  class="btn btn-primary col-xs-6" style="background-color: #347AB6;" id="submitbutton" name="submit" type="submit" value="Submit">
						        	</div>
						    	</div>
						    </form>
						    <!-- Form code ends --> 
			    		</div>
			    	</div>
			    </div>
			</div>
		</div>
	</div>


	<script>
	    $(document).ready(

	    	function(){
		      var date_input=$('input[name="date"]'); //our date input has the name "date"
		      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		      var options={
		        format: 'mm/dd/yyyy',
		        container: container,
		        todayHighlight: true,
		        autoclose: true,
	    	};
	      date_input.datepicker(options);
	    });

	    function validateFields(id){
	    	if($("#"+id).val() == null || $("#"+id).val() == ""){
	    		var div = $("#"+id).closest("div");
	    		div.removeClass("has-success");
	    		$("#glypcn"+id).remove();
	    		div.addClass("has-feedback has-error");
	    		div.append('<span id="glypcn'+id+'" class="glyphicon glyphicon-remove form-control-feedback"></span>')
	    		return false;
	    	}
	    	else{
	    		var div = $("#"+id).closest("div");
	    		div.removeClass("has-error");
	    		div.addClass("has-feedback has-success");
	    		$("#glypcn"+id).remove();
	    		div.append('<span id="glypcn'+id+'" class="glyphicon glyphicon-ok form-control-feedback"></span>')
	    		return true;
	    	}
	    }
		
	    function validateCardNumber(id) {
	    	// alert("validateCardNumber function");
	    	var number = $("#"+id).val();
	        var regex = new RegExp("^[0-9]{16}$");
	        if (!regex.test(number))
	            return false;

	        return luhnCheck(number);
	    }

	    function luhnCheck(val) {
	        var sum = 0;
	        for (var i = 0; i < val.length; i++) {
	            var intVal = parseInt(val.substr(i, 1));
	            if (i % 2 == 0) {
	                intVal *= 2;
	                if (intVal > 9) {
	                    intVal = 1 + (intVal % 10);
	                }
	            }
	            sum += intVal;
	        }
	        return (sum % 10) == 0;
	    }
		   function validatecvvnumber(id) {
	    	alert("validatecvvnumber function");
	    	var number = $("#"+id).val();
	        var regex = new RegExp("^[0-9]{3}$");
	        if (!regex.test(number))
	            return false;

	        return luhnCheck(number);
	    }


	    $(document).ready(
	    	function(){
		    	$("#submitbutton").click(function(){
		    		if(!validateFields("cardnumber") /*|| !validateCardNumber("cardnumber")*/){
		    			return false;
		    		}
		    		if(!validateFields("amount")){
		    			return false;
		    		}
		    		if(!validateFields("cvvnumber")){
		    			return false;
		    		}
		    		if(!validateFields("date")){
		    			return false;
		    		}
		    		if(!validateFields("pin")){
		    			return false;
		    		}
		    		$("form#paymentform").submit();
		    	});
		    }
	    );
	</script>
</body>
</html>