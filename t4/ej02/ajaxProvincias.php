<?php
include ('util.php');
$ca = isset ($_REQUEST['ca'])?$_REQUEST['ca']:null;
pintarSelect ( 'provincias', $BDccaa [$ca], ['0'], 'simple' );
?>