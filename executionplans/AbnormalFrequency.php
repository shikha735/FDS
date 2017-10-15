<?php
require('../frontend/dbconnect.php');

	$query = "INSERT INTO tempfraud(txncounter, txnid, cardnum, txnamt, currency, email, shippingaddress, billingaddress, ip, itemno, timestamp, fraudflag)
SELECT COUNT(cardnum) AS counter,txnid, cardnum,  txnamt, currency, email, shippingaddress, billingaddress, ip,  itemNo, timestamp,1 as fraudflag
	FROM transactions
	GROUP BY cardnum";
	mysqli_query($mysql_connect, $query);
	$query1="INSERT INTO fraudtxn (cardnum,txnamt,merchantid,terminalloc,terminalcountry,acquirercountry,acquirerid,currency,email,shippingaddress,shippingcountry,billingaddress,billingcountry,ip,itemNo,timestamp,txnid, score, fraudflag, rule_name)
SELECT transactions.cardnum,transactions.txnamt,transactions.merchantid,transactions.terminalloc,transactions.terminalcountry,transactions.acquirercountry,transactions.acquirerid,transactions.currency,transactions.email,transactions.shippingaddress,transactions.shippingcountry,transactions.billingaddress,transactions.billingcountry,transactions.ip,transactions.itemNo,transactions.timestamp,transactions.txnid, 0.0 as score, 1 as fraudflag, 'Abnormal Frequency' as rule_name
FROM transactions, tempfraud
WHERE transactions.txnid = tempfraud.txnid AND tempfraud.txncounter > 5 
GROUP BY cardnum";
mysqli_query($mysql_connect, $query1);
	mysqli_close($mysql_connect);

echo "Abnormal Frequency implemented";
?>