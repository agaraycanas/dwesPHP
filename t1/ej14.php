<?php
// ===================================================================
// ===================================================================
// ===================================================================

//---- MENÚ de Primer NIVEL ------------------------

function menu() {

$opcionEscogida = -1;
$opcionMaxima = 10;

while ($opcionEscogida < 0 || $opcionEscogida > $opcionMaxima) {

$menu = <<<'MENU'
CRUD CORPORATIVO
	
Escoge una opción

DEPARTAMENTO
1. Crear
2. Modificar
3. Borrar
4. Recuperar todos
5. Recuperar por Id

EMPLEADO
6. Crear
7. Modificar
8. Borrar
9. Recuperar todos
10. Recuperar por Id

0. SALIR
MENU;

echo $menu.PHP_EOL.PHP_EOL;
echo "OPCIÓN (0 - $opcionMaxima): ";
fscanf(STDIN, "%d\n",$opcionEscogida);
}
	return $opcionEscogida;
}

//--------------------------------------

function ejecutarMenu($n,&$bd) {
	borrarPantalla();
	$salir=false;
	
	switch ($n) {
		case 0: menuSalir();$salir=true;break;

		case 1: menuCdpto($bd);break;
		case 2: menuUDpto($bd);break;
		case 3: menuDDpto($bd);break;
		case 4: menuRADpto($bd);break;
		case 5: menuRIdDpto($bd);break;

		case 6: menuCemp($bd);break;
		case 7: menuUemp($bd);break;
		case 8: menuDemp($bd);break;
		case 9: menuRAEmp($bd);break;
		case 10: menuRIdEmp($bd);break;
	}
	
	if (!$salir) {
		continuar();
		borrarPantalla();
	}
}
//--------------------------------------


//--------------------------------------
//---- Menús de 2º nivel ---------------
//--------------------------------------

function menuSalir() {
	echo <<<'MENU'
			ADIÓS
MENU;
}

function menuCdpto(&$bd) {
	echo <<<'MENU'
			NUEVO DEPARTAMENTO
MENU;
// Hacer aquí las acciones DAO
}

function menuUDpto(&$bd) {
	echo <<<'MENU'
			MODIFICAR DEPARTAMENTO
MENU;
	// Hacer aquí las acciones DAO
	}

function menuDDpto(&$bd) {
	echo <<<'MENU'
			BORRAR DEPARTAMENTO
MENU;
	// Hacer aquí las acciones DAO
	
}

function menuRADpto(&$bd) {
	echo <<<'MENU'
			LISTA de DEPARTAMENTOS
MENU;
	// Hacer aquí las acciones DAO
	
}

function menuRIdDpto(&$bd) {
	echo <<<'MENU'
			RECUPERAR DEPARTAMENTO por ID
MENU;
	// Hacer aquí las acciones DAO
	
}

function menuCemp(&$bd) {
	echo <<<'MENU'
			CREAR EMPLEADO
MENU;
	// Hacer aquí las acciones DAO
	
}

function menuUemp(&$bd) {
	echo <<<'MENU'
			MODIFICAR EMPLEADO
MENU;
	// Hacer aquí las acciones DAO
	
}

function menuDemp(&$bd) {
	echo <<<'MENU'
			BORRAR EMPLEADO
MENU;
	// Hacer aquí las acciones DAO
	
}

function menuRAEmp(&$bd) {
	// Mostrar el nombre del dpto. al que pertenece, no el idDpt
	echo <<<'MENU'
			LISTA de EMPLEADOS
MENU;
	// Hacer aquí las acciones DAO
	
}

function menuRIdEmp(&$bd) {
	// Mostrar el nombre del dpto. al que pertenece, no el idDpt
	echo <<<'MENU'
			RECUPERAR EMPLEADO por ID
MENU;
	// Hacer aquí las acciones DAO
	
}

// ---- funciones útiles de presentación

function borrarPantalla() {
	for ($i=0;$i<40;$i++) {
		echo PHP_EOL;
	}
}

function continuar() {
	$tecla ='';
	echo PHP_EOL;
	echo 'PULSA ENTER PARA CONTINUAR';
	fscanf(STDIN,"%s\n",$tecla);
}

//--------------------------------------
//---- FUNCIONES DAO -------------------
//--------------------------------------

function crearEmpleado(&$bd, $idEmp, $nombre, $apellido, $idDpt) {
	$bd['emp'][0]['idemp']=$idEmp;
}

function modificarEmpleado(&$bd, $idEmp, $nombre, $apellido, $idDpt) {

}

// etc...

// ===================================================================
// ===================================================================
// ===== COMIENZO del PROGRAMA =======================================
// ===================================================================
// ===================================================================

$terminar = false;
$bd= [];

while (!$terminar) {
	switch (menu()) {
		case 0: ejecutarMenu(0,$bd);$terminar=true;break;
		
		case 1: ejecutarMenu(1,$bd);break;
		case 2: ejecutarMenu(2,$bd);break;
		case 3: ejecutarMenu(3,$bd);break;
		case 4: ejecutarMenu(4,$bd);break;
		case 5: ejecutarMenu(5,$bd);break;
		case 6: ejecutarMenu(6,$bd);break;
		case 7: ejecutarMenu(7,$bd);break;
		case 8: ejecutarMenu(8,$bd);break;
		case 9: ejecutarMenu(9,$bd);break;
		case 10: ejecutarMenu(10,$bd);break;
	}
}
?>