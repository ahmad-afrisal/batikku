<?php
  session_start();
  include 'config.php';

  $users_id = $_SESSION['id'];

  if(isset($_POST['btnRemove'])) {
    $carts_id = $_POST['carts_id'];
    mysqli_query($config, "DELETE FROM carts WHERE carts_id='$carts_id'");
    // header('Location:index.php');
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
    <section class="breadcrumb_part">
      <div class="container">
          <div class="row">
              <div class="col-lg-12">
                  <div class="breadcrumb_iner">
                      <h2>Cart</h2>
                  </div>
              </div>
          </div>
      </div>
    </section>
    <!-- breadcrumb part end-->

    <!--================Cart Area =================-->
    <section class="cart_area section_padding">
      <div class="container">
        <div class="cart_inner">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Produk</th>
                  <th scope="col">Harga</th>
                  <th scope="col">Banyak</th>
                  <th scope="col">Total</th>
                  <th scope="col">Menu</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $subProduk = 0;

                  $subTotalProduk = 0;
                  $BeratSemuaProduk = 0;
                  $unique_code = (rand(100,999));
                  $query = mysqli_query($config, "SELECT * FROM carts JOIN products ON carts.products_id=products.products_id  WHERE users_id='$users_id'");
                  while ($data = mysqli_fetch_array($query)) {
                    $BeratSemuaProduk += $data['weight'];
                    $subProduk = $data['quantity'] * $data['price'];
                    $subTotalProduk += $subProduk;
                    $productId = $data['products_id'];

                ?>
                  <tr>
                    <td >
                      <div class="media">
                        <div class="d-flex">
                        <?php
                          $queryGaleri = mysqli_query($config, "SELECT photos FROM product_galleries WHERE product_galleries.products_id='$productId' LIMIT 1");
                          if(mysqli_num_rows($queryGaleri)=== 1) {
                          while ($dataGaleri = mysqli_fetch_array($queryGaleri)) {
                        ?>
                          <img src="images/products/<?= $dataGaleri['photos']; ?>" alt="" />
                        <?php
                            }
                          }
                        ?>
                        </div>
                        <div class="media-body">
                          <p><?= $data['product_name']; ?></p>
                        </div>
                      </div>
                    </td>
                    <td>
                      <h5>Rp. <?= number_format($data['price']); ?></h5>
                    </td>
                    <td>
                      <?= $data['quantity']; ?>
                    </td>
                    <td>
                      <h5>Rp. <?= number_format($subProduk); ?></h5>
                    </td>
                    <td>
                      <form action="" method="POST">
                        <input type="hidden" name="carts_id" value="<?= $data['carts_id']; ?>">
                        <button type="submit" name="btnRemove" href="#" class="genric-btn danger radius small">X</button>
                      </form>
                    </td>
                    
                  </tr>
                <?php  } ?>

                <!-- Update Keranjang -->
                <tr class="bottom_button">
                  <td></td>
                  <td></td>
                  <!-- <td></td> -->
                  <td>
                    <h5>Subtotal</h5>
                  </td>
                  <td colspan="2">
                    <h5>Rp. <?= number_format($subTotalProduk); ?></h5>
                  </td>
                </tr>

                <!-- Alamat -->
                <tr class="shipping_area">
                <?php
                    $users_id = $_SESSION['id'];
                    $alamatIsNull = '';
                    $query = mysqli_query($config, "SELECT * FROM users JOIN provinces ON users.provinces_id=provinces.provinces_id  WHERE users_id='$users_id'");
                    while ($x = mysqli_fetch_array($query)) {
                      $BeratSemuaProduk *= $x['shipping_cost'];
                      $alamatIsNull = $x['provinces_name'];
                  ?>
                  <td colspan="3"> 
                    <h6>Penerima : <?= $x['name'];?><br>Nomor Handphone : <?= $x['phone_number'];?><br>Alamat Penerima : <?= $x['address'];?>, <?= $x['provinces_name'];?>. <?= $x['zip_code'];?></h6>
                  </td>
                  <?php
                      }
                    ?>
                  <td colspan="2">
                    <div class="shipping_box">
                        <a class="genric-btn primary-border radius mt-3" href="frontend/dashboard-account.php">Ubah Alamat</a>
                    </div>
                  </td>
                </tr>
                
                <form action="cart-store.php" method="post">
                <!-- Informasi Pembayaran -->
                <tr class="shipping_area">
                  <td></td>
                  <td></td>
                  <td>
                    <h5>Informasi Pembayaran</h5>
                  </td>
                  <td colspan="2">
                    <div class="shipping_box">
                      <ul class="list">
                        <li>
                          Subtotal Pengiriman: Rp. <?= number_format($BeratSemuaProduk); ?>
                          <input type="hidden" name="shipping_price" value="<?= $BeratSemuaProduk; ?>">

                        </li>
                        <li>
                          Subtotal Produk : Rp. <?= number_format($subTotalProduk); ?>
                        </li>
                        <li>
                          Kode Unik: <?= $unique_code; ?>
                          <input type="hidden" name="unique_code" value="<?= $unique_code; ?>">

                        </li>
                        <li class="active">
                          Total Pembelian: Rp. <?= number_format($BeratSemuaProduk+$subTotalProduk+$unique_code); ?>
                          <input type="hidden" name="total_price" value="<?= ($BeratSemuaProduk+$subTotalProduk+$unique_code); ?>">
                        </li>
                      </ul>
                      <?php if($alamatIsNull=='Default') {
                        echo '<a class="btn_1 mt-4" href="frontend/dashboard-account.php">Ubah Alamat</a>';
                      } else { 
                        echo '<button type="submit" class="btn_1 mt-4" href="#">Buat Pesanan</button>';
                      } ?>
                    </div>
                  </td>
                </tr>
                </form>

              </tbody>
            </table>
          </div>
        </div>
    </section>
    <!--================End Cart Area =================-->

    <?php include('layouts/footer.php'); ?>

    <?php include('layouts/script.php'); ?>
    <script>
      // Fungsi untuk menghitung total
      function calculateTotal() {
        var quantity = parseInt(document.getElementById("quantity").value);
        var price = parseInt(document.getElementById("price").value);
        
        var total = quantity * price;
        
        document.getElementById("total").innerHTML = "Total: " + total;
      }
      
      // Memanggil fungsi calculateTotal() saat nilai kuantitas berubah
      document.getElementById("quantity").addEventListener("change", calculateTotal);
  </script>

</body>

</html>