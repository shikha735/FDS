<?php
require('../frontend/dbconnect.php');

	$query1 = "INSERT INTO fraudtxn (cardnum,txnamt,merchantid,terminalloc,terminalcountry,acquirercountry,acquirerid,currency,email,shippingaddress,shippingcountry,billingaddress,billingcountry,ip,itemNo,timestamp,txnid, score,fraudflag, rule_name)
    	SELECT transactions.cardnum,transactions.txnamt,transactions.merchantid,transactions.terminalloc,transactions.terminalcountry,transactions.acquirercountry,transactions.acquirerid,transactions.currency,transactions.email,transactions.shippingaddress,transactions.shippingcountry,transactions.billingaddress,transactions.billingcountry,transactions.ip,transactions.itemNo,transactions.timestamp, transactions.txnid, 0.0 as score, 1.0 as flag, 'Suspicious IP' as rule_name
        FROM transactions, suspiciousMail, suspiciousIp
        WHERE transactions.ip = suspiciousIp.ip GROUP BY transactions.txnid";
	mysqli_query($mysql_connect, $query1);

	$query2 = "INSERT INTO fraudtxn (cardnum,txnamt,merchantid,terminalloc,terminalcountry,acquirercountry,acquirerid,currency,email,shippingaddress,shippingcountry,billingaddress,billingcountry,ip,itemNo,timestamp,txnid, score,fraudflag, rule_name)
    	SELECT transactions.cardnum,transactions.txnamt,transactions.merchantid,transactions.terminalloc,transactions.terminalcountry,transactions.acquirercountry,transactions.acquirerid,transactions.currency,transactions.email,transactions.shippingaddress,transactions.shippingcountry,transactions.billingaddress,transactions.billingcountry,transactions.ip,transactions.itemNo,transactions.timestamp, transactions.txnid, 0.0 as score, 1.0 as flag, 'Suspicious mail' as rule_name
        FROM transactions, suspiciousMail, suspiciousIp
        WHERE transactions.email = suspiciousmail.email GROUP BY transactions.txnid";
	mysqli_query($mysql_connect, $query2);

	mysqli_close($mysql_connect);

echo "Suspicious Ip email implemented";
?>