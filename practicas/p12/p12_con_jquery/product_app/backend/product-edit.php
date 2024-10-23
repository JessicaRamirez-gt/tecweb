<?php
    include_once __DIR__.'/database.php';

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
 
    if(!empty($producto)) {
        // SE TRANSFORMA EL STRING DEL JASON A OBJETO
        $jsonOBJ = json_decode($producto);
        
        if (validarDatosProducto($jsonOBJ)) {
            $sql = "UPDATE productos SET nombre = '{$jsonOBJ->nombre}', marca = '{$jsonOBJ->marca}', modelo = '{$jsonOBJ->modelo}', precio = {$jsonOBJ->precio}, detalles = '{$jsonOBJ->detalles}', unidades = {$jsonOBJ->unidades}, imagen = '{$jsonOBJ->imagen}' WHERE id = {$jsonOBJ->id}";
            $result = $conexion->query($sql);
        
            if ($result) {
                $data['status'] =  "success";
                $data['message'] =  "Producto actualizado";
            } else {
                $data['status'] =  "error";
                $data['message'] = "ERROR: No se ejecuto $sql. " . mysqli_error($conexion);
            }
    
            
        }else{
            $data['message'] = 'Falta llenar los campos obligatorios';
        }
        $conexion->close();
    }
    
 
    // SE HACE LA CONVERSIÓN DE ARRAY A JSON
    echo json_encode($data, JSON_PRETTY_PRINT);
?>