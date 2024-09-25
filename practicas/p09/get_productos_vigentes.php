<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<?php
    // Verificar si se ha recibido el parámetro 'tope'
    if(isset($_GET['tope'])) {
        $tope = $_GET['tope'];
    } else {
        die('Parámetro "tope" no detectado...');
    }
 
    if (!empty($tope)) {
        /** SE CREA EL OBJETO DE CONEXIÓN */
        @$link = new mysqli('localhost', 'root', '621252', 'marketzone');
        /** NOTA: con @ se suprime el Warning para gestionar el error por medio de código */
 
        /** Comprobar la conexión */
        if ($link->connect_errno) {
            die('Falló la conexión: '.$link->connect_error.'<br/>');
        }
 
        /** Realizar la consulta a la base de datos para obtener solo productos no eliminados */
        if ($result = $link->query("SELECT * FROM productos WHERE unidades <= $tope AND eliminado = 0 LIMIT $tope")) {
            /** Se extraen las tuplas obtenidas de la consulta */
            $row = $result->fetch_all(MYSQLI_ASSOC);
            $result->free(); // Liberar memoria asociada al resultado
        }
 
        $link->close(); // Cerrar la conexión
    }
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Productos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h3>PRODUCTOS DISPONIBLES</h3>
 
    <br/>
 
    <?php if( isset($row) && count($row) > 0 ) : ?>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Unidades</th>
                    <th scope="col">Detalles</th>
                    <th scope="col">Imagen</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($row as $producto): ?>
                <tr>
                    <th scope="row"><?= htmlspecialchars($producto['id']) ?></th>
                    <td><?= htmlspecialchars($producto['nombre']) ?></td>
                    <td><?= htmlspecialchars($producto['marca']) ?></td>
                    <td><?= htmlspecialchars($producto['modelo']) ?></td>
                    <td><?= htmlspecialchars($producto['precio']) ?></td>
                    <td><?= htmlspecialchars($producto['unidades']) ?></td>
                    <td><?= htmlspecialchars(utf8_encode($producto['detalles'])) ?></td>
                    <td><img src="<?= htmlspecialchars($producto['imagen']) ?>" alt="Imagen de <?= htmlspecialchars($producto['nombre']) ?>" style="max-width: 100px;"></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
 
    <?php else : ?>
        <script>
            alert('No se encontraron productos con unidades menores o iguales a <?= htmlspecialchars($tope) ?>.');
        </script>
    <?php endif; ?>
</body>
</html>