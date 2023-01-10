<?php
    include 'config.php';
    $query = "SELECT * FROM products WHERE id = ".$_GET['id'];
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);
    
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,1,0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="styles.css" />
    <style>
      body {
        background-color: white !important;
      }
    </style>
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark fixed-top" data-bs-theme="dark">
      <div class="container pt-1 pb-1">
        <a class="navbar-brand logotitle" href="index.php">Head<span style="color: #ebb12e">set</span>.</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item ms-4">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item ms-4">
              <a class="nav-link" href="index.php#product">Product</a>
            </li>
            <li class="nav-item ms-4">
              <a class="nav-link" href="index.php#about">About</a>
            </li>
          </ul>
        </div>
        <div class="icons">
          
          <a class="basket3" href="cart.php"><i class="bi bi-basket3-fill"></i></a>
          
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    
    <div>
      <div class="detailproduct">
        <div class="fotodetail">
          <img src="img/<?= $row['image'] ?>" alt="" />
        </div>
        <div class="descri">
        
          <div style="position: absolute; height: 450px; width: 580px">
            <form action='' method='post'>
              <h4><?= $row['name'] ?></h4>
              <p class="price mb-3 mt-3">IDR <?= number_format($row['price'], 0, ',', '.') ?></p>
              <p style="color: #c9c9c9">
              <?= $row['description'] ?>
              </p>
              <p>Quantity:</p>
              <div class="center">
                <div class="input-group">
                  <span class="input-group-btn">
                    <button type="button" class="btn btn-default btn-number" id="minus">-</button>
                  </span>
                  <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1"/>
                  <span class="input-group-btn">
                    <button type="button" class="btn btn-default btn-number" id="add">+</button>
                  </span>
                </div>
              </div>
              <div class="addcart mt-4">
                <button name='submit' type='submit' class="btn btn-warning btn-lg mb-4">ADD TO CART</button><br/>
              <?php 
  if(isset($_POST['submit'])) {
    $product_id = $_GET['id'];
    $quantity = $_POST['quantity'];
    $cart = "SELECT * FROM cart WHERE product_id = $product_id";
    $cart_result = mysqli_query($connection, $cart);
    if(mysqli_num_rows($cart_result) > 0) {
        $cartrow = mysqli_fetch_assoc($cart_result);
        $quantity = $cartrow['quantity'] + $quantity;
        $query = "UPDATE cart SET quantity = $quantity WHERE product_id = $product_id";
        $result = mysqli_query($connection, $query);
        if($result) {
            echo "<a href='index.php' class='btn btn-warning btn-sm w-25'>Go back</a> Added to cart. <a href='cart.php' class='btn btn-warning btn-sm w-25'>Go to cart</a>";
        } else {
            echo "Error: ".mysqli_error($connection);
        }            
    } else {
        $query = "INSERT INTO cart (product_id, quantity) VALUES ($product_id, $quantity)";
        $result = mysqli_query($connection, $query);
        if($result) {
          echo "<a href='index.php' class='btn btn-warning btn-sm w-25'>Go back</a> Added to cart. <a href='cart.php' class='btn btn-warning btn-sm w-25'>Go to cart</a>";
        } else {
            echo "Error: ".mysqli_error($connection);
        }
    }
}

      ?>
              </div>
            </div>
          </form>
        </div>
      
      </div>
    </div>
    <script>
        const quantity = document.querySelector('#quantity');
        document.addEventListener('click', function(e) {
            if (e.target.id === 'add') {
                e.target.parentElement.previousElementSibling.value = parseInt(e.target.parentElement.previousElementSibling.value) + 1;

            } else if (e.target.id === 'minus' && parseInt(e.target.parentElement.nextElementSibling.value) > 1) {
                e.target.parentElement.nextElementSibling.value = parseInt(e.target.parentElement.nextElementSibling.value) - 1;
            }
        })
    </script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  </body>
</html>
