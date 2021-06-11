<!doctype html>
<html>
<head>
<meta charset="windows-1251">
<title>Create user</title>
</head>
<body>
	<?php
	$link = mysqli_connect('localhost', 'root', '');
	$query = "GRANT ALL PRIVILEGES ON *.* TO 'admin'@'localhost' IDENTIFIED BY 'admin' WITH GRANT OPTION";
	$create_user = mysqli_query($link, $query);
?>
</body>
</html>