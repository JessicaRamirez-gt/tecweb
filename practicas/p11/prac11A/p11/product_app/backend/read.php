<?php
include_once __DIR__.'/database.php';

// SE CREA EL ARREGLO QUE SE VA A DEVOLVER EN FORMA DE JSON
$data = array();
// SE VERIFICA HABER RECIBIDO EL TÉRMINO DE BÚSQUEDA
if (isset($_POST['search'])) {
    $searchTerm = $_POST['search'];

    // SE REALIZA LA QUERY DE BÚSQUEDA Y AL MISMO TIEMPO SE VALIDA SI HUBO RESULTADOS
    $stmt = $conexion->prepare("SELECT * FROM productos WHERE nombre LIKE ? OR marca LIKE ? OR detalles LIKE ?");
    $likeTerm = '%' . $searchTerm . '%'; // Se añaden comodines para coincidencias parciales
    $stmt->bind_param('sss', $likeTerm, $likeTerm, $likeTerm); // 'sss' indica que todos los parámetros son cadenas

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        // SE OBTIENEN LOS RESULTADOS
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $data[] = array_map('utf8_encode', $row); // Se codifican a UTF-8 los datos
        }
        $stmt->close();
    } else {
        // Manejo de errores
        http_response_code(500);
        echo json_encode(['error' => 'Query Error: ' . mysqli_error($conexion)]);
        exit;
    }
    $conexion->close();
}

// SE HACE LA CONVERSIÓN DE ARRAY A JSON
echo json_encode($data, JSON_PRETTY_PRINT);
?>
