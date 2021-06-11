<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
<?php require_once ("MySiteDB.php");?>
</head>
<body>
    <p><h3>Регистрация</h3></p>
    <form action="newuser_registr.php" method="POST" enctype="multipart/form-data">
        <p>Введите логин:<input type="text" name="name"></p><br>
        <p>Введите пароль:<input type="text" name="password"></p>
        <p><input type="hidden" name="rights" value="u"></p>
        <p><input type="submit" name="submit" value="Добавить"></p>
    </form>
    <p><input  type="button" value="Вернуться на главную" onclick="javascript:window.location='blog.php'"/></p>
</body>
</html>