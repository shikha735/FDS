<?php
$conn_error = 'Could not connect.';

$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_pass = '';

$mysql_connect = @mysqli_connect($mysql_host, $mysql_user, $mysql_pass);
$mysql_db = 'fds';

if(!@mysqli_connect($mysql_host, $mysql_user, $mysql_pass))
{
	die($conn_error);
}
else{
	$query = "INSERT INTO fraud.transactions (cardnum, txnamt, merchantid, terminalloc, terminalcountry, acquirercountry, acquirerid, currency, email, shippingaddress, shippingcountry, billingaddress, billingcountry, ip, itemNo, `timestamp`, `txnid`, phone, status) 
	SELECT cardnum, txnamt, merchantid, terminalloc, terminalcountry, acquirercountry, acquirerid, currency, email, shippingaddress, shippingcountry, billingaddress, billingcountry, ip, itemNo, `timestamp`, `txnid`, phone, status FROM bank.transactions";
	mysqli_query($mysql_connect, $query);
	mysqli_close($mysql_connect);
}
echo "Retrieved from bank servers";

?>