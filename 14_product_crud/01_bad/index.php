<?php

$pdo =  new PDO('mysql:host=localhost;port=3306;dbname=products_crud', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$search = $_GET['search'] ?? '';
if ($search){
    $statement = $pdo->prepare('SELECT * FROM products WHERE title LIKE :title ORDER BY created_at DESC');
    $statement->bindValue('title', "%$search%" );
} else {
    $statement = $pdo->prepare('SELECT * FROM products ORDER BY created_at DESC');
}

$statement->execute();
$products = $statement->fetchAll(PDO::FETCH_ASSOC);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="app.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Products CRUD</title>
</head> 
<body>
    <h1>Product CRUD</h1>
    
        <p>
            <a href="create.php" class="btn btn-success">Add Product</a>
        </p>
        <form action="">
            <div class="input-group mb-3">
                <input type="text" class="form-control" 
                    placeholder="Search for products" 
                    name="search" value="<?php echo $search ?>">
                <div>
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                </div>
            </div> 
        </form>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Title</th>
                <th scope="col">Price</th>
                <th scope="col">Created at</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $i => $product): ?>

                <tr>
                    <th scope="row"><?php echo $i + 1?></th>
                    <td>
                        <img src="<?php echo $product['image'] ?>" class="thumb-image" alt="">
                    </td>
                    <td><?php echo $product['title'] ?></td>
                    <td><?php echo $product['price']?></td>
                    <td><?php echo $product['created_at']?></td>
                    <td>
                        <a href="update.php?id= <?php echo $product['id']?>" class="btn btn-sm btn-outline-primary">Edit</a>
                        <form style="display: inline-block;" method="post" action="delete.php">
                            <input type="hidden" name="id" value="<?php echo $product['id'] ?>">
                            <button  type="submit" class="btn btn-sm btn-outline-danger"> Delete</button>
                        </form>
                    </td>


                </tr>
            
            <?php endforeach; ?>
           
        </tbody>
    </table>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>