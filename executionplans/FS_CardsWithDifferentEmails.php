<?php
require('../frontend/dbconnect.php');

	$query1 = "INSERT INTO countstream (txnid, cardnum, counter, txnamt, currency, email, shippingaddress, billingaddress, ip,  itemNo, timestamp)
	SELECT DISTINCT txnid, cardnum, COUNT(email) AS counter, txnamt, currency, email, shippingaddress, billingaddress, ip,  itemNo, timestamp
	FROM transactions
	GROUP BY cardnum";

	mysqli_query($mysql_connect,$query1);
	$query3 = "INSERT INTO scorestream (txnid, cardnum, txnamt, currency, email, shippingaddress, billingaddress, ip, itemNo, timestamp, score)
	SELECT DISTINCT txnid, cardnum , txnamt, currency, email, shippingaddress, billingaddress, ip,  itemNo, timestamp,10.0 as score
	FROM countstream
	WHERE countstream.counter>1";
	mysqli_query($mysql_connect, $query3);
	$query4="INSERT INTO scorestream (txnid, cardnum, txnamt, currency, email, shippingaddress, billingaddress, ip, itemNo, timestamp, score)
	SELECT DISTINCT txnid, cardnum , txnamt, currency, email, shippingaddress, billingaddress, ip,  itemNo, timestamp,0.0 as score
	FROM countstream
	WHERE countstream.counter<=1";
	mysqli_query($mysql_connect, $query4);
	mysqli_close($mysql_connect);

echo "Cards with different emails with Fraud scores implemented";
?>