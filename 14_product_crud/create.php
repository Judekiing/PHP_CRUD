<?php

$pdo =  new PDO('mysql:host=localhost;port=3306;dbname=products_crud', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

echo '<pre>';
    var_dump($_FILES);
echo '</pre>';
exit;

$error = [];

$title = '';
$description = '';
$price = '';

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

    if (empty($errors)){

        $statement = $pdo->prepare ("INSERT INTO products(title, image, description, price, created_at)
                        VALUES(:title, :image, :description, :price, :date)");
        $statement->bindValue(':title', $title);
        $statement->bindValue(':image', '');
        $statement->bindValue(':description', $description);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':date', $date);
        $statement->execute();
    }    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="app.css">

    <title>New Product</title>
</head> 
<body>
    
<h1>New Product</h1>

<?php if (!empty($errors)):  ?> 
<div class="alert alert-danger">
    <?php foreach ($errors as $error):?>
        <div><?php echo $error ?></div>
    <?php endforeach; ?>
</div>
<?php endif; ?>


<form  action="" method="post">
    <div class="form-group">
        <label >Product Image</label>
        <br>
        <input type="file" name="image" class="form-control">
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
   
</body>
</html>