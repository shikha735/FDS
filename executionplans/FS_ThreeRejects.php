<?php
require('../frontend/dbconnect.php');

	// count rejected transactions and store it in fraudcount table
	$query1 = "INSERT INTO fraudcount (cardnum, rtcount)
	SELECT cardnum, count(*)
	FROM rejectedtxns
	GROUP BY cardnum
	";

	mysqli_query($mysql_connect, $query1);

	$query2 = "INSERT INTO scorestream (txnid, cardnum, txnamt, currency, email, shippingaddress, billingaddress, ip, itemNo, timestamp, score)
SELECT transactions.txnid, transactions.cardnum, txnamt, currency, email, shippingaddress, billingaddress, ip, itemNo, timestamp,  15.0 as score
FROM transactions, fraudcount
WHERE transactions.cardnum = fraudcount.CARDNUM  AND rtcount >= 3";
	mysqli_query($mysql_connect, $query2);

	$query3 = "INSERT INTO scorestream (txnid, cardnum, txnamt, currency, email, shippingaddress, billingaddress, ip, itemNo, timestamp, score)
SELECT transactions.txnid, transactions.cardnum, txnamt, currency, email, shippingaddress, billingaddress, ip, itemNo, timestamp,  0.0 as score
FROM transactions, fraudcount
WHERE transactions.cardnum NOT IN (SELECT CARDNUM FROM fraudcount)";
	mysqli_query($mysql_connect, $query3);
	mysqli_close($mysql_connect);

echo "Three rejects with fraud scores implemented";
?>