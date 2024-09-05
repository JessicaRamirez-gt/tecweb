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

            $Z[] = &$a;
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

            $b *= $c;
            echo $b;

            echo '<br>';

            $z[0] *= "MySQL";
            echo $z[0];


        ?>
    
    </body>


</html>