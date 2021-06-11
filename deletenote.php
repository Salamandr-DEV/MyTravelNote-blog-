<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Delete note</title>
<?php require_once ("MySiteDB.php");?>
</head>
<body>
<?php
	$note_id = $_GET['note'];
    $query_comment = "DELETE FROM comments WHERE art_id = $note_id";
    $result_comment = mysqli_query ($link, $query_comment);

    $query = "SELECT * FROM notes WHERE id = $note_id";
    $result = mysqli_query ($link, $query);
    $delete_note = mysqli_fetch_array ($result);
?>

<html>
<body>
<p>Страница редактирования заметки </p>
    <form id="editnote" name="editnote" method="post" >
        <label for="title">Заголовок заметки</label>
        <input type="text" name="title" id="title"
        value = "<?php echo $delete_note['title'];?>" />
        <label for="article">Текст заметки </label>
        <input type="text" name=" article" id=" article"
        value = "<?php echo $delete_note['article'];?>" />
        <input type="hidden" name = "note" id = "note"
        value="<?php echo $delete_note['id']?>" />
        <input type="hidden" name = "MM_update" value="editnote" />
        <input type="submit" name="submit" id="submit" value="Удалить"/>
    </form>
    
    <?php 
	$submit = ( isset($_POST['submit']) == TRUE ) ? $_POST['submit'] :  '';
    if($submit) 
    {  
        $query_comment = "DELETE FROM comments WHERE art_id = $note_id";
        $res_comment = mysqli_query ($link, $query_comment);
        if($res_comment) { 
            echo "Комментарии к заметке удалены", '</br>'; 
          }  

        $query = "DELETE FROM notes WHERE id = $note_id"; 
        $res = mysqli_query($link, $query); 
        if($res) { 
            echo "Заметка удалена!", '</br>'; 
        }
    }
    ?> 
    <a href="blog.php">Возврат на главную страницу сайта</a>
</body>
