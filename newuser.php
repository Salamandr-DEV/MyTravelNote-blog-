<?php
    require_once("MySiteDB.php");

    $name = ( isset($_POST['name']) == TRUE ) ? $_POST['name'] :  '';
    $password = ( isset($_POST['password']) == TRUE ) ? $_POST['password'] :  '';
    $rights = ( isset($_POST['rights']) == TRUE ) ? $_POST['rights'] :  '';

    if(($name)&&($password)&&($rights))
    {
        $query = "INSERT INTO privileges VALUES (NULL, '$name', '$password', '$rights')";
        mysqli_query($link, $query);
        header( "refresh:1;url=admin.php" );
    }
?>