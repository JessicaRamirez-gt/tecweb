<?php
    include_once __DIR__.'/database.php';

    // Verificar que la conexión esté definida y sea correcta
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    

    // Función para validar que los campos estén llenos y que los numéricos sean válidos
    function validarDatosProducto($jsonOBJ) {
        $camposObligatorios = ['nombre', 'marca', 'modelo', 'precio', 'unidades'];

        foreach ($camposObligatorios as $campo) {
            if (empty($jsonOBJ->$campo)) {
                return false;
            }
        }

        // Verificar que precio y unidades sean números válidos
        if (!is_numeric($jsonOBJ->precio) || !is_numeric($jsonOBJ->unidades)) {
            return false;
        }

        return true;
    }

    // SE OBTIENE LA INFORMACIÓN DEL PRODUCTO ENVIADA POR EL CLIENTE
    $producto = file_get_contents('php://input');
    $data = array(
        'status'  => 'error',
        'message' => 'Ya existe un producto con ese nombre'
    );

    if(!empty($producto)) {
        // SE TRANSFORMA EL STRING DEL JSON A OBJETO
        $jsonOBJ = json_decode($producto);
        error_log(print_r($jsonOBJ, true));


        // SE ASUME QUE LOS DATOS YA FUERON VALIDADOS ANTES DE ENVIARSE
        if (validarDatosProducto($jsonOBJ)) {
            // Comprobar si ya existe un producto con ese nombre y que no haya sido eliminado
            $sql = "SELECT * FROM productos WHERE nombre = '{$jsonOBJ->nombre}' AND eliminado = 0";
            $result = $conexion->query($sql);

            if ($result->num_rows == 0) {
                // Definir codificación de caracteres
                $conexion->set_charset("utf8");

                // Consulta para insertar nuevo producto
                $sql = "INSERT INTO productos VALUES (
                    null, 
                    '{$jsonOBJ->nombre}', 
                    '{$jsonOBJ->marca}', 
                    '{$jsonOBJ->modelo}', 
                    {$jsonOBJ->precio}, 
                    '{$jsonOBJ->detalles}', 
                    {$jsonOBJ->unidades}, 
                    '{$jsonOBJ->imagen}', 
                    0
                )";

                if($conexion->query($sql)){
                    // Producto agregado exitosamente
                    $data['status'] =  "success";
                    $data['message'] =  "Producto agregado";
                } else {
                    // Capturar error de la consulta
                    error_log("ERROR: No se ejecutó $sql. " . mysqli_error($conexion));
                    $data['message'] = "ERROR: No se pudo agregar el producto.";
                }
            } else {
                $data['message'] = 'Ya existe un producto con ese nombre';
            }
            $result->free();
        } else {
            $data['message'] = 'Falta llenar los campos obligatorios o hay datos inválidos';
        }
        // Cierra la conexión
        $conexion->close();
    }

    // SE HACE LA CONVERSIÓN DE ARRAY A JSON Y SE IMPRIME
    echo json_encode($data, JSON_PRETTY_PRINT);
?>
