<?php require_once 'includes/redireccion.php';?>
<?php require_once 'includes/cabecera.php';?>
<?php require_once 'includes/lateral.php';?>

 <!-- caja principal -->
 <div id="principal">
            <h1>Crear categorias</h1>
            <p>Agrega nuevas categorias al blog para que los usuarios puedan
                usarlas al crear la publicaciones
            </p></br>
                <form action="guardar-categoria.php" method="post">
                    
                    <label for="nombre"><strong>Nombre</strong></label>
                    <input type="text" name="nombre"></input>

                    <input type="submit" value="guardar">

                </form>

    </div>

<?php require_once 'includes/pie.php';?>