<?php session_start();?>
<h3>Lista de tareas</h3>

<ul>
<?php foreach ($_SESSION as $empleado => $tareas): ?>
	<li><?= $empleado ?></li>
	<ul>
	<?php foreach ($tareas as $tarea ): ?>
		<li><?= $tarea ?></li>
	<?php endforeach;?>
	</ul>
<?php endforeach;?>
</ul>

<a href="menu.php">Volver</a>