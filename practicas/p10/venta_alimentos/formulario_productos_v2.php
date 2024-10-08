<!DOCTYPE html> 
<html>
<head>
  <meta charset="utf-8">
  <title>Registro de Productos</title>
  <style type="text/css">
    ol, ul { list-style-type: none; }
  </style>
</head>
<body>
<?php
  // Verificar si se recibió el ID del producto
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Conexión a la base de datos
    @$link = new mysqli('localhost', 'root', '621252', 'marketzone');
    if ($link->connect_errno) { die('Error de conexión: '.$link->connect_error); }
    // Consulta para obtener los datos del producto
    if ($result = $link->query("SELECT * FROM productos WHERE id = $id")) {
      $producto = $result->fetch_assoc(); // Extraer los datos
      $result->free(); // Liberar memoria
    }
    $link->close(); // Cerrar conexión
  }
?>
  <h1>Registro de Productos </h1>
  <p>Modifica el producto.</p>
  <form id="formularioProducto" action="http://localhost/tecweb/practicas/p10/venta_alimentos/update_producto.php" method="post"> <!-- Acción modificada -->
    <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>"> <!-- ID del producto -->
    <h2>Información de Producto  (ALIMENTOS PARA MASCOTAS)</h2>
    <fieldset>
        <legend>Información</legend>
        <label for="form-name">Nombre del Producto:</label> <input type="text" name="name" id="nombre" maxlength="100" value="<?= htmlspecialchars($producto['nombre']) ?>" >

        <ul>
          
          <li><label for="form-model">Modelo:</label> <input type="text" name="model" id="model" maxlength="25" value="<?= htmlspecialchars($producto['modelo']) ?>"required></li>
          <li><label for="form-price">Precio:</label><br><input type="number" name="price" id="price" step="0.01" min="99.99" placeholder="99.99" value="<?= htmlspecialchars($producto['precio']) ?>" required></li>
          <li><label for="form-details">Detalles del producto:</label><br><textarea name="details" rows="4" cols="60" id="form-details" placeholder="No más de 300 caracteres de longitud" value="<?= htmlspecialchars($producto['detalles']) ?>"></textarea></li>
          <li><label for="form-unidades">Unidades:</label><br><input type="number" name="units" id="unidades" min="0" value="<?= htmlspecialchars($producto['unidades']) ?>" required></li>
        </ul>
      </fieldset>
      <fieldset>
        <legend><p>Marca <em>(escoge una)</em>:</p></legend>
        <ul>
          <li><input type="radio" name="marca" value="purina" required>Purina</li>
          <li><input type="radio" name="marca" value="pedigree" required>Pedigree</li>
          <li><input type="radio" name="marca" value="hills" required>Hills</li>
          <li><input type="radio" name="marca" value="nucan" required>Nucan</li>
        </ul>
      </fieldset>
    </fieldset>
    <fieldset>
      <legend><p>Ruta</p></legend>
      <label for="form-image">Ruta de imagen: </label><input type="text" name="image" id="image" placeholder="./Docs..."  value="<?= htmlspecialchars($producto['imagen']) ?>">
    </fieldset>

    <p><input type="submit" value="Guardar ">
    <input type="reset" value="Restablecer"></p>
  </form>
</body>
</html>
