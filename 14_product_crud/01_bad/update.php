<?php


$pdo =  new PDO('mysql:host=localhost;port=3306;dbname=products_crud', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$id = $_GET['id'] ?? null; 

if (!$id) {
    header('Location: index.php');
    exit;
} 

$statement = $pdo->prepare('SELECT * FROM products WHERE id = :id');
$statement->bindValue(':id', $id);
$statement->execute();
$product = $statement-> fetch(PDO::FETCH_ASSOC);


$error = [];

$title = $product['title'];
$description = $product['description'];
$price = $product['price'];


if ($_SERVER['REQUEST_METHOD']==='POST'){
    $title = $_POST['title']; 
    $description = $_POST['description']; 
    $price = $_POST['price'];
    $date = date('Y-m-d H:i:s');

    

    if (!$title) {
        $errors[] = 'Product title is required'; 
    }

    if (!$price) {
        $errors[] = 'Product price is required';
    }

    if (!is_dir('images')){
        mkdir('images');
    }

    if (empty($errors)){
        $image = $_FILES['image'] ??null;
        $imagePath = 
        $product['image']; 

        
        if ($image && $image['tmp_name']){
            
            if ($product['image']){
                unlink($product['image']);
            }

            $imagePath = 'images/'.randomString(8).'/'.$image['name'];
            mkdir(dirname($imagePath));

            move_uploaded_file($image['tmp_name'], $imagePath);
        }

        $statement = $pdo->prepare ("UPDATE products SET title = :title, 
                    image = :image, description = :description, 
                    price = :price WHERE id = :id");
        $statement->bindValue(':title', $title);
        $statement->bindValue(':image', $imagePath);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':id', $id);

        $statement->execute();
        header('Location: index.php');
    }    
}

function randomString($n){
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $str = '';
    for ($i = 0; $i < $n; $i++){
        $index = rand(0, strlen($characters) - 1);
        $str .= $characters[$index];
    }

    return $str;
} 



?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" href="app.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

        <title>Update Product</title>
    </head> 
<body> 

    <p>
    <a href="index.php" class="btn btn-secondary">Go Back to Products</a>
    </p>

    <h1>Update <b><?php echo $product['title'] ?></b></h1>

    <?php if (!empty($errors)):  ?> 
    <div class="alert alert-danger">
        <?php foreach ($errors as $error):?>
            <div><?php echo $error ?></div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>


    <form  action="" method="post" enctype="multipart/form-data">
        <?php if ($product['image']): ?>
            <img src="<?php echo $product['image'] ?>" class="update-image" alt="">
        <?php endif; ?>

        <div class="form-group">
            <label >Product Image</label>
            <br>
            <input type="file" name="image" >
        </div>
    
        <div class="form-group">
            <label >Product Title</label>
            <input type="text" name='title' value="<?php echo $title ?>" class="form-control">
        </div> 
        <div class="form-group">
            <label >Product Description</label>
            <textarea name="description"  value="<?php echo $description ?>" class="form-control"> </textarea>
        </div>
        <div class="form-group">
            <label >Product Price</label>
            <input type="number" name="price" step=".01"  value="<?php echo $price ?>" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>

    </form>
   
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>