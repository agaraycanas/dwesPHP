<head>
<script>
	function conjugar() {
		var xmlhttp = new XMLHttpRequest();
		var verbo = document.getElementById('verbo').value;
		xmlhttp.open("GET","conjugar.php?verbo="+verbo,true);
		xmlhttp.send();
		xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
				document.getElementById("mensaje").innerHTML =
				'<select>' +
				xmlhttp.responseText +
				'</select>';
			}
		}
	}

	function conjugacion() {
		var xmlhttp = new XMLHttpRequest();
		var verbo = document.getElementById('verbo').value;
		xmlhttp.open("GET","conjugacion.php?verbo="+verbo,true);
		xmlhttp.send();
		xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
				document.getElementById("mensaje").innerHTML=
				'<b>'+
				xmlhttp.responseText+
				'ª conjugación</b>'
				;
			}
		}
	}

</script>

</head>
<body>
	<h3>Introduce un verbo</h3>

	<input type="text" id="verbo" />

	<br />

	<button onclick="conjugacion()">Conjugación</button>

	<button onclick="conjugar()">Conjugar</button>

	<div id="mensaje"></div>

	<h3>..y observa el resultado</h3>
</body>