<?php require_once 'includes/cabecera.php';?>  

  <!-- barra lateral -->
<?php require_once 'includes/lateral.php';?>
        <!-- caja principal -->
        <div id="principal">
            <h1>Publicaciones recientes</h1>

            <!-- traer entradas desde base de datos-->
            <?php $entradas = conseguirUltimasEntradas($db);
                if(!empty($entradas)):
                    while($i = mysqli_fetch_assoc($entradas)):
            ?>
                        <article class="entrada">
                        
                            <a href="">
                            <h2> <?= $i["titulo"];?> </h2>
                            <span class="fecha"><strong><?= $i['nombre']." | ".$i["fecha"] ?></strong></span>
                                <p> <?=substr($i["descripcion"], 0, 150)."<strong> ......</strong>"; ?> </p>
                            </a>
                        </article>
            <?php   
                    endwhile; 
                endif;
            ?> <!--- fin traer datos de la base de datos -->

            <div id="ver-todas">
            <a href="">Ver todas las publicaciones</a>
            </div>
        </div> <!-- Fin principal -->

    <!-- footer -->
    <?php require_once 'includes/pie.php';?>



