<?php
$conn_error = 'Could not connect.';

$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_pass = '';

$mysql_connect = @mysqli_connect($mysql_host, $mysql_user, $mysql_pass);
$mysql_db = 'fraud';

if(!@mysqli_connect($mysql_host, $mysql_user, $mysql_pass))
{
	die($conn_error);
}
else{
	$query = "INSERT INTO fraudtxn (cardnum,txnamt,merchantid,terminalloc,terminalcountry,acquirercountry,acquirerid,currency,email,shippingaddress,shippingcountry,billingaddress,billingcountry,ip,itemNo,timestamp,txnid, score,fraudflag)
              SELECT transactions.cardnum,transactions.txnamt,transactions.merchantid,transactions.terminalloc,transactions.terminalcountry,transactions.acquirercountry,transactions.acquirerid,transactions.currency,transactions.email,transactions.shippingaddress,transactions.shippingcountry,transactions.billingaddress,transactions.billingcountry,transactions.ip,transactions.itemNo,transactions.timestamp,transactions.txnid, 0.0 as score, 1.0 as flag
              FROM transactions, blacklisted
              WHERE transactions.cardnum = blacklisted.cardnum";
	mysqli_query($mysql_connect, $query);
	mysqli_close($mysql_connect);
}
?>