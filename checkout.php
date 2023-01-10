
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
    <!-- <style>
      body {
        background-color: white !important;
        background-color: #facc92 !important;
      }
    </style> -->
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
    <!-- personal information -->
    <div class="row checkout2 justify-content-around">
      <div class="col-6">
        <form action="" method="post">
          <h4>Personal Information</h4>
          <div class="personalinfo mt-4 mb-4">
            <div class="form-floating mb-3">
              <input type="text" name="fullName" class="form-control datacheckout" id="floatingInput" placeholder="name" />
              <label for="floatingInput">Full Name</label>
            </div>
            <div class="form-floating mb-3">
              <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" />
              <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating mb-3">
              <textarea class="form-control" placeholder="Address" id="floatingTextarea2" name="address" style="height: 100px"></textarea>
              <label for="floatingTextarea2">Address</label>
            </div>
            <div class="form-floating mb-3">
              <input type="text" name="mobileNumber" class="form-control" id="floatingInput" placeholder="number" />
              <label for="floatingInput">Number</label>
            </div>
          </div>
          <h4>Payment Method</h4>
          <div class="paymentdetails mt-4">
            <select class="form-select mb-3 eheh" aria-label="Default select example" name="paymentMethod">
              <option value="e-Wallet" selected>e-Wallet</option>
              <option value="COD">COD</option>
            </select>
            <button class="btn btn-lg btn-dark mt-4 mb-4 inih" type="submit" name="submit">Complete Purchases</button>
          </div>
        </form>
      </div>

      <div class="col-5">
        <h4 class="row ps-2">Your Order</h4>
        <div class="yourorder mt-4">
          <h5 class="border-bottom border-dark-subtle pb-3">Order</h5>
          <?php
            include 'config.php';
            $query = "SELECT * FROM cart INNER JOIN products ON cart.product_id = products.id WHERE cart.status = '1'";
            $result = mysqli_query($connection, $query);
            $total = 0;
            while($row = mysqli_fetch_assoc($result)) {
              $total += $row['price'] * $row['quantity'];
          ?>
          <div class="row">
            <div class="col-6">
              <p><?= $row['name'] ?></p>
            </div>
            <div class="col-2" style="text-align: center;">
              <p id="quantity"><?= $row['quantity'] ?></p>
            </div>
            <div class="col-4">
              <p id="total_price">IDR <?= number_format($row['price'] * $row['quantity'], 0, ',', '.') ?></p>
            </div>
          </div>
          <?php } ?>
          
          <h5 class="border-top border-dark-subtle"></h5>
          <div class="row pt-3">
            <div class="col-8">
              <p>Total Purchases</p>
              <p>Shipping</p>
            </div>
            <div class="col-4">
              <p id="summary"></p>
              <p>IDR 0</p>
            </div>
          </div>
          <h5 class="border-top border-dark-subtle"></h5>
          <div class="row pt-3">
            <div class="col-7">
              <h5>Total</h5>
            </div>
            <div class="col">
              <h5 id="summary" name="total_price" style="text-align: center;"></h5>
            </div>
          </div>
          
        </div>
        
      </div>
      <?php
            if(isset($_POST['submit'])) {
              $fullName = $_POST['fullName'];
              $email = $_POST['email'];
              $address = $_POST['address'];
              $mobileNumber = $_POST['mobileNumber'];
              $paymentMethod = $_POST['paymentMethod'];
              $totalPrice = $total;
              $query = "INSERT INTO orders (full_name, email, address, mobile_number, payment_method, total_price, created_at) VALUES ('$fullName', '$email', '$address', '$mobileNumber', '$paymentMethod', '$totalPrice', NOW())";
              $result = mysqli_query($connection, $query);
              if($result) {
                // select from orders where fullname = $fullname and email = $email and address = $address and mobile_number = $mobileNumber and payment_method = $paymentMethod and total_price = $totalPrice
                $query2 = "SELECT id FROM orders WHERE full_name = '$fullName' AND email = '$email' AND address = '$address' AND mobile_number = '$mobileNumber' AND payment_method = '$paymentMethod' AND total_price = '$totalPrice'";
                $result2 = mysqli_query($connection, $query2);
                $orderid = mysqli_fetch_assoc($result2);
                $orderId = $orderid['id'];
                $query3 = "SELECT * FROM cart WHERE status = '1'";
                $result3 = mysqli_query($connection, $query3);
                while($row = mysqli_fetch_assoc($result3)) {
                  $productId = $row['product_id'];
                  $quantity = $row['quantity'];
                  $query4 = "INSERT INTO order_items (order_id, product_id, quantity) VALUES ('$orderId', '$productId', '$quantity')";
                  $result4 = mysqli_query($connection, $query4);
                }
                $query = "DELETE FROM cart WHERE status = '1'";
                $result = mysqli_query($connection, $query);
                if($result) {
                  echo "<script>window.location.href = 'success.php'</script>";
                }                
              }
            }
          ?>
    </div>

    <!-- End personal information -->
    <script>
        const total_price = document.querySelectorAll('#total_price');
        const summaryHTML = document.querySelectorAll('#summary');
        console.log(summaryHTML[0].innerHTML)
        let summary = 0;
        for (let i = 0; i < total_price.length; i++) {
            if(i == 0) {
                summary = 0;
            }
            summary += parseInt(total_price[i].innerHTML.replace('IDR ', '').replace('.', '').replace('.', ''));
            // console.log(total_price[i].innerHTML.replace('IDR ', '').replace('.', '').replace('.', ''));
            if(i == total_price.length - 1) {
                summaryHTML[0].innerHTML = 'IDR ' + summary.toLocaleString('id-ID');
                summaryHTML[1].innerHTML = 'IDR ' + summary.toLocaleString('id-ID');
            }
        }
    </script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <script src="number.js"></script>
  </body>
</html>
