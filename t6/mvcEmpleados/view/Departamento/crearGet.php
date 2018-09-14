<script type="text/javascript" src="<?= UriParser::getBaseUri() ?>view/_templates/js/serialize.js"></script>

<!-- FUNCIÓN MANEJADORA del ENVÍO DEL FORMULARIO -->
<script type="text/javascript">
var conexion;

function crearDpto() {
	var formulario = document.getElementById('idFormDpto');
	var datosSerializados = serialize(formulario);
	conexion = new XMLHttpRequest();
	conexion.open('POST', '<?= UriParser::getBaseUri() ?>Departamento/crear', true);
	conexion.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
	conexion.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
	conexion.send(datosSerializados);
	conexion.onreadystatechange = function() {
		if (conexion.readyState==4 && conexion.status==200) {
			accionAJAX();
		}
	}
}

		
function accionAJAX() {
	textoRecibido = conexion.responseText;
	document.getElementById("idFooter").innerHTML=textoRecibido;
}	

</script>

<!--------------------------------------------->

<h1>Crear departamento</h1>
<form id="idFormDpto">
	<label for="idNom">Nombre del departamento</label> 
	<input type="text" name="nomdep" id="idNom"> 
	<input type="button" value="Enviar" class="button" onclick="crearDpto()">
</form>