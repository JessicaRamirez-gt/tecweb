<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <?php
        if(isset($_GET['tope']))
        {
            $tope = $_GET['tope'];
        }
        else
        {
            die('Parámetro "tope" no detectado...');
        }

        if (!empty($tope))
	{
		/** SE CREA EL OBJETO DE CONEXION */
		@$link = new mysqli('localhost', 'root', '621252', 'marketzone');
        /** NOTA: con @ se suprime el Warning para gestionar el error por medio de código */

		/** comprobar la conexión */
		if ($link->connect_errno) 
		{
			die('Falló la conexión: '.$link->connect_error.'<br/>');
			//exit();
		}

		/** Crear una tabla que no devuelve un conjunto de resultados */
		if ( $result = $link->query("SELECT * FROM productos WHERE unidades <= $tope") ) 
		{
            /** Se extraen las tuplas obtenidas de la consulta */
			$row = $result->fetch_array(MYSQLI_ASSOC);


			/** útil para liberar memoria asociada a un resultado con demasiada información */
			$result->free();
		}

		$link->close();

        /** Se devuelven los datos en formato JSON 
        *echo json_encode($data, JSON_PRETTY_PRINT); Por el momento aquí se cambia para darle formato*/
	}
    ?>

    <head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Producto_Tope</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>
	<body>
		<h3>PRODUCTO</h3>

		<br/>
		
		<?php if( isset($row) ) : ?>

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
                    <?php while ($row = $result->fetch_array(MYSQLI_ASSOC)) : ?>
					<tr>
						<th scope="row"><?= $row['id'] ?></th>
						<td><?= $row['nombre'] ?></td>
						<td><?= $row['marca'] ?></td>
						<td><?= $row['modelo'] ?></td>
						<td><?= $row['precio'] ?></td>
						<td><?= $row['unidades'] ?></td>
						<td><?= utf8_encode($row['detalles']) ?></td>
						<td><img src=<?= $row['imagen'] ?> ></td>
					</tr>
                    <?php endwhile?>
				</tbody>
			</table>

		<?php elseif(!empty($tope)) : ?>

			 <script>
                alert('El tope del producto no existe');
             </script>

		<?php endif; ?>
	</body>
</html>