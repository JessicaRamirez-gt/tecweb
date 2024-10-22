var baseJSON = {
    "precio": 0.0,
    "unidades": 1,
    "modelo": "MM-000",
    "marca": "NA",
    "detalles": "NA",
    "imagen": "img/default.png"
};

function init() {
    // Cargar el JSON en el textarea
    $('#description').val(JSON.stringify(baseJSON, null, 2));
    // Cargar todos los productos al iniciar la página
    listarProductos();
}

// Cargar todos los productos NO eliminados
function listarProductos() {
    $.ajax({
        url: './backend/product-list.php',
        method: 'GET',
        contentType: 'application/json',
        success: function (response) {
            let productos = JSON.parse(response);
            if (Object.keys(productos).length > 0) {
                let template = '';
                productos.forEach(producto => {
                    let descripcion = `
                        <li>precio: ${producto.precio}</li>
                        <li>unidades: ${producto.unidades}</li>
                        <li>modelo: ${producto.modelo}</li>
                        <li>marca: ${producto.marca}</li>
                        <li>detalles: ${producto.detalles}</li>
                    `;
                    template += `
                        <tr productId="${producto.id}">
                            <td>${producto.id}</td>
                            <td>${producto.nombre}</td>
                            <td><ul>${descripcion}</ul></td>
                            <td>
                                <!-- Botón de Editar -->
                                <button class="product-edit btn btn-primary" data-id="${producto.id}">Editar</button>
                                <!-- Botón de Eliminar -->
                                <button class="product-delete btn btn-danger" data-id="${producto.id}">Eliminar</button>
                            </td>
                        </tr>
                    `;
                });
                $('#products').html(template);
            }
        }
    });
}


// Buscar productos coincidentes mientras se teclea
$('#search').on('input', function () {
    let search = $(this).val().trim(); // Remover espacios en blanco adicionales
    if (search.length === 0) {
        // Si el campo está vacío, listar todos los productos
        listarProductos();
        return;
    }
    
    $.ajax({
        url: `./backend/product-search.php?search=${search}`,
        method: 'GET',
        contentType: 'application/json',
        success: function (response) {
            let productos = JSON.parse(response);
            if (Object.keys(productos).length > 0) {
                let template = '';
                let templateBar = '';
                productos.forEach(producto => {
                    let descripcion = `
                        <li>precio: ${producto.precio}</li>
                        <li>unidades: ${producto.unidades}</li>
                        <li>modelo: ${producto.modelo}</li>
                        <li>marca: ${producto.marca}</li>
                        <li>detalles: ${producto.detalles}</li>
                    `;
                    template += `
                        <tr productId="${producto.id}">
                            <td>${producto.id}</td>
                            <td>${producto.nombre}</td>
                            <td><ul>${descripcion}</ul></td>
                            <td><button class="product-delete btn btn-danger" data-id="${producto.id}">Eliminar</button></td>
                        </tr>
                    `;
                    templateBar += `<li>${producto.nombre}</li>`;
                });
                $('#products').html(template); // Actualizar la tabla de productos
                $('#container').html(templateBar); // Actualizar la barra de estado
                $('#product-result').addClass('d-block'); // Mostrar barra de estado
            } else {
                // Si no hay coincidencias, limpiar la tabla y la barra de estado
                $('#products').html('<tr><td colspan="4">No se encontraron productos</td></tr>');
                $('#container').empty();
                $('#product-result').removeClass('d-block');
            }
        }
    });
});




// Agregar un nuevo producto
$('#addProductForm').on('submit', function (e) {
    e.preventDefault();
    let nombreProducto = $('#name').val();
    let descripcionJSON = $('#description').val();

    let finalJSON; // Definir variable

    try {
        // Intenta parsear el JSON y validar las propiedades
        let producto = JSON.parse(descripcionJSON);
        if (!producto.precio || !producto.unidades || !producto.modelo || !producto.marca) {
            alert('La descripción debe contener las propiedades "precio", "unidades", "modelo" y "marca".');
            return;
        }
        finalJSON = producto; // Asignar el JSON parseado
    } catch (error) {
        alert('La descripción no tiene un formato JSON válido.');
        return;
    }

    finalJSON['nombre'] = nombreProducto ||'';

    $.ajax({
        url: './backend/product-add.php',
        method: 'POST',
        contentType: 'application/json',
        data: JSON.stringify(finalJSON),
        success: function (response) {
            let respuesta = JSON.parse(response);
            $('#container').html(`
                <li style="list-style: none;">status: ${respuesta.status}</li>
                <li style="list-style: none;">message: ${respuesta.message}</li>
            `);
            $('#product-result').addClass('d-block');
            listarProductos();
        }
    });
});


// Eliminar un producto
$(document).on('click', '.product-delete', function () {
    if (confirm("¿De verdad deseas eliminar el Producto?")) {
        let id = $(this).data('id');
        $.ajax({
            url: `./backend/product-delete.php?id=${id}`,
            method: 'GET',
            success: function (response) {
                let respuesta = JSON.parse(response);
                $('#container').html(`
                    <li style="list-style: none;">status: ${respuesta.status}</li>
                    <li style="list-style: none;">message: ${respuesta.message}</li>
                `);
                $('#product-result').addClass('d-block');
                listarProductos();
            }
        });
    }
});

// Capturar clic en el botón de "Editar"
$('#product-form').submit(function (e) {
    e.preventDefault();

    const productId = $('#productId').val(); // Si está vacío es un producto nuevo, si no, es para actualizar
    const productData = {
        id: productId,
        nombre: $('#name').val(),
        descripcion: $('#description').val() // Este puede ser tu campo JSON
    };

    if (productId) {
        // Actualizar producto
        $.ajax({
            url: `./backend/product-edit.php?id=${productId}`,
            method: 'POST',
            data: JSON.stringify(productData),
            contentType: 'application/json',
            success: function (response) {
                const res = JSON.parse(response);
                if (res.status === 'success') {
                    alert('Producto actualizado');
                    $('#product-form').trigger('reset'); // Limpiar el formulario
                    listarProductos(); // Recargar la lista
                } else {
                    alert(res.message);
                }
            }
        });
    } else {
        // Crear producto nuevo (esto ya lo tenía implementado)
        $.ajax({
            url: './backend/product-add.php',
            method: 'POST',
            data: JSON.stringify(productData),
            contentType: 'application/json',
            success: function (response) {
                const res = JSON.parse(response);
                if (res.status === 'success') {
                    alert('Producto agregado');
                    $('#product-form').trigger('reset'); // Limpiar el formulario
                    listarProductos(); // Recargar la lista
                } else {
                    alert(res.message);
                }
            }
        });
    }
});

// Inicializar la página
$(document).ready(function () {
    init();
});
