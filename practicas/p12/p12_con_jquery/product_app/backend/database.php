<?php
    $conexion = @mysqli_connect(
        'localhost',
        'root',
        '621252',
        'marketzone'
    );

    /**
     * NOTA: si la conexión falló $conexion contendrá false
     **/
    if(!$conexion) {
        die('¡Base de datos NO conectada!');
    }
?>