<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Admin</title>
<?php require_once ("MySiteDB.php");?>
</head>
<?php
	session_start();
	if ($_SESSION['rights']==('a'))
	{
		echo "Доброго времени суток, ".$_SESSION['name']."!";

?>
<body>
<?php 
	$query_allauthors = "SELECT COUNT(id) AS allauthors FROM privileges";
	$allauthors = mysqli_query ($link, $query_allauthors) or die(mysqli_connect_error($link));
	$row_allauthors = mysqli_fetch_assoc ($allauthors);
	$allauthors_num = $row_allauthors['allauthors'];
	mysqli_free_result ($allauthors);
?>

<p>Количество зарегистрированных пользователей:</p>
		<hr noshade width="330" align="left">
		Количество пользователей: <?php echo $allauthors_num;?>;<br>

    <p><h3>Добавление нового пользователя</h3></p>
<form action="newuser.php" method="POST" enctype="multipart/form-data">
	<p>Введите логин:<input type="text" name="name"></p><br>
	<p>Введите пароль:<input type="text" name="password"></p>
	<p>Выберите права пользователя:</p>
	<p><input type="radio" name="rights" value="a">Администратор</p>
	<p><input type="radio" name="rights" value="u">Пользователь</p>
	<p><input type="submit" name="submit" value="Добавить"></p>
	</form>
	<p><input  type="button" value="Вернуться на главную" onclick="javascript:window.location='blog.php'"/></p>
    <?php
    }
    else
        {
        echo "Извините, у Вас нет доступа!";
        echo "<a href = \"blog.php\"><br>Вернуться на главную</a>";
        }
    ?><br>
</body>
</html>