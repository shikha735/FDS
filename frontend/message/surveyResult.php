<?php
require('dbconnect.php');
require("checksession.php");
$r = $_GET['result'];
if($r=="yes")
{
	echo "Your account has been verified.";
}

if($r=="no")
{
	$cardnum = 1231456789109231;
	$query_block = "INSERT INTO blacklisted(cardnum) VALUES ('".$cardnum."')";
	mysqli_query($mysql_connect, $query_block);
	
	$query_add_user = "INSERT INTO `accounts`(`account_name`, `account_no`, `card_no`, `expiry_date`, `balance`, `email`)
					SELECT SUBSTRING_INDEX(email, '@', 1), SUBSTRING(cardnum,8,8), cardnum, CURDATE() + INTERVAL 3 YEAR, txnamt + 2000, email 
					FROM fraudtxn WHERE cardnum = 1231456789109231 LIMIT 1";
	mysqli_query($mysql_connect, $query_add_user);

	echo "Your account has been blocked";
 //echo "no";


/*$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_pass = '';

$mysql_connect = @mysqli_connect($mysql_host, $mysql_user, $mysql_pass);
$mysql_db = 'fraud';
echo "connected";
if(!@mysqli_connect($mysql_host, $mysql_user, $mysql_pass) || !@mysqli_select_db($mysql_connect, $mysql_db))
{
	die($conn_error);
}
$txnid=67;
$cardnum=3456782345;
$query = "INSERT INTO blacklisted VALUES ('".mysqli_real_escape_string($mysql_connect, $txnid)."',
'".mysqli_real_escape_string($mysql_connect, $cardnum)."')";
						
				    	if($query_run = mysqli_query($mysql_connect, $query))
					    {
						
					    	//echo 'values inserted';?>*/
					    	
					    
				    	
}
?>