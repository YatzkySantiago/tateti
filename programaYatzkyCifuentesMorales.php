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

/** Muestra las opciones del menú en la pantalla, le solicita al usuario una opción válida y retorna el número de la opción.
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

/** Muestra en pantalla los datos de un juego.
 * @param int $numJuego
 * @param array $colection
 * @param int $game
 */
function mostrarDatosJuego($numJuego, $colection){
    // array $datosJuego
    // string $resultado
    $datosJuego = $colection;
    if($datosJuego[$numJuego]["puntosCruz"] == $datosJuego[$numJuego]["puntosCirculo"]){
        $resultado = "(Empate)";
    }elseif($datosJuego[$numJuego]["puntosCruz"] > $datosJuego[$numJuego]["puntosCirculo"]){
        $resultado = "(Gano X)";
    }else{//($coleccionJuegos[$numJuego]["puntosCruz"] < $coleccionJuegos[$numJuego]["puntosCirculo"])
        $resultado = "(Gano O)";
    }
    
    echo "**********************\n";
    echo "Juego TATETI: ".($numJuego + 1)." ".$resultado."\n";
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

/** Modulo que retorna el indice del primer juego ganado en base a un nombre ingresado.
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

/** Modulo que genera un resumen de un jugador y retorna un array con los datos.
 * @param array $arrayJuegos
 * @param string $unNombre
 * @return array
 */
function resumirJugador ($arrayJuegos, $unNombre){
    //int $cantJuegosGanados, $cantJuegosPerdidos, $cantJuegosEmpatados, $totalPuntosJugador, $i
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

/** Función que solicita al usuario un símbolo, lo verifica y lo retorna.
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

/** Función que muestra el total de partidas ganadas, sin tomar en cuenta el jugador.
 * @param array $colection
 * @return int
 */
function mostrarPartidasGanadas($colection){
    //int $cantJuegosGanados, $i
    $cantJuegosGanados = 0;
    for ($i=0; $i< count($colection); $i++){
        if (($colection [$i]["puntosCruz"]) <> ($colection [$i]["puntosCirculo"])){
            $cantJuegosGanados++;
        }
    }
    return $cantJuegosGanados;
}

/** Modulo que devuelve la cantidad de juegos ganados según un símbolo ingresado por el usuario.
 * @param array $coleccion
 * @param string $simboloIngresado
 * @return int
 */
function calcVictoriasPorSimbolo ($coleccion, $simboloIngresado){
    //int $playerCruz, $playerCirculo, $cantVictoriasCirculo, $cantVictoriasCruz, $cantVictoriasSimbolo, $i
    $cantVictoriasCirculo =0;
    $cantVictoriasCruz=0;
    $cantVictoriasSimbolo =0;
    for ($i=0; $i <count($coleccion); $i++){
        $playerCirculo= $coleccion[$i]["puntosCirculo"];
        $playerCruz= $coleccion[$i]["puntosCruz"];
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

/** Muestra en pantalla la estructura ordenada alfabeticamente por jugador O usando las funciones predefinidas uasort y print_r.
 * @param array $colection
 */
function juegosOrdenadosJugadorO($colection){
    uasort($colection, 'cmp');
    print_r($colection); 
}

/** Funcion de comparacion para ordenar alfabeticamente, utilizado en uasort().
 * @param array $jugadorX
 * @param array $jugadorO
 * @return boolean
 */
function cmp($jugadorX, $jugadorO) {
    // int: $var
    if (strtolower($jugadorX["jugadorCirculo"]) == strtolower($jugadorO["jugadorCirculo"])) {
        $var = 0;
    } elseif (strtolower($jugadorX["jugadorCirculo"]) < strtolower($jugadorO["jugadorCirculo"])) {
        $var = -1;
    } else {
        $var = 1;
    }
    return $var;
}

/*****************************************/
/*********** GLOSARIO DE FUNCIONES *******/
/*****************************************/

// count(): la funcion count($array) cuenta la cantidad de entradas que tiene un array y devuelve un valor int.
// strtolower(): la funcion strtolower($string) convierte en minusculas los caracteres de un string.
// strtoupper(): la funcion strtoupper($string) convierte en mayusculas los caracteres de un string.
// strlen(): la funcion strlen($string) cuenta la cantidad de caracteres en el string ingresado, devuelve un valor int.
// print_r(): la funcion print_r($array/$variable) muestra en pantalla los datos guardados en un array o variable de forma legible.
// uasort(): la funcion uasort($array, 'function de comparacion') ordena un array en base a una funcion creada por el programador.
/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:
// int: $opcion, $cantJuegosJugados, $indiceJuego, $primerJuego, 
// array: $coleccionDeJuegos, $juego, $datosJugador
// string: $nombreJugador, $simbolo, $otroSimbolo, $nombreIngresado
// float: $porcentaje

//Inicialización de variables:
$coleccionDeJuegos = cargarJuegos();

//Proceso:
 
do {
    $opcion = seleccionarOpcion(); 
    switch ($opcion) { // la funcion switch a diferencia del if y elseif, evalua solo una vez la condicion y el resultado lo compara con cada uno de los case.
        case 1: 
            //opcion que permite jugar al tateti.
            $juego = jugar(); 
            imprimirResultado($juego); 
            $coleccionDeJuegos = agregarJuego($coleccionDeJuegos, $juego); 

            break;
        case 2: 
            //opcion que muestra un juego de la coleccion en base a un numero solicitado al usuario. 
            $cantJuegosJugados = count($coleccionDeJuegos); 
            echo "ingrese un numero del 1 al ".$cantJuegosJugados. "\n";
            $indiceJuego = solicitarNumeroEntre(1, $cantJuegosJugados);
            if ($indiceJuego >= 0 && $indiceJuego <= ($cantJuegosJugados)) 
            { 
                mostrarDatosJuego($indiceJuego -1, $coleccionDeJuegos); 
            } 

            break;
        case 3: 
            //opcion que muestra el primer juego ganado del jugador ingresado.
            echo "Ingrese nombre del jugador: ";
            $nombreJugador = trim(fgets(STDIN));  
            $primerJuego = primerJuegoGanado($coleccionDeJuegos, $nombreJugador); 
            if ($primerJuego == -1) { 
                echo "**********************\n";
                echo "Ese jugador no existe o no gano \n";
                echo "**********************\n";
            } else {
                mostrarDatosJuego($primerJuego, $coleccionDeJuegos);
            }

            break;
        case 4: 
            //opción que muestra el porcentaje de juegos ganados según un símbolo ingresado por el usuario.
            $simbolo = validarSimbolos(); 
            if ($simbolo == "X") { 
                $otroSimbolo = "O"; 
            } else {
                $otroSimbolo = "X"; 
            }
            $partidasGanadas = mostrarPartidasGanadas($coleccionDeJuegos);
            $victoriasXO = calcVictoriasPorSimbolo($coleccionDeJuegos, $simbolo);
            if ($partidasGanadas == 0) {
                echo "**********************\n";
                echo "no hubieron victorias\n";
                echo "**********************\n";
            } else {
                $porcentaje = $victoriasXO*100/$partidasGanadas; 
                echo "**********************\n";
                echo "en total se jugaron ".count($coleccionDeJuegos)." juegos de tateti de los cuales ".(count($coleccionDeJuegos)-$partidasGanadas)." son empates y ".$partidasGanadas." son partidas ganadas \n"; 
                echo "(victorias de $simbolo: ".$victoriasXO." ; victorias de $otroSimbolo: ".($partidasGanadas-$victoriasXO).")\n"; 
                echo $simbolo." gano el: ".$porcentaje."% de los juegos. \n"; 
                echo "**********************\n";
            }

            break;  
        case 5: 
            //opción que muestra en pantalla el resumen de un jugador.
            echo "Ingrese el nombre del jugador para ver su resumen: ";
            $nombreIngresado = trim(fgets(STDIN));
            $datosJugador = resumirJugador($coleccionDeJuegos, $nombreIngresado);
            if ($datosJugador["juegosGanados"] == 0 && $datosJugador["juegosPerdidos"] == 0 && $datosJugador["juegosEmpatados"] == 0) {
                echo "**********************\n";
                echo "Ese jugador no existe\n";
                echo "**********************\n";
            } else {
                echo "*************************************\n";
                echo "JUGADOR " .strtoupper($nombreIngresado)."\n";
                echo "GANÓ ". $datosJugador["juegosGanados"]."\n";
                echo "PERDIÓ ". $datosJugador["juegosPerdidos"]."\n";
                echo "EMPATÓ ". $datosJugador["juegosEmpatados"]."\n";
                echo "Total de puntos acumulados: " .$datosJugador["puntosAcumulados"]."\n";
                echo "*************************************\n";
            }
          
            break;
        case 6: 
            //opción que muestra en pantalla todos los juegos ordenados en orden alfabetico.
            juegosOrdenadosJugadorO($coleccionDeJuegos);
    
            break;
        case 7: 
            //opción para salir del programa.
            echo "Usted ha salido\n";
        
            break;
    }
} while ($opcion != 7);