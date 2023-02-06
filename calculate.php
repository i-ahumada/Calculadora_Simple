<?php
/* 
---------------------- DISCLAIMER ----------------------

    Se que existe eval() y que javascript hace las
    cuentas solo pero quería hacerlo sin eso, mi 
    objetivo era que salga analizando el string

    Estado: -- a 3 pasos del psiquiátrico --
--------------------------------------------------------
*/

// String sacada de la calculadora
$calcString = $_POST["display"];
// Array de cada caracter del string
$calcArray = str_split($calcString);



// Define un array de operadores en orden
function encontrarOperadores(string $string = '', string $tipo = '') {
    $arrayOperadores = [[]];

    $arrayDeChars = str_split($string);
    switch($tipo) {
        case 'sr':
            for ($j=0,$i=0; $i < sizeof($arrayDeChars); $i++) {
                if($arrayDeChars[$i] == '+'){
                    $arrayOperadores[0][$j] = '+';
                    $j++;
                } else if($arrayDeChars[$i] == '-'){
                    $arrayOperadores[0][$j] = '-';
                    $j++;
                } 
            }
            return $arrayOperadores[0];
            break;
        case 'md':
            for ($j=0,$i=0; $i < sizeof($arrayDeChars); $i++) {
                if($arrayDeChars[$i] == "*"){
                    $arrayOperadores[1][$j] = "*";
                    $j++;
                } else if($arrayDeChars[$i] == "/"){
                    $arrayOperadores[1][$j] = "/";
                    $j++;
                } 
            }
            return $arrayOperadores[1];
            break;
    }
    return;
}

function calculadoraMultiplicacionDivision(string $string, array $arrayOperadores = []) {
    // itero sobre los operadores sumo/resto factores al resultado parcial que se va obteniendo
    // Array sin sumas o restas
    $arraySinMultiplicacionDivision = explode('&',str_replace(['*', '/'],'&',$string)); 
    $resultadoParcialMultiplicacionDivision = $arraySinMultiplicacionDivision[0];
    
    for ($j=1 ,$i=0; $i < sizeof($arrayOperadores); $i++, $j++) {
        if($arrayOperadores[$i] == '*') {
            $resultadoParcialMultiplicacionDivision = $resultadoParcialMultiplicacionDivision * $arraySinMultiplicacionDivision[$j];
            
        } else {
            $resultadoParcialMultiplicacionDivision = $resultadoParcialMultiplicacionDivision / $arraySinMultiplicacionDivision[$j];
        }
    }

    return $resultadoParcialMultiplicacionDivision;
}
// Hace las sumas y las restas
function calculadoraSumaResta(string $string) {
    // itero sobre los operadores sumo/resto factores al resultado parcial que se va obteniendo
    // Array sin sumas o restas
    $operadoresSumaResta = encontrarOperadores($string, 'sr');
    $operadoresMultiplicacionDivision = [];
    $arraySinMasMenos = explode('&',str_replace(['+', '-'],'&', $string)); 
    for($i=0; $i<sizeof($arraySinMasMenos); $i++) {
        if((str_contains($arraySinMasMenos[$i], "*")) or (str_contains($arraySinMasMenos[$i], "/"))) {
            $operadoresMultiplicacionDivision[$i] = encontrarOperadores($arraySinMasMenos[$i], 'md');
        }
    }
    $operadores = [$operadoresSumaResta, $operadoresMultiplicacionDivision];

    for ($j=0 ,$i=0; $i < (sizeof($operadores[0]) != 0? sizeof($operadores[0]) : sizeof($operadores[1])); $i++) {
        if($j == 0) {
            if((str_contains($arraySinMasMenos[$j], "*")) or (str_contains($arraySinMasMenos[$j], "/"))) {
                $arraySinMasMenos[$j] = calculadoraMultiplicacionDivision($arraySinMasMenos[$j], $operadores[1][$j]);
            }
            $resultadoParcialSumaResta = $arraySinMasMenos[$j];
            $j++;
        } 
        if($operadores[0][$i] == '+') {
            if((str_contains($arraySinMasMenos[$j], "*")) or (str_contains($arraySinMasMenos[$j], "/"))) {
                $arraySinMasMenos[$j] = calculadoraMultiplicacionDivision($arraySinMasMenos[$j], $operadores[1][$j]);
            }
            $resultadoParcialSumaResta += $arraySinMasMenos[$j];
            $j++;
        } else if($operadores[0][$i] == '-'){
            if((str_contains($arraySinMasMenos[$j], "*")) or (str_contains($arraySinMasMenos[$j], "/"))) {
                $arraySinMasMenos[$j] = calculadoraMultiplicacionDivision($arraySinMasMenos[$j], $operadores[1][$j]);
            }
            $resultadoParcialSumaResta -= $arraySinMasMenos[$j];
            $j++;
        }
    }
    print_r($arraySinMasMenos);
    print_r($resultadoParcialSumaResta);
    print_r($operadores);
    return $resultadoParcialSumaResta;
}

function calcular(string $stringFromCalculator, string $resultadoParcial = '') {
    $operadoresSumaResta = [];
    $resultadoParcial = calculadoraSumaResta($stringFromCalculator);
    return $resultadoParcial;
}

// function operacionesEnParentesis(string $string) {
//     preg_match_all('/\((.*)\)/', $string, $matches);
//     for($i = 0; $i < sizeof($matches[1]); $i++) {
//         if(preg_match_all('/\((.*)\)/', $matches[1][$i])) {
//             preg_match_all('/\((.*)\)/', $matches[1][$i], $subMatches)
//             operacionesEnParentesis($subMatches)
//         }
//         $resultadosParentesis[$i] = calcular($matches[1][$i]);
//         $string = str_replace($matches[0][$i], $resultadosParentesis[$i], $string);
//     }
//     str_replace(["(", ")"], "", $string);
//     return $string;
// }


$resultado = calcular($calcString);




header("Location: index.php?resultado=$resultado");
