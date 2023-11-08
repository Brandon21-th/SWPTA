<?php  include("../templates/cabecera.php");?>
              <div class="col-md-12">
              <div class="jumbotron">
              <h1 class="display-3">Bienvenido</h1>
              <h3><?php echo $_SESSION['usuario'] ?></h3>
              <p class="lead">Observa nuestros productos!!!!</p>
              <hr class="my-2">
              <p>Mas información</p>
              <p class="lead">
              <a class="btn btn-primary btn-lg" href="productos.php" role="button">Ver los productos</a>
              </p>
              </div>
              </div>
<?php  include("../templates/pie.php");?>