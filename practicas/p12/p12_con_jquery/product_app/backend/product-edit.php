<?php
    include_once __DIR__.'/database.php';

    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    $producto = file_get_contents('php://input');
    $data = array(
        'status'  => 'error',
        'message' => 'No se pudo actualizar el producto'
    );

    if (!empty($producto)) {
        $jsonOBJ = json_decode($producto);
        $id = $_GET['id'];

        // Verificar que todos los campos estén completos
        if (!empty($jsonOBJ->nombre) && !empty($jsonOBJ->marca) && !empty($jsonOBJ->modelo) && is_numeric($jsonOBJ->precio) && is_numeric($jsonOBJ->unidades)) {
            $sql = "UPDATE productos 
                    SET nombre='{$jsonOBJ->nombre}', marca='{$jsonOBJ->marca}', modelo='{$jsonOBJ->modelo}', precio={$jsonOBJ->precio}, detalles='{$jsonOBJ->detalles}', unidades={$jsonOBJ->unidades}, imagen='{$jsonOBJ->imagen}' 
                    WHERE id={$id}";

            if ($conexion->query($sql) === TRUE) {
                $data['status'] = 'success';
                $data['message'] = 'Producto actualizado correctamente';
            } else {
                $data['message'] = "Error: " . $conexion->error;
            }
        } else {
            $data['message'] = 'Campos faltantes o inválidos';
        }
    }

    echo json_encode($data, JSON_PRETTY_PRINT);

    $conexion->close();
?>