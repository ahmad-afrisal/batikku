<?php

session_start();
include 'config.php';
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
    <section class="breadcrumb_part">
      <div class="container">
          <div class="row">
              <div class="col-lg-12">
                  <div class="breadcrumb_iner">
                      <h2>Semua Produk</h2>
                  </div>
              </div>
          </div>
      </div>
    </section>
    <!-- breadcrumb part end-->
    
    <!-- product list part start-->
    <section class="product_list section_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="product_sidebar">
                        <div class="single_sedebar">
                            <form action="#">
                                <input type="text" name="#" placeholder="Search keyword">
                                <i class="ti-search"></i>
                            </form>
                        </div>
                        <div class="single_sedebar">
                            <div class="select_option">
                                <div class="select_option_list">Kategori <i class="right fas fa-caret-down"></i> </div>
                                <div class="select_option_dropdown">
                                    <?php 
                                      $query = mysqli_query($config, "SELECT * FROM categories");
                                      while ($data = mysqli_fetch_array($query)) { 
                                    ?>
                                      <p><a href="#"><?= $data['name_category']; ?></a></p>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="product_list">
                        <div class="row">
                          <?php 
                            $query = mysqli_query($config, "SELECT products.products_id, products.product_name, products.price FROM products");
                            while ($data = mysqli_fetch_array($query)) {
                            $productId = $data['products_id'];
                          ?>
                            <div class="col-lg-6 col-sm-6">
                              <a href="details.php?products_id=<?= $data['products_id']; ?>">
                                <div class="single_product_item">
                                <?php 
                                  $queryGaleri = mysqli_query($config, "SELECT photos FROM product_galleries WHERE product_galleries.products_id='$productId' LIMIT 1");
                                  if(mysqli_num_rows($queryGaleri)=== 1) {
                                    while ($dataGaleri = mysqli_fetch_array($queryGaleri)) { ?>
                                      <img src="images/products/<?= $dataGaleri['photos']; ?>" alt="#" class="img-fluid">
                                    <?php 
                                      }
                                    } else { ?>
                                      <img src="images/products/default.png" alt="#" class="img-fluid">
                                <?php } ?>
                                    <h3> <?= $data['product_name']; ?> </h3>
                                    <p>Rp. <?= number_format($data['price']); ?></p>
                                </div>
                              </a>
                            </div>
                          <?php } ?>
                        </div>
                        <div class="load_more_btn text-center">
                            <a href="#" class="btn_3">Load More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product list part end-->

    <?php include('layouts/footer.php'); ?>

    <?php include('layouts/script.php'); ?>

</body>

</html>