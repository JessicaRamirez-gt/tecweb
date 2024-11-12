<?php
    
    require_once '../vendor/autoload.php';
    use myapi\Read as Read;

    $products = new Read("root", "621252", "marketzone");

    if(isset($_POST['nombre'])) {
        $products->singleSearch($_POST);
    }

    echo $products->getData();

?>