<?php
require('dbconnect.php');
require("checksession.php");
if(!empty($_POST["msg"])){
	$msg = $_POST["msg"];
	echo $msg;
}

?>