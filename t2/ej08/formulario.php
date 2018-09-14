<html>

<head>
<title>Formulario completo</title>
	<meta charset="utf-8">
</head>

<body>
	<form name="f1" method="get" action="mostrar.php">
		<h1>Formulario con m&uacute;ltiples campos</h1>
		<b>CAMPOS DE TEXTO:</b> <br /> Nombre: <input type="text"
			name="txtNombre" value="Pepe" /> <br /> Contrase&ntilde;a: <input
			type="password" name="pswClave"> <br /> Oculto <input type="hidden"
			name="hdnOculto" value="invisible" /> <br />
		<hr />
		<b>RADIO:</b> <br /> &nbsp;&nbsp; Rojo <input type="radio"
			value="Rojo" name="rdSemaforo" /> <br /> &nbsp;&nbsp; Naranja <input
			type="radio" value="Naranja" name="rdSemaforo" checked="checked" /> <br />&nbsp;&nbsp;
		Verde <input type="radio" value="Verde" name="rdSemaforo" /><br />
		<hr />

		<b>CHECKBOX:</b> <br /> &nbsp;&nbsp; Quiero recibir publicidad <input
			type="checkbox" value="Publicidad" name="ckPubli" /> <br /> MULTI
		CHECKBOX: <br />

		<!-- Se declara el nombre terminado en [] para tratarlo en PHP como un array -->
		&nbsp;&nbsp;<label>Ingl&eacute;s</label> <input type="checkbox"
			name="ckIdioma[]" value="English" /> &nbsp;&nbsp; Franc&eacute;s <input
			type="checkbox" name="ckIdioma[]" checked="checked"
			value="Fran&ccedil;ais" />&nbsp;&nbsp; Alem&aacute;n <input
			type="checkbox" name="ckIdioma[]" value="Deutch" />

		<hr />

		<b>SELECT: </b> <br /> <b>Simple:</b> <br /> A&ntilde;o de
		finalizaci&oacute;n de estudios: <select name="selAnioFinEstudios">
			<option value="2010">2010</option>
			<option value="2011" selected="selected">2011</option>
			<option value="2012">2012</option>
		</select> <br /> <b>M&uacute;ltiple:</b> <br /> Ciudades:

		<!-- Se declara el nombre terminado en [] para tratarlo en PHP como un array -->
		<select name="selCodigosPostales[]" multiple="multiple">
			<option value="17">Gerona</option>
			<option value="28">Madrid</option>
			<option value="50">Zaragoza</option>
		</select> <br />
		<hr />

		<b>TEXTAREA:</b> <br /> Comentarios
		<textarea name="txaComentarios"> </textarea>

		<hr />
		<b>ARCHIVO:</b> <br /> 
		<input type="file" name="flArchivo" />

		<hr />
		<b>BOTONES:</b> <br /> 
		<input type="button" value="Mostrar un mensaje"
			onclick="alert('Un bot&oacute;n gen&eacute;rico');" /> <input
			type="submit" name="botonEnviar"
			value="Enviar formulario al servidor" /> 
		<input type="image" src="flechaVerde.gif" width="30" height="30"
			title="Equivalente a submit" name="imagen"/> 
		<input type="reset" value="Resetear el formulario" />
	</form>
</body>
</html>
