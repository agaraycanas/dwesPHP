<?php
$verbo = $_GET['verbo'];
$desinencia = substr($verbo,-2,2);
$raiz = substr($verbo,0,-2);
$conjugaciones = [
    'ar' => [ 'o','as','a','amos','áis','an'],
    'er' => [ 'o','es','e','emos','éis','en'],
    'ir' => [ 'o','es','e','imos','ís','en'],
];

$html ='';
foreach ($conjugaciones[$desinencia] as $fin) {
    $html .= '<option>';
    $html .= $raiz.$fin;
    $html .= '</option>';
}
echo $html; 
?>