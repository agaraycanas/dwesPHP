<head>
<script>
	function f() {
		var xmlhttp = new XMLHttpRequest();
		var parametros = 'ca='+document.getElementById("ccaa").value;
		xmlhttp.open("GET","ajax.php?"+parametros,true);
		xmlhttp.send();
		xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
				document.getElementById("provincia").innerHTML=xmlhttp.responseText;
			}
		}
	}
</script>


</head>
<body>
	<h1>Comunidades autónomas</h1>

	<label for="ccaa"> CCAA </label>
	<select id="ccaa" onchange="f()">
		<option>Andalucía</option>
		<option>Aragón</option>
		<option>Canarias</option>
		<option>Cantabria</option>
		<option>Castilla y León</option>
		<option>Castilla-La Mancha</option>
		<option>Cataluña</option>
		<option>Ceuta (Ciudad de)</option>
		<option>Comunidad Valenciana</option>
		<option>Extremadura</option>
		<option>Galicia</option>
		<option>Islas Baleares</option>
		<option>Madrid (Comunidad de)</option>
		<option>Melilla (Ciudad de)</option>
		<option>Murcia (Región de)</option>
		<option>Navarra (Comunidad Foral de)</option>
		<option>País Vasco</option>
		<option>Rioja (La)</option>
	</select>

	<br />

	<label for="provincia"> Provincia </label>
	<select id="provincia">
		<option>Almería</option>
		<option>Cádiz</option>
		<option>Córdoba</option>
		<option>Granada</option>
		<option>Huelva</option>
		<option>Jaén</option>
		<option>Málaga</option>
		<option>Sevilla</option>
	</select>

	<h3>Escoge una comunidad autónoma</h3>
	<h4>Observa el cambio de provincias vía AJAX</h4>


</body>