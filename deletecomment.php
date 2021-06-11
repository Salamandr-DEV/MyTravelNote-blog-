<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Delete comment</title>
<?php require_once ("MySiteDB.php");?>
</head>
<body>
<?php
	$comment_id = $_GET['comment'];
    $note_id = $_GET['note'];

    $query = "SELECT * FROM comments WHERE id = $comment_id";
    $result = mysqli_query ($link, $query);
    $delete_comment = mysqli_fetch_array ($result);
?>

<html>
<body>
<p>Страница редактирования комментария </p>
    <form id="editcomment" name="editcomment" method="post" >
        <label for="title">Автор комментария</label>
        <input type="text" name="author" id="author"
        value = "<?php echo $delete_comment['author'];?>" />
        <label for="comment">Текст комментария </label>
        <input type="text" name=" comment" id=" comment"
        value = "<?php echo $delete_comment['comment'];?>" />
        <input type="hidden" name = "comment" id = "comment"
        value="<?php echo $delete_comment['id']?>" />
        <input type="hidden" name = "MM_update" value="editcomment" />
        <input type="submit" name="submit" id="submit" value="Удалить"/>
    </form>
    
    <?php 
	$submit = ( isset($_POST['submit']) == TRUE ) ? $_POST['submit'] :  '';
    if($submit) 
    {  
        $query = "DELETE FROM comments WHERE id = $comment_id"; 
        $res = mysqli_query($link, $query); 
        if($res) { 
            echo "Комментарий удален!", '</br>'; 
        }
    }
    ?> 
    <a href="comments.php?note=<?php echo $note_id; ?>">Возврат на страницу заметки</a>
</body>
