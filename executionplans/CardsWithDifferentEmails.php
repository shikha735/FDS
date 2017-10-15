<?php
require('../frontend/dbconnect.php');

	$query1 = "INSERT INTO countstream (txnid, cardnum, counter, txnamt, currency, email, shippingaddress, billingaddress, ip,  itemNo, timestamp)
	SELECT txnid, cardnum, COUNT(email) AS counter, txnamt, currency, email, shippingaddress, billingaddress, ip,  itemNo, timestamp
	FROM transactions
	GROUP BY cardnum
	";

	$query2 = "INSERT INTO fraudtxn (cardnum,txnamt,merchantid,terminalloc,terminalcountry,acquirercountry,acquirerid,currency,email,shippingaddress,shippingcountry,billingaddress,billingcountry,ip,itemNo,timestamp,txnid, score, fraudflag, rule_name)
SELECT transactions.cardnum,transactions.txnamt,transactions.merchantid,transactions.terminalloc,transactions.terminalcountry,transactions.acquirercountry,transactions.acquirerid,transactions.currency,transactions.email,transactions.shippingaddress,transactions.shippingcountry,transactions.billingaddress,transactions.billingcountry,transactions.ip,transactions.itemNo,transactions.timestamp,transactions.txnid, 0.0 as score, 1 as fraudflag, 'Card With Different Emails' as rule_name
FROM transactions, countstream
WHERE transactions.txnid = countstream.txnid AND counter > 1
GROUP BY cardnum";

	mysqli_query($mysql_connect, $query1);
	// echo "Query 1 executed";
	mysqli_query($mysql_connect, $query2);
	// echo "Query 2 executed";
	mysqli_close($mysql_connect);

echo "Cards with different emails implemented";
?>