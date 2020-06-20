<?php

function mostrarError($errores, $campo) {
    $alert = "";
    if(isset($errores[$campo]) && !empty($campo)){
        $alert = "<div class = 'alert alert-error'>".$errores[$campo]."</div>";
        return $alert;
    }else{
        return $alert;
    }
}

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