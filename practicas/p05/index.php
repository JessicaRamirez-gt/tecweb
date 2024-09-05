<!DOCTYPE html PUBLIC “-//W3C//DTD XHTML 1.1//EN”
“http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd”>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title> Practica 5 PHP </title>
    </head>
    <body>
        <?php
            echo '---PARTE 1<br>';
            echo '$_myvar es una variable admitida en un archivo php porque inicia con $ <br>';
            echo '$_7var también es una variable admitida porque empieza en $ y tiene guión bajo<br>';
            echo 'myvar no es una variable admitida porque no empieza en $ <br>';
            echo '$myvar es una variable admitida en un archivo php porque inicia con $ <br>';
            echo '$var7 también es una variable admitida porque empieza en $<br>';
            echo '$_element es una variable admitida porque empieza en $ y continúa con guión bajo<br>';
            echo '$house*5 no es una variable válida porque tiene un *, a pesar de iniciar con $<br>';

            echo '<br> ----PARTE 2';

            $a = "ManejadorSQL";
            $b = 'MySQL';
            $c = &$a;

            echo '<br>';
            echo $a;
            echo '<br>';
            echo $b;
            echo '<br>';
            echo $c;

            echo '<br> Se pueden mostrar las variables a, b y c donde esta última hace una función de apuntador';
            
            echo '<br> --Cambio de variables';
            $a = "PHP server";
            $b = &$a;

            echo '<br>';
            echo $a;
            echo '<br>';
            echo $b;
            echo '<br>';

            echo '<br> ---PARTE 3';

            $a = "PHP5";
            echo $a;

            echo '<br>';

            $z[] = &$a;
            print_r($z);

            echo '<br>';

            $b = "5a version de PHP";
            echo $b;

            echo '<br>';

            $c = $b;
            echo $c;

            echo '<br>';

            $a .= $b;
            echo $a;

            echo '<br>';

            //$b *= $c; NO SE VE, DA FALLO
            //echo $b;

            echo '<br>';

            $z[0] = "MySQL";
            print_r($z[0]);

            echo '<br> ---PARTE 4';
            
            global $a;
            $a = "PHP5";
            echo $a;

            echo '<br>';

            global $z;
            $z[] = &$a;
            print_r($z);

            echo '<br>';

            global $b;
            $b = "5a version de PHP";
            echo $b;

            echo '<br>';

            global $c;
            $c = $b;
            echo $c;

            echo '<br>';

            global $a;
            $a .= $b;
            echo $a;

            echo '<br>';

            //global $b;
            //$b *= $c;  NO FUNCIONA
            //echo $b;

            echo '<br>';

            global $z;
            $z[0] = "MySQL";
            print_r($z[0]);

            echo '<br>';
            echo '---PARTE 5';
            echo '<br>';

            $a ="7 personas";
            echo "Valor de a = $a<br>";
            $b =(integer) $a;
            echo "Valor de a con integer = $b<br>";

            $a ="9E3";
            echo "Valor de a = $a<br>";
            $c = (double) $a;
            echo "Valor de a con integer = $c<br>";

            
            echo '<br>';
            echo '---PARTE 6';
            echo '<br>';

            $a ="0";
            var_dump($a);

            echo '<br>';

            $b ="TRUE";
            var_dump($b);

            echo '<br>';

            $c ="FALSE";
            var_dump($c);
            //echo " el valor de c es" .strval($c); MUESTRA EL CONTENIDO DE C
            echo '<br>'; 
            if($c==1){
                echo 'c es verdadero';
            } else{
                echo 'c es falso';
            }

            echo '<br>';

            $d = ($a OR $b);
            var_dump($d);

            echo '<br>';

            $e = ($a AND $c);
            var_dump($e);

            echo '<br>';

            if($e==1){
                echo 'e es verdadero';
            } else{
                echo 'e es falso';
            }

            echo '<br>';

            $f = ($a XOR $b);
            var_dump($f);

            echo '<br>';
            echo "Versión de PHP: " . $_SERVER['PHP_SELF'];
            echo '<br>';
            echo "Información del servidor: " . $_SERVER['SERVER_SOFTWARE'];
            echo '<br>';
            echo "Sistema operativo del servidor: " . $_SERVER['SERVER_SOFTWARE'];
            echo '<br>';
            echo "Idioma del navegador: " . $_SERVER['HTTP_ACCEPT_LANGUAGE'];



        ?>
    
    </body>


</html>