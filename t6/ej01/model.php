<?php
function getSaludo() {
	$db = new PDO('mysql:host=localhost;dbname=test', 'root', '');
	$sentencia = $db->prepare('select saludo from saludos');
	$sentencia->execute();
	$db=null;
	return $sentencia->fetchAll();
}