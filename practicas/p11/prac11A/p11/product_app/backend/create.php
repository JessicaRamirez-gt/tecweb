<?php
include_once __DIR__ . '/database.php';

// SE OBTIENE LA INFORMACIÓN DEL PRODUCTO ENVIADA POR EL CLIENTE
$producto = file_get_contents('php://input');
if (!empty($producto)) {
    // SE TRANSFORMA EL STRING DEL JSON A OBJETO
    $jsonOBJ = json_decode($producto);

    // Validar si el producto ya existe en la base de datos
    $nombre = mysqli_real_escape_string($conexion, $jsonOBJ->nombre);
    $consulta = "SELECT * FROM productos WHERE nombre = '$nombre' AND eliminado = 0";
    $resultadoConsulta = $conexion->query($consulta);

    if ($resultadoConsulta->num_rows > 0) {
        // Producto ya existe y no está eliminado
        echo json_encode(['status' => 'error', 'message' => 'El producto ya existe y no puede ser insertado.']);
    } else {
        // Preparar la inserción
        $precio = mysqli_real_escape_string($conexion, $jsonOBJ->precio);
        $unidades = mysqli_real_escape_string($conexion, $jsonOBJ->unidades);
        $modelo = mysqli_real_escape_string($conexion, $jsonOBJ->modelo);
        $marca = mysqli_real_escape_string($conexion, $jsonOBJ->marca);
        $detalles = mysqli_real_escape_string($conexion, $jsonOBJ->detalles);
        $imagen = mysqli_real_escape_string($conexion, $jsonOBJ->imagen);

        // Realizar la inserción
        $insercion = "INSERT INTO productos (nombre, precio, unidades, modelo, marca, detalles, imagen, eliminado) VALUES ('$nombre', '$precio', '$unidades', '$modelo', '$marca', '$detalles', '$imagen', 0)";

        if ($conexion->query($insercion) === TRUE) {
            // Inserción exitosa
            echo json_encode(['status' => 'success', 'message' => 'Producto insertado correctamente.']);
        } else {
            // Error en la inserción
            echo json_encode(['status' => 'error', 'message' => 'Error al insertar el producto: ' . mysqli_error($conexion)]);
        }
    }
} else {
    // Producto vacío
    echo json_encode(['status' => 'error', 'message' => 'No se recibió información del producto.']);
}
?>
