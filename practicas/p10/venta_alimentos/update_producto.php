<?php
// MySQL Conexion
$link = mysqli_connect("localhost", "root", "621252", "marketzone");

// Chequea la conexión
if($link === false){
    die("ERROR: No pudo conectarse con la DB. " . mysqli_connect_error());
}

// Verifica si se han recibido los datos del formulario
if (isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['marca']) && isset($_POST['modelo']) && isset($_POST['precio']) && isset($_POST['unidades']) && isset($_POST['detalles']) && isset($_POST['imagen'])) {
    
    // Escapa los datos recibidos para evitar inyecciones SQL
    $id = mysqli_real_escape_string($link, $_POST['id']);
    $nombre = mysqli_real_escape_string($link, $_POST['nombre']);
    $marca = mysqli_real_escape_string($link, $_POST['marca']);
    $modelo = mysqli_real_escape_string($link, $_POST['modelo']);
    $precio = mysqli_real_escape_string($link, $_POST['precio']);
    $unidades = mysqli_real_escape_string($link, $_POST['unidades']);
    $detalles = mysqli_real_escape_string($link, $_POST['detalles']);
    $imagen = mysqli_real_escape_string($link, $_POST['imagen']);
    
    // Ejecuta la actualización del registro
    $sql = "UPDATE productos SET nombre='$nombre', marca='$marca', modelo='$modelo', precio='$precio', unidades='$unidades', detalles='$detalles', imagen='$imagen' WHERE id='$id'";
    
    if(mysqli_query($link, $sql)){
        echo "Registro actualizado.";
    } else {
        echo "ERROR: No se ejecutó $sql. " . mysqli_error($link);
    }
} else {
    echo "ERROR: No se recibieron los datos del formulario.";
}

// Cierra la conexión
mysqli_close($link);
?>
