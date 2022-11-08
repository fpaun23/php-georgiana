<?php
require_once './App/bootstrapping.php';

// $instance = ConnectDb::getInstance();
// $conn = $instance->getConnection();
// $stmt = $conn->prepare(
//     "SELECT * FROM products");
// $stmt->execute();
// $users = $stmt->fetchAll();
// foreach($users as $user)
// {
//     var_dump($user);
// }

// $rada = new Products;
// $rada->setPrice(11);
// var_dump($rada->getPrice());
?>

<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>
</form><h1>Add Price</h1>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  Name: <input type="text" name="name_prod">
  Price: <input type="int" name="price">
  <input type="submit">
</body>
</html>
<?php

  $name_prod = $_POST['name_prod'];
  $price = $_POST['price'];
  $product = new Products();
  $product->setPrice($price);

  if ($price) {
    $instance = ConnectDb::getInstance();
    $conn = $instance->getConnection();
    $stmt= $conn->prepare("UPDATE products SET price=$price WHERE name_prod='$name_prod'");
    $stmt->execute();
    echo $stmt->rowCount() . " Price:".$product->getPrice();
  }
?>
