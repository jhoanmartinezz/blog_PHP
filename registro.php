<?php


if(isset($_POST['submit'])){
    //conexion a la base de datos
    require_once 'includes/conexion.php';

    //una sola sesion
    if(isset($sesion)){
        session_start();
    }

    //recoger los valores del formulario
    $nombre = (isset($_POST['nombre'])) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
    $apellidos = (isset($_POST['apellidos'])) ? mysqli_real_escape_string($db, $_POST['apellidos']) : false;
    $email = (isset($_POST['email'])) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;
    $password = (isset($_POST['password'])) ? mysqli_real_escape_string($db, $_POST['password']) : false;

    //array para llernarlo con errores 
    $errores = array();

    //validar los datos antes de registrarlos y que no esteb vacios
    if(!empty($nombre) && !is_numeric($nombre) && !preg_match('/[0-9]/',$nombre)){
        //echo "el nombre es valido:".$nombre;
        $nombre_validado = true;
    }else{
        $nombre_validado = false;
        $errores['nombre'] = "nombre no es valido";
    }

    if(!empty($apellidos) && !is_numeric($nombre) && !preg_match('/[0-9]/',$apellidos)){
        //echo "el apellidos es valido:".$apellidos;
        $apellidos_validado = true;
    }else{
        $apellidos_validado = false;
        $errores['apellidos'] = "apellidos invalido";
    }

    if(!empty($email) && !is_numeric($nombre)){
        //echo "el email es valido:".$email;
        $email_validado = true;
    }else{
        $email_validado = false;
        $errores['email'] = "email invalido";
    }

    if(!empty($password)){
        //echo "el password es valido:".$password;
        $password_validado = true;
    }else{
        $password_validado = false;
        $errores['password'] = "password vacio";
    }

    echo var_dump($errores);

    //validar si el array de errores esta vacio para enviar los datos a la base de datos
    $guardar_usuario = false;
    if(count($errores) == 0){
        $guardar_usuario = true;
        //despues de los errores esten vacios se envian a la base de datos
        //cifrar la contraseña
        $password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]);
        // var_dump($password);
        // var_dump($password_segura);
        // die();
        //sentencia para insertar usuario
        $sql = "INSERT INTO usuarios VALUES(null, '$nombre', '$apellidos', '$email', '$password_segura', CURDATE());";
        //query para enviar los datos, incluier la conexion.php
        $guardar = mysqli_query($db, $sql);
        //ver si existen errores
        var_dump(mysqli_error($db));
        die();
        //validar el registro
        if($guardar == true){
            $_SESSION['completado'] = "el registro se ha completado con exito";
        }else{
            $_SESSION['errores']['general'] = "Fallo al guardar el usuario";
        }
    }else{  
        $_SESSION['errores'] = $errores;
    }
}

//despues de todo redirigir al index.php
header("Location: index.php");