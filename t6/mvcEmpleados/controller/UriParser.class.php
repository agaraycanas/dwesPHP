<?php
class UriParser {
	public static function getControllerName() {
		return UriParser::getBaseName () . 'Controller';
	}
	public static function getActionName() {
		$uriOriginal = explode ( '/', $_SERVER ['REQUEST_URI'] );
		$uriReescrita = explode ( '/', $_SERVER ['SCRIPT_NAME'] );
		
		if (sizeof ( $uriOriginal ) > sizeof ( $uriReescrita )) {
			$actionName = $uriOriginal [sizeof ( $uriReescrita )];
		} else {
			$actionName = 'index';
		}
		return $actionName;
	}
	public static function getBaseName() {
		$uriOriginal = explode ( '/', $_SERVER ['REQUEST_URI'] );
		$uriReescrita = explode ( '/', $_SERVER ['SCRIPT_NAME'] );
		
		$indiceControlador = sizeof ( $uriReescrita ) - 1;
		if ($uriOriginal [$indiceControlador] == '' || $uriOriginal [$indiceControlador] == 'index.php') {
			$baseName = 'Home';
		} else {
			$baseName = $uriOriginal [$indiceControlador];
		}
		return $baseName;
	}
	public static function getBaseUri() {
		$uriReescrita = explode ( '/', $_SERVER ['SCRIPT_NAME'] );
		$uri = $_SERVER ['REQUEST_SCHEME'];
		$uri .= '://';
		$uri .= $_SERVER ['SERVER_NAME'];
		$uri .= '/';
		
		for($i = 1; $i < sizeof ( $uriReescrita ) - 1; $i ++) {
			$uri .= ($uriReescrita [$i] . '/');
		}
		return $uri;
	}
}
?>