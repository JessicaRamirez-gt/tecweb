<?php
    //Ejercicio 1
    function esMultiploDe5o7($numero) {
        return ($numero % 5 == 0 && $numero % 7 == 0);
    }

    //Ejercicio 2
    //genera 3 números aleatorios
    function numAleatorios($cantidad) {
        $numeros = [];
        for ($i = 0; $i < $cantidad; $i++) {
            $numeros[] = rand(1,100);
        }
        return $numeros;
    }
    //corrobora que en cada iteración se cumpla el orden impar-par-impar
    function verificar_secuencia($numeros) {
        return $numeros[0] % 2 !== 0 && $numeros[1] % 2 === 0 && $numeros[2] % 2 !== 0;
    }

    //Ejercicio 3
    function multiplo($nom) {
        $numrand=0;
        while (true) {
            $numrand = rand(1,100);
            if ($numrand % $nom == 0) {
                return $numrand;
            }
        }
    }
?>
