<header class="bg-dark container">
	<?php if (!isset($_header['persona'])): ?>
    	<a href="<?=base_url()?>persona/login">LOGIN</a> 
    	<a href="<?=base_url()?>persona/c">REGISTRO</a>
	<?php else: ?>
		<span class="text-white">Hola <?= $_header['persona']->nombre ?></span>
		<a href="<?=base_url()?>persona/logoutPost">LOGOUT</a>
	<?php endif; ?>
</header>