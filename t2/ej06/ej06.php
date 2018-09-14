
<?php
mb_internal_encoding ( "UTF-8" );
header ( 'Content-Type: text/html; charset=UTF-8' );
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<?php
echo '<table border="1">', PHP_EOL;
echo "<tr><th>#</th><th>Caracter</th><th>Cod.URL</th></tr>", PHP_EOL;
for($i = 0; $i <= 255; $i ++) {
	$caracter = chr ( $i );
	echo "<tr>";
	echo "<td> $i </td>";
	echo "<td>", $caracter, "</td>";
	echo "<td>", urlencode ( $caracter ), "</td>";
	echo "</tr>", PHP_EOL;
}
echo "</table>", PHP_EOL;
?>
</body>