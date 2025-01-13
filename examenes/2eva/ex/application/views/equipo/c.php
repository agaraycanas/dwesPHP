<div class="container">
	<h1>Nuevo equipo</h1>

	<form action="<?=base_url()?>equipo/cPost" method="post">
		<label for="idNombre">Nombre</label> 
		<input id="idNombre" type="text" name="nombre" required="required"/> 
		<br /> 
		<input type="submit" />
	</form>
</div>