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
                      echo "Es múltiplo de 5 o 7";
                    } else {
                      echo "No es múltiplo";
                    }
                  }
            ?>
        </fieldset>
        
    </form>
</body>