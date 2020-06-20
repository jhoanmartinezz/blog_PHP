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
    $_SESSION['errores'] = null;
    $borrado = session_unset();
    return $borrado;
}