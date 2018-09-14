<?php
require_once 'rb.php';

class DAO {
	
	function __construct() 	{
		$host= 'localhost';		$db='test';		$user='root';		$pass='';
		try {
			R::setup("mysql:host=$host;dbname=$db", $user, $pass);
		}
		catch (Exception $e) {
			
		}
	}
}
?>