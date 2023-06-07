<?php
session_start();
include 'config.php';
if(isset($_SESSION["login"])) { 
    header("Location: index.php");
}

if (isset($_POST["submit"])) {
  # code...
  $email = $_POST["email"];
  $password = $_POST["password"];


  $result = mysqli_query($config,"SELECT * FROM users WHERE email = '$email'");

  if (mysqli_num_rows($result) === 1) {
    # code...
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password,$row["password"])) {

      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["users_id"];
      $_SESSION["name"] = $row["name"];
      $_SESSION["username"] = $row["username"];
      $_SESSION["roles"] = $row["roles"];
      if($_SESSION["roles"] === "ADMIN") {
        header("Location: backend/dashboard/dashboard.php");
      } else {
        header("Location: index.php");
      }
      exit;
    }
    
  }
  $error = true;
  
}


if(isset($_SESSION['message']))
{
    ?>
        <div class="toast-container align-items-center text-bg-primary border-0 position-fixed top-0 start-50 translate-middle-x">
          <div id="liveToast" class="toast " role="alert" aria-live="assertive" aria-atomic="true">
          <div class="d-flex">
              <div class="toast-body">
                <?= $_SESSION['message']; ?>
              </div>
              <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
          </div>
        </div>
          <?php 
    unset($_SESSION['message']);
}

?>


<!doctype html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>pillloMart</title>
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
                        <h2>login</h2>
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
                            <h2>Belum punya akun?</h2>
                            <p>Silahkan buat akun dan dapatkan kemudahan dalam berbelanja</p>
                            <a href="register.php" class="btn_3">Buat Akun</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_form">
                        <div class="login_part_form_iner">
                            <h3>Selamat Datang Kembali ! <br>
                                Silahkan Login</h3>
                                <?php if(isset($error)) : ?>
                                    <p style="color:red;">email / password salah</p>
                                <?php endif; ?>
                            <form class="row contact_form" action="" method="post" novalidate="novalidate">
                                <div class="col-md-12 form-group p_star">
                                    <input type="email" class="form-control" id="name" name="email" value=""
                                        placeholder="Alamat Email">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control" id="password" name="password" value=""
                                        placeholder="Password">
                                </div>
                              
                                <div class="col-md-12 form-group">
                                    <button type="submit" name="submit" class="btn_3">
                                        log in
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