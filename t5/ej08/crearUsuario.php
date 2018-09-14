<?php 
	require_once 'aficion_DAO.php';
	if (isset($_POST['nombre'])) { // Insertar el nuevo usuario
		require_once 'usuario_DAO.php';
		$usuario = new usuario_DAO();
		$nombre = $_POST['nombre'];
		$id_aficion = $_POST['id_aficion'];
		$usuario -> crearUsuario($nombre,$id_aficion);
		
		echo 'Usuario creado';
	}
	
	// Pintar el formulario
	$aficion = new aficion_DAO();
	$aficiones = $aficion->getTodas();
?>
<head>
	<meta charset="utf-8">
</head>
<body>
<form action="crearUsuario.php" method="post">
	Nombre<input type="text" name="nombre"><br/>
	<select name="id_aficion">
		<?php foreach ($aficiones as $aficion) : ?>
			<option value="<?=$aficion['id']?>"><?=$aficion['nombre']?></option>
		<?php endforeach;?>
	</select>
	<input type="submit">
</form>
</body>