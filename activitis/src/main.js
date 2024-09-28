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
    mostrar.innerHTML = '<h3> Hola mundo';
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
    var show = document.getElementById('suichColor');
    
    switch (col) {
        case 
            'rojo': show.style.backgroundColor = "#ff0000";
            break;
        case 'verde': show.style.backgroundColor = "#00ff00";
            break;
        case 'azul': show.style.backgroundColor = "#0000ff";
            break;
        default: show.innerHTML = 'No es válido el color ingresado';
    }
}

function unoCien(){
    var x;
    x=1;

    var show = document.getElementById('unoAC');
    show.innerHTML='';

    while (x<=100) {
        show.innerHTML += "<br> Iteración"+x;
        x=x+1;
    }
}

function sumaCinco(){
    var show = document.getElementById('sumC');

    var x=1;
    var suma=0;
    var valor;
    
    while (x<=5){
        valor = window.prompt("Ingresa el valor:", "");
        valor = parseInt(valor);
                        
        suma = suma+valor;
        x = x+1;
    }

    show.innerHTML = '<br> La suma es: '+suma;
}

function digitos(){
    var show = document.getElementById('digit');

    var valor;

    do{
        valor = window.prompt("Ingresa un valor entre 0 y 999:", "");

        //Código para que termine el ciclo al momento de insertar un vacio
        //if(valor == ""){
          //  break;
        //}

        show.innerHTML='El valor '+valor+' tiene: ';
        valor = parseInt(valor);
        if (valor<10)
            show.innerHTML= "Tiene 1 dígitos";
            
        else
            if (valor<100) {
                show.innerHTML= "Tiene 2 dígitos";
                
            }
        else {
            show.innerHTML= "Tiene 3 dígitos";
            
        }
        show.innerHTML += '<br>';
    }while(valor!=0);

}

function unoDiez(){
    var show = document.getElementById('for');

    var f;
    for(f=1; f<=10; f++)
    {
        show.innerHTML+= f+'-';
    }
}

function doc(){
    var show = document.getElementById('imp');

    show.innerHTML = 'Cuidado<br> Ingresa tu documento correctamente<br> Cuidado<br> Ingresa tu documento correctamente<br> Cuidado<br> Ingresa tu documento correctamente<br>'
    
    
} 

function mostrarMensaje(show){
    show.innerHTML += 'Cuidado<br> Ingresa tu documento correctamente<br>';
    
} 
function message(){
    var show = document.getElementById('func');

    mostrarMensaje(show);
    mostrarMensaje(show);
    mostrarMensaje(show);

} 

function mostrarRango(show,x1,x2){ 
    var inicio;
        for(inicio=x1; inicio<=x2; inicio++) {
            show.innerHTML += 'Inicio <br>'+ "";
        }
} 
function valores(){
    var show = document.getElementById('rang');
    var valor1,valor2;

    valor1 = window.prompt("Ingresa el valor inferior:", "");
    valor1 = parseInt(valor1);

    valor2 = window.prompt("Ingresa el valor superior:", "");
    valor2 = parseInt(valor2);

    mostrarRango(show,valor1,valor2);

} 


function convertirCastellano(x){
    if(x==1)
        return 'uno';
        else
            if(x==2)
                return 'dos';
            else
                if(x==3)
                    return 'tres';
                else
                    if(x==4)
                        return 'cuatro';
                    else
                        if(x==5)
                            return 'cinco';
                        else
                            return 'valor incorrecto';
} 
function convert(){
    var show = document.getElementById('caste');

    var valor = window.prompt("Ingresa un valor entre 1 y 5", "");
    valor = parseInt(valor);

    var r = convertirCastellano(valor);
    show.innerHTML=r;    
    
} 

function convertirCastellano_(x){
    switch (x) {
        case 1: return "uno";
        case 2: return "dos";
        case 3: return "tres";
        case 4: return "cuatro";
        case 5: return "cinco";
        default: return "valor incorrecto";
    }
} 
function convertir(){
    var show = document.getElementById('castell');

    var valor = window.prompt("Ingresa un valor entre 1 y 5", "");
    valor = parseInt(valor);

    var r = convertirCastellano_(valor);
    show.innerHTML=r;    
    
} 