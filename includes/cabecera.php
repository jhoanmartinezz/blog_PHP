<?php require_once 'conexion.php'; ?>
<?php require_once 'includes/helpers.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css"/>
</head>
<body>
    <!-- cabecera -->
    <header id="cabecera">
        <!-- logo -->
        <div id="logo">
            <a href="index.php">
                Blog de videjuegos
            </a>
        </div>
    
        <!-- Menu -->
        <nav id="menu">
            <ul>
                <li><a href="index.php">Inicio</a></li>

                <!-- trayendo categorias -->
                <!-- ///////////////////////////////// -->
                <?php $categorias = conseguirCategorias($db);
                    if(!empty($categorias)):
                    while($i = mysqli_fetch_assoc($categorias)): 
                ?>
                        <li>
                            <a href="categoria.php?id=<?= $i['id'] ?>">
                                <?=$i["nombre"]?>
                            </a>
                        </li>
                <?php 
                endwhile; 
                endif;?> 
                <!-- ///////////////////////////////// -->
                <!-- fin traer categorias -->

                
               
                <li><a href="index.php">Contacto</a></li>
            </ul>
        </nav>
        <div class="clearfix">            
        </div> 
                       
    </header>
      <!-- container -->
      <div id="contenedor">