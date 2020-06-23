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
    $resultado = array();
    if($categorias == true && mysqli_num_rows($categorias) >= 1){
        $resultado = $categorias;
    }else{
        $resultado = false;
    }
    return $resultado;
}

//traer las publicaciones con id de usuario, nombre, publicacion
function conseguirUltimasEntradas($conexion){
    $sql = "SELECT e.*, c.* FROM entradas e INNER JOIN categorias c ON e.categoria_id = c.id ORDER BY e.id DESC LIMIT 8"; 
    $entradas = mysqli_query($conexion, $sql);
    $resultado = array();
    if($entradas == true && mysqli_num_rows($entradas) >= 1){
        $resultado = $entradas;
    }
    return $resultado;
}