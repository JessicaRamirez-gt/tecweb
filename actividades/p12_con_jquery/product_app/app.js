$(document).ready(function() {
    let edit = false;
    $('#product-result').hide();
    listarProductos();
  
    // Función para listar productos
    function listarProductos() {
      $.ajax({
        url: './backend/product-list.php',
        type: 'GET',
        success: function(response) {
          const productos = JSON.parse(response);
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
                  <td><a href="#" class="product-item">${producto.nombre}</a></td>
                  <td><ul>${descripcion}</ul></td>
                  <td><button class="product-delete btn btn-danger">Eliminar</button></td>
                </tr>
              `;
            });
            $('#products').html(template);
          }
        }
      });
    }
  
    // Validación asíncrona del nombre de producto al escribir
    $('#name').on('input', function() {
      const name = $(this).val().trim();
      
      if (name) {
        $.ajax({
          url: './backend/validate-product-name.php',
          type: 'POST',
          data: { name },
          success: function(response) {
            console.log(response)
            const result = JSON.parse(response);
            if (result.exists) {
                alert("Nombre igual")
              $('#name-status').text('El nombre del producto ya existe. Elige otro.');
            } else {
              $('#name-status').text('');
            }
          }
        });
      } else {
        $('#name-status').text('Este campo es requerido.');
      }
    });
  
    // Validaciones individuales para los campos
    $('#price, #units, #model, #brand').on('blur', function() {
        
      const fieldId = $(this).attr('id');
      const value = $(this).val().trim();
      const statusElement = $(`#${fieldId}-status`);
      
      if (!value) {
        statusElement.text('Este campo es requerido.');
      } else {
        statusElement.text('');
      }
    });
  
    // Envío del formulario
    $('#product-form').submit(e => {
      e.preventDefault();
  
      // Verificar que todos los campos requeridos estén llenos
      const name = $('#name').val().trim();
      const price = $('#price').val().trim();
      const units = $('#units').val().trim();
      const model = $('#model').val().trim();
      const brand = $('#brand').val().trim();
      
      if (!name || !price || !units || !model || !brand) {
        $('#product-result').show().text('Todos los campos son obligatorios.');
        return;
      }
  
      // Preparar datos para enviar
      const postData = {
        nombre: name,
        precio: parseFloat(price),
        unidades: parseInt(units),
        modelo: model,
        marca: brand,
        detalles: $('#details').val().trim(),
        id: $('#productId').val()
      };
  
      const url = edit ? './backend/product-edit.php' : './backend/product-add.php';
      
      $.post(url, postData, response => {
        const result = JSON.parse(response);
        $('#product-result').show().text(`Estatus: ${result.status}. Mensaje: ${result.message}`);
        $('#product-form')[0].reset();
        listarProductos();
        edit = false;
      });
    });
  
    // Eliminar producto
    $(document).on('click', '.product-delete', function(e) {
      if (confirm('¿Realmente deseas eliminar el producto?')) {
        const element = $(this)[0].activeElement.parentElement.parentElement;
        const id = $(element).attr('productId');
        $.post('./backend/product-delete.php', { id }, response => {
          $('#product-result').hide();
          listarProductos();
        });
      }
    });
  
    // Editar producto
    $(document).on('click', '.product-item', function(e) {
      const element = $(this)[0].activeElement.parentElement.parentElement;
      const id = $(element).attr('productId');
      $.post('./backend/product-single.php', { id }, response => {
        let product = JSON.parse(response);
        $('#name').val(product.nombre);
        $('#productId').val(product.id);
        $('#price').val(product.precio);
        $('#units').val(product.unidades);
        $('#model').val(product.modelo);
        $('#brand').val(product.marca);
        $('#details').val(product.detalles);
        edit = true;
      });
      e.preventDefault();
    });
  
    // Búsqueda en tiempo real
    $('#search').keyup(function() {
      const search = $('#search').val();
      if (search) {
        $.ajax({
          url: `./backend/product-search.php?search=${search}`,
          data: { search },
          type: 'GET',
          success: function(response) {
            const productos = JSON.parse(response);
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
                    <td><a href="#" class="product-item">${producto.nombre}</a></td>
                    <td><ul>${descripcion}</ul></td>
                    <td><button class="product-delete btn btn-danger">Eliminar</button></td>
                  </tr>
                `;
              });
              $('#product-result').show();
              $('#products').html(template);
            }
          }
        });
      } else {
        $('#product-result').hide();
      }
    });
  });
  