<?php

session_start();
if(isset($_SESSION['usuario'])){

  header("location:seccion/inicio.php");
}


?>





<!--Registrarse el usuario-->

<!doctype html>
<html lang="en">
  <head>
    <title>Login!</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/estilos_loginC.css">
  </head>
  <body>
     <main>
       <div class="contenedor__todo">
         <div class="caja__trasera">
           <div class="caja__trasera-login">
             <h3>¿Ya tienes cuenta?</h3>
             <p>Inicia sesión para entrar en la página</p>
             <button id="btn__iniciar-sesion">Iniciar Sesión</button>
           </div>
           <div class="caja__trasera-register">
             <h3>¿Aún no tienes cuenta?</h3>
             <p>Registrate para que puedas iniciar sesión</p>
             <button id="btn__registrarse">Registrarse</button>
           </div>
         </div>

         <div class="contenedor__login-register">
           <form method="POST" action="login_usuario.php" class="formulario__login-register">
             <h2>Iniciar Sesión</h2>
             <input type="text"  name="txtEmail" placeholder="Correo Electrónico">
             <small id="emailHelp" class="form-text text-muted">Nunca compartiremos tu correo electrónico con nadie más.</small>
             <input type="password" name="txtPass"  placeholder="Contraseña">
             <button type="submit">Entrar</button>
             <br><br>
             <div style="text-align:center;">
              <a href="restablecer.php">¿Olvidaste tu contraseña?</a>
              <br>
              <a href="../index.php">Regresar a Inicio</a>
             </div>
           </form>

           <form  action="registro_usuario2.php" method="POST" class="formulario__register">
             <h2>Registrarse</h2>
             <input type="text"  placeholder="Nombre(s)" name="txtNombre">
             <input type="text"  placeholder="Apellido Paterno" name="txtApellidop">
             <input type="text"  placeholder="Apellido Materno" name="txtApellidom">
             <input type="text"  placeholder="Calle donde vive" name="txtCalle">
             <input type="text"  placeholder="Numero de casa de usted" name="txtNumero">
             <input type="text"  placeholder="Colonia o Localidad" name="txtColonia">
             <input type="text"  placeholder="Código postal" name="txtCP">
             <select class="form-select" id="municipio" placeholder="Municipio" name="txtMunicipio">
            <option>Cosamaloapan De Carpio</option>
            <option>Carlos A Carrillo</option>
      
             </select>
             <!--<input type="text" placeholder="Municipio" name="txtMunicipio">-->

             <input type="text" placeholder="Correo Electrónico" name="txtEmail">
             <input type="hidden"  value="Usuario" name="txtRoles">
             <input type="password"  placeholder="Contraseña" name="txtPass">
             <button type="submit" >Registrarse</button>
           </form>
         </div>

         

       </div>

     </main>
    <script src="../js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>