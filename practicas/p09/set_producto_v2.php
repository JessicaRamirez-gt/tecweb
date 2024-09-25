<?php
$nombre = $_POST['name'];
$marca = $_POST['branch'];
$modelo = $_POST['model'];
$precio = $_POST['price'];
$detalles = $_POST['details'];
$unidades = $_POST['units'];
$imagen = 'img/default.png'; // Puedes manejar la carga de imágenes de otra forma si es necesario

/** SE CREA EL OBJETO DE CONEXION */
@$link = new mysqli('localhost', 'root', '621252', 'marketzone');	

/** comprobar la conexión */
if ($link->connect_errno) 
{
    die('Falló la conexión: '.$link->connect_error.'<br/>');
    /** NOTA: con @ se suprime el Warning para gestionar el error por medio de código */
}

/** Verificar si el producto ya existe en la base de datos usando comparaciones insensibles a mayúsculas y eliminando espacios */
$check_sql = "SELECT * FROM productos
              WHERE LOWER(TRIM(nombre)) = LOWER(TRIM('{$nombre}'))
              AND LOWER(TRIM(marca)) = LOWER(TRIM('{$marca}'))
              AND LOWER(TRIM(modelo)) = LOWER(TRIM('{$modelo}'))";
 
$result = $link->query($check_sql);
 
if ($result->num_rows > 0) {
    // Si el producto ya existe, mostramos un mensaje
    echo 'El producto ya existe en la base de datos.';
} else {
    // Si no existe, lo insertamos
    /*$sql = "INSERT INTO productos (id, nombre, marca, modelo, precio, detalles, unidades, imagen, eliminado)
            VALUES (null, '{$nombre}', '{$marca}', '{$modelo}', {$precio}, '{$detalles}', {$unidades}, '{$imagen}', 0)";*/
    // Esta nueva query especifica los nombres de las columnas y no incluye valores
    // Si no existe, lo insertamos

    //nueva inserción
    $sql = "INSERT INTO productos (nombre, marca, modelo, precio, detalles, unidades, imagen)
            VALUES ('{$nombre}', '{$marca}', '{$modelo}', {$precio}, '{$detalles}', {$unidades}, '{$imagen}')";
 
    if ($link->query($sql)) {
        echo 'Producto insertado con éxito.<br/>';
        echo '<strong>Resumen de los datos insertados:</strong><br/>';
        echo 'ID: ' . $link->insert_id . '<br/>';
        echo 'Nombre: ' . $nombre . '<br/>';
        echo 'Marca: ' . $marca . '<br/>';
        echo 'Modelo: ' . $modelo . '<br/>';
        echo 'Precio: ' . $precio . '<br/>';
        echo 'Detalles: ' . $detalles . '<br/>';
        echo 'Unidades: ' . $unidades . '<br/>';
        echo 'Imagen: ' . $imagen . '<br/>';
        echo 'Eliminado: 0<br/>';  // Siempre será 0 en el momento de inserción
    } else {
        echo 'El Producto no fue insertado';
    }
}
 
$link->close();
?>