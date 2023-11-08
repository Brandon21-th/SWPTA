<?php
include "config/bd2.php";


$email = $_POST['email'];
$token = $_POST['token'];
$codigo = $_POST['codigo'];


$res=$conexion->query("select * from passwords where
email='$email' and token='$token' and codigo='$codigo'")
or die($conexion->error);
$correcto=false;
if(mysqli_num_rows($res) > 0 ){
    $fila = mysqli_fetch_row($res);
    $fecha=$fila[4];
    $fecha_actual=date("Y-m-d h:m:s");
    $segundos = strtotime($fecha_actual) - strtotime($fecha);
    $minutos= $segundos / 60;
    $correcto=true;
}else{
    
    $correcto=false;
}



?>
<!doctype html>
<html lang="en">
  <head>
    <title>Inserta código!</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      
    <div class="container">
        <div class="row">
            <div class="col-md-4">
               
            </div>
            <div class="col-md-4">
            <br/><br/><br/>
               <div class="card">
                  <div class="card-header" style="text-align:center;">
                 <b>Nueva contraseña</b>
                  </div>
                   <div class="card-body">
                   <?php if($correcto){?>
                       <form action="cambiar.php"method="POST">
                       <!--Campo correo-->    
                       <div class = "form-group">
                       <label for="exampleInputEmail1">Nueva contraseña:</label>
                       <input type="password" class="form-control" name="p1">
                       </div>
                       <div class = "form-group">
                       <label for="exampleInputEmail1">Confirmar contraseña:</label>
                       <input type="password" class="form-control" name="p2" >
                       <input type="hidden" class="form-control" name="email" value="<?php echo $email;?>" >
                       </div>
                       <!--Botón de restablecer-->
                       <div style="text-align:center;">
                       <button type="submit" class="btn btn-primary">Cambiar</button>
                       </div>
                    </form>
                    <?php }else{?>
                       <div class="alert alert-danger">Código incorrecto</div>
                       <?php }?>
                   </div> 
                </div>
            </div>
        </div>
    </div>






    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>