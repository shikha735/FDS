<?php 
	$query_feedback = ""
	require 'dbconnect.php';
    $query_msg_update = "INSERT INTO replies(id, subject, body) VALUES ('?','Reply to the cardholder','".$msg."')";
?>