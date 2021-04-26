<?php

$pdo =  new PDO('mysql:host=localhost;port=3306;dbname=products_crud', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


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

    if (!is_dir('images')){
        mkdir('images');
    }

    if (empty($errors)){
        $image = $_FILES['image'] ??null;
        $imagePath = ''; 
       

        if ($image && $image['tmp_name']){

            $imagePath = 'images/'.randomString(8).'/'.$image['name'];
            mkdir(dirname($imagePath));

            move_uploaded_file($image['tmp_name'], $imagePath);
        }

        $statement = $pdo->prepare ("INSERT INTO products(title, image, description, price, created_at)
                    VALUES(:title, :image, :description, :price, :date)");
        $statement->bindValue(':title', $title);
        $statement->bindValue(':image', $imagePath);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':date', $date);
        $statement->execute();
        header('Location: index.php');
    }    
}

function randomString($n)
{
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


    <form  action="" method="post" enctype="multipart/form-data">
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