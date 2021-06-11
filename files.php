<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Files</title>
<?php require_once ("MySiteDB.php");?>
</head>
<body>
	<h1>Это страница для работы с файлами</h1>
	<form name = "file_upload" action="files.php" enctype="multipart/form-data" method="POST">
    <input type="hidden" name="MAX_FILE_SIZE" value="655360" />
    <input type="file" name="file_upload" />
	<input type="submit" name="submit" value="Добавить" />
</form>
<?php
	if(isset($_POST["MAX_FILE_SIZE"]))
	{
        $tmp_file_name = $_FILES["file_upload"]["tmp_name"];
        $dest_file_name = $_SERVER['DOCUMENT_ROOT']."/www/files/".$_FILES["file_upload"]["name"];
        move_uploaded_file($tmp_file_name, $dest_file_name);
	}
?>
	
<?php
	//Получаем полный путь к папке, где хранятся графические файлы
	$image_dir_path = $_SERVER['DOCUMENT_ROOT']."/www/files";

	//Запускаем просмотр папки
	$image_dir_id = opendir($image_dir_path);
	//Создаем массив, в который будут перемещаться все найденные файлы
	$array_files = null;
	$i=0;
	while(($path_to_file = readdir($image_dir_id)) !==false)
	{
      if(($path_to_file !=".")&&($path_to_file !=".."))
      {
      	$array_files[$i] = basename($path_to_file);
      	$i++;
      }
	}
	closedir($image_dir_id);

	$array_files_count = count($array_files);
	if($array_files_count)
	{
		?>
		<hr/>
	<?php	
		sort($array_files);
		for ($i=0; $i<$array_files_count; $i++)
		{
			?>
			<p><a href="/www/files/<?php echo $array_files[$i];?>"
	target="_blank"><?php echo $array_files[$i];?></a></p>
	<?php
		}
		?>
		<hr/>
		<?php
	}
?>
	<form name="file_delete" action="files.php" method="post" enctype="application/x-www-form-urlencoded">Файл<select name = "file_delete" size="1">
        <?php for ($i=0; $i<$array_files_count; $i++)
        {
            ?>
            <option><?php echo $array_files[$i]; ?></option>
            <?php
        }
        ?>
        </select>
	    <input type="submit" name="submit" value="Удалить" />
	</form>
    <br>
    <input  type="button" value="Вернуться на главную" onclick="javascript:window.location='blog.php'"/>
	<?php
	//Сценарий удаления файла
	//Сначала проверяем, было ли запущено удаление файла
	if (isset($_POST["file_delete"]))
	{
	//Формируем полное имя файла
	    $file_name = $_SERVER['DOCUMENT_ROOT']."/www/files/".$_POST["file_delete"];
	    //Функция unlink() удаляет файл
	    unlink($file_name);
            echo "\<meta http-equiv=\"refresh\"content=\"1;URL=photo.php\>";
	}
	?>
</body>
</html>