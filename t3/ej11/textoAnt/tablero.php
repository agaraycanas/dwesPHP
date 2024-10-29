<?php require_once 'Carta.php';?>
<?php session_start();?>
<h1>Siete y media</h1>

<h3>Jugada</h3>

<?php $acc=0;?>

<?php if (isset($_SESSION['yo']) && $_SESSION['yo'] == []): ?>
(no se ha jugado ninguna carta todavía)
<?php else: ?>
	<ul>
	<?php foreach ($_SESSION['yo'] as $carta): ?>
		<li>
			<?php $acc += $carta->valor ?>
			<?= $carta->nombre?> (total: <?= $acc ?>)
		</li>
	<?php endforeach;?>
	</ul>
<?php endif; ?>

<br/>

<?php if ($acc<7.5):?>
<a href="sacarCarta.php"><button>Sacar carta</button></a>
<a href="plantarse.php"><button>Plantarse</button></a>
<br/>
<?php else:?>
<?= ($acc==7.5)?'<h3>Has ganado</h3>':'</h3>Has perdido</h3>'?>
<br/>
<?php endif;?>
<a href="inicializar.php"><button>Nuevo juego</button></a>
