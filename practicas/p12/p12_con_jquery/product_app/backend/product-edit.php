<?php

include_once __DIR__.'/database.php';

if(isset($_POST['id'])) {
  $product_name = $_POST['name']; 
  $product_description = $_POST['description'];
  $id = $_POST['id'];
  $query = "UPDATE product SET name = '$product_name', description = '$product_description' WHERE id = '$id'";
  $result = mysqli_query($connection, $query);

  if (!$result) {
    die('Query Failed.');
  }
  echo "product Update Successfully";  

}

?>