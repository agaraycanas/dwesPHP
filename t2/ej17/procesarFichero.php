<?php
copy ( $_FILES ['miFichero'] ['tmp_name'], 'files/'.($_POST['tipo']=='t'?'txt':'img').'/'.$_FILES['miFichero']['name'] );
echo '<h1>FICHERO COPIADO</h1>';
?>