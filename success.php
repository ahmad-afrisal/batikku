<?php
  session_start();
  include 'config.php';

  $users_id = $_SESSION['id'];
  $tran_id = $_GET['transaction_id'];


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
                        <h2>Konfirmasi</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end-->

  <!--================ confirmation part start =================-->
  <section class="confirmation_part section_padding">
    <div class="container">

      <div class="row">
        <div class="col-lg-12">
          <div class="confirmation_tittle">
            <span>Terima Kasih. Pesanan anda telah dibuat.</span>
          </div>
        </div>
        <?php
          $query = mysqli_query($config, "SELECT * FROM transactions WHERE users_id='$users_id' ORDER BY transactions_id DESC LIMIT 1");
          while ($x = mysqli_fetch_array($query)) {
        ?>
        <div class="col-lg-6 col-lx-4">
          <div class="single_confirmation_details">
            <h4>Informasi Pesanan</h4>
            <ul>
              <li>
                <p>Kode Pesanan</p><span>: BA.<?= $x['transactions_id'];?></span>
              </li>
              <li>
                <p>Tanggal Transaksi</p><span>: <?= $x['date_transaction'];?></span>
              </li>
              <li>
                <p>Total Bayar</p><span>: Rp. <?= number_format($x['total_price']);?></span>
              </li>
              <li>
                <p>Metode Pembayaran</p><span>: Transfer</span>
              </li>
              <li>
                <p>Transfer ke </p><span>: BRI 0047-8862-8373</span>
              </li>
              <li>
                <p>Status Pembayaran </p><span>: <?= $x['transaction_status'];?> </span>
              </li>
              <li>
                <p>*Segera selesaikan pembayaran</p>
              </li>

            </ul>
          </div>
        </div>

        <?php } ?>

        <?php
          $query = mysqli_query($config, "SELECT * FROM users JOIN provinces ON users.provinces_id=provinces.provinces_id  WHERE users_id='$users_id'");
          while ($x = mysqli_fetch_array($query)) {
        ?>
        <div class="col-lg-6 col-lx-4">
          <div class="single_confirmation_details">
            <h4>Detail Penerima</h4>
            <ul>
              <li>
                <p>Nama Penerima</p><span>: <?= $x['name'];?></span>
              </li>
              <li>
                <p>Nomor Handphone</p><span>: <?= $x['phone_number'];?></span>
              </li>
              <li>
                <p>Alamat</p><span>: <?= $x['address'];?>, <?= $x['provinces_name'];?></span>
              </li>
              <li>
                <p>Kode Pos</p><span>: <?= $x['zip_code'];?></span>
              </li>
            </ul>
          </div>
        </div>
        <?php } ?>
      </div>

      <div class="row">
        <div class="col-lg-12">
          <div class="order_details_iner">
            <h3>Detail Pesanan</h3>
            <table class="table table-borderless">
              <thead>
                <tr>
                  <th scope="col" colspan="2">Produk</th>
                  <th scope="col">Banyak</th>
                  <th scope="col">Total</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $shipping_price = 0;
                  $total_price = 0;
                  $subtotal = 0;
                  $unique_code = 0;
                  $query = mysqli_query($config, "SELECT * FROM transaction_items JOIN products ON transaction_items.products_id=products.products_id JOIN transactions ON transaction_items.transaction_id=transactions.transactions_id WHERE transaction_id='$tran_id'");
                  while ($x = mysqli_fetch_array($query)) {
                    $shipping_price = $x['shipping_price'];
                    $total_price = $x['total_price'];
                    $subtotal += $x['quantity']*$x['price'];
                    $unique_code = $x['unique_code'];
                ?>
                <tr>
                  <th colspan="2"><span><?= $x['product_name']; ?></span></th>
                  <th>x<?= $x['quantity']; ?></th>
                  <th> <span>Rp. <?= ($x['quantity']*$x['price']); ?></span></th>
                </tr>
                <?php } ?>
                <tr>
                  <th colspan="3">Subtotal</th>
                  <th> <span>Rp. <?= $subtotal; ?></span></th>
                </tr>
                <tr>
                  <th colspan="3">Biaya Pengiriman</th>
                  <th><span>Rp. <?= $shipping_price; ?></span></th>
                </tr>
                <tr>
                  <th colspan="3">Kode Unik</th>
                  <th><span><?= $unique_code; ?></span></th>
                </tr>
              </tbody>
              <tfoot>
                <tr>
                  <th scope="col">
                    <a href="frontend/dashboard.php" class="genric-btn primary-border small">Ke Dashboard</a>
                  </th>
                  <th scope="col" colspan="2">Total Bayar</th>
                  <th scope="col">Rp. <?=  number_format($total_price); ?></th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>


    </div>
  </section>
  <!--================ confirmation part end =================-->


    <?php include('layouts/footer.php'); ?>

    <?php include('layouts/script.php'); ?>

</body>

</html>