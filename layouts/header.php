<!--::header part start::-->
<header class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="index.php"> <img src="user/img/logo.png" alt="logo"> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="menu_icon"><i class="fas fa-bars"></i></span>
                        </button>
                        <?php
                            if(isset($_SESSION["login"])) { ?>
                                <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                                    <ul class="navbar-nav">
                                        <li class="nav-item">
                                            <a class="nav-link" href="index.php">Home</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="categories.php">Produk</a>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="" id="navbarDropdown_1"
                                                role="button" data-toggle="dropdown" aria-haspop#up="true" aria-expanded="false">
                                                Hi, <?= $_SESSION['name']; ?>
                                            </a>
                                            <?php if($_SESSION['roles'] == 'ADMIN') { ?>
                                                <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
                                                    <a class="dropdown-item" href="backend/dashboard/dashboard.php"> Dashboard</a>
                                                    <a class="dropdown-item" href="backend/account/dashboard-account.php"> Pengaturan</a>
                                                    <a class="dropdown-item" href="logout.php"> Logout</a>
                                                </div>
                                            <?php } else { ?>
                                                <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
                                                    <a class="dropdown-item" href="frontend/dashboard.php"> Dashboard</a>
                                                    <a class="dropdown-item" href="frontend/dashboard-account.php"> Pengaturan</a>
                                                    <a class="dropdown-item" href="logout.php"> Logout</a>
                                                </div>
                                            <?php } ?>
                                        </li>
                                    </ul>
                                </div>
                                <div class="hearer_icon d-flex align-items-center">
                                    <a href="cart.php">
                                    <?php
                                        $users_id = $_SESSION['id'];
                                        $query = mysqli_query($config, "SELECT count(users_id) as cartCount FROM carts WHERE users_id='$users_id'");
                                        
                                        if(mysqli_num_rows($query)==1) { 
                                            while($data = mysqli_fetch_array($query)) { ?>
                                                <img src="images/icon-cart-filled.svg" alt="" srcset="">
                                                <div class="card-badge"><?= $data['cartCount'] ?></div>
                                            <?php }
                                        }
                                ?>
                                    </a>

                                </div>
                            <?php } else { ?>
                                <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                                    <ul class="navbar-nav">
                                        <li class="nav-item">
                                            <a class="nav-link" href="index.php">Home</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="categories.php">Produk</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="register.php">Buat Akun</a>
                                        </li>
                                        <li class="nav-item">
                                            <a  class="nav-link" href="login.php">Login</a>
                                        </li>
                                    </ul>
                                </div>
                        <?php }?>
                        
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header part end-->

