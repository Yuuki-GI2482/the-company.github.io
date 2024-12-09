<?php
session_start();

include '../classes/User.php';

$user_obj = new User;
$all_products = $user_obj->getAllProducts();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../assets/css/style.css">
  <title>Dashboard</title>
</head>
<body>
  <nav class="navbar navbar-expand navbar-dark bg-dark" style="margin-bottom: 80px;">
    <div class="container">
      <a href="dashboard.php" class="navbar-brand">
        <h1 class="h3">SALES OOP INSTRUCTION</h1>
      </a>
      <div class="navbar-nav">
        <span class="navbar-text"><?= $_SESSION['product_name']?></span>
        <form action="../actions/edit-product.php " method="post" class="d-flex ms-2">
          <button type="submit" class="text-danger bg-transparent border-0">Add product</button>
        </form>

        <form action="../actions/logout.php" method="post" class="d-flex ms-2">
          <button type="submit" class="text-danger bg-transparent border-0">Log out</button>
        </form>
      </div>
    </div>
  </nav>

  <main class="row justify-content-center">
    <div class="col-8">
      <h2 class="text-center mb-4">Product List</h2>

      <table class="table table-hover align-middle">
        <thead>
          <tr>
            <th>ID</th>
            <th>Product Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($product = $all_products->fetch_assoc()) { ?>
          <tr>
            <td><?= $product['id'] ?></td>
            <td><?= $product['product_name'] ?></td>
            <td>$<?= $product['price'] ?></td> 
            <td><?= $product['quantity'] ?></td>
            <td>
              <a href="edit-product.php?id=<?= $product['id'] ?>" class="btn btn-outline-warning" title="Edit">
                <i class="far fa-pen-to-square"></i> Edit
              </a>
              <a href="delete-product.php?id=<?= $product['id'] ?>" class="btn btn-outline-danger" title="Delete">
                <i class="far fa-trash-can"></i> Delete
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </main>
</body>
</html>