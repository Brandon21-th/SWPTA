<!doctype html>
<html lang="en">
  <head>
    <title>Restablecer contraseña!</title>
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
                 <b>Restablecer su contraseña</b>
                  </div>
                   <div class="card-body">
                       <form action="restablecer2.php"method="POST">
                       <!--Campo correo-->    
                       <div class = "form-group">
                       <label for="exampleInputEmail1">Dirección de correo electrónico:</label>
                       <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingrese su correo electrónico">
                       <small id="emailHelp" class="form-text text-muted">Por favor de ingresar su correo electronico para restablecer su contraseña.</small>
                       </div>
                       <!--Botón de restablecer-->
                       <div style="text-align:center;">
                       <button type="submit" class="btn btn-primary">Restablecer contraseña</button>
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