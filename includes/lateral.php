
<aside id="sidebar">

        <!-- mostrar sesion-->
        <?php if(isset($_SESSION['usuario'])): ?>
            <div id="usuario-logueado" class="bloque">
                <h3>Logged</h3>
                <h3><?= $_SESSION['usuario']["nombre"]." ";?></h3>
                    <!-- cerrar sesion botones -->
                        <a href="cerrar.php" class="boton boton-azul">Crear publicacion</a>
                        <a href="cerrar.php" class="boton boton-azul">Crear categoria</a>
                        <a href="cerrar.php" class="boton boton-gris">Editar datos</a>
                        <a href="cerrar.php" class="boton boton-rojo">Cerrar sesion</a>
            </div>
        <?php endif; ?> <!-- fin logueado-->

            <div id="login" class="bloque">
                <h3>Identificate</h3>
                


                <!-- Corregir el error aca -->
                <!-- error de login-->
                <?php if(isset($_SESSION['usuario'])): ?>
                        <?php unset($_SESSION['error-login']);?>

                    <?php elseif(isset($_SESSION['error_login'])):?>
                        <div class="alerta alerta-error">
                            <?= $_SESSION["error_login"];?>
                        </div>
                <?php endif; ?>
                     
                    <!-- fin error de login -->




                <form action="login.php" method="post">
                    
                    <label for="email">Email</label>
                    <input type="email" name="email"/>

                    <label for="password">Contraseña</label>
                    <input type="password" name="password"/>
                    
                    </br>
                    <input type="submit" name="submit "value="iniciar sesion"/>

                </form>
            </div>

        <!-- Registro -->
            <div id="register" class="bloque">
                <h3>registrate</h3>

                <!-- Errores en el backend hacia el frontend -->
                <?php if(isset($_SESSION['completado'])): ?>
                    <div class="alerta alerta-exito">
                        <?=$_SESSION['completado']?>
                    </div>
                <?php elseif(isset($_SESSION['errores']['general'])): ?>
                    <div class="alerta alerta-error">
                        <?=$_SESSION['errores']['general']?>
                    </div>
                <?php endif; ?> <!-- fin mostra errores desde backend -->

                <form action="registro.php" method="POST">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre"/>
                    <?php echo isset ($_SESSION['errores']) ? mostrarError($_SESSION['errores'],'nombre'): ''; ?>

                    <label for="apellidos">Apellidos</label>
                    <input type="text" name="apellidos"/>
                    <?php echo isset ($_SESSION['errores']) ? mostrarError($_SESSION['errores'],'apellidos'): ''; ?>

                    <label for="email">Email</label>
                    <input type="email" name="email"/>
                    <?php echo isset ($_SESSION['errores']) ? mostrarError($_SESSION['errores'],'email'): ''; ?>

                    <label for="password">Contraseña</label>
                    <input type="password" name="password"/>
                    <?php echo isset ($_SESSION['errores']) ? mostrarError($_SESSION['errores'],'password'): ''; ?>
                    
                    </br>
                    <input type="submit" name="submit" value="registrar"/>

                </form>
                <?php borrarError(); ?>
            </div>
        </aside>
