<?php
require('../frontend/dbconnect.php');

	$query1 = "INSERT INTO scorestream(txnid , cardnum , txnamt , currency , email , shippingaddress , billingaddress, ip , itemNo ,  timestamp , score )
              SELECT DISTINCT txnid ,transactions.cardnum , txnamt , currency , email , shippingaddress, billingaddress , ip , itemNo, timestamp,5.0 as score
              FROM transactions, blacklisted
              WHERE transactions.cardnum = blacklisted.cardnum";

	
	mysqli_query($mysql_connect, $query1);
	$query2="INSERT INTO scorestream(txnid , cardnum , txnamt , currency , email , shippingaddress , billingaddress, ip , itemNo ,  timestamp , score )
              SELECT DISTINCT txnid ,transactions.cardnum , txnamt , currency , email , shippingaddress, billingaddress , ip , itemNo, timestamp,0.0 as score
              FROM transactions, blacklisted
              WHERE transactions.cardnum != blacklisted.cardnum ";
	mysqli_query($mysql_connect, $query2);
	mysqli_close($mysql_connect);

echo "Blacklisted cards with Fraud scores implemented";
?>