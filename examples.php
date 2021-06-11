<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Документ без названия</title>
</head>
<body>
	<?php
	$a = 10;
	$b = 20;
	echo $a;
	echo "<br>";
	
	echo $b;
	echo "<br>";
	
	$c = $a + $b;
	echo $c;
	echo "<br>";
	
	$c = $c * 3;
	echo $c;
	echo "<br>";
	
	$del = $c / ($b - $a);
	echo $del;
	echo "<br>";
	
	$p = 'Программа';
	$b = 'работает';
	$result = $p.' '.$b;
	$result .= ' хорошо';
	echo $result;
	echo "<br>";
	
	$q = 5;
	$w = 7;
	echo 'Переменная q = '.$q.'<br>';
	echo 'Переменная w = '.$w.'<br>';
	
	$q+=+$w-$w=$q;
	echo 'Переменная q = '.$q.'<br>';
	echo 'Переменная w = '.$w.'<br>';
	?>
</body>
</html>