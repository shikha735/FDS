<?php
require('../frontend/dbconnect.php');

	$query = "INSERT INTO countsimc (txnid, cardnum, counter, txnamt, currency, email, shippingaddress, billingaddress, ip,  itemNo, timestamp)
	SELECT DISTINCT txnid, cardnum, COUNT(cardnum) AS counter, txnamt, currency, email, shippingaddress, billingaddress, ip,  itemNo, timestamp
	FROM transactions
	GROUP BY ip";
	mysqli_query($mysql_connect, $query);
		$query3 = "INSERT INTO fraudtxn (cardnum,txnamt,merchantid,terminalloc,terminalcountry,acquirercountry,acquirerid,currency,email,shippingaddress,shippingcountry,billingaddress,billingcountry,ip,itemNo,timestamp,txnid, score, fraudflag, rule_name)
SELECT transactions.cardnum,transactions.txnamt,transactions.merchantid,transactions.terminalloc,transactions.terminalcountry,transactions.acquirercountry,transactions.acquirerid,transactions.currency,transactions.email,transactions.shippingaddress,transactions.shippingcountry,transactions.billingaddress,transactions.billingcountry,transactions.ip,transactions.itemNo,transactions.timestamp, transactions.txnid, 0.0 as score, 1 as fraudflag, 'Single IP Multiple Cards' as rule_name
FROM transactions, countsimc
WHERE transactions.txnid = countsimc.txnid AND counter > 3
GROUP BY cardnum";
	mysqli_query($mysql_connect, $query3);
	mysqli_close($mysql_connect);


echo "Single ip multiple cards implemented";
?>