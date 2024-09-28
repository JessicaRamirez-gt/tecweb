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

function ifAnidados(){
    var nota1,nota2,nota3;

    nota1 = window.prompt("Ingresa 1ra. nota:", "");
    nota2 = window.prompt("Ingresa 2da. nota:", "");
    nota3 = window.prompt("Ingresa 3ra. nota:", "");

    //Convertimos los 3 string en enteros
    nota1 = parseInt(nota1);
    nota2 = parseInt(nota2);
    nota3 = parseInt(nota3);

    var pro;
    pro = (nota1+nota2+nota3)/3;

    var show = document.getElementById('ifElseAn');


    if (pro>=7) {
        show.innerHTML = "aprobado";
    }
    else {
        if (pro>=4) {
            show.innerHTML = "regular";
        }
        else {
            show.innerHTML = "reprobado";
        }
    }
}

function suich(){
    var valor;
                    
    valor = window.prompt("Ingresar un valor comprendido entre 1 y 5:", "");
                    
    //Convertimos a entero
    valor = parseInt(valor);
    var show = document.getElementById('suich');
     
    switch (valor) {
        case 1: show.innerHTML= 'uno';
            break;
        case 2: show.innerHTML= 'dos';
            break;
        case 3: show.innerHTML= 'tres';
            break;
        case 4: show.innerHTML= 'cuatro';
            break;
        case 5: show.innerHTML= 'cinco';
            break;
        default:show.innerHTML= 'debe ingresar un valor comprendido entre 1 y 5';
    }
}

function suichBG(){
    var col;
    col = window.prompt("Ingresa el color con que quierar pintar el fondo de la ventana (rojo, verde, azul)" , "" );
    var show = document.getElementById('suichColor')  
    
    switch (col) {
        case 'rojo': show.style.backgroundColor = "#ff0000";
            break;
        case 'verde': show.style.backgroundColor = "#00ff00";
            break;
        case 'azul': show.style.backgroundColor = "#0000ff";
            break;
        default: show.innerHTML = 'No es válido el color ingresado';
    }
}