<script type="text/javascript" src="<?=base_url()?>assets/js/serialize.js" ></script>
<script type="text/javascript">
var conexion;

	function accionAJAX() {
		document.getElementById("idLista").innerHTML=conexion.responseText;
	}

	function filtrar() {
		conexion = new XMLHttpRequest();

		var datosSerializados = serialize(document.getElementById("idFormulario"));
		conexion.open('POST', '<?=base_url()?>lp/filtrarPost', true);
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
	<h3>Introduce el nombre del lenguaje de programación a <?=$body['accion']?> (o parte de él)</h3>
	<form id="idFormulario">
		<input type="text" name="filtro" value="<?=$body['filtro']?>">
		<input type="button" onclick="filtrar()" value="Filtrar">
		<input type="hidden" name="accion" value="<?=$body['accion']?>">
	</form>
	<div class="container" id="idLista"></div>
</div>