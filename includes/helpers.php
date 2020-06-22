<?php

//validacion de registro
function mostrarError($errores, $campo) {
    $alert = "";
    if(isset($errores[$campo]) && !empty($campo)){
        $alert = "<div class = 'alert alert-error'>".$errores[$campo]."</div>";
        return $alert;
    }else{
        return "";
    }
}

//borrar alerta
function borrarError(){
    $borrado = false;

    if(isset($_SESSION['errores'])){
        $_SESSION['errores'] = null;
        $borrado = session_unset();
    }

    if(isset($_SESSION['errores']['general'])){
        $_SESSION['errores'] = null;
        session_unset();
    }
    return $borrado;
}

//trar las categorias desde la base de datos
function conseguirCategorias($conexion){
    $sql = "SELECT * FROM categorias ORDER BY id ASC;";
    $categorias = mysqli_query($conexion, $sql);
    $result = array();
    if($categorias == true && mysqli_num_rows($categorias) >= 1){
        $result = $categorias;
    }else{
        $result = false;
    }
    return $result;
}

//traer las publicaciones con id de usuario, nombre, publicacion
function conseguirUltimasEntradas($conexion){
    $sql = "SELECT * FROM entradas ORDER BY id ASC";
}