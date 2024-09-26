//Función de ejemplo
function getDatos(){
    var nombre = window.prompt("Nombre: ","");
    var edad= prompt("Edad", "");

    var div1= document.getElementById('nombre');
    div1.innerHTML ='<h3> Nombre: '+nombre+'</h3>';


    var div2= document.getElementById('edad');
    div2.innerHTML ='<h3> Edad: '+edad+'</h3>';
}

//Función de Hola Mundo
function holaMundo(){
    var mostrar = document.getElementById('Hola');
    //mostrar = document.write('Hola Mundo');
    mostrar.innerHTML = '<h3> Hola mundo'
}

//Función de variables
function varUno(){
    var show = document.getElementById('varUno');

    var nombre = 'Juan';
    var edad = 10;
    var altura = 1.92;
    var casado = false;

    show.innerHTML = '<br>'+nombre+'<br>'+edad+'<br>'+altura+'<br>'+casado;
}