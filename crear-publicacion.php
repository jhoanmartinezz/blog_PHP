<?php require_once 'includes/redireccion.php';?>
<?php require_once 'includes/cabecera.php';?>
<?php require_once 'includes/lateral.php';?>

 <!-- caja principal -->
 <div id="principal">
            <h1>Crear Publicacion</h1>
            <p>Agrega nuevas experiencias y comentarios al blog para que los 
                usuarios disfruten y compartan opinion
            </p></br>
                <form action="guardar-publicacion.php" method="POST">
                    
                    <label for="titulo"><strong>Titulo</strong></label>
                    <input type="titulo" name="titulo"></input>

                    <label for="descripcion"><strong>Descripcion</strong></label>
                    <textarea name="descripcion"></textarea>

                    <label for="categoria"><strong>Categoria</strong></label>
                    <select name="categoria">
                        <?php 
                            $categorias = conseguirCategorias($db);
                            if(!empty($categorias)):
                                while($k = mysqli_fetch_assoc($categorias)):
                        ?>
                                    <option value="<?=$k['id']?>">
                                        <?=$k['nombre']?>
                                    </option>
                        <?php
                                endwhile;
                            endif;
                        ?>
                    </select>

                    <input type="submit" value="guardar" placeholder="seleccione">

                </form>

    </div>

<?php require_once 'includes/pie.php';?>