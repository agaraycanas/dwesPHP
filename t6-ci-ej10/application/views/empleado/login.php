<div class="container">
<h2>
Introduce el nombre del empleado y la contraseña</h2>
<form action="<?=base_url()?>empleado/loginPost" method="post" class="form">
	<div class="form-group">
		<label for="idNombre">Nombre</label>
		<input id="idNombre" type="text" name="nombre">
		</div>

	<div class="form-group">
		<label for="idPwd">Contraseña</label>
		<input id="idPwd" type="password" name="pwd">
	</div>
	
	<input type="submit">
</form>
</div>
