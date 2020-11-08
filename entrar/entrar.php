<?php

$alert = '';

if(!empty($_POST))
{
    if(empty($_POST['usuario']) || empty($_POST['clave']))
    {
        $alert = 'Ingrese su usuario y su clave';
    }else{

        require_once "conexion.php";

        $user = $_POST['usuario'];
        $pass = $_POST['clave'];
 
        $query = mysqli_query($conection,"SELECT * FROM usuario WHERE usuario= '$user' AND clave= '$pass'");
        $result = mysqli_num_rows($query);
 
        if($result > 0)
        {
            $data = mysqli_fetch_array($query);
             session_start();
             $_SESSION['active'] = true;
             $_SESSION['iduser'] = $data['idusuario'];
             $_SESSION['nombre'] = $data['nombre'];
             $_SESSION['user'] = $data['usuario'];
             $_SESSION['rol'] = $data['rol'];
 
             header('location: http://localhost/phpmyadmin/');
        }else{
            $alert = 'El usuario o la clave son incorrectos';
            
        }

     }

 }

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Login</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <div class="login">
        <img class="avatar" src="img/trailers.jpg" alt="trailers">
        <h1>Inicio Sesión</h1>
    <form action="" method="post">
    <img class="avatar" src="img/trailers.jpg" alt="trailers">
    
    <label for="usuario">Usuario</label>
    <input type="text" placeholder="Ingresa Usuario" name="usuario">
    <label for="contraseña">Contraseña</label>
    <input type="password" placeholder="Ingresa Contraseña" name="clave">
    <input type="submit" value="Ingresar">

    <a href="#">Crear una cuenta</a>
    </form>  
</div>
</body>
</html>
