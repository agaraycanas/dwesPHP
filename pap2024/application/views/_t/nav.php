<nav class="container bg-dark  rounded">
	<ul class="nav nav-tabs">

		<li class="nav-item navbar-brand">
			<a class="nav-link " aria-current="page" href="<?=base_url()?>">
				<img src="<?= base_url() ?>assets/img/icons/home.png" alt="INICIO" style="width:40px;">
			</a>
		</li>

		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
				Listados
			</a>
			<ul class="dropdown-menu">
				<li><a class="dropdown-item" href="<?=base_url()?>pais/r">Países</a></li>
				<li><a class="dropdown-item" href="<?=base_url()?>aficion/r">Aficiones</a></li>
				<li><a class="dropdown-item" href="<?=base_url()?>persona/r">Personas</a></li>
			</ul>
		</li>
	</ul>
</nav>