<?php
require('../frontend/dbconnect.php');

	// count rejected transactions and store it in fraudcount table
	$query1 = "INSERT INTO fraudcount (cardnum, rtcount)
	SELECT cardnum, count(*)
	FROM rejectedtxns
	GROUP BY cardnum
	";

	mysqli_query($mysql_connect, $query1);

	$query2 = "INSERT INTO fraudtxn (cardnum,txnamt,merchantid,terminalloc,terminalcountry,acquirercountry,acquirerid,currency,email,shippingaddress,shippingcountry,billingaddress,billingcountry,ip,itemNo,timestamp,txnid, score, fraudflag, rule_name)
	SELECT transactions.cardnum,transactions.txnamt,transactions.merchantid,transactions.terminalloc,transactions.terminalcountry,transactions.acquirercountry,transactions.acquirerid,transactions.currency,transactions.email,transactions.shippingaddress,transactions.shippingcountry,transactions.billingaddress,transactions.billingcountry,transactions.ip,transactions.itemNo,transactions.timestamp, transactions.txnid, 0.0 as score, 1 as fraudflag, 'Three Rejects' as rule_name
	FROM transactions, fraudcount
	WHERE transactions.cardnum = fraudcount.cardnum
    ORDER BY timestamp DESC LIMIT 3
	";

	mysqli_query($mysql_connect, $query2);

	mysqli_close($mysql_connect);

echo "Three rejects implemented";
?>