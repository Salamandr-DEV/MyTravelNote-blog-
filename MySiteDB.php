<!doctype html>
<html>
<head>
<meta charset="windows-1251">
<title>MyCiteDB</title>
</head>
<body>
	<?php
	# FileName="Connection_php_mysql.htm"
	# Type="MYSQL"
	# HTTP="true"
	$localhost = "localhost";
	$db = "MySiteDB";
	$user = "admin";
	$password = "admin";
	$link = mysqli_connect($localhost, $user, $password) or trigger_error(mysqli_connect_error($link),E_USER_ERROR);
	mysqli_query($link, "SET NAMES cp1251;") or die(mysqli_connect_error($link));
	mysqli_query($link, "SET CHARACTER SET cp1251;") or die(mysqli_connect_error($link));
	$select = mysqli_select_db($link, $db);
	$utf = mysqli_query($link, "SET NAMES 'UTF8'");
	?>
</body>
</html>