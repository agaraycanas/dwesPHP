<?php
include ("util.php");

$bd = conectarMySql ( 'test' );

// ===========================================
// FUNCIONES
// ===========================================
function insertar($datos) {
	global $bd;
	$consulta = <<<SQL
insert into PRODUCTO(nombre,precio)
values (:nombre,:precio)
SQL;
	$resultado = $bd->prepare ( $consulta );
	foreach ( $datos as $producto ) {
		$nombre = $producto [0];
		$precio = $producto [1];
		$resultado->bindParam ( ':nombre', $nombre );
		$resultado->bindParam ( ':precio', $precio );
		try {
			$resultado->execute ();
		} catch ( PDOException $e ) {
			echo "<h4>ERROR al INSERTAR</h4> <p>$e</p>";
		}
	}
}
function mostrarFilas() {
	global $bd;
	$consulta = "select nombre,precio from producto";
	$resultado = $bd->query ( $consulta );
	echo '<h4>Actualmente en la Base de Datos</h4>';
	echo '<table border="1">', PHP_EOL;
	echo <<<ENCABEZADO
	<tr>
	<th>Nombre</th>
	<th>Precio</th>
	</tr>
	
ENCABEZADO;
	foreach ( $resultado as $fila ) {
		echo '<tr>';
		echo '<td>', $fila ['nombre'], '</td>';
		echo '<td>', $fila ['precio'], '</td>';
		echo '</tr>', PHP_EOL;
	}
	echo "</table>", PHP_EOL;
}
function mostrarPreparadas($datos) {
	echo '<h4>Preparadas para ser insertadas</h4>';
	echo '<table border="1">', PHP_EOL;
	echo <<<ENCABEZADO
	<tr>
	<th>Nombre</th>
	<th>Precio</th>
	</tr>

ENCABEZADO;
	foreach ( $datos as $fila ) {
		echo '<tr>';
		echo '<td>', $fila [0], '</td>';
		echo '<td>', $fila [1], '</td>';
		echo '</tr>', PHP_EOL;
	}
	echo "</table>", PHP_EOL;
}
function crearTablaProducto() {
	global $bd;
	// echo '<h1>DEBUG</h1>';//DEBUG
	$sql = <<<SQL
CREATE TABLE IF NOT EXISTS producto (
  nombre varchar(30) NOT NULL,
  precio decimal,
  PRIMARY KEY (nombre)
)
SQL;
	$bd->exec ( $sql );
}

// ===========================================
// COMIENZO SCRIPT
// ===========================================

$nombre = isset ( $_REQUEST ['nombre'] ) ? $_REQUEST ['nombre'] : null;
$precio = isset ( $_REQUEST ['precio'] ) ? $_REQUEST ['precio'] : null;
$accion = isset ( $_REQUEST ['accion'] ) ? $_REQUEST ['accion'] : null;

session_start ();

// niguna acción. Primera ejecución
if ($accion == null) {
	$_SESSION ['datos'] = [ ];
	crearTablaProducto ();
} 

// acción preparar
else if ($accion == 'Preparar') {
	if ($nombre != null && $precio != null) {
		// $_SESSION['datos'][sizeof($_SESSION['datos'])] = [$nombre,$precio];
		array_push ( $_SESSION ['datos'], [ 
				$nombre,
				$precio 
		] );
	}
} 

else if ($accion == "Insertar") {
	insertar ( $_SESSION ['datos'] );
	$_SESSION ['datos'] = [ ];
}

// ===========================================
// SALIDA
// ===========================================

echo <<<OUT
<form action="index.php">
	Nombre <input type="text" name="nombre"><br /> 
	Precio <input type="text" name="precio"><br /> 
	<input type="submit" name="accion" value="Preparar">
	<input type="submit" name="accion" value="Insertar"><br />
</form>
<hr />
OUT;

mostrarFilas ();
echo "<hr/>", PHP_EOL;
mostrarPreparadas ( $_SESSION ['datos'] );
?>