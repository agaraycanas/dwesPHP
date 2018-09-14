<?php require_once '/view/_templates/util/scripts.php';?>
<h3>LISTA de EMPLEADOS</h3>
<?= pintarSelect('dpto', $d['mainView']['listaDptos'],[],'simple','cambiarDpto()')?>
<!----------------------------------------------------->
<!-- FUNCION MANEJADORA DEL FILTRO POR DEPARTAMENTO -->
<script type="text/javascript">
var conexion;
var iddep;

function cambiarDpto() {
	iddep=document.getElementById('iddpto').value;
	conexion = new XMLHttpRequest();
	conexion.open('POST', '<?= UriParser::getBaseUri() ?>Empleado/listar', true);
	conexion.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
	conexion.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
	conexion.send('iddep='+iddep);
	conexion.onreadystatechange = function() {
		if (conexion.readyState==4 && conexion.status==200) {
			accionAJAX();
		}
	}
}

	
function accionAJAX() {
	textoRecibido = conexion.responseText;
	document.getElementById("idFilasEmpleados").innerHTML=textoRecibido;
}
	
</script>
<!----------------------------------------------------->
<div id="idFilasEmpleados">

	<table>
		<tr>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>Fecha nac.</th>
			<th>Departamento</th>
		</tr>
	<?php foreach ($d['mainView']['listaEmpleados'] as $empleado): ?>
	<tr>
			<td><?= $empleado['nomemp'] ?></td>
			<td><?= $empleado['apellido'] ?></td>
			<td><?= $empleado['fnac'] ?></td>
			<td><?= $empleado['nomdep'] ?></td>
		</tr>
	<?php endforeach;?>
	</table>
</div>
