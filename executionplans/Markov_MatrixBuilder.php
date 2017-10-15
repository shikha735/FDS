<?php
require('../frontend/dbconnect.php');

$query1 = "INSERT INTO transitionstream (firstState, nextState, transition)
SELECT a.state as firstState, b.state as nextState, CONCAT(a.state,b.state) as transition 
FROM stateStream as a
CROSS JOIN stateStream as b
WHERE timestamp > DATE_SUB(NOW(), INTERVAL 12 HOUR)";

	mysqli_query($mysql_connect, $query1);
	$query2 = "";

	mysqli_close($mysql_connect);

?>