<?php
    //Estos metodos ahora estan definidos en la clase Products, la idea es reducir el codigo
    //en estos archivos, y solo mandar a llamar los metodos de la clase Products

    // include_once __DIR__.'/database.php';

    // // SE OBTIENE LA INFORMACIÓN DEL PRODUCTO ENVIADA POR EL CLIENTE
    // $data = array(
    //     'status'  => 'error',
    //     'message' => 'Ya existe un producto con ese nombre'
    // );
    // if(isset($_POST['nombre'])) {
    //     // SE TRANSFORMA EL POST A UN STRING EN JSON, Y LUEGO A OBJETO
    //     $jsonOBJ = json_decode( json_encode($_POST) );
    //     // SE ASUME QUE LOS DATOS YA FUERON VALIDADOS ANTES DE ENVIARSE
    //     $sql = "SELECT * FROM productos WHERE nombre = '{$jsonOBJ->nombre}' AND eliminado = 0";
	//     $result = $conexion->query($sql);

    //     if ($result->num_rows == 0) {
    //         $conexion->set_charset("utf8");
    //         $sql = "INSERT INTO productos VALUES (null, '{$jsonOBJ->nombre}', '{$jsonOBJ->marca}', '{$jsonOBJ->modelo}', {$jsonOBJ->precio}, '{$jsonOBJ->detalles}', {$jsonOBJ->unidades}, '{$jsonOBJ->imagen}', 0)";
    //         if($conexion->query($sql)){
    //             $data['status'] =  "success";
    //             $data['message'] =  "Producto agregado";
    //         } else {
    //             $data['status'] =  "error";
    //             $data['message'] = "ERROR: No se ejecuto $sql. " . mysqli_error($conexion);
    //         }
    //     }else{
    //         $data['status'] =  "error";
    //         $data['message'] = "Ya existe un producto con ese nombre";
    //     }

    //     $result->free();
    //     // Cierra la conexion
    //     $conexion->close();
    // }

    // // SE HACE LA CONVERSIÓN DE ARRAY A JSON
    // echo json_encode($data, JSON_PRETTY_PRINT);
    require_once __DIR__ . '/Products.php';
    use Actividades\backend\Products as Products;
    

    $products = new Products("root", "621252", "marketzone");

    if(isset($_POST['nombre'])) {
        $products->add($_POST);
    }
    echo $products->getData();
?>