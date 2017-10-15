<?php
require('../frontend/dbconnect.php');

	$query1 = "INSERT INTO compareStream (cardnum, email, phone, timestamp, scoresum)
SELECT DISTINCT cardnum, email, phone, timestamp, SUM(score)
FROM scoreStream
GROUP BY cardnum
	";

	$query2 = "INSERT INTO suspiciousactivity (cardnum, email, phone, scoresum, timestamp)
SELECT cardnum, email, phone, scoresum, timestamp
FROM compareStream
WHERE scoresum > 80
GROUP BY cardnum
";


	mysqli_query($mysql_connect, $query1);
	// echo "Query 1 executed";
	mysqli_query($mysql_connect, $query2);
	// echo "Query 2 executed";
	mysqli_close($mysql_connect);

echo "Fraud scorer implemented";
?>