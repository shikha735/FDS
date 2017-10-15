<?php
require('../frontend/dbconnect.php');

	$query1 = "INSERT INTO countstream (txnid, cardnum, counter, txnamt, currency, email, shippingaddress, billingaddress, ip,  itemNo, timestamp)
	SELECT DISTINCT txnid, cardnum, COUNT(cardnum) AS counter, txnamt, currency, email, shippingaddress, billingaddress, ip,  itemNo, timestamp
	FROM transactions
	WHERE transactions.timestamp > DATE_SUB(NOW(), INTERVAL 12 HOUR)
	GROUP BY ip";

	$query3 = "INSERT INTO scorestream (txnid, cardnum, txnamt, currency, email, shippingaddress, billingaddress, ip, itemNo, timestamp, score)
	SELECT DISTINCT txnid, cardnum , txnamt, currency, email, shippingaddress, billingaddress, ip,  itemNo, timestamp,13.0 as score
	FROM countstream
	WHERE countstream.counter>3";
	mysqli_query($mysql_connect, $query3);
	$query4="INSERT INTO scorestream (txnid, cardnum, txnamt, currency, email, shippingaddress, billingaddress, ip, itemNo, timestamp, score)
	SELECT DISTINCT txnid, cardnum , txnamt, currency, email, shippingaddress, billingaddress, ip,  itemNo, timestamp,0.0 as score
	FROM countstream
	WHERE countstream.counter<=3";
	mysqli_query($mysql_connect, $query4);
	mysqli_close($mysql_connect);

echo "Single IP Multiple cards with Fraud scores implemented";
?>