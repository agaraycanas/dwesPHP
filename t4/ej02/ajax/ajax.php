<?php
//$ca = isset($_POST['ca']) ? $_POST['ca'] : null;
$ca = isset($_GET['ca']) ? $_GET['ca'] : null;
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

$html = '';

if ($ca != null ) {
    foreach ($ccaa_y_provincias[$ca] as $provincia){
        $html .= '<option>'.$provincia."</option>\n";
    }
    
}
echo $html;
