<?php
    include_once __DIR__.'/database.php';

    //Función para validar que los campos estén llenos

    function validarDatosProducto($jsonOBJ) {
        // Lista de campos obligatorios
        $camposObligatorios = ['nombre', 'marca', 'modelo', 'precio', 'unidades'];
    
        foreach ($camposObligatorios as $campo) {
            if (empty($jsonOBJ->$campo)) {
                return false;
            }
        }
    
        return true;
    }

    // SE OBTIENE LA INFORMACIÓN DEL PRODUCTO ENVIADA POR EL CLIENTE
    $producto = file_get_contents('php://input');
    $data = array(
        'status'  => 'error',
        'message' => 'Ya hay un producto con ese nombre'
    );
    if(!empty($producto)) {
        // SE TRANSFORMA EL STRING DEL JASON A OBJETO
        $jsonOBJ = json_decode($producto);
        
        if (validarDatosProducto($jsonOBJ)) {
            $sql = "SELECT * FROM productos WHERE nombre = '{$jsonOBJ->nombre}' AND eliminado = 0";
            $result = $conexion->query($sql);
            
            if ($result->num_rows == 0) {
                $conexion->set_charset("utf8");
                $sql = "INSERT INTO productos VALUES (null, '{$jsonOBJ->nombre}', '{$jsonOBJ->marca}', '{$jsonOBJ->modelo}', {$jsonOBJ->precio}, '{$jsonOBJ->detalles}', {$jsonOBJ->unidades}, '{$jsonOBJ->imagen}', 0)";
                if($conexion->query($sql)){
                    $data['status'] =  "success";
                    $data['message'] =  "Producto agregado";
                } else {
                    $data['message'] = "ERROR: No se ejecuto $sql. " . mysqli_error($conexion);
                }
            } else {
                $data['message'] = 'Ya existe un producto con ese nombre';
            }
            $result->free();
        } else {
            $data['message'] = 'Falta llenar los campos obligatorios';
        }
        // Cierra la conexion
        $conexion->close();
    }

    // SE HACE LA CONVERSIÓN DE ARRAY A JSON
    echo json_encode($data, JSON_PRETTY_PRINT);
?>