<?php
    // include_once __DIR__.'/database.php';

    // // SE CREA EL ARREGLO QUE SE VA A DEVOLVER EN FORMA DE JSON
    // $data = array();

    // if( isset($_POST['id']) ) {
    //     $id = $_POST['id'];
    //     // SE REALIZA LA QUERY DE BÚSQUEDA Y AL MISMO TIEMPO SE VALIDA SI HUBO RESULTADOS
    //     if ( $result = $conexion->query("SELECT * FROM productos WHERE id = {$id}") ) {
    //         // SE OBTIENEN LOS RESULTADOS
    //         $row = $result->fetch_assoc();

    //         if(!is_null($row)) {
    //             // SE CODIFICAN A UTF-8 LOS DATOS Y SE MAPEAN AL ARREGLO DE RESPUESTA
    //             foreach($row as $key => $value) {
    //                 $data[$key] = $value;
    //             }
    //         }
    //         $result->free();
    //     } else {
    //         die('Query Error: '.mysqli_error($conexion));
    //     }
    //     $conexion->close();
    // }

    // // SE HACE LA CONVERSIÓN DE ARRAY A JSON
    // echo json_encode($data, JSON_PRETTY_PRINT);

    require_once '../vendor/autoload.php';
    use myapi\Read as Read;

    $products = new Read("root", "621252", "marketzone");

    if(isset($_POST['id'])) {
        $products->single($_POST['id']);
    }

    echo $products->getData();
?>