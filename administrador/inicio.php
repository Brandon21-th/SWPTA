<?php  include("templates/cabecera.php");?>
              <div class="col-md-12">
              <div class="jumbotron">
              <h1 class="display-3">Bienvenido</h1>
              <h3><?php echo $_SESSION['usuario'] ?></h3>
              <p class="lead">Administrar los servicos de la tienda</p>
              <hr class="my-2">
              <p>Mas información</p>
              <p class="lead">
              <a class="btn btn-primary btn-lg" href="seccion/productos.php" role="button">Gestión de productos</a>
              </p>
              </div>
              </div>
<?php  include("templates/pie.php");?>