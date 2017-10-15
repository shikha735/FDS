<?php
require('../frontend/dbconnect.php');

	$query1 = "INSERT INTO tempfraud(txnid, cardnum, txncounter, txnamt, currency, email, shippingaddress, billingaddress, ip,  itemNo, timestamp)
	SELECT DISTINCT txnid, cardnum, COUNT(cardnum) AS counter, txnamt, currency, email, shippingaddress, billingaddress, ip,  itemNo, timestamp
	FROM transactions
	GROUP BY cardnum;
	";
	mysqli_query($mysql_connect, $query1);
	$query3 = "INSERT INTO scorestream (txnid, cardnum, txnamt, currency, email, shippingaddress, billingaddress, ip, itemNo, timestamp, score)
	SELECT DISTINCT txnid, cardnum , txnamt, currency, email, shippingaddress, billingaddress, ip,  itemNo, timestamp,5.0 as score
	FROM tempfraud
	WHERE tempfraud.txncounter>5";
	mysqli_query($mysql_connect, $query3);
	$query4="INSERT INTO scorestream (txnid, cardnum, txnamt, currency, email, shippingaddress, billingaddress, ip, itemNo, timestamp, score)
	SELECT DISTINCT txnid, cardnum , txnamt, currency, email, shippingaddress, billingaddress, ip,  itemNo, timestamp,0.0 as score
	FROM tempfraud
	WHERE tempfraud.txncounter<=5";
	mysqli_query($mysql_connect, $query4);
	mysqli_close($mysql_connect);

echo "Abnormal Frequency with Fraud scores implemented";
?>