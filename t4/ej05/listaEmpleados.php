<head>
<meta charset="utf-8">

<script type="text/javascript" src="https://storage.googleapis.com/google-code-archive-downloads/v2/code.google.com/form-serialize/serialize-0.2.min.js" ></script>
<script type="text/javascript">

	var conexion;

	function accionAJAX() {
		document.getElementById("idLista").innerHTML=conexion.responseText;
	}

	function peticionAJAX() {
		conexion = new XMLHttpRequest();
		
		var datosSerializados = serialize(document.getElementById("idFormulario"));
		conexion.open('GET', 'ajaxEmpleados.php?'+datosSerializados, true);
		conexion.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
		conexion.send();
		conexion.onreadystatechange = function() {
			if (conexion.readyState==4 && conexion.status==200) {
				accionAJAX();
			}
		}
	}

</script>

</head>

<body onload="peticionAJAX()">

	<h2>Lista de empleados</h2>

	<form id="idFormulario">
		<input type="button" value="Filtrar por" onclick="peticionAJAX()">

		<select id="idFiltro" name="filtro">
			<option value="nombre" selected="selected">Nombre</option>
			<option value="apellidos">Apellido</option>
			<option value="telefono">Tel&eacute;fono</option>
		</select>

		<input name="palabra" type="text">
	</form>


	<div id="idLista"></div>


</body>