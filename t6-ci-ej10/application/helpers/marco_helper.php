<?php
function enmarcar($controlador, $rutaVista, $datos = []) {
	if (session_status () == PHP_SESSION_NONE) {session_start ();}
	if (isset ( $_SESSION ['empleado']['id'] )) {
		$datos ['header'] ['empleado'] ['nombre'] = $_SESSION ['empleado']['nombre'];
		$datos ['header'] ['empleado'] ['ape1'] = $_SESSION ['empleado']['ape1'];
	}
	$controlador->load->view ( 'templates/head',$datos );
	$controlador->load->view ( 'templates/header', $datos );
	$controlador->load->view ( 'templates/nav', $datos );
	$controlador->load->view ( $rutaVista, $datos );
	$controlador->load->view ( 'templates/footer', $datos );
	$controlador->load->view ( 'templates/end' );
}
?>