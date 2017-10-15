<?php
require('../frontend/dbconnect.php');

	$query1 = "INSERT INTO metricstream (txnid,cardnum,itemNo,txnamt,currency,email,shippingaddress,billingaddress,ip,qty,timestamp,nextState,transition)
SELECT tb.txnid, tb.cardnum, tb.itemNo, tb.txnamt, tb.currency, tb.email, tb.shippingaddress, tb.billingaddress, tb.ip, tb.qty,  tb.timestamp, ta.state as nextState, CONCAT(ta.state,tb.state) as transition 
FROM stateStream as ta
CROSS JOIN stateStream as tb
WHERE timestamp > DATE_SUB(NOW(), INTERVAL 12 HOUR)";

	mysqli_query($mysql_connect, $query1);
	$query2 = "";

	mysqli_close($mysql_connect);

?>