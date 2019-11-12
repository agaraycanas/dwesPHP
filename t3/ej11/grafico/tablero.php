<?php require_once 'Carta.php';?>
<?php session_start();?>
<?php $status=isset($_GET['status'])?$_GET['status']:'sigo'?>
<h1>Siete y media</h1>


<?php if ($status=='sigo'):?>
<a href="sacarCarta.php">
<button>Sacar carta</button>
</a>
<?php endif;?>


<?php if (isset($_SESSION['yo']) && $_SESSION['yo'] == []): ?>
(no se ha jugado ninguna carta todavía)
<?php else: ?>
<h3>Jugada (<?=$_SESSION['total']?> ptos.)</h3>
	<table><tr>
		<?php foreach ($_SESSION['yo'] as $carta): ?>
		<td><img src="<?=$carta->img?>" width="90" height="135"/></td>
		<?php endforeach;?>
	</tr></table>
<?php endif; ?>

<br/>

<?php if ($status=='gano'):?>
<h3>¡¡ Has ganado !!</h3>
<?php endif;?>

<?php if ($status=='pierdo'):?>
<h3>¡¡ OOOOH !!</h3>
<?php endif;?>


<?php if ($status=='sigo'):?>
<a href="plantarse.php">
<button>Plantarse</button>
</a>

<br/>
<?php endif;?>

<a href="inicializar.php">
<button>Nuevo juego</button>
</a>

