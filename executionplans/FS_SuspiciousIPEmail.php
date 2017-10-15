<?php
require('../frontend/dbconnect.php');

	$query1 = "INSERT INTO scoreStream (txnid, cardnum, txnamt, currency, email, shippingaddress, billingaddress, ip, itemNo, timestamp, score)
SELECT DISTINCT txnid, cardnum, txnamt, currency, email, shippingaddress, billingaddress, transactions.ip, itemNo, timestamp, 10.0 as score
FROM transactions, suspiciousip
WHERE transactions.ip = suspiciousIP.ip";
	mysqli_query($mysql_connect, $query1);

	$query2 = "INSERT INTO scoreStream (txnid, cardnum, txnamt, currency, email, shippingaddress, billingaddress, ip, itemNo, timestamp, score)
SELECT DISTINCT txnid, cardnum, txnamt, currency, transactions.email, shippingaddress, billingaddress, transactions.ip, itemNo, timestamp, 10.0 as score
FROM transactions, suspiciousmail
WHERE transactions.email = suspiciousmail.email";
	mysqli_query($mysql_connect, $query2);

	$query3 = "INSERT INTO scoreStream (txnid, cardnum, txnamt, currency, email, shippingaddress, billingaddress, ip, itemNo, timestamp, score)
SELECT DISTINCT txnid, cardnum, txnamt, currency, transactions.email, shippingaddress, billingaddress, transactions.ip, itemNo, timestamp, 0.0 as score
FROM transactions, suspiciousmail
WHERE transactions.email NOT IN (SELECT email FROM suspiciousmail)
	AND transactions.ip NOT IN (SELECT ip FROM suspiciousip)";
	mysqli_query($mysql_connect, $query3);

	mysqli_close($mysql_connect);

echo "Suspicious Ip email with fraud scores implemented";
?>