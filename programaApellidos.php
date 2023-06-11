<?php
include_once("tateti.php");

/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* Apellido, Nombre. Legajo. Carrera. mail. Usuario Github */
/* ... COMPLETAR ... */





/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/

/** Retorna una coleccion de juegos
 * @return array
 */
function cargarJuegos (){
    //array $coleccionJuegos
    $coleccionJuegos = [];
    $coleccionJuegos[0] = ["jugadorCruz"=> "majo" , "jugadorCirculo" => "pepe", "puntosCruz"=> 5, "puntosCirculo" => 0];
    $coleccionJuegos[1] = ["jugadorCruz"=> "juan" , "jugadorCirculo" => "majo", "puntosCruz"=> 1, "puntosCirculo" => 1];
    $coleccionJuegos[2] = ["jugadorCruz"=> "ana" , "jugadorCirculo" => "lisa", "puntosCruz"=> 1, "puntosCirculo" => 1];
    $coleccionJuegos[3] = ["jugadorCruz"=> "lauta" , "jugadorCirculo" => "lukaku", "puntosCruz"=> 4, "puntosCirculo" => 0];
    $coleccionJuegos[4] = ["jugadorCruz"=> "ana" , "jugadorCirculo" => "lucas", "puntosCruz"=> 1, "puntosCirculo" => 1];
    $coleccionJuegos[5] = ["jugadorCruz"=> "majo" , "jugadorCirculo" => "lisa", "puntosCruz"=> 4, "puntosCirculo" => 0];
    $coleccionJuegos[6] = ["jugadorCruz"=> "elias" , "jugadorCirculo" => "ana", "puntosCruz"=> 0, "puntosCirculo" => 5];
    $coleccionJuegos[7] = ["jugadorCruz"=> "juan" , "jugadorCirculo" => "pepe", "puntosCruz"=> 0, "puntosCirculo" => 3];
    $coleccionJuegos[8] = ["jugadorCruz"=> "jose" , "jugadorCirculo" => "lauta", "puntosCruz"=> 1, "puntosCirculo" => 1];
    $coleccionJuegos[9] = ["jugadorCruz"=> "aliendro" , "jugadorCirculo" => "julian", "puntosCruz"=> 5, "puntosCirculo" => 0];
    
    return $coleccionJuegos;
}


/** Muestra las opciones del menú en la pantalla, le solicita al usuario una opción válida y retorna el número de la opción
 * @return
 */
function seleccionarOpcion (){
    //int $opcion
    echo "1) Jugar al tateti\n";
    echo "2) Mostrar un juego\n";
    echo "3) Mostrar el primer juego ganador\n";
    echo "4) Mostrar porcentaje de Juegos ganados\n";
    echo "5) Mostrar resumen de Jugador\n";
    echo "6) Mostrar listado de juegos Ordenado por jugador O\n";
    echo "7) salir\n";

    echo "opción: ";
    $opcion = solicitarNumeroEntre(1, 7);
    return $opcion;
}


/** Muestra en pantalla los datos de un juego
 * @param int $numJuego
 */
function MostrarDatosJuego($numJuego){
    // array $datosJuego
    $datosJuego = cargarJuegos();
    if($datosJuego[$numJuego]["puntosCruz"] == $datosJuego[$numJuego]["puntosCirculo"]){
        $resultado = "(Empate)";
    }elseif($datosJuego[$numJuego]["puntosCruz"] > $datosJuego[$numJuego]["puntosCirculo"]){
        $resultado = "(Gano X)";
    }else{//($coleccionJuegos[$numJuego]["puntosCruz"] < $coleccionJuegos[$numJuego]["puntosCirculo"])
        $resultado = "(Gano O)";
    }

    echo "**********************\n";
    echo "Juego TATETI: ".$numJuego." ".$resultado."\n";
    echo "Jugador X: ".$datosJuego[$numJuego]["jugadorCruz"]." Obtuvo ".$datosJuego[$numJuego]["puntosCruz"]." puntos\n";
    echo "Jugador O: ".$datosJuego[$numJuego]["jugadorCirculo"]." Obtuvo ".$datosJuego[$numJuego]["puntosCirculo"]." puntos\n";
    echo "**********************\n";
}


/** Retorna la colección modificada al agregarse un nuevo juego
 * @param array $coleccionJuegos
 * @param array $unJuego
 * @return array
 */
function agregarJuego($coleccionJuegos, $unJuego){
    // array $coleccionModificada
    $coleccionModificada = array_push($coleccionJuegos, $unJuego);
    return $coleccionModificada;  
}
   



/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:
// int $opcion, $nJuego
// array $juego


//Inicialización de variables:


//Proceso:

//$juego = jugar();
//print_r($juego);
//imprimirResultado($juego);




do {
    $opcion = seleccionarOpcion();

    
    switch ($opcion) {
        case 1: 
            $juego = jugar();
            print_r($juego);

            break;
        case 2: 
            echo "Ingrese un numero: ";
            $nJuego = trim(fgets(STDIN));
            MostrarDatosJuego($nJuego);

            break;
        case 3: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 3

            break;
        case 4: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 3
    
            break;  
        case 5: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 3
    
            break;
        case 6: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 3
    
            break;
        case 7: 
            echo "Usted ha salido\n";
        
            break;
            
    }
} while ($opcion != 7);
