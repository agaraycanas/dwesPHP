<?php if ($d['footer']['status']=='ok') :?>
<span class="operacionOk">
OK: Departamento <?= $d['footer']['mensaje'] ?> creado
</span>
<?php else :?>
<span class="operacionFallida">
ERROR: <?= $d['footer']['mensaje'] ?>
</span>
<?php endif;?>
