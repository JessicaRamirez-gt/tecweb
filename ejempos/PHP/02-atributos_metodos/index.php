<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require_once __DIR__ . '/menu.php';
        $men1 = new menu;
        $men1->cargar_opcion('https://facebook.com','Facebook');
        $men1->cargar_opcion('https://instagram.com','instagram');
        $men1->cargar_opcion('https://x.com','X(Twitter)');
        $men1->mostrar();

    ?>
</body>
</html>