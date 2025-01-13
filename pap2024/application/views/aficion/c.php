<div class="container">
	<h1>Nueva afición</h1>
	
	<form action="<?=base_url()?>aficion/cPost" method="post">
		<label for="id-nombre">Nombre</label>
		<input id="id-nombre" type="text" name="nombre"/>
		<br/>
		<input type="submit"/>
	</form>
</div>