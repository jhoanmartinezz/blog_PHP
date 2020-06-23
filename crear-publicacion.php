<?php require_once 'includes/redireccion.php';?>
<?php require_once 'includes/cabecera.php';?>
<?php require_once 'includes/lateral.php';?>

 <!-- caja principal -->
 <div id="principal">
            <h1>Crear Publicacion</h1>
            <p>Agrega nuevas experiencias y comentarios al blog para que los 
                usuarios disfruten y compartan opinion
            </p></br>
                <form action="guardar-publicacion.php" method="post">
                    
                    <label for="titulo"><strong>Titulo</strong></label>
                    <input type="titulo" name="titulo"></input>

                    <label for="descripcion"><strong>Descripcion</strong></label>
                    <input type="text" name="descripcion"></input>

                    <label for="categoria"><strong>Categoria</strong></label>
                    <select name="categoria">

                    <input type="submit" value="guardar" placeholder="seleccione">

                </form>

    </div>

<?php require_once 'includes/pie.php';?>