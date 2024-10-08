<?php
// MySQL Conexion
$link = mysqli_connect("localhost", "root", "621252", "marketzone");

// Chequea la conexión
if($link === false){
    die("ERROR: No pudo conectarse con la DB. " . mysqli_connect_error());
}

// Verifica si se han recibido los datos del formulario
if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['marca']) && isset($_POST['model']) && isset($_POST['price']) && isset($_POST['units']) && isset($_POST['details']) && isset($_POST['image'])) {
    
    // Escapa los datos recibidos para evitar inyecciones SQL
    $id = mysqli_real_escape_string($link, $_POST['id']);
    $nombre = mysqli_real_escape_string($link, $_POST['name']);
    $marca = mysqli_real_escape_string($link, $_POST['marca']);
    $modelo = mysqli_real_escape_string($link, $_POST['model']);
    $precio = mysqli_real_escape_string($link, $_POST['price']);
    $unidades = mysqli_real_escape_string($link, $_POST['units']);
    $detalles = mysqli_real_escape_string($link, $_POST['details']);
    $imagen = mysqli_real_escape_string($link, $_POST['image']);
    
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
