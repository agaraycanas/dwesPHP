<?php 
function tieneGusto($persona,$aficion) {
    $tiene = false;
    foreach ($persona->ownGustoList as $gusto) {
        if ($aficion->id == $gusto->aficion->id ) {
            $tiene = true;
        }
    }
    return $tiene;
}
function tieneOdio($persona,$aficion) {
    $tiene = false;
    foreach ($persona->ownOdioList as $odio) {
        if ($aficion->id == $odio->aficion->id ) {
            $tiene = true;
        }
    }
    return $tiene;
}
?>
<div class="container">
	<h1>Editar persona</h1>
	
	<form action="<?=base_url()?>persona/uPost" method="post">

		<input type="hidden" name="idPersona" value="<?=$persona->id?>" >
		
		<label for="id-nombre">Nombre</label>
		<input id="id-nombre" type="text" name="nombre" value="<?=$persona->nombre?>"/>
		<br/>

		<label for="id-ape">Apellido</label>
		<input id="id-ape" type="text" name="apellido" value="<?=$persona->apellido?>"/>
		<br/>
		
		<label for="idPaisNace">País de nacimiento</label>
		<select id="idPaisNace" name="idPaisNace">
			<?php foreach ($paises as $pais):?>
			<?php $s = ($pais->id == $persona->fetchAs('pais')->nace->id ) ? 'selected="selected"' : '';?>
			<option value="<?= $pais->id ?>" <?=$s?> >
				<?= $pais->nombre ?>
			</option>
			<?php endforeach;?>
		</select>

		<br/>
		
		<label for="idPaisVive">País de residencia</label>
		<select id="idPaisVive" name="idPaisVive">
			<?php foreach ($paises as $pais):?>
			<?php $s = ($pais->id == $persona->fetchAs('pais')->vive->id ) ? 'selected="selected"' : '';?>
			<option value="<?= $pais->id ?>" <?=$s?> >
				<?= $pais->nombre ?>
			</option>
			<?php endforeach;?>
		</select>

		<fieldset>
		<legend>
		Aficiones que le gustan
		</legend>
		
		<?php foreach ($aficiones as $aficion):?>
			<?php $ck = (tieneGusto($persona,$aficion)) ? 'checked="checked"' : '' ?>
			<input id="idafg-<?= $aficion->id ?>" type="checkbox" name="idAficionGusta[]" value="<?= $aficion->id ?>" <?=$ck?> />
			<label for="idafg-<?= $aficion->id ?>"><?= $aficion->nombre ?></label>
		<?php endforeach;?>
		</fieldset>

		<br/>
		
		<fieldset>
		<legend>
		Aficiones que aborrece
		</legend>
		
		<?php foreach ($aficiones as $aficion):?>
			<?php $ck = (tieneOdio($persona,$aficion)) ? 'checked="checked"' : '' ?>
			<input id="idafo-<?= $aficion->id ?>" type="checkbox" name="idAficionOdia[]" value="<?= $aficion->id ?>" <?=$ck?>/>
			<label for="idafo-<?= $aficion->id ?>"><?= $aficion->nombre ?></label>
		<?php endforeach;?>
		</fieldset>

		<br/>

		
		<input type="submit"/>
	</form>
</div>