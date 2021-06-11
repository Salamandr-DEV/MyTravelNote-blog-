<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Email</title>
<?php require_once ("MySiteDB.php");?>
</head>
<body>
    <p><h3>Отправить сообщение автору блога:</h3></p>
            <form method="POST" enctype="multipart/form-data">

                <p><input type="text" name="sbj"><br></p>
                <p><textarea rows="10" cols="40" name="msg"></textarea><br></p>
                <p><input type="submit" name="submit" value="Отправить"></p>

            </form>
            <input  type="button" value="Вернуться на главную" onclick="javascript:window.location='blog.php'"/>

    <?php
        $sbj = ( isset($_POST['sbj']) == TRUE ) ? $_POST['sbj'] :  '';
        $msg = ( isset($_POST['msg']) == TRUE ) ? $_POST['msg'] :  '';
        $to = "mail@mail.ru";

        if (($sbj)&&($msg)&&($to)) {
            mail ($to, $msg, $sbj);
        }
    ?>
</body>
</html>