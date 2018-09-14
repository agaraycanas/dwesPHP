<?php
require_once('controller/ControllerFactory.class.php');
$controlador=ControllerFactory::getController();
if ($controlador!=null) $controlador->executeAction();
?>