<?php
$esAjax = isset ( $_SERVER ['HTTP_X_REQUESTED_WITH'] ) ? strtolower ( $_SERVER ['HTTP_X_REQUESTED_WITH'] ) == 'xmlhttprequest' : false;

if ($esAjax) {
	echo "<h1>VIVA AJAX</h1>";
}
else {
	echo 'Sólo para ejecuciones AJAX';
}
?>