<head>
<script type="text/javascript">
function accionAJAX(respuesta){
	document.getElementById('dinamico').innerHTML=respuesta;
}
function cambiar() {
	var xmlhttp=new XMLHttpRequest();
	xmlhttp.open('POST', "<?= base_url()?>Test/ajax", true);
	xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
	xmlhttp.send('dato='+document.getElementById('numero').value);

	xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			accionAJAX(xmlhttp.responseText);
		}
	}
		
}
</script>
</head>
<body>
	<div id="selector">
		<h4>SELECTOR</h4>
		<select id="numero" name="numero" onchange="cambiar()">
			<option value="1">UNO</option>
			<option value="2">DOS</option>
		</select>
	</div>
	<div id="estatico">PARTE ESTÁTICA</div>
	<div id="dinamico">PARTE DINÁMICA</div>
</body>