<div class="container">
	<h1>Nuevo resultado</h1>

	<form action="<?=base_url()?>resultado/cPost" method="post">
	
		Jornada num.
		<select name="idJornada">
			<?php foreach ($jornadas as $jornada): ?>
				<option value="<?=$jornada->id?>"><?=$jornada->numero ?></option>
			<?php endforeach;?>
		</select>
		<br/>
			
		Equipo local
		<select name="idEquipoLocal">
			<?php foreach ($equipos as $equipo): ?>
				<option value="<?=$equipo->id?>"><?=$equipo->nombre?></option>
			<?php endforeach;?>
		</select>
		
		<input type="number" name="gl" value="0" min="0" max="200"/>
		<br/>
		
		Equipo visitante
		<select name="idEquipoVisitante">
			<?php foreach ($equipos as $equipo): ?>
				<option value="<?=$equipo->id?>"><?=$equipo->nombre?></option>
			<?php endforeach;?>
		</select>
		
		<input type="number" name="gv" value="0" min="0" max="200"/>
		<br/>
		
		<input type="submit" />
	</form>
</div>