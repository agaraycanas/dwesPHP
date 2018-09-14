<?php
require_once('model.php');
$modelData=getSaludo();

header('Content-Type: text/html; charset=UTF-8');
require_once('view.php');
?>