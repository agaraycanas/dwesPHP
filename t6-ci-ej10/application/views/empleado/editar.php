<div class="container">
	<h2>Introduce los nuevos datos del empleado</h2>
	<form class="form" action="<?=base_url()?>empleado/editarPost" method="post">
		<input type="hidden" name="id_empleado" value="<?= $body['empleado']->id ?>">
	
		<div class="form-group">
			<label for="idNombre">Nombre</label> <input  class="form-control" type="text" name="nombre"
				id="idNombre" value="<?= $body['empleado']->nombre ?>">
		</div>
		
		<div class="form-group">
			<label for="idApe1">Primer apellido</label> <input  class="form-control" type="text"
				name="ape1" id="idApe1" value="<?= $body['empleado']->ape1 ?>">
		</div>

		<div class="form-group">
			<label for="idApe2">Segundo apellido</label> <input  class="form-control" type="text"
				name="ape2" id="idApe2" value="<?= $body['empleado']->ape2 ?>">
		</div>

		<div class="form-group">
			<label for="idTlf">Teléfono</label> <input  class="form-control" type="text" name="tlf"
				id="idTlf" value="<?= $body['empleado']->tlf ?>">
		</div>
		
		<div class="form-group">
			<label for="idCiudad">Ciudad de nacimiento</label> 
			<select name="idCiudad">
				<?php foreach ($body['ciudades'] as $ciudad): ?>
					<option value="<?=$ciudad['id'] ?>" <?= $ciudad->id == $body['empleado']->ciudad->id ? 'selected="selected"':''?>>
						<?=$ciudad['nombre'] ?>
					</option>
				<?php endforeach;?>
			</select>
		</div>
		
		<div class="form-group">
			<fieldset>
			<legend>Lenguajes de programación que conoce</legend> 
				<?php foreach ($body['lps'] as $lp): ?>
					<input id="id<?= $lp['id']?>" type="checkbox" value="<?= $lp['id']?>" name="idLP[]" 
					 <?= in_array($lp->id, $body['id_lps']) ?'checked="checked"':'' ?> >
					<label for="id<?= $lp['id']?>"><?= $lp['nombre']?></label>
				<?php endforeach;?>
			</fieldset>
		</div>
		

		<div class="form-group">
			<input  class="form-control" type="submit">
		</div>
		
		
	</form>
</div>