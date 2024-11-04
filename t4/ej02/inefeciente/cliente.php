<?php 
$ca = (isset($_GET['ca'])) ? $_GET['ca'] : 'Andalucía';
$sel = 'selected="selected"';
$ccaa_y_provincias = [
    'Andalucía' => [
        'Almería',
        'Cádiz',
        'Córdoba',
        'Granada',
        'Huelva',
        'Jaén',
        'Málaga',
        'Sevilla'
    ],
    'Aragón' => [
        'Huesca',
        'Teruel',
        'Zaragoza'
    ],
    'Asturias (Principado de)' => [
        'Asturias'
    ],
    'Canarias' => [
        'Palmas (Las)',
        'Santa Cruz de Tenerife'
    ],
    'Cantabria' => [
        'Cantabria'
    ],
    'Castilla y León' => [
        'Ávila',
        'Burgos',
        'León',
        'Palencia',
        'Salamanca',
        'Segovia',
        'Soria',
        'Valladolid',
        'Zamora'
    ],
    'Castilla-La Mancha' => [
        'Albacete',
        'Ciudad Real',
        'Cuenca',
        'Guadalajara',
        'Toledo'
    ],
    'Cataluña' => [
        'Barcelona',
        'Gerona',
        'Lérida',
        'Tarragona'
    ],
    'Ceuta (Ciudad de)' => [
        'Ceuta'
    ],
    'Comunidad Valenciana' => [
        'Alicante',
        'Castellón',
        'Valencia'
    ],
    'Extremadura' => [
        'Badajoz',
        'Cáceres'
    ],
    'Galicia' => [
        'Coruña (La)',
        'Lugo',
        'Orense',
        'Pontevedra'
    ],
    'Islas Baleares' => [
        'Islas Baleares'
    ],
    'Madrid (Comunidad de)' => [
        'Madrid'
    ],
    'Melilla (Ciudad de)' => [
        'Melilla'
    ],
    'Murcia (Región de)' => [
        'Murcia'
    ],
    'Navarra (Comunidad Foral de)' => [
        'Navarra'
    ],
    'País Vasco' => [
        'Álava',
        'Guipúzcoa',
        'Vizcaya'
    ],
    'Rioja (La)' => [
        'Rioja (La)'
    ]
];

?>
<body>
	<h1>Comunidades autónomas</h1>

<form action="cliente.php">
	<label for="ccaa"> CCAA </label>
	<select id="ccaa" onchange="submit()" name="ca">
		<option <?= $ca=='Andalucía' ? $sel : '' ?>>Andalucía</option>
		<option <?= $ca=='Aragón' ? $sel : '' ?>>Aragón</option>
		<option <?= $ca=='Canarias' ? $sel : '' ?>>Canarias</option>
		<option <?= $ca=='Cantabria' ? $sel : '' ?>>Cantabria</option>
		<option <?= $ca=='Castilla y León' ? $sel : '' ?>>Castilla y León</option>
		<option <?= $ca=='Castilla-La Mancha' ? $sel : '' ?>>Castilla-La Mancha</option>
		<option <?= $ca=='Cataluña' ? $sel : '' ?>>Cataluña</option>
		<option <?= $ca=='Ceuta (Ciudad de)' ? $sel : '' ?>>Ceuta (Ciudad de)</option>
		<option <?= $ca=='Comunidad Valenciana' ? $sel : '' ?>>Comunidad Valenciana</option>
		<option <?= $ca=='Extremadura' ? $sel : '' ?>>Extremadura</option>
		<option <?= $ca=='Galicia' ? $sel : '' ?>>Galicia</option>
		<option <?= $ca=='Islas Baleares' ? $sel : '' ?>>Islas Baleares</option>
		<option <?= $ca=='Madrid (Comunidad de)' ? $sel : '' ?>>Madrid (Comunidad de)</option>
		<option <?= $ca=='Melilla (Ciudad de)' ? $sel : '' ?>>Melilla (Ciudad de)</option>
		<option <?= $ca=='Murcia (Región de)' ? $sel : '' ?>>Murcia (Región de)</option>
		<option <?= $ca=='Navarra (Comunidad Foral de)' ? $sel : '' ?>>Navarra (Comunidad Foral de)</option>
		<option <?= $ca=='País Vasco' ? $sel : '' ?>>País Vasco</option>
		<option <?= $ca=='Rioja (La)' ? $sel : '' ?>>Rioja (La)</option>
	</select>
</form>

	<br />

	<label for="provincia"> Provincia </label>
	<select id="provincia">
		<?php foreach ($ccaa_y_provincias[$ca] as $provincia):?>
			<option>
				<?= $provincia ?>
			</option>
		<?php endforeach;?>
	</select>

	<h3>Escoge una comunidad autónoma</h3>
	<h4>Observa el cambio de provincias de forma ineficiente</h4>


</body>