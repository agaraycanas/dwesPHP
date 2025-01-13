<div class="container">
	<h1>Nueva persona</h1>
	
	<form action="<?=base_url()?>persona/cPost" method="post">

		<label for="id-nombre">Nombre</label>
		<input id="id-nombre" type="text" name="nombre"/>
		<br/>
	
		<label for="id-ape">Apellido</label>
		<input id="id-ape" type="text" name="apellido"/>
		<br/>
		
		<label for="id-pwd">Contraseña</label>
		<input id="id-pwd" type="password" name="pwd"/>
		<br/>
		
		<label for="idPaisNace">País de nacimiento</label>
		<select id="idPaisNace" name="idPaisNace">
			<?php foreach ($paises as $pais):?>
			<option value="<?= $pais->id ?>">
				<?= $pais->nombre ?>
			</option>
			<?php endforeach;?>
		</select>

		<br/>
		
		<label for="idPaisVive">País de residencia</label>
		<select id="idPaisVive" name="idPaisVive">
			<?php foreach ($paises as $pais):?>
			<option value="<?= $pais->id ?>">
				<?= $pais->nombre ?>
			</option>
			<?php endforeach;?>
		</select>

		<fieldset>
		<legend>
		Aficiones que le gustan
		</legend>
		
		<?php foreach ($aficiones as $aficion):?>
			<input id="idafg-<?= $aficion->id ?>" type="checkbox" name="idAficionGusta[]" value="<?= $aficion->id ?>" />
			<label for="idafg-<?= $aficion->id ?>"><?= $aficion->nombre ?></label>
		<?php endforeach;?>
		</fieldset>

		<br/>
		
		<fieldset>
		<legend>
		Aficiones que aborrece
		</legend>
		
		<?php foreach ($aficiones as $aficion):?>
			<input id="idafo-<?= $aficion->id ?>" type="checkbox" name="idAficionOdia[]" value="<?= $aficion->id ?>" />
			<label for="idafo-<?= $aficion->id ?>"><?= $aficion->nombre ?></label>
		<?php endforeach;?>
		</fieldset>

		<br/>

		
		<input type="submit"/>
	</form>
</div>