<?php 
$texto = file_get_contents('../ej01/articulo.txt');
?>

<head>
	<script type="text/javascript">
		function cambiar(accion) {
			if (accion == 'letra') {
				document.getElementById('palabra').disabled=true;
				document.getElementById('form').action = 'letra.php';
			}
			else { //accion == 'palabra'
				document.getElementById('palabra').disabled=false;
				document.getElementById('form').action = 'resaltado.php';
			}
		}
	</script>
</head>
<body>
<h3>Contenido del fichero</h3>
<textarea cols="40" rows="20" readonly="readonly"><?= $texto ?></textarea>



<form id="form" action="resaltado.php">
	<h4>Introduce algoritmo de resaltado</h4>
	Palabra<input type="radio" name="algoritmo" value="palabra" checked="checked" onchange="cambiar('palabra')"/>
	Primera letra<input type="radio" name="algoritmo" value="letra" onchange="cambiar('letra')"/>
	<h4>Introduce la palabra que quieres resaltar</h4>
	<input type="text" id="palabra" name="palabra">
	
	<h4>Introduce modo de resaltado</h4>
	Color
	<select name="color">
		<option value="rojo">Rojo</option>
		<option value="azul">Azul</option>
		<option value="verde">Verde</option>
	</select><br/>
	
	Negrita<input type="checkbox" name="negrita">
	Subrayado<input type="checkbox" name="subrayar">
	
	<input type="submit">
	
</form>
</body>