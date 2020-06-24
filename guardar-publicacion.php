<?php 

if(isset($_POST)){

    //conectar base de datos
    require_once 'includes/conexion.php';

    //validar si llegan los datos
    $titulo = isset($_POST['titulo']) ? mysqli_real_escape_string($db, $_POST['titulo']) : false;
    $descripcion = isset($_POST['descripcion']) ? mysqli_real_escape_string($db, $_POST['descripcion']) : false;
    $categoria = isset($_POST['categoria']) ? (int) $_POST['categoria'] : false;
    $usuario = $_SESSION['usuario']['id'];

    //validar los datos para la database
    $errores = array();

    if(empty($titulo)){
        $errores['titulo'] = 'El titulo no es valido';
    }

    if(empty($descripcion)){
        $errores['descripcion'] = 'El descripcion no es valido';
    }

    if(empty($categoria) && !is_numeric($categoria)){
        $errores['categoria'] = 'El categoria no es valido';
    }
    
    //count de errores
    if(count($errores) == 0){
        //agregar el registro
        $sql = "INSERT INTO entradas VALUES (null, '$usuario', '$categoria', '$titulo', '$descripcion', 'CURDATE()');";
        $guardar = mysqli_query($db, $sql);
    }else{
        $_SESSION['errores_post'] = $errores;
    }
}

header("Location: index.php");
