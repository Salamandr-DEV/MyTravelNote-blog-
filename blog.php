<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>My blog</title>
<?php require_once ("MySiteDB.php");?>
</head>
<body>
	<form align = "right" method="GET" enctype="mulltipart/form-data">
		<input type="text" name="usersearch" size ="30" placeholder="Поиск по сайту">
		<input type="submit" name="submit" value="Найти"><br>
	</form>
<?php
	$submit = ( isset($_GET['submit']) == TRUE ) ? $_GET['submit'] :  '';
	if ($submit) {
		$user_search = ( isset($_GET['usersearch']) == TRUE ) ? $_GET['usersearch'] :  '';
		if ($user_search){
			$where_list = array();
			$query_usersearch = "SELECT * FROM notes";
			$clean_search = str_replace(',', ' ', $user_search);
			$search_words = explode(' ', $user_search);
			//Поиск по фразе
			if (count($search_words) > 1){
				$final_search_words = array();
				if (count($search_words) > 0)
				{
				foreach($search_words as $word)
					{
						if (!empty($word))
						{
							$final_search_words[] = $word;
						}
					}
				}
					//работа с использованием массива $final_search_words
				foreach ($final_search_words as $word)
				{
					$where_list[] = " article LIKE '%$word%'";
				}
				$where_clause = implode (' OR ', $where_list);
				if (!empty($where_clause))
				{
					$query_usersearch .=" WHERE $where_clause";
				}
				$res_query = mysqli_query($link, $query_usersearch);
				while ($res_array = mysqli_fetch_array($res_query))
				{
					echo $res_array['id'], "<br>";
					echo $res_array['title'], "<br>";
					echo $res_array['article'], "<br>", "<hr>", "<br>";
				}
			}
			//Поиск по одному слову
			else{
				$query_usersearch = "SELECT * FROM notes
									WHERE title LIKE '%$user_search%'
									OR article LIKE '%$user_search%'";
				$result_usersearch = mysqli_query($link, $query_usersearch);
				while ($array_usersearch = mysqli_fetch_array($result_usersearch))
				{
					echo $array_usersearch['id'], "<br>";
					echo $array_usersearch['title'], "<br>";
					echo $array_usersearch['article'], "<br>", "<hr>", "<br>";
				}
			}
		}
	}
?>
	<div class="navbar">
	<form align="center">
	<input  type="button" value="Вход" onclick="javascript:window.location='login.php'"/>
	<input  type="button" value="Новая запись" onclick="javascript:window.location='newnote.php'"/>
	<input  type="button" value="Отправить сообщение" onclick="javascript:window.location='email.php'"/>
	<input  type="button" value="Фото" onclick="javascript:window.location='photo.php'"/>
	<input  type="button" value="Файлы" onclick="javascript:window.location='files.php'"/>
	<input  type="button" value="Администратору" onclick="javascript:window.location='admin.php'"/>
	<input  type="button" value="Информация" onclick="javascript:window.location='inform.php'"/>
	<input  type="button" value="Выход" onclick="javascript:window.location='logout.php'"/>
	</form>
	</div>

	<p><h1 align="center"><em>Рад приветствовать вас<br> 
								на страницах моего сайта, посвященного путешевствиям<br> 
								Здесь я буду рассказывать о своих путешевствиях...<br>
								... и выкладывать разные интересные материалы!</em></h1></p>
	
	<?PHP
		$query = "SELECT * FROM notes ORDER BY id ASC";
		$select_note = mysqli_query($link, $query);
		if ($select_note){
			while ($note = mysqli_fetch_array($select_note)){
				//echo $note['id'], "<br>";
				?>
				<a href="comments.php?note=<?php echo $note['id']; ?>">
				<?php echo $note ['title'], "<br>";?></a>
				<?php
				echo $note ['article'], "<br>";
				echo $note ['created'], "<br>";
				}
		}
		else {
			echo "DB not create";
		}

	?>
	<br><br>
	</body>
</html>