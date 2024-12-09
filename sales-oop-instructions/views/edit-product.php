<?php
session_start();
include '../classes/User.php';

$user_obj = new User;
$product_id = $_GET['id']; 
$product = $user_obj->getProduct($product_id); 
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="../assets/css/style.css">
  <title>Edit Product</title>
</head>
<body>
  <nav class="navbar navbar-expand navbar-dark bg-dark" style="margin-bottom: 80px;">
    <div class="container">
      <a href="dashboard.php" class="navbar-brand">
        <h1 class="h3">The Company</h1>
      </a>
      <div class="navbar-nav">
        <span class="navbar-text"><?= $_SESSION['full_name']?></span>
        <form action="../actions/logout.php" method="post" class="d-flex ms-2">
          <button type="submit" class="text-danger bg-transparent border-0">Log out</button>
        </form>
      </div>
    </div>
  </nav>

  <main class="row justify-content-center gx-0">
    <div class="col-4">
      <h2 class="text-center mb-4">EDIT PRODUCT</h2>

      <form action="../actions/edit-product.php" method="post" enctype="multipart/form-data">

        <div class="mb-3">
          <label for="product_name" class="form-label">Product Name</label>
          <input type="text" name="product_name" id="product_name" value="<?= $product['product_name']?>" class="form-control" required autofocus>
        </div>

        <div class="mb-3">
          <label for="price" class="form-label">Price ($)</label>
          <input type="number" name="price" id="price" value="<?= $product['price']?>" class="form-control" required autofocus step="0.01">
        </div>

        <div class="mb-3">
          <label for="quantity" class="form-label">Quantity</label>
          <input type="number" name="quantity" id="quantity" value="<?= $product['quantity']?>" class="form-control" required autofocus>
        </div>

        <div class="text-end">
          <a href="dashboard.php" class="btn btn-secondary btn-sm">Cancel</a>
          <button type="submit" class="btn btn-warning btn-sm xp-5">Save</button>
        </div>

      </form>
    </div>
  </main>

</body>
</html>