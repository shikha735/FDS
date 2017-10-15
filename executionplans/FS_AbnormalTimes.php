<?php
require('../frontend/dbconnect.php');

	$query = "INSERT INTO scorestream(txnid , cardnum , txnamt , currency , email, shippingaddress, billingaddress , ip , itemno , qty, timestamp , score)
              SELECT DISTINCT txnid,cardnum,txnamt,currency,email,shippingaddress,billingaddress,ip,transactions.itemNo,timestamp,5 as score,1 as fraudflag
              FROM transactions, abnormaltimes
              WHERE transactions.itemNo= abnormaltimes.itemNo AND transactions.timestamp>abnormalTimes.fromTime AND transactions.timestamp<abnormalTimes.toTime";
	mysqli_query($mysql_connect, $query);
	mysqli_close($mysql_connect);

echo "Abnormal Times with Fraud scores implemented";
?>