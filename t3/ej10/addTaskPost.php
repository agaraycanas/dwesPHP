<?php
session_start();
$nombreTarea = isset($_POST['nombreTarea']) ? $_POST['nombreTarea'] : null;
$empleado = isset($_POST['empleado']) ? $_POST['empleado'] : null;

if (!isset($_SESSION[$empleado])) {
    $_SESSION[$empleado] = [];
}

?>

<h3>Lista de tareas de <?= $empleado ?></h3>

<ul>
	<?php foreach ($_SESSION[$empleado] as $tarea): ?>
	<li>
			<?= $tarea ?>
	</li>
	<?php endforeach;?>
	
	<li>
	<b><?= $nombreTarea ?></b> (¡¡ NUEVA !!)
	</li>
</ul>
<a href="menu.php">Volver</a>

<?php 
$_SESSION[$empleado][] = $nombreTarea;
?>