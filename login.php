<?php
//iniciar sesion y conexion a la base de datos
//ya esta en otro archivo, se se incluye
require_once('includes/conexion.php');

//recoger los datos del formulario 
if(isset($_POST)){

    //borrar error antiguo
    if(isset($_SESSION['error_login'])){
        session_unset($_SESSION['error_login']);
    }

    //recojo datos del formulacio
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    //hacer consulta para comprobar las credenciales
    $sql = "SELECT * FROM usuarios WHERE email = '$email';";
    $login = mysqli_query($db, $sql);

    if($login && mysqli_num_rows($login) == 1){
        //comprobar contraseña debug/ cifrarla de nuevo
        //aignar los datos de la consulta a una variable
        $usuario = mysqli_fetch_assoc($login);
        //verifivar contraseña
        $verify = password_verify($password, $usuario['password']);
        if($verify == true){
            //crear sesion pasa usuario logueado
            $_SESSION['usuario'] = $usuario;
            //borrar sesion de error de login

        }else{
            $_SESSION['error_login'] = "login incorrecto";
        }

    }else{
        $_SESSION['error_login'] = "login incorrecto";
    }
}

header("Location:index.php");
