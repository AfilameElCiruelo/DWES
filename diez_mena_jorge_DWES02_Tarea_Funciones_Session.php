<?php

    // Constante que contiene el nombre del array dentro de SESSION
    const NOMARRAY = "agenda"; 

    /*
    *   Clase que no puede ser instanciada y que sirve como enumerable
    *   para definir los diferentes procesos de los que dispone 
    *   la aplicación
    */
    abstract class eProceso{
        const Nuevo         = 0;
        const Eliminar      = 1;
        const Actualizar    = 2;
    }

    /*
    *   Función que comprueba que proceso debe realizar 
    *   en función de los parámetros que recibe y los requisitos dados
    *   RETURN
    *       - Variable de tipo eProceso que contiene el proceso a realizar
    *       - NULL: Si el proceso a ejecutar no está definido o no debe realizar ninguna acción
    */    
    function CheckProceso($nombre, $correo){
        // CASO 1: Se comprueba que el nombre no esté vacío
        if(empty($nombre)){
            CrearAlerta("El nombre no puede estar vacío");
            return NULL;
        }

        $existeNombre = ExisteNombre($nombre);

        // CASO 2: No existe nombre y correo informado
        if(!$existeNombre && !empty($correo))
            return eProceso::Nuevo;

        if($existeNombre)
            if(empty($correo)) // CASO 4: Existe el nombre y no se ha informado el correo
                return eProceso::Eliminar;
            else 
                return eProceso::Actualizar; // CASO 3: Existe el nombre y se ha informado el correo

        // No cumple los requisitos para los casos definidos
        return NULL;
    }

    /*
    *   Función que comprueba si el nombre 
    *   pasado como parámetro existe
    *   RETURN: 
    *       - True: Si el nombre existe
    *       - False: Si el nombre no existe
    */
    function ExisteNombre($nombre){
        // Se comprueba que la sesión disponga de al menos un item
        if(!isset($_SESSION[NOMARRAY]) || count($_SESSION[NOMARRAY]) == 0)
            return false;
        
        // Mediante la función isset se comprueba que el nombre existe dentro de la sesión
        return isset($_SESSION[NOMARRAY][$nombre]);
    }
    
    /*
    *   Función que muestra una ventana de alerta con Javascript
    *   a partir de un mensaje pasado como parámetro
    */
    function CrearAlerta($mensaje){
        echo "<script type='text/javascript'>alert('$mensaje');</script>";
    }

    /*
    *   Función Principal
    *   Encargada de realizar las operaciones sobre la sesión
    *   Única función que debe ser llamada
    */
    function Main(){
        // Se comprueba que se haya pulsado enviar
        if (isset($_POST['enviar'])) {
            // Se recogen los items enviados en el POST
            $nombre = $_POST['nombre'];
            $correo = $_POST['correo'];
            
            $proceso = CheckProceso($nombre, $correo);
            
            // Compruebo que el proceso esté definido
            if(!is_null($proceso)){
                // En función del proceso se realizan las diferentes operaciones
                switch ($proceso) {
                    case eProceso::Nuevo:
                        // Si en la sesión aún no se ha declarado el array, se declara mediante la función array()
                        // En caso contrario se van añadiendo
                        !isset($_SESSION[NOMARRAY]) ? $_SESSION[NOMARRAY] = array($nombre => $correo) : $_SESSION[NOMARRAY][$nombre] = $correo;
                        break;
                    case eProceso::Actualizar:
                        // Se actualiza el correo para el nombre dado
                        $_SESSION[NOMARRAY][$nombre] = $correo;
                        break;
                    case eProceso::Eliminar:
                        // Se destruye el registro para el nombre dado mediante la función unset 
                        unset($_SESSION[NOMARRAY][$nombre]);
                        break;
                    default:
                        // Se muestra una alerta ya que el proceso a realizar no está definido
                        CrearAlerta("ERROR: Proceso no definido");
                        break;
                }
            }
        }
        
        ListarResultados();
    }

    /*
    *   Función que lista el contenido de la Sessión 
    *   dentro de una lista en html
    */
    function ListarResultados(){
        echo "<ul>";
        // Se recorre el array almacenado en la sesión. En este caso nombre es el código y correo es el contenido del array
        foreach ($_SESSION[NOMARRAY] as $nombre => $correo) {
            echo "<li>";
            echo "Nombre: $nombre   Correo: $correo";
            echo "</li>";
        }
        echo "</ul>";
    }
?>