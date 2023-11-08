<?php

$mensaje="";

if(isset($_POST['btnAccion'])){

    switch($_POST['btnAccion']){

        case 'Agregar':

            if(is_numeric(openssl_decrypt($_POST['id'],COD,KEY))) {
                $ID=openssl_decrypt($_POST['id'],COD,KEY);
                $mensaje.="Ok ID correcto".$ID."<br/>";
            }else{
                $mensaje.="Error algo esta pasando".$ID."<br/>";
            }

            if(is_string(openssl_decrypt($_POST['nombre'],COD,KEY))){
                $NOMBRE=openssl_decrypt($_POST['nombre'],COD,KEY);
                $mensaje.="Ok nombre correcto".$NOMBRE."<br/>";
            }else{  $mensaje.="Error algo esta pasando"."<br/>"; break; }

            if(is_string(openssl_decrypt($_POST['marca'],COD,KEY))){
                $MARCA=openssl_decrypt($_POST['marca'],COD,KEY);
                $mensaje.="Ok marca correcto".$MARCA."<br/>";
            }else{  $mensaje.="Error algo esta pasando"."<br/>"; break; }

            if(is_numeric(openssl_decrypt($_POST['precio'],COD,KEY))){
                $PRECIO=openssl_decrypt($_POST['precio'],COD,KEY);
                $mensaje.="Ok precio correcto".$PRECIO."<br/>";
            }else{  $mensaje.="Error algo esta pasando"."<br/>"; break; }

            if(is_numeric(openssl_decrypt($_POST['cantidad'],COD,KEY))){
                $CANTIDAD=openssl_decrypt($_POST['cantidad'],COD,KEY);
                $mensaje.="Ok ID cantidad correcto".$CANTIDAD."<br/>";
            }else{  $mensaje.="Error algo esta pasando"."<br/>"; break; }



        if(!isset($_SESSION['CARRITO'])){
            $producto=array(
                'ID' => $ID,
                'NOMBRE' => $NOMBRE,
                'MARCA' => $MARCA,
                'PRECIO' => $PRECIO,
                'CANTIDAD' => $CANTIDAD
            );
            $_SESSION['CARRITO'][0]=$producto;
            $mensaje="Producto agregado al carrito";

        }else{
            $NumeroProductos=count($_SESSION['CARRITO']);
            $producto=array(
                'ID' => $ID,
                'NOMBRE' => $NOMBRE,
                'MARCA' => $MARCA,
                'PRECIO' => $PRECIO,
                'CANTIDAD' => $CANTIDAD
            );
            $_SESSION['CARRITO'][$NumeroProductos]=$producto;
            $mensaje="Producto agregado al carrito";

           
        }
        //$mensaje= print_r($_SESSION,true);
        
        
        

            break;

        case 'Eliminar':
               session_start();
               if(is_numeric(openssl_decrypt($_POST['id'],COD,KEY))){
                $ID=openssl_decrypt($_POST['id'],COD,KEY);

               foreach($_SESSION['CARRITO'] as $indice=>$producto){


                if($producto['ID']==$ID){

                    unset($_SESSION['CARRITO'][$indice]);
                    echo "<script> alert('Elemento borrado del carrito');
                     </script>";
                     header("Location:mostrarCarrito.php");
                    

                }
                   
               }

               }else{

               }

            break;
        case 'inicio':
            
                
            
            session_start();
// initialize a session variable
           $_SESSION['CARRITO'] = '1';

// unset a session variable
            unset($_SESSION['CARRITO']); 
            header("Location:inicio.php");

            break;
    }

}

?>