<?php
include_once("tateti.php");

/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

    /*  - Yatzky Santiago 
        - FAI[4260] TUDW 
        - syatz9674@gmail.com 
        - github: YatzkySantiago */

    /*  - nombre apellido 
        - legajo carrera 
        - mail 
        - usuario github */

    /*  - nombre apellido 
        - legajo carrera 
        - mail 
        - usuario github */

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
function mostrarDatosJuego($numJuego){
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


/** Opcion que muestra el primer juego ganado en base a un nombre solicitado al usuario
 * @param array $coleccionJuegos
 * @param string $nombre
 * @return $indice
 */
function primerJuegoGanado($coleccionJuegos,$nombre){
    //int $i, $indice,
    //array $nombresJugadores
    $i = 0;
    $indice = -1;
    $nombresJugadores = cargarJuegos();
    while($i < count($nombresJugadores) && $indice == -1){
        if($nombre == $nombresJugadores[$i]["jugadorCruz"] && $nombresJugadores[$i]["puntosCruz"] > $nombresJugadores[$i]["puntosCirculo"]
        || $nombre == $nombresJugadores[$i]["jugadorCirculo"] && $nombresJugadores[$i]["puntosCirculo"] > $nombresJugadores[$i]["puntosCruz"]){
            $indice = $i; 
        }
        $i++;
    }
           
    return $indice;
}   




/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:
// int: $opcion, $nJuego, $cantJuegosJugados, $i
// array: $juego, $countJuegos, $nombresJugadores
// string: $nombreIngresado


//Inicialización de variables:

//Proceso:

//$juego = jugar();
//print_r($juego);
//imprimirResultado($juego);



do {
    $opcion = seleccionarOpcion();

    
    switch ($opcion) {
        case 1: 
            //opcion que permite jugar al tateti.
            $juego = jugar();
            imprimirResultado($juego);

            break;
        case 2: 
            //opcion que muestra un juego de la coleccion en base a un numero solicitado al user.
            $countJuegos = cargarJuegos();
            $cantJuegosJugados = count($countJuegos);
            echo "Ingrese un numero del 0 al ".($cantJuegosJugados - 1).": ";
            $nJuego = trim(fgets(STDIN));
            if ($nJuego >= 0 && $nJuego <= ($cantJuegosJugados - 1)) {
                mostrarDatosJuego($nJuego);
            }
            else {
                echo "**********************\n";
                echo "Ese juego no existe \n";
                echo "**********************\n";
            }

            break;
        case 3: 
            echo "Ingrese nombre del jugador: ";
            $nombreJugador = trim(fgets(STDIN));
            $nJuegos = cargarJuegos();
            $primerJuego = primerJuegoGanado($nJuegos,$nombreJugador);
            mostrarDatosJuego($primerJuego);

            break;
        case 4: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 4
    
            break;  
        case 5: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 5
    
            break;
        case 6: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 6
    
            break;
        case 7: 
            echo "Usted ha salido\n";
        
            break;
            
    }
} while ($opcion != 7);
