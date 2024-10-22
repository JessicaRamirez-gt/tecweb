<?php
include_once __DIR__.'/database.php';

if (isset($_GET['id'])) {
    $productId = $_GET['id'];
    $query = "SELECT * FROM productos WHERE id = '$productId' LIMIT 1";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $producto = mysqli_fetch_assoc($result);
        echo json_encode($producto);
    } else {
        echo json_encode(["status" => "error", "message" => "Producto no encontrado."]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "ID no proporcionado."]);
}
?>