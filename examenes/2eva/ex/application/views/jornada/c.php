<div class="container">
	<h1>Nueva jornada</h1>

	<form action="<?=base_url()?>jornada/cPost" method="post">

		<label for="idNumero">Número</label> 
		<input id="idNumero" type="number" name="numero" required="required"/> 
		<br /> 

		<label for="idIni">Fecha de inicio</label> 
		<input id="idIni" type="date" name="ini" required="required"/> 
		<br /> 

		<label for="idFin">Fecha de finalización</label> 
		<input id="idFin" type="date" name="fin" required="required"/> 
		<br /> 
		<input type="submit" />
	</form>
</div>