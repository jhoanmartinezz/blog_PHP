<?php require_once 'includes/conexion.php'; ?>

<?php 
//conectar a la data base
if(isset($_POST)){
    $nombre = (isset($_POST['nombre'])) ? mysqli_real_escape_string($db,$_POST['nombre']):false;

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

    if(count($errores) == 0){
        $sql = "INSERT INTO categorias VALUE(NULL, '$nombre');";
        $guardar = mysqli_query($db, $sql);
    }

}
header("Location: index.php");