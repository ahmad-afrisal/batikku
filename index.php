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


    <!-- banner part start-->
    <section class="banner_part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5">
                    <div class="banner_text">
                        <div class="banner_text_iner">
                            <h1>Kenali Kekayaan Budaya Melalui Batik</h1>
                            <p>Pilihan Tepat untuk Menambahkan Sentuhan Elegan pada Penampilan Anda</p>
                            <a href="#" class="btn_1">Belanja Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="banner_img">
            <img src="user/img/banner.png" alt="#" class="img-fluid">
            <img src="user/img/banner_pattern.png " alt="#" class="pattern_img img-fluid">
        </div>
    </section>
    <!-- banner part start-->

    
    <!-- feature part here -->
    <section class="feature_part mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-3 col-sm-6">
                    <div class="single_feature_part">
                        <img src="user/img/icon/feature_icon_1.svg" alt="#">
                        <h4>Aman</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_feature_part">
                        <img src="user/img/icon/feature_icon_2.svg" alt="#">
                        <h4>Pemesanan Online</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_feature_part">
                        <img src="user/img/icon/feature_icon_3.svg" alt="#">
                        <h4>Cepat</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_feature_part">
                        <img src="user/img/icon/feature_icon_4.svg" alt="#">
                        <h4>Bonus Menarik</h4>
                    </div>
                </div>
            </div>
        </div>
        
    </section>
    <!-- feature part end -->

    <!-- trending item start-->
    <section class="trending_items">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_tittle text-center">
                        <h2>Produk Terbaru</h2>
                    </div>
                </div>
            </div>
            <div class="row">
            <?php 

                $query = mysqli_query($config, "SELECT products.products_id, products.product_name, products.price FROM products");
                while ($data = mysqli_fetch_array($query)) {
                $productId = $data['products_id'];
            ?>
                <div class="col-lg-4 col-sm-6">
                    <a href="details.php?products_id=<?= $data['products_id']; ?>">
                        <div class="single_product_item">
                            <div class="single_product_item_thumb">
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
                            </div>
                            <h3> <?= $data['product_name']; ?> </h3>
                            <p>Rp. <?= number_format($data['price']); ?></p>
                        </div>
                    </a>
                </div>
                <?php
                }
            ?>
            </div>
        </div>
    </section>
    <!-- trending item end-->

    <!-- client review part here -->
    <section class="client_review">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="client_review_slider owl-carousel">
                        <div class="single_client_review">
                            <div class="client_img">
                                <img src="user/img/client.png" alt="#">
                            </div>
                            <p>"Ini adalah batik terbaik yang pernah saya miliki! Kualitasnya luar biasa, dengan warna yang begitu hidup dan pola yang indah. Saya sering mendapatkan pujian saat memakainya. Sangat bangga bisa mempersembahkan budaya Indonesia melalui batik ini."</p>
                            <h5>- David T</h5>
                        </div>
                        <div class="single_client_review">
                            <div class="client_img">
                                <img src="user/img/client_1.png" alt="#">
                            </div>
                            <p>"Batik ini benar-benar memberikan perpaduan sempurna antara tradisi dan gaya modern. Saya suka bagaimana batik ini memberikan sentuhan unik pada penampilan saya. Setiap kali saya memakainya, saya merasa terhubung dengan warisan budaya kami."</p>
                            <h5>- Hendra D</h5>
                        </div>
                        <div class="single_client_review">
                            <div class="client_img">
                                <img src="user/img/client_2.png" alt="#">
                            </div>
                            <p>"Batik ini adalah investasi yang saya tidak akan menyesalinya. Saya menghargai keaslian dan keunikan setiap desainnya. Ketika memakainya, saya merasa seperti membawa cerita dan sejarah yang kaya di dalamnya. Produk ini benar-benar istimewa."</p>
                            <h5>- Daniel H</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- client review part end -->



    <!-- subscribe part here -->
    <section class="subscribe_part section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="subscribe_part_content">
                        <h2>Dapatkan Update Terbaru!</h2>
                        <p>Jangan Lewatkan Kesempatan untuk Mendapatkan Penawaran Eksklusif!.</p>
                        <div class="subscribe_form">
                            <input type="email" placeholder="Masukkan Email">
                            <a href="#" class="btn_1">Subscribe</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- subscribe part end -->

    <?php include('layouts/footer.php'); ?>

    <?php include('layouts/script.php'); ?>

</body>

</html>