<!doctype html>
<html>
<head>
<meta charset="windows-1251">
<title>Create user</title>
</head>
<body>
    <?php
    //���������� � ��������
    $link = mysqli_connect ('localhost', 'admin', 'admin');
    //����� ��
    $db = "mySiteDB";
    $select = mysqli_select_db($link, $db);
        if ($select){
            echo "���� ������� �������", "<br>";
        } 
        else {
            echo "���� �� �������";
        }
    //�������� �������
    //������������ �������
    $query = "CREATE TABLE notes
            (id INT NOT NULL AUTO_INCREMENT,
            PRIMARY KEY (id),
            created DATE,
            title VARCHAR (20),
            article VARCHAR (255))";
    //���������� �������
    $create_tbl = mysqli_query ($link, $query);
        if ($create_tbl){
            echo "������� ������� �������", "<br>";
        } 
        else {
            echo "������� �� �������";
    }
    ?>
</body>
</html>