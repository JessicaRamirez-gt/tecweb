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
  <h1>Registro de Productos &ldquo;Buen Producto&rdquo;</h1>
  <p>Modifica el producto.</p>
  <form id="formularioProducto" action="update_producto.php" method="post"> <!-- Acción modificada -->
    <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>"> <!-- ID del producto -->
    <h2>Información de Producto  (ALIMENTOS PARA MASCOTAS)</h2>
    <fieldset>
      <legend>Información</legend>
      <ul>
        <li><label for="form-name">Nombre:</label>
          <input type="text" name="nombre" id="form-name" maxlength="100" value="<?= htmlspecialchars($producto['nombre']) ?>" required>
        </li>
        <li><label for="form-marca">Marca:</label>
          <select name="marca" id="form-marca" required>
            <option value="">Seleccione una marca</option>
            <option value="Nike" <?= $producto['marca']=='Purina'?'selected':'' ?>>Nike</option>
            <option value="Adidas" <?= $producto['marca']=='Pedigree'?'selected':'' ?>>Adidas</option>
            <option value="Puma" <?= $producto['marca']=='Hills'?'selected':'' ?>>Puma</option>
            <option value="Pirma" <?= $producto['marca']=='Nucan'?'selected':'' ?>>Pirma</option>
          </select>
        </li>
        <li><label for="form-modelo">Modelo:</label>
          <input type="text" name="modelo" id="form-modelo" pattern="[A-Za-z0-9]+" maxlength="25" value="<?= htmlspecialchars($producto['modelo']) ?>" required>
        </li>
        <li><label for="form-precio">Precio:</label>
          <input type="number" name="precio" id="form-precio" step="0.01" min="100" value="<?= htmlspecialchars($producto['precio']) ?>" required>
        </li>
        <li><label for="form-unidades">Unidades:</label>
          <input type="number" name="unidades" id="form-unidades" min="0" value="<?= htmlspecialchars($producto['unidades']) ?>" required>
        </li>
        <li><label for="form-detalles">Detalles:</label><br>
          <textarea name="detalles" rows="4" cols="60" id="form-detalles" maxlength="250"><?= htmlspecialchars($producto['detalles']) ?></textarea>
        </li>
        <li><label for="form-imagen">Ruta de la imagen:</label>
          <input type="text" name="imagen" id="form-imagen" placeholder="image.png" value="<?= htmlspecialchars($producto['imagen']) ?>">
        </li>
      </ul>
    </fieldset>
    <p><input type="submit" value="Guardar cambios"><input type="reset" value="Restablecer"></p>
  </form>
</body>
</html>
