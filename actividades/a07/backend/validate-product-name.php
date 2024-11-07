<?php
include_once __DIR__.'/database.php';

if (isset($_POST['name'])) {
  $name = $_POST['name'];
  $query = "SELECT * FROM productos WHERE nombre = '$name'";
  $result = $conexion ->query($query);

  echo json_encode(['exists' => $result->num_rows > 0]);
}
?>
