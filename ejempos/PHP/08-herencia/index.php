<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    require_once __DIR__ . '/operacion.php';

    $suma = new Suma;
    $suma->setValor1(10); //Método definido en la clase 'Operacion'
    $suma->setValor2(10); //Método definido en la clase 'Operacion'
    $suma -> operar();    //Método definido en la clase 'Suma'

    echo 'El resulatdo es: '. $suma->getResultado().'<br>';


    $resta = new Resta;
    $resta->setValor1(10); //Método definido en la clase 'Operacion'
    $resta->setValor2(5); //Método definido en la clase 'Operacion'
    $resta -> operar();    //Método definido en la clase 'Resta'

    echo 'El resulatdo es: '. $resta->getResultado().'<br>';
    ?>
</body>
</html>