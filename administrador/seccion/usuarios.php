<?php include("../templates/cabecera.php");?>
<?php
$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
$txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
$txtApellidop=(isset($_POST['txtApellidop']))?$_POST['txtApellidop']:"";
$txtApellidom=(isset($_POST['txtApellidom']))?$_POST['txtApellidom']:"";
$txtCalle=(isset($_POST['txtCalle']))?$_POST['txtCalle']:"";
$txtNumero=(isset($_POST['txtNumero']))?$_POST['txtNumero']:"";
$txtColonia=(isset($_POST['txtColonia']))?$_POST['txtColonia']:"";
$txtCP=(isset($_POST['txtCP']))?$_POST['txtCP']:"";
$txtMunicipio=(isset($_POST['txtMunicipio']))?$_POST['txtMunicipio']:"";
$txtEmail=(isset($_POST['txtEmail']))?$_POST['txtEmail']:"";
$txtRoles=(isset($_POST['txtRoles']))?$_POST['txtRoles']:"";
$txtPass=(isset($_POST['txtPass']))?$_POST['txtPass']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";




include("../config/bd.php");


switch($accion){
      
    case"Agregar":
       $senteciaSQL= $conexion->prepare("INSERT INTO usuarios (nombre,apellidop,apellidom,calle,numero,colonia,cp,municipio,email,roles,pass) VALUES (:nombre,:apellidop,:apellidom,:calle,:numero,:colonia,:cp,:municipio,:email,:roles,:pass);");
       
        $senteciaSQL->bindParam(':nombre',$txtNombre);
        $senteciaSQL->bindParam(':apellidop',$txtApellidop);
        $senteciaSQL->bindParam(':apellidom',$txtApellidom);
        $senteciaSQL->bindParam(':calle',$txtCalle);
        $senteciaSQL->bindParam(':numero',$txtNumero);
        $senteciaSQL->bindParam(':colonia',$txtColonia);
        $senteciaSQL->bindParam(':cp',$txtCP);
        $senteciaSQL->bindParam(':municipio',$txtMunicipio);
        $senteciaSQL->bindParam(':email',$txtEmail);
        $senteciaSQL->bindParam(':roles',$txtRoles);
        $senteciaSQL->bindParam(':pass',$txtPass);
        $senteciaSQL->execute();
    break;
    case"Modificar":

        $sentenciaSQL= $conexion->prepare("UPDATE usuarios set nombre=:nombre, apellidop=:apellidop, apellidom=:apellidom, calle=:calle, numero=:numero, colonia=:colonia, cp=:cp, municipio=:municipio, email=:email, roles=:roles, pass=:pass WHERE id=:id");
        $sentenciaSQL->bindParam(':nombre',$txtNombre);
        $sentenciaSQL->bindParam(':apellidop',$txtApellidop);
        $sentenciaSQL->bindParam(':apellidom',$txtApellidom);
        $sentenciaSQL->bindParam(':calle',$txtCalle);
        $sentenciaSQL->bindParam(':numero',$txtNumero);
        $sentenciaSQL->bindParam(':colonia',$txtColonia);
        $sentenciaSQL->bindParam(':cp',$txtCP);
        $sentenciaSQL->bindParam(':municipio',$txtMunicipio);
        $sentenciaSQL->bindParam(':email',$txtEmail);
        $sentenciaSQL->bindParam(':roles',$txtRoles);
        $sentenciaSQL->bindParam(':pass',$txtPass);
        $sentenciaSQL->bindParam(':id',$txtID);
        $sentenciaSQL->execute();
        //echo "Presionado boton de modificar";
    break;
    case"Cancelar":
        //echo "Presionado boton de cancelar";
    break;
    case"Seleccionar":

        $sentenciaSQL= $conexion->prepare("SELECT * FROM usuarios WHERE id=:id");
        $sentenciaSQL->bindParam(':id',$txtID);
        $sentenciaSQL->execute();
        $usuario=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

        $txtNombre=$usuario['nombre'];
        $txtApellidop=$usuario['apellidop'];
        $txtApellidom=$usuario['apellidom'];
        $txtCalle=$usuario['calle'];
        $txtNumero=$usuario['numero'];
        $txtColonia=$usuario['colonia'];
        $txtCP=$usuario['cp'];
        $txtMunicipio=$usuario['municipio'];
        $txtEmail=$usuario['email'];
        $txtRoles=$usuario['roles'];
        $txtPass=$usuario['pass'];
   
        //echo "Presionado boton de seleccionar";
    break;
    case"Borrar":

        $sentenciaSQL= $conexion->prepare("DELETE FROM usuarios WHERE id=:id");
        $sentenciaSQL->bindParam(':id',$txtID);
        $sentenciaSQL->execute();
        //echo "Presionado boton de borrar";
    break;



}

$sentenciaSQL= $conexion->prepare("SELECT * FROM usuarios");
$sentenciaSQL->execute();
$listausuarios=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?>



<div class="col-md-4">
    
    <div class="card">
        <div class="card-header">
            Datos del usuario
        </div>
        <div class="card-body">
        <form method="POST" enctype="multipart/form-data">
    <!--Campo ID-->
    <div class = "form-group">
    <label for="txtID">ID:</label>
    <input type="text" class="form-control" value="<?php echo $txtID?>" name="txtID" id="txtID"  placeholder="ID del usuario">
    </div>
    <!--Campo Nombre-->
    <div class = "form-group">
    <label for="txtNombre">Nombre(s):</label>
    <input type="text" class="form-control" value="<?php echo $txtNombre?>" name="txtNombre" id="txtNombre"  placeholder="Nombre(s) del usuario">
    </div>
    <!--Campo Apellido Paterno-->
    <div class = "form-group">
    <label for="txtApellidop">Apellido paterno:</label>
    <input type="text" class="form-control" value="<?php echo $txtApellidop?>" name="txtApellidop" id="txtApellidop"  placeholder="Apellido paterno del usuario">
    </div>
     <!--Campo Apellido Materno-->
     <div class = "form-group">
    <label for="txtApellidom">Apellido materno:</label>
    <input type="text" class="form-control" value="<?php echo $txtApellidom?>" name="txtApellidom" id="txtApellidom"  placeholder="Apellido materno del usuario">
    </div>
     <!--Campo Calle-->
     <div class = "form-group">
    <label for="txtCalle">Calle:</label>
    <input type="text" class="form-control" value="<?php echo $txtCalle?>" name="txtCalle" id="txtCalle"  placeholder="Calle donde vive usted">
    </div>
     <!--Campo Numero-->
     <div class = "form-group">
    <label for="txtNumero">Numero:</label>
    <input type="text" class="form-control" value="<?php echo $txtNumero?>" name="txtNumero" id="txtNumero"  placeholder="Numero exterior de su domicilio">
    </div>
     <!--Campo Colonia-->
     <div class = "form-group">
    <label for="txtColonia">Colonia:</label>
    <input type="text" class="form-control" value="<?php echo $txtColonia?>" name="txtColonia" id="txtColonia"  placeholder="Colonia donde se encuentra su calle">
    </div>
     <!--Campo CP-->
     <div class = "form-group">
    <label for="txtCP">Código postal:</label>
    <input type="text" class="form-control" value="<?php echo $txtCP?>" name="txtCP" id="txtCP"  placeholder="Código postal">
    </div>
     <!--Campo Municipio-->
     <div class = "form-group">
    <label for="txtMunicipio">Municipio:</label>
    <input type="text" class="form-control" value="<?php echo $txtMunicipio?>" name="txtMunicipio" id="txtMunicipio"  placeholder="Municipio donde radica">
    </div>
     <!--Campo Email-->
     <div class = "form-group">
    <label for="txtEmail">Correo electrónico:</label>
    <input type="email" class="form-control" value="<?php echo $txtEmail?>" name="txtEmail" id="txtEmail"  placeholder="Ingresar su correo electronico">
    </div>
     <!--Campo Roles-->
     <div class = "form-group">
    <label for="txtRoles">Rol:</label>
    <input type="text" class="form-control" value="<?php echo $txtRoles?>" name="txtRoles" id="txtRoles"  placeholder="Rol dentro del sistema">
    </div>
     <!--Campo Contraseña-->
     <div class = "form-group">
    <label for="txtPass">Contraseña:</label>
    <input type="password" class="form-control" value="<?php echo $txtPass?>" name="txtPass" id="txtPass"  placeholder="Ingresar su contraseña">
    </div>
     


     <!--Botones-->
   <div class="btn-group" role="group" aria-label="">
       <button type="submit" name="accion" value="Agregar" class="btn btn-success">Agregar</button>
       <button type="submit" name="accion" value="Modificar"class="btn btn-warning">Modificar</button>
       <button type="submit" name="accion" value="Cancelar" class="btn btn-info">Cancelar</button>
   </div>


    </form>
    
    
</div>
        </div>
        
    </div>

<div class="col-md-4">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido materno</th>
                <th>Calle</th>
                <th>Numero</th>
                <th>Colonia</th>
                <th>Código postal</th>
                <th>Municipio</th>
                
                
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($listausuarios as $usuario) {?>
            <tr>
                <td><?php echo $usuario['id']?></td>
                <td><?php echo $usuario['nombre']?></td>
                <td><?php echo $usuario['apellidop']?></td>
                <td><?php echo $usuario['apellidom']?></td>
                <td><?php echo $usuario['calle']?></td>
                <td><?php echo $usuario['numero']?></td>
                <td><?php echo $usuario['colonia']?></td>
                <td><?php echo $usuario['cp']?></td>
                <td><?php echo $usuario['municipio']?></td>
               
               


                <td>
                    
                    <form method="POST">
                        <input type="hidden" name="txtID" id="txtID" value="<?php echo $usuario['id']?>"/>
                        <input type="submit" name="accion" value="Seleccionar" class="btn btn-primary"/>
                        <input type="submit" name="accion" value="Borrar" class="btn btn-danger"/>
                    </form>
                
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>


<?php include("../templates/pie.php");?>