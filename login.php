<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<?php require_once ("MySiteDB.php");?>
</head>
<body>
<?php
	session_start();
    if ($_SESSION)
    {
        if ($_SESSION['rights']==('a')||('u'))
        {
            echo "Доброго времени суток, ".$_SESSION['name']."!";
            ?>
            <p><input  type="button" value="Вернуться на главную" onclick="javascript:window.location='blog.php'"/></p>
            <?php
        }
    }
    else
    {
        ?>
            <br>
            <form action="login.php" method="POST" enctype="multipart/form-data">
            <p>Введите логин:<input type="name" name="name"></p><br>
            <p>Введите пароль:<input type="password" name="password"></p><br>
            <p><input type="submit" name="submit" value="Вход"></p>
            </form>
            <p><input  type="button" value="Регистрация" onclick="javascript:window.location='registration.php'"/></p>

            <?php
            	$submit = ( isset($_POST['submit']) == TRUE ) ? $_POST['submit'] :  '';
                if ($submit) {
                    $name = (isset($_POST['name']) == TRUE ) ? $_POST['name'] : '';
                    $password = (isset($_POST['password']) == TRUE ) ? $_POST['password'] : '';
            
                    if(($name)&&($password))
                    {
                        $query = "SELECT * FROM privileges WHERE name = '$name' AND pass = '$password'";
                        $send_query = mysqli_query($link, $query);
                        if ($send_query)
                        $user_array = mysqli_fetch_array($send_query);
                        $name = $user_array['name'];
                        $rights = $user_array['rights'];
            
                        $count = mysqli_num_rows($send_query);
                        if($count>0)
                        {
                            $_SESSION['name'] = $name;
                            $_SESSION['rights'] = $rights;
            
                            header("refresh:3; url = blog.php");
                            echo "Вход на сайт автоматически осуществится через 3 секунды или нажмите <a href=\"blog.php\">сюда</a>";
                        }
                        else 
                        {
                            echo "Извините, Вы не зарегистрированы <a href=\"blog.php\">Вернуться на главную</a>.";	
                        }
                    }
                }
    }?>
</body>
</html>