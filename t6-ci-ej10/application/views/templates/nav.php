

<nav class="container navbar navbar-inverse">
  <div class="navbar-header">
    <a class="navbar-brand" href="<?=base_url()?>">CRUD-emple</a>
  </div>
  <div class="collapse navbar-collapse" id="myNavbar">
    <ul class="nav navbar-nav">
    
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
           Empleado<span class="caret"></span>
        </a>
		<ul class="dropdown-menu">
		
		  <?php if (isset($header['empleado']['nombre'])): ?>
		  <li><a href="<?=base_url()?>empleado/crear">Crear</a></li>
		  <li><a href="<?=base_url()?>empleado/modificar">Modificar</a></li>
		  <li><a href="<?=base_url()?>empleado/borrar">Borrar</a></li>
		  <?php endif;?>
		  
		  <li><a href="<?=base_url()?>empleado/listar">Listar</a></li>

	     </ul>
      </li>

      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
           Ciudad<span class="caret"></span>
        </a>
		<ul class="dropdown-menu">
		  <?php if (isset($header['empleado']['nombre'])): ?>
		  <li><a href="<?=base_url()?>ciudad/crear">Crear</a></li>
		  <li><a href="<?=base_url()?>ciudad/modificar">Modificar</a></li>
		  <li><a href="<?=base_url()?>ciudad/borrar">Borrar</a></li>
		  <?php endif;?>

		  <li><a href="<?=base_url()?>ciudad/listar">Listar</a></li>
	     </ul>
      </li>

      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
           Lenguaje de programación<span class="caret"></span>
        </a>
		<ul class="dropdown-menu">
		  <?php if (isset($header['empleado']['nombre'])): ?>
		  <li><a href="<?=base_url()?>lp/crear">Crear</a></li>
		  <li><a href="<?=base_url()?>lp/modificar">Modificar</a></li>
		  <li><a href="<?=base_url()?>lp/borrar">Borrar</a></li>
		  <?php endif;?>
		  <li><a href="<?=base_url()?>lp/listar">Listar</a></li>
	     </ul>
      </li>



    </ul>
  </div>
</nav>


