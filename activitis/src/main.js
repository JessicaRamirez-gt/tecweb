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

function inUno(){
    var nombre;
    var edad;
    nombre = window.prompt("Ingresa tu nombre:", "");
    edad = window.prompt("Ingresa tu edad:", "");
    
    var show = document.getElementById('inUno');

    show.innerHTML = '<br> Hola '+nombre+', así que tienes '+edad+' años <br>';
}

function progEs(){
    var valor1;
    var valor2;

    valor1 = window.prompt("Introducir primer número:", "");
    valor2 = window.prompt("Introducir segundo número", "");
                
    var suma = parseInt(valor1)+parseInt(valor2);
    var producto = parseInt(valor1)*parseInt(valor2);

    var show = document.getElementById('Estruct');
    show.innerHTML = '<br> La suma es '+ suma+ '<br> El producto es '+producto;
}

function condIf(){
    var nombre;
    var nota;
                
    nombre = window.prompt("Ingresa tu nombre:", "");
    nota = window.prompt("Ingresa tu nota:", "");
    
    var show = document.getElementById('if');

    if (parseInt(nota)>=4) {
        show.innerHTML = nombre + ' está aprobado con un '+nota;
    }
}

function ifElse(){
    var num1,num2;
                    
    num1 = window.prompt("Ingresa el primer número:", "");
    num2 = window.prompt("Ingresa el segundo número:", "");
                    
    num1 = parseInt(num1);
    num2 = parseInt(num2);

    var show = document.getElementById('ifElse');


    if (num1>num2) {
        show.innerHTML= "el mayor es " +num1;
    }
    else {
        show.innerHTML= "el mayor es " +num2;
    }
}