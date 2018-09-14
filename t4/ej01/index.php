<html>
<head>
<meta charset="utf-8">
<script type="text/javascript">
	var conexion;
	function accionAJAX() {
		textoRecibido = conexion.responseText;
		document.getElementById("idSaludo").innerHTML=textoRecibido;
	}
	
	function saludar() {
		nombre = document.getElementById('idNombre').value;
		conexion = new XMLHttpRequest();
		conexion.open('GET', 'saludo.php?nombre='+nombre, true);
		conexion.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
		conexion.send();
		conexion.onreadystatechange = function() {
			if (conexion.readyState==4 && conexion.status==200) {
				accionAJAX();
			}
		}
	}	
</script>				

<body>
	<h1>SALUDADOR</h1>
	Introduce tu nombre: 
	<input type="text" id="idNombre"><br/>
	<div id="idSaludo">
	</div>
	<input type="button" value="Saludar" onClick="saludar()">
</body>
</html>
