<?php if ($body['status']==0):?>
<div class="container alert alert-success col-xs-5">
  Lenguaje de programación <strong><?=$body['nombre']?></strong> creado con éxito
</div>
<?php elseif ($body['status']==-1):?>
<div class="container alert alert-danger col-xs-5">
  <strong>ERROR</strong> Lenguaje de programación <strong><?=$body['nombre']?></strong> ya existente
</div>
<?php endif;?>