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
        background-color: #162340 !important;
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
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item ms-4">
              <a class="nav-link" href="#product">Product</a>
            </li>
            <li class="nav-item ms-4">
              <a class="nav-link" href="#about">About</a>
            </li>
          </ul>
        </div>
        <div class="icons">
          
          <a class="basket3" href="cart.php"><i class="bi bi-basket3-fill"></i></a>
          
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <!-- gambar -->
    <div class="homebg">
      <div class="homebg2">
        <div class="texthome">
          <h1>High Quality Headset</h1>
          <span>Lorem ipsum dolor sit amet</span>
          <p>Libero aliquid enim error distinctio sed? Eligendi veniam architecto cum porro magni, veritatis delectus cupiditate doloremque, autem quasi dicta repellendus sequi. A.</p>
          <a type="button" href="#product" class="btn btn1 btn-dark">Shop Now</a>
        </div>
        <img src="img/hspic1.png" class="" alt="..." />
      </div>
    </div>
    <!-- Product -->
    <div class="product" id="product">
      <h2>Popular Products</h2>
      <div class="productlist mt-4">
        <?php
            include 'config.php';
            $query = "SELECT * FROM products";
            $result = mysqli_query($connection, $query);
            while($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="card" style="width: 18rem">
          <a href="detail.php?id=<?= $row['id'] ?>" class="card-body">
            <img src="img/<?= $row['image'] ?>" class="card-img-top" alt="..." />
            <p class="card-text"><?= $row['name'] ?></p>
            <p class="card-text" style="font-weight: 400; font-size: 20px">IDR <?= number_format($row['price'], 0, ',', '.') ?></p>
          </a>
        </div>
        <?php
          }
          ?>
         
      </div>
      <!-- <div class="productlist p2 mt-4">
        <div class="card" style="width: 18rem">
          <img src="img/pic5.png" class="card-img-top" alt="..." />
          <a href="detail.php" class="card-body">
            <p class="card-text">GALAX SONAR-01 Wired Gaming Headset - USB 7.1 Channel RGB</p>
            <p class="card-text" style="font-weight: 400; font-size: 20px">IDR 495.000</p>
          </a>
        </div>
        <div class="card" style="width: 18rem">
          <img src="img/pic6.png" class="card-img-top" alt="..." />
          <a href="detail.php" class="card-body">
            <p class="card-text">Logitech G733 Lightspeed Gaming Headset</p>
            <p class="card-text" style="font-weight: 400; font-size: 20px">IDR 1.580.000</p>
          </a>
        </div>
        <div class="card" style="width: 18rem">
          <img src="img/pic7.webp" class="card-img-top" alt="..." />
          <a href="detail.php" class="card-body">
            <p class="card-text">Asus ROG Delta S Gaming Headset</p>
            <p class="card-text" style="font-weight: 400; font-size: 20px">IDR 3.075.000</p>
          </a>
        </div>
        <div class="card" style="width: 18rem">
          <img src="img/pic8.webp" class="card-img-top" alt="..." />
          <a href="detail.php" class="card-body">
            <p class="card-text">ONIKUMA X4 3.5mm USB Wired Headphone</p>
            <p class="card-text" style="font-weight: 400; font-size: 20px">IDR 473.000</p>
          </a>
        </div>
      </div> -->
    </div>
    <!-- end Product  -->
    <!-- About -->
    <div class="about" id="about">
      <div>
        <h2>About</h2>
        <h5>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium, delectus atque vitae reprehenderit, ab iure laborum temporibus deserunt, magnam quibusdam fugiat corrupti error numquam architecto illum accusamus. Quia, rerum
          alias.
        </h5>
        <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium, delectus atque vitae reprehenderit, ab iure laborum temporibus deserunt, magnam quibusdam fugiat corrupti.</h5>
        <button type="button" class="btn btn1 btn-dark mt-3">Learn More</button>
      </div>
    </div>
    <!-- end About -->
    <!-- Footer -->
    <div class="footer">
      <h4>
        <span style="font-family: Verdana, Geneva, Tahoma, sans-serif !important; font-weight: bold">Head<span style="color: #ebb12e">set</span>.</span> | All Rights Reserved
      </h4>
    </div>
    <!-- End Footer -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  </body>
</html>
