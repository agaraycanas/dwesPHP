<header class="container">

<div class="row">

<img src="<?=base_url()?>assets/img/emple.jpg" class="img-rounded  center-block" alt="Empleados trabajando" height="100">

<div class="pull-right">
<?php if (isset ($header['empleado']['nombre'])) : ?>
	<?= $header['empleado']['nombre'] ?> <?= $header['empleado']['ape1'] ?> <a href="<?=base_url()?>empleado/logout">LOGOUT</a>
<?php else: ?>
	<a href="<?=base_url()?>empleado/login">LOGIN</a>
<?php endif;?>
</div>

</div>

</header>
