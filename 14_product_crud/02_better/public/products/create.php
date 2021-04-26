<?php

/** @var $pdo \PDO */
require_once "../../database.php";
require_once "../../functions.php";


$error = [];

$title = '';
$description = '';
$price = '';
$product = [
    'image' => ''
];


if ($_SERVER['REQUEST_METHOD']==='POST'){

    require_once "../../validate_product.php";
  

    if (empty($errors)){
        $statement = $pdo->prepare ("INSERT INTO products(title, image, description, price, created_at)
                    VALUES(:title, :image, :description, :price, :date)");
        $statement->bindValue(':title', $title);
        $statement->bindValue(':image', $imagePath);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':date', date('Y-m-d H:i:s'));
        $statement->execute();
        header('Location: index.php');
    }    
}


?>

<?php include_once '../../views/partials/header.php' ?>

<body>

<p>
    <a href="index.php" class="btn btn-secondary">Go Back to Products</a>
    </p>
    
<h1>New Product</h1>

<?php include_once "../../views/products/forms.php" ?>
   
<?php include_once '../../views/partials/footer.php' ?>