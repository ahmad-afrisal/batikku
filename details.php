<?php
  session_start();
  include 'config.php';
  $products_id = $_GET['products_id'];

  if(isset($_POST['addChart'])) {
    $users_id = $_SESSION['id'];
    $quantity = $_POST['quantity'];

    mysqli_query($config, "INSERT INTO carts VALUES (NULL, '$users_id', '$products_id', '$quantity')");
    header('Location:cart.php');
  }


?>


<!doctype html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Batikku</title>
    <?php include('layouts/style.php'); ?>
    
</head>

<body>
    <?php include('layouts/header.php'); ?>

    <!-- breadcrumb part start-->
    <section class="breadcrumb_part single_product_breadcrumb">
      <div class="container">
          <div class="row">
              <div class="col-lg-12">
                  <div class="breadcrumb_iner">
                  </div>
              </div>
          </div>
      </div>
    </section>
    <!-- breadcrumb part end-->

    <!--================Single Product Area =================-->
    <div class="product_image_area">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-12">
            <div class="product_img_slide owl-carousel">
            <?php
              $query = mysqli_query($config, "SELECT * FROM product_galleries WHERE products_id='$products_id'");
              while ($data = mysqli_fetch_array($query)) {
            ?>
              <div class="single_product_img">
                <img src="images/products/<?= $data['photos']; ?>" alt="#" class="img-fluid">
              </div>
            <?php
              }
            ?>
            </div>
          </div>
          <div class="col-lg-8">
            <div class="single_product_text text-center">
              <?php
                $query = mysqli_query($config, "SELECT * FROM products WHERE products_id='$products_id'");
                while ($data = mysqli_fetch_array($query)) {
              ?>
              <h3><?= $data['product_name']; ?></h3>
              <h4>Rp. <?= number_format($data['price']); ?></h4>
              <p>
              <?= $data['description']; ?>, <strong>Berat Produk : <?= $data['weight']; ?> Kg</strong>
              </p>
              <form action="" method="POST">
              <div class="card_area">
                <div class="product_count_area">
                    <p>Quantity</p>
                    <div class="product_count d-inline-block">
                        <span class="product_count_item inumber-decrement"> <i class="ti-minus"></i></span>
                        <input class="product_count_item input-number" name="quantity" type="text" value="1" min="1" max="10">
                        <span class="product_count_item number-increment"> <i class="ti-plus"></i></span>
                    </div>

                    <p>Stock : <?= $data['stock']; ?></p>
                    <p id="result"></p>
                </div>
                <div class="add_to_cart">
                  <?php
                    if(isset($_SESSION["login"])) {
                  ?>
                 
                      <button type="submit" name="addChart" href="#" class="btn_3">Tambah ke Keranjang</button>
                  
                  <?php } else { ?>
                    <a href="login.php" class="btn_3">Sign in</a>
                  <?php } ?>
                </div>
              </div>
              </form>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--================End Single Product Area =================-->

    <?php include('layouts/footer.php'); ?>

    <?php include('layouts/script.php'); ?>

</body>

</html>