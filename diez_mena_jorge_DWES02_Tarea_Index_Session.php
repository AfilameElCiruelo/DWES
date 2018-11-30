
<?php
    // Función requerida para poder utilizar la sesión
    session_start();
    // Se añade el archivo requerido que contiene todas las funciones necesarias
    require_once('diez_mena_jorge_DWES02_Tarea_Funciones.php');
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Agenda</title>
    </head>
    <body>
        <h1>Agenda</h1>

        <?php
            // Se realiza la llamada a la función principal 
            Main();
        ?>

        <h2>Nuevo contacto</h2>
        <form name="input" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            Nombre: <input type="text" name="nombre" /><br />
            Correo: <input type="text" name="correo" /><br />
            <input type="submit" value="Enviar" name="enviar" />
        </form> 
    </body>
</html>