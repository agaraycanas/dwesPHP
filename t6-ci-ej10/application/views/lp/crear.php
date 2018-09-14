<script type="text/javascript" src="<?=base_url()?>assets/js/serialize.js" ></script>
<script type="text/javascript">
var conexion;

	function accionAJAX() {
		document.getElementById("idBanner").innerHTML = conexion.responseText;
	}

	function crear() {
		conexion = new XMLHttpRequest();

		var datosSerializados = serialize(document.getElementById("idFormulario"));
		conexion.open('POST', '<?=base_url()?>lp/crearPost', true);
		conexion.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
		conexion.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		conexion.send(datosSerializados);
		conexion.onreadystatechange = function() {
			if (conexion.readyState==4 && conexion.status==200) {
				accionAJAX();
			}
		}
	}
</script>

<div class="container">
	<h4>Introduce los datos del Lenguaje de Programación</h4>
	<form class="form" id="idFormulario">
		<label for="idNombre">Nombre</label> 
		<input id="idNombre" type="text" name="nombre"> 
		<input type="button" value="Enviar" onclick="crear()">
	</form>
	<div id="idBanner"></div>
</div>