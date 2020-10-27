<?php
$a = [10,20,30];
print_r($a);
unset($a[1]);
$a = array_values($a);
print_r($a);

?>