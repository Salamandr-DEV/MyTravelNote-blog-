<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<?php require_once ("MySiteDB.php");?>
</head>
<body>
<?php
	$submit = ( isset($_POST['submit']) == TRUE ) ? $_POST['submit'] :  '';
	if ($submit) {
        session_start();
        $_SESSION = array();
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        session_destroy();
    }
?>
	<form action="logout.php" method="POST" enctype="multipart/form-data">
		<p><input type="submit" name="submit" value="Выйти"></p>
	</form>
	<p><input  type="button" value="Вернуться на главную" onclick="javascript:window.location='blog.php'"/></p>
</body>
</html>