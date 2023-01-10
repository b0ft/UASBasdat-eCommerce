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
          
          <a class="basket3" href="#"><i class="bi bi-basket3-fill"></i></a>
          
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="carttable">
      <h2 class="mb-5 ms-2">My Cart</h2>
      <div class="container">
        <form method="post">
        <div class="row border-bottom border-dark-subtle">
          <div class="col-6">Product</div>
          <div class="col-3">Quantity</div>
          <div class="col-2">Total</div>
        </div>
        <!-- product -->
        <?php
          include 'config.php';
          $query = "SELECT * FROM cart INNER JOIN products ON cart.product_id = products.id";
          $result = mysqli_query($connection, $query);
          while($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="row carttotal">
          <div class="col-6 ps-0 pt-3" style="display: flex">
            <div class="bgbarang">
              <img src="img/<?= $row['image'] ?>" alt="" />
            </div>
            <div class="titleproductcart mt-4">
              <p><?= $row['name'] ?></p>
              <p class="totalproduct" id="price">IDR <?= number_format($row['price'], 0, ',', '.') ?></p>
            </div>
          </div>
          <div class="col-3" style="position: relative">
            <div class="plusmin" style="position: relative">
              <div class="center mt-1">
                <div class="input-group input2">
                  <span class="input-group-btn">
                    <button type="button" class="btn btn-default btn-number" id="minus">-</button>
                  </span>
                  <input type="text" id="quantity" class="form-control input-number inputt" value="<?= $row['quantity'] ?>" min="1" name="quantity" />
                  <span class="input-group-btn">
                    <button type="button" class="btn btn-default btn-number" id="add">+</button>
                  </span>
                </div>
                <input type="text" id="id" name="id"  value="<?= $row['product_id'] ?>" hidden />
              </div>
              <button id="removebutton" type="submit" class="remove2" name="remove"><i class="bi bi-trash3-fill buang" style="font-size: 24px"></i></button>
            </div>
            <!-- <a href="" class="remove">Remove</a> -->
          </div>
          <div class="col-2" style="position: relative">
            <p class="totalproduct plusmin" id="total_price"></p>
          </div>
          <div class="col" style="position: relative">
            <div class="plusmin" style="height: 25px;">
              <label class="container1">
                <input type="checkbox" checked="checked" />
                <span class="checkmark"></span>
              </label>
            </div>
          </div>
        </div>
        <?php
          }
        ?>
        <!-- End product -->
        <!-- checkout -->
        <div class="row border-top border-dark-subtle mt-4 pt-2 justify-content-between">
          <div class="col-6">
          </div>
          <div class="col-3">
            <h4 class="mt-2" id="summary"></h4>
            <p style="color: #6c7c8c">Shipping & taxes calculated at checkout</p>
            <button type="submit" name="submit" class="btn btn-warning btn-lg mt-1">Checkout</button>
          </div>
        </div>
        </form>
        <?php 

          // if remove button is clicked then remove the product from cart
          if(isset($_POST['remove'])) {
            $id = $_POST['id'];
            $query = "DELETE FROM cart WHERE product_id = $id";
            $result = mysqli_query($connection, $query);
            if($result) {
              echo "<script>window.location.href = 'cart.php'</script>";
            }
          }

          if(isset($_POST['submit'])) {
            $query = "SELECT * FROM cart INNER JOIN products ON cart.product_id = products.id";
            $result = mysqli_query($connection, $query);
            // check if quantity is same from database cart, if not same then update the quantity
            while($row = mysqli_fetch_assoc($result)) {
              if($row['quantity'] != $_POST['quantity']) {
                echo $_POST['quantity'];
                $id = $row['product_id'];
                $quantity = $_POST['quantity'];
                $query2 = "UPDATE cart SET quantity = $quantity WHERE product_id = $id";
                $result2 = mysqli_query($connection, $query2);
                if($result2) {
                  echo "<script>window.location.href = 'cart.php'</script>";
                }
              }
            }
          }
          
        ?>
      </div>
    </div>
    <script>
        const total_price = document.querySelectorAll('#total_price');
        const price = document.querySelectorAll('#price');
        const quantity = document.querySelectorAll('#quantity');
        const summaryHTML = document.querySelector('#summary');
        let summary = 0;
        let temp = 0;
        for (let i = 0; i < total_price.length; i++) {
            if(i == 0) {
                temp = 0;
            }
            total_price[i].innerHTML = 'IDR ' + (parseInt(price[i].innerHTML.replace('IDR ', '').replace('.', '')) * parseInt(quantity[i].value)).toLocaleString('id-ID');
            temp += parseInt(total_price[i].innerHTML.replace('IDR ', '').replace('.', '').replace('.', ''));
            if(i == total_price.length - 1) {
                summary = temp;
                summaryHTML.innerHTML = 'Total : IDR ' + summary.toLocaleString('id-ID');
            }
        }
        document.addEventListener('click', function(e) {
            if (e.target.id === 'add') {
                e.target.parentElement.previousElementSibling.value = parseInt(e.target.parentElement.previousElementSibling.value) + 1;

            } else if (e.target.id === 'minus' && parseInt(e.target.parentElement.nextElementSibling.value) > 1) {
                e.target.parentElement.nextElementSibling.value = parseInt(e.target.parentElement.nextElementSibling.value) - 1;
            }
            for (let i = 0; i < total_price.length; i++) {
                if(i == 0) {
                    temp = 0;
                }
                total_price[i].innerHTML = 'IDR ' + (parseInt(price[i].innerHTML.replace('IDR ', '').replace('.', '')) * parseInt(quantity[i].value)).toLocaleString('id-ID');
                temp += parseInt(total_price[i].innerHTML.replace('IDR ', '').replace('.', '').replace('.', ''));
                if(i == total_price.length - 1) {
                    summary = temp;
                    summaryHTML.innerHTML = 'Total : IDR ' + summary.toLocaleString('id-ID');
                }
            }
        })
    </script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
  </body>
</html>
