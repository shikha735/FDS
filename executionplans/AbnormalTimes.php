<?php
require('../frontend/dbconnect.php');

	$query = "INSERT INTO fraudtxn (cardnum,txnamt,merchantid,terminalloc,terminalcountry,acquirercountry,acquirerid,currency,email,shippingaddress,shippingcountry,billingaddress,billingcountry,ip,itemNo,timestamp,txnid,score,fraudflag, rule_name)
              SELECT transactions.cardnum,transactions.txnamt,transactions.merchantid,transactions.terminalloc,transactions.terminalcountry,transactions.acquirercountry,transactions.acquirerid,transactions.currency,transactions.email,transactions.shippingaddress,transactions.shippingcountry,transactions.billingaddress,transactions.billingcountry,transactions.ip,transactions.itemNo,transactions.timestamp,transactions.txnid,0 as score, 1 as fraudflag, 'Abnormal Times' as rule_name
              FROM transactions, abnormaltimes
              WHERE transactions.itemNo= abnormaltimes.itemNo AND TIME(transactions.timestamp)>abnormalTimes.fromTime AND TIME(transactions.timestamp)<abnormalTimes.toTime";
	mysqli_query($mysql_connect, $query);
	mysqli_close($mysql_connect);

echo "Abnormal Times implemented";
?>