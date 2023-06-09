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
                        <h2>Registrasi</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end-->

    <!--================login_part Area =================-->
    <section class="login_part section_padding ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_text text-center">
                        <div class="login_part_text_iner">
                            <h2>Sudah Punya Akun!</h2>
                            <p>Silahkan login dengan akun yang telah daftar</p>
                            <a href="login.php" class="btn_3">Login</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_form">
                        <div class="login_part_form_iner">
                            <h3>Buat Akun  terlebih dahulu untuk kenyamanan berbelanja</h3>
                            <form class="row contact_form" action="register-action.php" method="post" novalidate="novalidate">
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="name" name="name" autofocus
                                        placeholder="Nama Lengkap" required>
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="email" name="email" 
                                        placeholder="Alamat Email" required>
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control"  name="password" 
                                        placeholder="Password" required>
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control"  name="confPassword" 
                                        placeholder="Konfirmasi Password" required>
                                </div>
                                <div class="col-md-12 form-group">

                                    <button type="submit" value="submit" class="btn_3">
                                        Daftar
                                    </button>
                                
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================login_part end =================-->

    <?php include('layouts/footer.php'); ?>

    <?php include('layouts/script.php'); ?>



</body>
    
</html>