<head>
<script type="text/javascript">
function usarAJAX() {
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","ajax.php?nombre=Alberto&apellido=Garay",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send();
	xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			document.getElementById("idDiv").innerHTML=xmlhttp.responseText;
		}
	}
}
</script>
</head>

<body>
	<h2>Texto fijo</h2>
	<div id="idDiv">
		<h2>Texto cambiante</h2>
	</div>
	<button onclick="usarAJAX()">Cambiar</button>
</body>