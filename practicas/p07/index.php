<?php
    include 'src/funciones.php';
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"></html>
<head>
    <meta charset="UTF-8">
    <title>Practica 7</title>
</head>
<body>
    <h1>Primer ejercicio</h1>
    <form action="index.php" method="get">
        <fieldset>
            <legend><h2>Comprobar si un número es múltiplo de 5 y 7</h2></legend>
            Numero: <input type="text" name="numero">
            <input type="submit" value="Comprobar">
            <?php
                if (isset($_GET['numero'])) {
                    $numero = intval($_GET['numero']);
                    if (esMultiploDe5o7($numero)) {
                      echo "Es múltiplo de 5 y 7";
                    } else {
                      echo "No es múltiplo";
                    }
                  }
            ?>
        </fieldset>
    </form>
    <form>
    <h1>Segundo ejercicio</h1>
        <fieldset>
            <legend><h2>Secuencia impar-par-impar</h2></legend>
            <?php
                // Cantidad máxima de iteraciones (ajustable según tus necesidades)
                $max_iteraciones = 100;

                // Inicializar variables
                $matriz = [];
                $iteraciones = 0;
                $numeros;

                // Generar números hasta encontrar la secuencia deseada o alcanzar el máximo de iteraciones
                do {
                    $numeros = numAleatorios(3);
                    $iteraciones++;
                } while (!verificar_secuencia($numeros) && $iteraciones <= $max_iteraciones);
                // Agregar la secuencia encontrada a la matriz
                if ($iteraciones <= $max_iteraciones) {
                    $matriz[] = $numeros;
                }

                // Mostrar resultados
                if (count($matriz) > 0) {
                    echo "Números obtenidos en " . $iteraciones . " iteraciones:<br>";
                    foreach ($matriz as $fila) {
                        echo implode(", ", $fila) . "<br>";
                    }
                    echo "Total de números: " . count($matriz) * 3;
                } else {
                    echo "No se encontró la secuencia deseada en el número máximo de iteraciones.";
                }
            ?>
        </fieldset>
    </form>
    <form action = "index.php" method="get">
    <h1>Tercer ejercicio</h1>
        <fieldset>
            <legend><h2>Ciclo while para generar un número aleatorio</h2></legend>
            Numero: <input type="text" name="num">
            <input type="submit" value="Generar">
            <?php
                $num = isset($_GET['num']); // Valor por defecto si no se proporciona
                $num = intval($_GET['num']);
                $randNum = multiplo($num);
                
                if ($randNum) {
                    echo "El primer múltiplo de $num encontrado es: $randNum";
                } else {
                    echo "No se encontró ningún múltiplo.";
                }
            ?>
        </fieldset>
    </form>
</body>