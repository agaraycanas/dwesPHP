<?php
$verbo = $_GET['verbo'];
$sol=0;
switch (substr($verbo,-2,2) ) {
    case 'ar':$sol=1;break;
    case 'er':$sol=2;break;
    case 'ir':$sol=3;break;
}
echo $sol;
?>