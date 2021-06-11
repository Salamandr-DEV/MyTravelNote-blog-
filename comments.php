<!DOCTYPE html>
<html>
	<head>
<meta charset="utf-8">
<title>Comments</title>
<?php require_once ("MySiteDB.php");?>
</head>
<h1>Заметка о путешествии</h1>
<body>
<?php
	$note_id = $_GET['note'];

	$query = "SELECT created,title,article FROM notes WHERE id = $note_id";
	$select_comments_info = mysqli_query($link, $query);
		while ($comments_info = mysqli_fetch_array($select_comments_info))
		{	
			echo $comments_info ['created'],"<br>";	
			echo $comments_info ['title'],"<br>";
			echo $comments_info ['article'],"<br>";
		}
		$query_comments = "SELECT * FROM comments WHERE art_id = $note_id ORDER BY created ASC";
?>
	<p><input  type="button" value="Изменить заметку" onclick="javascript:window.location='editnote.php?note=<?php echo $note_id;?>'"/>
	<input  type="button" value="Удалить заметку" onclick="javascript:window.location='deletenote.php?note=<?php echo $note_id;?>'"/></p><br>
	<input  type="button" value="Вернуться на главную" onclick="javascript:window.location='blog.php'"/>
	
	<h2>Комментарии к заметке</h2>
<?php
	$select_comments = mysqli_query($link, $query_comments);
		while ($comments = mysqli_fetch_array($select_comments))
		{
			echo $comments ['id'], "<br>";
			?>
			<a href="deletecomment.php?note=<?php echo $note_id; ?>&comment=<?php echo $comments['id']; ?>">
				<?php echo $comments ['created'], "<br>";?></a>
			<?php
			echo $comments ['author'], "<br>";
			echo $comments ['comment'], "<br>";
			echo $comments ['art_id'], "<br>", "<br>";
		}

		$a = mysqli_num_rows($select_comments); 
		if ($a) 
		{
			echo "Комментариев к заметке:";
			print_r ($a);		
		}
		else 
		{
			echo "Эту запись еще никто не комментировал!";
		}
		
?><br>
	<h2>Добавьте новый комментарий</h2>
	<form method="POST" enctype="multipart/formdata">
		<p>Введите имя автора:</p><input type="text" name="author" size="20"></p>
		<p>Текст комментария:<br><textarea rows="10" cols="60" name="comment"></textarea></p>
		<input type="hidden" name="created"
							value="<?php echo date("Y-m-d H:i:s");?>"/>
		<input type="submit" name="submit" value="Отправить"><br>
	</form>
	<?php 
		//Добавление комментариев
		$author = ( isset($_POST['author']) == TRUE ) ? $_POST['author'] :  '';
		$comment = ( isset($_POST['comment']) == TRUE ) ? $_POST['comment'] :  '';
		$created = ( isset($_POST['created']) == TRUE ) ? $_POST['created'] :  '';
		if(($author)&&($comment)&&($created))
		{
			$comment_query = "INSERT INTO comments (id, created, author, comment, art_id)
						VALUES (NULL, '$created', '$author', '$comment', '$note_id')";
			$comment_result = mysqli_query($link, $comment_query);
			if($comment_result)
			{
				echo "\<meta http-equiv=\"refresh\"content=\"0;URL=comments.php?note=".$note_id."\">";
			}
		}
		?>
</body>
</html>