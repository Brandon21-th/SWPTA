<?php
session_start();
include("config/bd.php");
$txtCorreo=(isset($_POST['usuario']))?$_POST['usuario']:"";
$txtPass=(isset($_POST['contrasenia']))?$_POST['contrasenia']:"";
$txtPass = hash('sha512', $txtPass);


$sentenciasSQL= $conexion->prepare("SELECT * FROM usuarios WHERE email=:email and pass=:pass and roles='Administrador'");
$sentenciasSQL->bindParam(':email',$txtCorreo);
$sentenciasSQL->bindParam(':pass',$txtPass);
$sentenciasSQL->execute();
$usuario=$sentenciasSQL->fetch(PDO::FETCH_LAZY);

$txtCorreo=$usuario['email'];
$txtPass=$usuario['pass'];

if($_POST){
    if(isset($txtCorreo) && ($txtPass)){
      $_SESSION['usuario']="$txtCorreo";
      header('Location:inicio.php');
     
  }else{

    $mensaje="Error: El correo o contraseña son incorrectos";
  }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Login!</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../css/estilosA.css">
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
                  <div class="card-header">
                 Iniciar Sesión
                  </div>
                   <div class="card-body">
                        <?php if(isset($mensaje)){ ?>
                       <div class="alert alert-danger" role="alert">
                         <?php echo $mensaje; ?>
                       </div>
                       <?php } ?>
                       <form method="POST">
                       <!--Campo correo-->    
                       <div class = "form-group">
                       <label for="exampleInputEmail1">Dirección de correo electrónico:</label>
                       <input type="email" class="form-control" name="usuario" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingrese el correo electrónico">
                       <small id="emailHelp" class="form-text text-muted">Nunca compartiremos tu correo electrónico con nadie más.</small>
                       </div>
                       <!--Campo contraseña-->
                       <div class="form-group">
                       <label for="exampleInputPassword1">Contraseña:</label>
                       <input type="password" class="form-control"  name="contrasenia"  placeholder="Ingrese su contraseña">
                       </div>
                       <br>
                       <!--Botón de iniciar sesión-->
                       <button type="submit" class="btn btn-primary">Entrar</button>
                       <br><br>
                       <div style="text-align:center;">
                      <a href="restablecer.php">¿Olvidaste tu contraseña?</a>
                      <br>
                      <a href="../index.php">Regresar a Inicio</a>
                      </div>
                       </form>
                       
                       
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