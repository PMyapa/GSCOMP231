<?php
	session_start();
	if(!isset($_SESSION["username"]))  {
		header("Location: ../error.html");
		exit;
	}
	

?>
<html>
<head>
	<title>T2001</title>
</head>
<body>