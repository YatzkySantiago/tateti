<?php
include_once("tateti.php");

/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

    /*  - Yatzky Santiago 
        - FAI[4260] TUDW 
        - syatz9674@gmail.com 
        - Usuario github: YatzkySantiago */

    /*  - Alexis Cifuentes 
        - FAI[4412] TUDW
        - alexiscifuentes943@gmail.com 
        - Usuario github: Alexiscifuentes02 */

    /*  - Lautaro Morales 
        - FAI[4221] TUDW 
        - lautamorales123@gmail.com 
        - Usuario github: lautaromorales */

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
 * @return int
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
 * @param int $check
 * @param int $colection
 * @param int $game
 */
function mostrarDatosJuego($numJuego, $check, $colection, $game){
    // array $datosJuego
    // string $resultado
    if ($check == 0) {
        $datosJuego = cargarJuegos();
    } else {
        $datosJuego = agregarJuego($colection, $game);
    }
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
    // array $coleccionJuegos
    array_push($coleccionJuegos, $unJuego);
    return $coleccionJuegos;
}

/** Opcion que muestra el primer juego ganado en base a un nombre solicitado al usuario
 * @param array $coleccionJuegos
 * @param string $nombre
 * @return int
 */
function primerJuegoGanado($coleccionJuegos, $nombre){
    //int $i, $indice,
    $i = 0;
    $indice = -1;
    while($i < count($coleccionJuegos) && $indice == -1){
        if(($nombre == strtolower($coleccionJuegos[$i]["jugadorCruz"]) && $coleccionJuegos[$i]["puntosCruz"] > $coleccionJuegos[$i]["puntosCirculo"])
        || ($nombre == strtolower($coleccionJuegos[$i]["jugadorCirculo"]) && $coleccionJuegos[$i]["puntosCirculo"] > $coleccionJuegos[$i]["puntosCruz"])){
            $indice = $i; 
        }
        $i++;
    }
    return $indice;
}   

/**
 * @param array $arrayJuegos
 * @param string $unNombre
 * @return array
 */
function resumirJugador ($arrayJuegos, $unNombre){
    //int $cantJuegosGanados, $cantJuegosPerdidos, $cantJuegosEmpatados, $totalPuntosJugador
    //array $resumenUnJugador
    $cantJuegosEmpatados = 0;
    $cantJuegosGanados = 0;
    $cantJuegosPerdidos = 0;
    $totalPuntosJugador = 0;
    for ($i = 0; $i < count($arrayJuegos); $i++){
        if($unNombre == strtolower($arrayJuegos [$i]["jugadorCruz"])){
            if($arrayJuegos [$i]["puntosCruz"] > $arrayJuegos [$i]["puntosCirculo"]){
                $cantJuegosGanados++;
            } elseif($arrayJuegos [$i]["puntosCruz"]== $arrayJuegos [$i]["puntosCirculo"]){
                $cantJuegosEmpatados++;
            } else{ //($arrayJuegos [$i]["puntosCruz"]< $arrayJuegos [$i]["puntosCirculo"])
                $cantJuegosPerdidos++;
            }
            $totalPuntosJugador+= $arrayJuegos [$i]["puntosCruz"];
        } elseif($unNombre == strtolower($arrayJuegos [$i]["jugadorCirculo"])){
            if($arrayJuegos [$i]["puntosCirculo"]> $arrayJuegos [$i]["puntosCruz"]){
                $cantJuegosGanados++;
            } elseif($arrayJuegos [$i]["puntosCirculo"]== $arrayJuegos [$i]["puntosCruz"]){
                $cantJuegosEmpatados++;
            } else{//($arrayJuegos [$i]["puntosCirculo"]< $arrayJuegos [$i]["puntosCruz"])
                $cantJuegosPerdidos++;
            }
            $totalPuntosJugador+= $arrayJuegos[$i]["puntosCirculo"];
        }        
    }  
    $resumenUnJugador = [];
    $resumenUnJugador ["nombre"] = $unNombre;
    $resumenUnJugador ["juegosGanados"] = $cantJuegosGanados;
    $resumenUnJugador ["juegosPerdidos"] = $cantJuegosPerdidos;
    $resumenUnJugador ["juegosEmpatados"] = $cantJuegosEmpatados;
    $resumenUnJugador ["puntosAcumulados"] = $totalPuntosJugador;
    return $resumenUnJugador;
} 

/** Función que solicita al usuario un símbolo, lo verifica y retorna
 * @return string
 */
function validarSimbolos(){
//boolean $esSimboloValido
//string $simboloIngresado
    do{  
        echo "Ingrese un símbolo X o O: \n";
        $simboloIngresado = trim(fgets(STDIN));
        $simboloIngresado= strtoupper($simboloIngresado); 
        //Verificamos que el usuario hay ingresado un solo caracter
        if (strlen($simboloIngresado)==1){   
            //verificamos que el caracter ingresado sea el correcto
            if (($simboloIngresado)==  "X"|| $simboloIngresado== "O"){  
                $esSimboloValido= true;
            }else{
                echo "El símbolo ingresado no es correcto. Pruebe otra vez\n";
                $esSimboloValido = false;
            }
        } else{
            echo "El símbolo ingresado no es correcto. Pruebe otra vez\n";
            $esSimboloValido = false;
        }
    } while (!$esSimboloValido);
    return $simboloIngresado;
}

/** Función que muestra el total de partidas ganadas, sin tomar en cuenta el jugador
 * @param array $coleccionModif
 * @return int
 */
function mostrarPartidasGandas($coleccionModif){
    //int $cantJuegosGanados
    $cantJuegosGanados = 0;
    for ($i=0; $i< count($coleccionModif); $i++){
        if (($coleccionModif [$i]["puntosCruz"]) <> ($coleccionModif [$i]["puntosCirculo"])){
            $cantJuegosGanados++;
        }
    }
    return $cantJuegosGanados;
}

/** Modulo que devuelve la cantidad de juegos ganados según un símbolo ingresado  por parámetro
 * @param array $coleccionModif
 * @param string $simboloIngresado
 * @return int
 */
function calcVictoriasPorSimbolo ($coleccionModif, $simboloIngresado){
    //int $playerCruz 
    //int $playerCirculo 
    //$cantVictoriasCirculo
    //$cantVictoriasCruz
    //$cantVictoriasSimbolo
    $cantVictoriasCirculo =0;
    $cantVictoriasCruz=0;
    $cantVictoriasSimbolo =0;
    for ($i=0; $i <count($coleccionModif); $i++){
        $playerCirculo= $coleccionModif[$i]["puntosCirculo"];
        $playerCruz= $coleccionModif[$i]["puntosCruz"];
        if ($playerCirculo > $playerCruz){
            $cantVictoriasCirculo++;
        }
        if ($playerCruz > $playerCirculo){
            $cantVictoriasCruz++;
        }
    }
    if ($simboloIngresado == "X"){
        $cantVictoriasSimbolo= $cantVictoriasCruz;
    }elseif ($simboloIngresado == "O"){
        $cantVictoriasSimbolo = $cantVictoriasCirculo;
    }
  
    return $cantVictoriasSimbolo;
}

/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:
// int: $checkJuego, $opcion, $cantJuegosJugados, $indiceJuego, $primerJuego, 
// array: $ultimoJuego, $coleccionActual, $coleccionModificada, $juego, $countJuegos, $nJuegos, $todosLosJuegos, $datosJugador
// string: $nombreJugador, $simbolo, $otroSimbolo, $nombreIngresado, 
// float: $porcentaje, 

//Inicialización de variables:
$checkJuego = 0; //*
$ultimoJuego = 0; //*


//Proceso:

$coleccionActual = cargarJuegos(); //*
$coleccionModificada = cargarJuegos(); //*
do {
    $opcion = seleccionarOpcion(); //*
    switch ($opcion) {
        case 1: 
            //opcion que permite jugar al tateti.
            $juego = jugar(); //*
            imprimirResultado($juego); //*
            $coleccionModificada = agregarJuego($coleccionActual, $juego); //*
            $coleccionActual = $coleccionModificada; //*
            $ultimoJuego = $juego; //*
            $checkJuego = 1; //*

            break;
        case 2: 
            //opcion que muestra un juego de la coleccion en base a un numero solicitado al usuario.
            $countJuegos = $coleccionModificada; //*
            $cantJuegosJugados = count($countJuegos); //*
            echo "Ingrese un numero del 1 al ".($cantJuegosJugados).": "; //*
            $indiceJuego = trim(fgets(STDIN)); //*
            if ($checkJuego == 1) { //*
                mostrarDatosJuego($indiceJuego -1, $checkJuego, $coleccionModificada, $ultimoJuego); //*
            }
            elseif ($indiceJuego >= 0 && $indiceJuego <= ($cantJuegosJugados)) { //*
                mostrarDatosJuego($indiceJuego -1, $checkJuego, $coleccionActual, $ultimoJuego); //*
            }
            else {
                echo "**********************\n";
                echo "Ese juego no existe \n";
                echo "**********************\n";
            }

            break;
        case 3: 
            //opcion que muestra el primer juego ganado del jugador ingresado.
          echo "Ingrese nombre del jugador: ";
            $nombreJugador = trim(fgets(STDIN)); //*
            if($checkJuego == 1){ //*
                $nJuegos = $coleccionActual; //*
            }else{
                $nJuegos = cargarJuegos(); //*
            }
            $primerJuego = primerJuegoGanado($nJuegos, $nombreJugador); //*

            if ($primerJuego == -1) { //*
                echo "**********************\n";
                echo "Ese jugador no existe o no gano \n";
                echo "**********************\n";
            } else {
                mostrarDatosJuego($primerJuego, $checkJuego, $coleccionModificada, $ultimoJuego); //*
            }

            break;
        case 4: 
            //opción que muestra el porcentaje de juegos ganados según un símbolo ingresado por el usuario.
            $simbolo = validarSimbolos(); //*
            if ($simbolo == "X") { //*
                $otroSimbolo = "O"; //*
            } else {
                $otroSimbolo = "X"; //*
            }
            $porcentaje = (calcVictoriasPorSimbolo($coleccionModificada, $simbolo))*100/mostrarPartidasGandas($coleccionModificada); //*
            echo "**********************\n";
            echo "en total se jugaron ".count($coleccionModificada)." juegos de tateti de los cuales ".(count($coleccionModificada)-mostrarPartidasGandas($coleccionModificada))." son empates y ".mostrarPartidasGandas($coleccionModificada)." son partidas ganadas \n"; //*
            echo "(victorias de $simbolo: ".calcVictoriasPorSimbolo($coleccionModificada, $simbolo)." ; victorias de $otroSimbolo: ".(mostrarPartidasGandas($coleccionModificada)-calcVictoriasPorSimbolo($coleccionModificada, $simbolo)).")\n"; //*
            echo $simbolo." gano el: ".$porcentaje."% de los juegos. \n"; //*
            echo "**********************\n";
    
            break;  
        case 5: 
           //opción que muestra en pantalla el resumen de un jugador 
           echo "Ingrese el nombre del jugador para ver su resumen: ";
           $nombreIngresado = trim(fgets(STDIN)); //*
           $todosLosJuegos = $coleccionModificada; //*
           $datosJugador = resumirJugador($todosLosJuegos, $nombreIngresado); //*
            echo "*************************************\n";
            echo "JUGADOR " .strtoupper($nombreIngresado)."\n"; //*
            echo "GANÓ ". $datosJugador["juegosGanados"]."\n"; //*
            echo "PERDIÓ ". $datosJugador["juegosPerdidos"]."\n"; //*
            echo "EMPATÓ ". $datosJugador["juegosEmpatados"]."\n"; //*
            echo "Total de puntos acumulados: " .$datosJugador["puntosAcumulados"]."\n"; //*
            echo "*************************************\n";
          
            break;
        case 6: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 6

    
            break;
        case 7: 
            echo "Usted ha salido\n";
        
            break;
            
    }
} while ($opcion != 7); //*