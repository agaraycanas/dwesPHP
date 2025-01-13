<?php 
session_start();
if (isset($_GET['infinitivo'])) { // Siguientes veces 
    $_SESSION['infinitivos'][] = $_GET['infinitivo'];
    if (isset($_GET['accion']) && $_GET['accion']=='Conjugar') {
        header('Location:dos.php');
    }
}
else { //Primera vez
    $_SESSION['infinitivos'] = [];
}
?>
<h1>Introduce un verbo</h1>
<form action="uno.php">
	<input type="text" name="infinitivo" autofocus="autofocus"/>
	<br/>
	<input type="submit" value="Más verbos" name="accion"/>
	<input type="submit" value="Conjugar" name="accion"/>
</form>