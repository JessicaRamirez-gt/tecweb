// JSON BASE A MOSTRAR EN FORMULARIO
var baseJSON = {
    "precio": 0.0,
    "unidades": 1,
    "modelo": "XX-000",
    "marca": "NA",
    "detalles": "NA",
    "imagen": "img/default.png"
  };

// FUNCIÓN CALLBACK DE BOTÓN "Buscar"
function buscarID(e) {
    /**
     * Revisar la siguiente información para entender porqué usar event.preventDefault();
     * http://qbit.com.mx/blog/2013/01/07/la-diferencia-entre-return-false-preventdefault-y-stoppropagation-en-jquery/#:~:text=PreventDefault()%20se%20utiliza%20para,escuche%20a%20trav%C3%A9s%20del%20DOM
     * https://www.geeksforgeeks.org/when-to-use-preventdefault-vs-return-false-in-javascript/
     */
    e.preventDefault();

    // SE OBTIENE EL ID A BUSCAR
    var id = document.getElementById('search').value;

    // SE CREA EL OBJETO DE CONEXIÓN ASÍNCRONA AL SERVIDOR
    var client = getXMLHttpRequest();
    client.open('POST', './backend/read.php', true);
    client.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    client.onreadystatechange = function () {
        // SE VERIFICA SI LA RESPUESTA ESTÁ LISTA Y FUE SATISFACTORIA
        if (client.readyState == 4 && client.status == 200) {
            console.log('[CLIENTE]\n'+client.responseText);
            
            // SE OBTIENE EL OBJETO DE DATOS A PARTIR DE UN STRING JSON
            let productos = JSON.parse(client.responseText);    // similar a eval('('+client.responseText+')');
            
            // SE VERIFICA SI EL OBJETO JSON TIENE DATOS
            if(Object.keys(productos).length > 0) {
                // SE CREA UNA LISTA HTML CON LA DESCRIPCIÓN DEL PRODUCTO
                let descripcion = '';
                    descripcion += '<li>precio: '+productos.precio+'</li>';
                    descripcion += '<li>unidades: '+productos.unidades+'</li>';
                    descripcion += '<li>modelo: '+productos.modelo+'</li>';
                    descripcion += '<li>marca: '+productos.marca+'</li>';
                    descripcion += '<li>detalles: '+productos.detalles+'</li>';
                
                // SE CREA UNA PLANTILLA PARA CREAR LA(S) FILA(S) A INSERTAR EN EL DOCUMENTO HTML
                let template = '';
                    template += `
                        <tr>
                            <td>${productos.id}</td>
                            <td>${productos.nombre}</td>
                            <td><ul>${descripcion}</ul></td>
                        </tr>
                    `;

                // SE INSERTA LA PLANTILLA EN EL ELEMENTO CON ID "productos"
                document.getElementById("productos").innerHTML = template;
            }
        }
    };
    client.send("id="+id);
}

// FUNCIÓN CALLBACK DE BOTÓN "Agregar Producto"
function agregarProducto(e) {
    e.preventDefault();

    // Validar los datos del formulario
    const nombre = document.getElementById('name').value;
    const productoJsonString = document.getElementById('description').value;
    let finalJSON;

    try {
        finalJSON = JSON.parse(productoJsonString);
    } catch (error) {
        alert("El JSON de producto no es válido.");
        return;
    }

    const modelo = finalJSON.modelo;
    const marca = finalJSON.marca;
    const precio = finalJSON.precio;
    const unidades = finalJSON.unidades;
    const detalles = finalJSON.detalles;
    const imagen = finalJSON.imagen || "img/imagen.png"; // Ruta por defecto si no se proporciona

    // Validaciones
    if (!nombre || nombre.length > 100) {
        alert("El nombre es requerido y debe tener 100 caracteres o menos.");
        return;
    }
    if (!marca) {
        alert("La marca es requerida.");
        return;
    }
    if (!modelo || modelo.length > 25 || !/^[a-zA-Z0-9]+$/.test(modelo)) {
        alert("El modelo es requerido, debe ser alfanumérico y tener 25 caracteres o menos.");
        return;
    }
    if (!precio || precio <= 99.99) {
        alert("El precio es requerido y debe ser mayor a 99.99.");
        return;
    }
    if (unidades < 0) {
        alert("Las unidades son requeridas y deben ser mayores o iguales a 0.");
        return;
    }
    if (detalles && detalles.length > 250) {
        alert("Los detalles deben tener 250 caracteres o menos.");
        return;
    }

    // Agregar el nombre al JSON final
    finalJSON['nombre'] = nombre;

    // Convertir el JSON final a string
    const productoJsonStringFinal = JSON.stringify(finalJSON, null, 2);

    // SE CREA EL OBJETO DE CONEXIÓN ASÍNCRONA AL SERVIDOR
    const client = getXMLHttpRequest();
    client.open('POST', './backend/create.php', true);
    client.setRequestHeader('Content-Type', "application/json;charset=UTF-8");
    client.onreadystatechange = function () {
        if (client.readyState == 4 && client.status == 200) {
            const response = JSON.parse(client.responseText);
            alert(response.message); // Muestra el mensaje de éxito o error
        }
    };
    client.send(productoJsonStringFinal);
}

// SE CREA EL OBJETO DE CONEXIÓN COMPATIBLE CON EL NAVEGADOR
function getXMLHttpRequest() {
    var objetoAjax;

    try{
        objetoAjax = new XMLHttpRequest();
    }catch(err1){
        /**
         * NOTA: Las siguientes formas de crear el objeto ya son obsoletas
         *       pero se comparten por motivos historico-académicos.
         */
        try{
            // IE7 y IE8
            objetoAjax = new ActiveXObject("Msxml2.XMLHTTP");
        }catch(err2){
            try{
                // IE5 y IE6
                objetoAjax = new ActiveXObject("Microsoft.XMLHTTP");
            }catch(err3){
                objetoAjax = false;
            }
        }
    }
    return objetoAjax;
}

function init() {
    /**
     * Convierte el JSON a string para poder mostrarlo
     * ver: https://developer.mozilla.org/es/docs/Web/JavaScript/Reference/Global_Objects/JSON
     */
    var JsonString = JSON.stringify(baseJSON,null,2);
    document.getElementById("description").value = JsonString;
}

// FUNCIÓN CALLBACK DE BOTÓN "Buscar Producto"
function buscarProducto(e) {
    e.preventDefault();

    // SE OBTIENE EL TÉRMINO A BUSCAR
    var searchTerm = document.getElementById('search').value;

    // SE CREA EL OBJETO DE CONEXIÓN ASÍNCRONA AL SERVIDOR
    var client = getXMLHttpRequest();
    client.open('POST', './backend/read.php', true);
    client.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    client.onreadystatechange = function () {
        // SE VERIFICA SI LA RESPUESTA ESTÁ LISTA Y FUE SATISFACTORIA
        if (client.readyState == 4 && client.status == 200) {
            console.log('[CLIENTE]\n' + client.responseText);
            
            // SE OBTIENE EL ARRAY DE PRODUCTOS A PARTIR DE UN STRING JSON
            let productos = JSON.parse(client.responseText);

            // SE VERIFICA SI HAY PRODUCTOS
            if (productos.length > 0) {
                // SE CREA UNA PLANTILLA PARA CREAR LA(S) FILA(S) A INSERTAR EN EL DOCUMENTO HTML
                let template = '';
                productos.forEach(producto => {
                    // SE CREA UNA LISTA HTML CON LA DESCRIPCIÓN DEL PRODUCTO
                    let descripcion = `
                        <li>precio: ${producto.precio}</li>
                        <li>unidades: ${producto.unidades}</li>
                        <li>modelo: ${producto.modelo}</li>
                        <li>marca: ${producto.marca}</li>
                        <li>detalles: ${producto.detalles}</li>
                    `;
                    
                    // SE AGREGAN LAS FILAS A LA PLANTILLA
                    template += `
                        <tr>
                            <td>${producto.id}</td>
                            <td>${producto.nombre}</td>
                            <td><ul>${descripcion}</ul></td>
                        </tr>
                    `;
                });

                // SE INSERTA LA PLANTILLA EN EL ELEMENTO CON ID "productos"
                document.getElementById("productos").innerHTML = template;
            } else {
                // SI NO HAY PRODUCTOS, SE LIMPIA LA TABLA
                document.getElementById("productos").innerHTML = '<tr><td colspan="3">No se encontraron productos.</td></tr>';
            }
        }
    };
    client.send("search=" + encodeURIComponent(searchTerm));
}

// Modificar la función de búsqueda del botón en el formulario
document.querySelector('form').onsubmit = buscarProducto;