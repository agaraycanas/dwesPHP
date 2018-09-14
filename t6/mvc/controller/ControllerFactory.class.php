<?php
class ControllerFactory {
	public static function getController() {
		require_once ('controller/UriParser.class.php');
		$baseName=UriParser::getBaseName();
		$action=UriParser::getActionName();
		$controlador=null;
		
		if (file_exists('controller/'.$baseName.'Controller.class.php')){
			//echo "Fichero EXISTE<br/>"; //TODO
			require_once 'controller/'.$baseName.'Controller.class.php';
			if (class_exists($baseName.'Controller')) {
				//echo "Clase existente<br/>"; //TODO
				if (in_array('BaseController',class_parents($baseName.'Controller'))) {
					//echo "Clase hereda de BaseController<br/>"; //TODO
					$metodo=$action.($_POST!=[]?'Post':'Get');
					if (method_exists($baseName.'Controller', $metodo)) {
						//echo "M&eacute;todo $metodo existe<br/>"; //TODO
						$clase=$baseName.'Controller';
						$controlador = new $clase($baseName,$action);
					}
					else {
						echo "M&eacute;todo $metodo NO existe<br/>"; //TODO
						
					}
				}
				else {
					echo "Clase NO hereda de BaseController<br/>"; //TODO
				}
			}
			else {
				echo "Clase inexistente<br/>"; //TODO
			}
		}
		else {
			echo "ERROR: Fichero inexistente<br/>"; //TODO
		}
		return $controlador;
	}
}