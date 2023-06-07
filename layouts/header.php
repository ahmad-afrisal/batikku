<!--::header part start::-->
<header class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="index.html"> <img src="user/img/logo.png" alt="logo"> </a>
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
                                        <li class="nav-item">
                                            <a class="nav-link" href="logout.php">logout</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="hearer_icon d-flex align-items-center">
                                    <a href="cart.php">
                                        <i class="flaticon-shopping-cart-black-shape"></i>
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

