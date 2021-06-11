<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Newnote</title>
<?php require_once ("MySiteDB.php");?>
</head>
	<?php
	session_start();
	if ($_SESSION)
		{
			if ($_SESSION['rights']==('a'))
			{
				echo "Доброго времени суток, ".$_SESSION['name']."!";
				?>
					<body>
					<p><h3>Создать новую заметку</h3></p>
					<form method="POST" enctype="multipart/form-data">
						<p><input type="text" name="title" size="30" maxlength="30"><br></p>
						<p><textarea rows="10" cols="55" name="article"></textarea><br></p>
						<p><input type="hidden" name="created" value="<?php echo date("Y-m-d");?>"></p>
						<p><input type="submit" name="submit" value="Отправить"></p><br>
					</form>
					<a href="blog.php">Возврат на главную страницу сайта</a>
					</body>
				<?php
			}
			else
			{
				echo "Извините, у Вас нет доступа!";
				echo "<a href = \"blog.php\"><br>Вернуться на главную</a>";
			}
		}
		?>
</html>
<?php
	$title = ( isset($_POST['title']) == TRUE ) ? $_POST['title'] :  '';
	$created = ( isset($_POST['created']) == TRUE ) ? $_POST['created'] :  '';
	$article = ( isset($_POST['article']) == TRUE ) ? $_POST['article'] :  '';

	if (($title)&&($created)&&($article)) {
        $query = "INSERT INTO notes (id, created, title, article)
        VALUES (NULL, '$created', '$title', '$article')";
	
		$result = mysqli_query($link, $query);
	}
?>
<?php
	/*$var = $_GET['MyRadio'];
	switch ($var)
	{
		case 'Rome':
			echo "You choose $var";
				break;
		case 'Paris':
			echo "You choose $var";
				break;
		case 'Moscow':
			echo "You choose $var";
				break;	
		
	}
?>
<?php
	$arr = $_GET['MyCheckBox'];
		if(empty($arr))
		{
			echo "Вы не выбрали ни один вариант!";
		}
		else 
		{
			$count=count($arr);
			echo "Вы выбрали:"."<br>";
			for($i=0; $i<$count; $i++)
			{
				echo $arr[$i]."<br>";
			}
		}*/

?>
</html>