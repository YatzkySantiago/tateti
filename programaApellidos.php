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

    /*  - Lautaro Morales 
        - FAI[4221] tudw 
        - lautamorales123@gmail.com 
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
   

/**
 * @param array $arrayJuegos
 * @param string $unNombre
 * @return array
 */
    function resumirJugador ($arrayJuegos, $unNombre){
        //int $cantJuegosGanados
        //int $cantJuegosPerdidos
        //int $cantJuegosEmpatados
        //int $totalPuntosJugador
        $cantJuegosEmpatados =0;
        $cantJuegosGanados = 0;
        $cantJuegosPerdidos = 0;
        print_r($arrayJuegos);

        for ($i = 0; $i < count($arrayJuegos); $i++){
            if ($unNombre == $arrayJuegos [$i-1]["jugadorCruz"]&& ($arrayJuegos [$i-1]["puntosCruz"]> $arrayJuegos [$i-1]["puntosCirculo"])){
                $cantJuegosGanados++;
            }elseif ($unNombre == $arrayJuegos [$i-1]["jugadorCruz"]&& ($arrayJuegos [$i]["puntosCruz"]< $arrayJuegos [$i-1]["puntosCirculo"])){
                $cantJuegosPerdidos++;
            }else{
                $cantJuegosEmpatados++;
            }
            if ($unNombre == $arrayJuegos [$i-1]["jugadorCirculo"]&& ($arrayJuegos [$i-1]["puntosCirculo"]> $arrayJuegos [$i-1]["puntosCruz"])){
                $cantJuegosGanados++;
            }elseif ($unNombre == $arrayJuegos [$i-1]["jugadorCirculo"]&& ($arrayJuegos [$i-1]["puntosCirculo"]< $arrayJuegos [$i-1]["puntosCruz"])){
                $cantJuegosPerdidos++;
            }else{
                $cantJuegosEmpatados++;
            }
           
        }
        if ($cantJuegosGanados>0){
            $totalPuntosJugador = 0;
            for ($i =0; $i<count($arrayJuegos); $i++){
                if ($unNombre == $arrayJuegos [$i-1]["jugadorCruz"]){ 
                    $totalPuntosJugador+= $arrayJuegos [$i-1]["puntosCruz"];
                }elseif ($unNombre == $arrayJuegos [$i-1]["jugadorCirculo"]){
                    $totalPuntosJugador+= $arrayJuegos[$i-1]["jugadorCirculo"];
                } 
            }
        }   
        
            


        //array $resumenUnJugador
        $resumenUnJugador = [];
        $resumenUnJugador ["nombre"] = $unNombre;
        $resumenUnJugador ["juegosGanados"] = $cantJuegosGanados;
        $resumenUnJugador ["juegosPerdidos"] = $cantJuegosPerdidos;
        $resumenUnJugador ["juegosEmpatados"] = $cantJuegosEmpatados;
        $resumenUnJugador ["puntosAcumulados"] = $totalPuntosJugador;

    return $resumenUnJugador;
    }


/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:
// int: $opcion, $nJuego, $cantJuegosJugados, $i
// array: $juego, $countJuegos, $nombresJugadores
// string: $nombreIngresado


//Inicialización de variables:
$i = 0;

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
            //opcion que muestra el primer juego ganado en base a un nombre solicitado al usuario.
            echo "Ingrese un nombre de jugador: ";
            $nombreIngresado = trim(fgets(STDIN));
            $nombresJugadores = cargarJuegos();
            while ($i < (count($nombresJugadores)-1) && $nombreIngresado <> ($nombresJugadores[$i]["jugadorCruz"]) && $nombreIngresado <> ($nombresJugadores[$i]["jugadorCirculo"])) {
                $i = $i + 1;
            }
            if ($nombreIngresado == $nombresJugadores[$i]["jugadorCruz"] || $nombreIngresado == $nombresJugadores[$i]["jugadorCirculo"]) {
                mostrarDatosJuego($i);
            }
            else {
                echo "Ese jugador todavia no jugo :( \n";
            }

            break;
        case 4: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 4
    
            break;  
        case 5: 
           //opción que muestra en pantalla el resumen de un jugador 
           echo "Ingrese el nombre del jugador para ver su resumen: ";
           $nombreIngresado = strtoupper(trim(fgets(STDIN)));
           $todosLosJuegos = cargarJuegos();
           $datosJugador = resumirJugador($todosLosJuegos, $nombreIngresado);
            echo "*************************************\n";
            echo "JUGADOR " .strtoupper($nombreIngresado)."\n";
            echo "GANÓ ". $datosJugador["juegosGanados"]."\n";
            echo "PERDIÓ ". $datosJugador["juegosPerdidos"]."\n";
            echo "EMPATÓ ". $datosJugador["juegosEmpatados"]."\n";
            echo "Total de puntos acumulados: " .$datosJugador["puntosAcumulados"]."\n";
            echo "*************************************\n";
          
           
    
            break;
        case 6: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 6
    
            break;
        case 7: 
            echo "Usted ha salido\n";
        
            break;
            
    }
} while ($opcion != 7);
