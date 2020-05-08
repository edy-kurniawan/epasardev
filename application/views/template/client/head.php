<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Home || E-Pasar Dev</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicons -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/truemart/img/favicon.ico">
    <!-- Fontawesome css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/truemart/css/font-awesome.min.css">
    <!-- Ionicons css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/truemart/css/ionicons.min.css">
    <!-- linearicons css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/truemart/css/linearicons.css">
    <!-- Nice select css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/truemart/css/nice-select.css">
    <!-- Jquery fancybox css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/truemart/css/jquery.fancybox.css">
    <!-- Jquery ui price slider css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/truemart/css/jquery-ui.min.css">
    <!-- Meanmenu css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/truemart/css/meanmenu.min.css">
    <!-- Nivo slider css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/truemart/css/nivo-slider.css">
    <!-- Owl carousel css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/truemart/css/owl.carousel.min.css">
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/truemart/css/bootstrap.min.css">
    <!-- Custom css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/truemart/css/default.css">
    <!-- Main css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/truemart/style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/truemart/css/responsive.css">

    <!-- Modernizer js -->
    <script src="<?php echo base_url(); ?>assets/truemart/js/vendor/modernizr-3.5.0.min.js"></script>
</head>

<body>
    <!--[if lte IE 9]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
	<![endif]-->

    <!-- Main Wrapper Start Here -->
    <div class="wrapper">
        <!-- Banner Popup Start -->
        <div class="popup_banner">
            <span class="popup_off_banner">×</span>
            <div class="banner_popup_area">
                    <img src="<?php echo base_url(); ?>assets/truemart/img/head/header.png" alt="">
            </div>
        </div>
        <!-- Banner Popup End -->
        <!-- Main Header Area Start Here -->
        <header>
            <!-- Header Top Start Here -->
            <div class="header-top-area">
                <div class="container">
                    <!-- Header Top Start -->
                    <div class="header-top">
                        <ul>
                            <li><a href="#">Pasar Ir. Soekarno Sukoharjo</a></li>
                            <li><a href="#">Keranjang Belanja</a></li>
                            <li><a href="checkout.html">Checkout</a></li>
                        </ul>
                        <ul>      
                            <li><a href="<?php echo site_url('client/login/logout'); ?>"><strong>Logout</strong><i class="lnr lnr-chevron-right"></i></a>
                            </li> 
                        </ul>
                    </div>
                    <!-- Header Top End -->
                </div>
                <!-- Container End -->
            </div>
            <!-- Header Top End Here -->
            <!-- Header Middle Start Here -->
            <div class="header-middle ptb-15">
                <div class="container">
                    <div class="row align-items-center no-gutters">
                        <div class="col-lg-3 col-md-12">
                            <div class="logo mb-all-30">
                                <a href="index.html"><img src="<?php echo base_url(); ?>assets/truemart/img/logo/logo3.png" alt="logo-image"></a>
                            </div>
                        </div>
                        <!-- Categorie Search Box Start Here -->
                        <div class="col-lg-5 col-md-8 ml-auto mr-auto col-10">
                            <div class="categorie-search-box">
                                <form action="#">
                                    <div class="form-group">
                                        <select class="bootstrap-select" name="poscats">
                                            <option value="0">Semua Kategori</option>
                                            <option value="1">Bahan Pokok</option>
                                            <option value="2">Bumbu</option>
                                            <option value="3">Sayur & Buah</option>
                                            <option value="4">Daging & Telur</option>
                                            <option value="5">Lokal</option>
                                            <option value="6">Import</option>
                                            <option value="7">Lainnya</option>
                                        </select>
                                    </div>
                                    <input type="text" name="search" placeholder="Cari Barang...">
                                    <button><i class="lnr lnr-magnifier"></i></button>
                                </form>
                            </div>
                        </div>
                        <!-- Categorie Search Box End Here -->
                        <!-- Cart Box Start Here -->
                        <div class="col-lg-4 col-md-12">
                            <div class="cart-box mt-all-30">
                                <ul class="d-flex justify-content-lg-end justify-content-center align-items-center">
                                    <li><a href="#"><i class="lnr lnr-cart"></i><span class="my-cart"><span class="total-pro">2</span><span>cart</span></span></a>
                                        <ul class="ht-dropdown cart-box-width">
                                            <li>
                                                <!-- Cart Box Start -->
                                                <div class="single-cart-box">
                                                    <div class="cart-img">
                                                        <a href="#"><img src="<?php echo base_url(); ?>assets/truemart/img/products/1.jpg" alt="cart-image"></a>
                                                        <span class="pro-quantity">1X</span>
                                                    </div>
                                                    <div class="cart-content">
                                                        <h6><a href="product.html">Printed Summer Red </a></h6>
                                                        <span class="cart-price">27.45</span>
                                                        <span>Size: S</span>
                                                        <span>Color: Yellow</span>
                                                    </div>
                                                    <a class="del-icone" href="#"><i class="ion-close"></i></a>
                                                </div>
                                                <!-- Cart Box End -->
                                                <!-- Cart Box Start -->
                                                <div class="single-cart-box">
                                                    <div class="cart-img">
                                                        <a href="#"><img src="<?php echo base_url(); ?>assets/truemart/img/products/2.jpg" alt="cart-image"></a>
                                                        <span class="pro-quantity">1X</span>
                                                    </div>
                                                    <div class="cart-content">
                                                        <h6><a href="product.html">Printed Round Neck</a></h6>
                                                        <span class="cart-price">45.00</span>
                                                        <span>Size: XL</span>
                                                        <span>Color: Green</span>
                                                    </div>
                                                    <a class="del-icone" href="#"><i class="ion-close"></i></a>
                                                </div>
                                                <!-- Cart Box End -->
                                                <!-- Cart Footer Inner Start -->
                                                <div class="cart-footer">
                                                   <ul class="price-content">
                                                       <li>Subtotal <span>$57.95</span></li>
                                                       <li>Shipping <span>$7.00</span></li>
                                                       <li>Taxes <span>$0.00</span></li>
                                                       <li>Total <span>$64.95</span></li>
                                                   </ul>
                                                    <div class="cart-actions text-center">
                                                        <a class="cart-checkout" href="checkout.html">Checkout</a>
                                                    </div>
                                                </div>
                                                <!-- Cart Footer Inner End -->
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="#"><i class="lnr lnr-heart"></i><span class="my-cart"><span>Wish</span><span>list (0)</span></span></a>
                                    </li>
                                    <li><a href="<?php echo site_url('client/login'); ?>"><i class="lnr lnr-user"></i><span class="my-cart"><span> <strong>Sign in</strong> Or</span><span> Join My Site</span></span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Cart Box End Here -->
                    </div>
                    <!-- Row End -->
                </div>
                <!-- Container End -->
            </div>
            <!-- Header Middle End Here -->
            <!-- Header Bottom Start Here -->
            <div class="header-bottom  header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                         <div class="col-xl-3 col-lg-4 col-md-6 vertical-menu d-none d-lg-block">
                            <span class="categorie-title">PILIH KATEGORI</span>
                        </div>                       
                        <div class="col-xl-9 col-lg-8 col-md-12 ">
                            <nav class="d-none d-lg-block">
                                <ul class="header-bottom-list d-flex">
                                    <li class="active"><a href="index.html">Home<i class="fa fa-angle-down"></i></a>
                                        <!-- Home Version Dropdown Start -->
                                        <ul class="ht-dropdown">
                                            <li><a href="index.html">Hot Sale</a></li>
                                            <li><a href="index-2.html">Rekomendasi</a></li>
                                            <li><a href="index-3.html">Terlaris</a></li>
                                        </ul>
                                        <!-- Home Version Dropdown End -->
                                    </li>
                                    <li><a href="shop.html">Voucher<i class="fa fa-angle-down"></i></a>
                                        <!-- Home Version Dropdown Start -->
                                        <ul class="ht-dropdown dropdown-style-two">
                                            <li><a href="product.html">Cashback</a></li>
                                            <li><a href="compare.html">Gratis Ongkir</a></li>
                                        </ul>
                                        <!-- Home Version Dropdown End -->
                                    </li>
                                    <li><a href="shop.html">Akun<i class="fa fa-angle-down"></i></a>
                                        <!-- Home Version Dropdown Start -->
                                        <ul class="ht-dropdown dropdown-style-two">
                                            <li><a href="product.html">Profile</a></li>
                                            <li><a href="compare.html">Keranjang Belanja</a></li>
                                            <li><a href="checkout.html">checkout</a></li>
                                        </ul>
                                        <!-- Home Version Dropdown End -->
                                    </li>
                                    <li><a href="blog.html">Bantuan<i class="fa fa-angle-down"></i></a>
                                        <!-- Home Version Dropdown Start -->
                                        <ul class="ht-dropdown dropdown-style-two">
                                            <li><a href="single-blog.html">Hubungi Kami</a></li>
                                            <li><a href="single-blog.html">FAQ</a></li>
                                        </ul>
                                        <!-- Home Version Dropdown End -->
                                    </li>
                                    <li><a href="about.html">Tentang kami</a></li>
                                </ul>
                            </nav>
                            <div class="mobile-menu d-block d-lg-none">
                                <nav>
                                    <ul>
                                        <li><a href="index.html">Home</a>
                                            <!-- Home Version Dropdown Start -->
                                            <ul>
                                                <li><a href="index.html">Hot sale</a></li>
                                                <li><a href="index-2.html">Rekomendasi</a></li>
                                                <li><a href="index-3.html">Terlaris</a></li>
                                            </ul>
                                            <!-- Home Version Dropdown End -->
                                        </li>
                                        <li><a href="shop.html">Akun</a>
                                            <!-- Mobile Menu Dropdown Start -->
                                            <ul>
                                                <li><a href="product.html">Profile</a></li>
                                                <li><a href="compare.html">Keranjang Belanja</a></li>
                                                <li><a href="checkout.html">checkout</a></li>
                                            </ul>
                                            <!-- Mobile Menu Dropdown End -->
                                        </li>
                                        <li><a href="blog.html">Bantuan</a>
                                            <!-- Mobile Menu Dropdown Start -->
                                            <ul>
                                                <li><a href="single-blog.html">Hubungi Kami</a></li>
                                            </ul>
                                            <ul>
                                                <li><a href="single-blog.html">FAQ</a></li>
                                            </ul>
                                            <!-- Mobile Menu Dropdown End -->
                                        </li>
                                        <li><a href="contact.html">Tentang kami</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <!-- Row End -->
                </div>
                <!-- Container End -->
            </div>
            <!-- Header Bottom End Here -->
            <!-- Mobile Vertical Menu Start Here -->
            <div class="container d-block d-lg-none">
                <div class="vertical-menu mt-30">
                    <span class="categorie-title mobile-categorei-menu">PILIH KATEGORI</span>
                    <nav>  
                        <div id="cate-mobile-toggle" class="category-menu sidebar-menu sidbar-style mobile-categorei-menu-list menu-hidden ">
                            <ul>
                                <li class="has-sub"><a href="#">Bahan Pokok</a>
                                    <ul class="category-sub">
                                        <li class="has-sub"><a href="shop.html">Beras</a>
                                            <ul class="category-sub">
                                                <li><a href="#">Premium</a></li>
                                                <li><a href="#">Medium</a></li>
                                                <li><a href="#">Termurah</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Gula</a></li>
                                        <li><a href="#">Minyak Goreng</a></li>
                                    </ul>
                                    <!-- category submenu end-->
                                </li>
                                <li class="has-sub"><a href="#">Daging & Telur</a>
                                    <ul class="category-sub">
                                        <li class="menu-tile">Daging & Telur</li>
                                        <li><a href="shop.html">Daging ayam</a></li>
                                        <li><a href="shop.html">Daging Sapi</a></li>
                                        <li><a href="shop.html">Telur Ayam</a></li>
                                    </ul>
                                    <!-- category submenu end-->
                                </li>
                                <li class="has-sub"><a href="#">Bumbu</a>
                                    <ul class="category-sub">
                                        <li><a href="shop.html">Cabai</a></li>
                                        <li><a href="shop.html">Bawang</a></li>
                                        <li><a href="shop.html">Garam</a></li>
                                    </ul>
                                    <!-- category submenu end-->
                                </li>
                                <li><a href="#">Sayur & Buah</a> </li>
                                <li><a href="#">Lainnya</a></li>
                            </ul>
                        </div>
                        <!-- category-menu-end -->
                    </nav>
                </div>
            </div>
            <!-- Mobile Vertical Menu Start End -->
        </header>
        <!-- Main Header Area End Here -->
        <!-- Categorie Menu & Slider Area Start Here -->
        <div class="main-page-banner pb-50 off-white-bg">
            <div class="container">
                <div class="row">
                    <!-- Vertical Menu Start Here -->
                    <div class="col-xl-3 col-lg-4 d-none d-lg-block">
                        <div class="vertical-menu mb-all-30">
                            <nav>
                                <ul class="vertical-menu-list">
                                    <li class=""><a href="shop.html"><span><img src="<?php echo base_url(); ?>assets/truemart/img/vertical-menu/1.png" alt="menu-icon"></span>Bahan Pokok<i class="fa fa-angle-right" aria-hidden="true"></i></a>

                                        <ul class="ht-dropdown mega-child">
                                            <li><a href="shop.html">Beras<i class="fa fa-angle-right"></i></a>
                                                 <!-- category submenu end-->
                                                <ul class="ht-dropdown mega-child">
                                                    <li><a href="shop.html">Premium</a></li>
                                                    <li><a href="shop.html">Medium</a></li>
                                                    <li><a href="shop.html">Termurah</a></li>
                                                </ul>
                                                <!-- category submenu end-->
                                            </li>                                          
                                            <li><a href="shop.html">Gula</a></li>
                                            <li><a href="shop.html">Minyak Goreng</a></li>
                                        </ul>
                                        <!-- category submenu end-->
                                    </li>
                                    <li><a href="shop.html"><span><img src="<?php echo base_url(); ?>assets/truemart/img/vertical-menu/3.png" alt="menu-icon"></span>Daging & Telur<i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                        <!-- Vertical Mega-Menu Start -->
                                        <ul class="ht-dropdown megamenu first-megamenu">
                                            <!-- Single Column Start -->
                                            <li class="single-megamenu">
                                                <ul>
                                                    <li class="menu-tile">Ayam</li>
                                                    <li><a href="shop.html">Ayam Ras</a></li>
                                                    <li><a href="shop.html">Ayam Kampung</a></li>
                                                </ul>
                                                <ul>
                                                    <li class="menu-tile">Sapi</li>
                                                    <li><a href="shop.html">Sirloin</a></li>
                                                    <li><a href="shop.html">Tenderloin</a></li>
                                                    <li><a href="shop.html">Sapi Paha</a></li>
                                                    <li><a href="shop.html">Sapi Tetelan</a></li>
                                                </ul>
                                            </li>
                                            <!-- Single Column End -->
                                            <!-- Single Column Start -->
                                            <li class="single-megamenu">
                                                <ul>
                                                    <li class="menu-tile">Telur</li>
                                                    <li><a href="shop.html">Ayam Kampung</a></li>
                                                    <li><a href="shop.html">Ayam Ras</a></li>
                                                </ul>
                                                <ul>
                                                    <li class="menu-tile">Ikan</li>
                                                    <li><a href="shop.html">Ikan Kembung</a></li>
                                                    <li><a href="shop.html">Ikan Teri Asin</a></li>
                                                </ul>
                                            </li>
                                            <!-- Single Column End -->
                                            <!-- Single Megamenu Image Start -->
                                            <li class="megamenu-img">
                                                <a href="shop.html"><img src="<?php echo base_url(); ?>assets/truemart/img/vertical-menu/sub-img1.jpg" alt="menu-image"></a>
                                                <a href="shop.html"><img src="<?php echo base_url(); ?>assets/truemart/img/vertical-menu/sub-img2.jpg" alt="menu-image"></a>
                                                <a href="shop.html"><img src="<?php echo base_url(); ?>assets/truemart/img/vertical-menu/sub-img3.jpg" alt="menu-image"></a>
                                            </li>
                                            <!-- Single Megamenu Image End -->
                                        </ul>
                                        <!-- Vertical Mega-Menu End -->
                                    </li>
                                    <li><a href="shop.html"><span><img src="<?php echo base_url(); ?>assets/truemart/img/vertical-menu/6.png" alt="menu-icon"></span>Bumbu<i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                        <!-- Vertical Mega-Menu Start -->
                                        <ul class="ht-dropdown megamenu megamenu-two">
                                            <!-- Single Column Start -->
                                            <li class="single-megamenu">
                                                <ul>
                                                    <li class="menu-tile">Cabai</li>
                                                    <li><a href="shop.html">Merah Keriting</a></li>
                                                    <li><a href="shop.html">Merah Besar</a></li>
                                                    <li><a href="shop.html">Rawit Merah</a></li>
                                                    <li><a href="shop.html">Rawit Hijau</a></li>
                                                </ul>
                                            </li>
                                            <!-- Single Column End -->
                                            <!-- Single Column Start -->
                                            <li class="single-megamenu">
                                                <ul>
                                                    <li class="menu-tile">Lainnya</li>
                                                    <li><a href="shop.html">Bawang Merah</a></li>
                                                    <li><a href="shop.html">Bawang Putih</a></li>
                                                    <li><a href="shop.html">Garam</a></li>
                                                    <li><a href="shop.html">Tepung</a></li>
                                                </ul>
                                            </li>
                                            <!-- Single Column End -->
                                        </ul>
                                        <!-- Vertical Mega-Menu End -->
                                    </li>
                                    <!-- More Categoies Start -->
                                    <li id="cate-toggle" class="category-menu v-cat-menu">
                                        <ul>
                                            <li class="has-sub"><a href="#">Sayur & Buah</a>
                                                <ul class="category-sub">
                                                    <li><a href="shop.html"><span><img src="<?php echo base_url(); ?>assets/truemart/img/vertical-menu/11.png" alt="menu-icon"></span>Accessories</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <!-- More Categoies End -->
                                    <!-- More Categoies Start -->
                                    <li id="cate-toggle" class="category-menu v-cat-menu">
                                        <ul>
                                            <li class="has-sub"><a href="#">Lainnya</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <!-- More Categoies End -->
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- Vertical Menu End Here -->
                    <!-- Slider Area Start Here -->
                    <div class="col-xl-9 col-lg-8 slider_box">
                        <div class="slider-wrapper theme-default">
                            <!-- Slider Background  Image Start-->
                            <div id="slider" class="nivoSlider">
                                <a href="shop.html"><img src="<?php echo base_url(); ?>assets/truemart/img/head/3.png" data-thumb="img/slider/1.jpg" alt="" title="#htmlcaption" /></a>
                                <a href="shop.html"><img src="<?php echo base_url(); ?>assets/truemart/img/head/4.png" data-thumb="img/slider/2.jpg" alt="" title="#htmlcaption2" /></a>
                                <a href="shop.html"><img src="<?php echo base_url(); ?>assets/truemart/img/head/5.png" data-thumb="img/slider/2.jpg" alt="" title="#htmlcaption2" /></a>
                            </div>
                            <!-- Slider Background  Image Start-->
                        </div>
                    </div>
                    <!-- Slider Area End Here -->
                </div>
                <!-- Row End -->
            </div>
            <!-- Container End -->
        </div>
        <!-- Categorie Menu & Slider Area End Here -->
        <!-- Brand Banner Area Start Here -->
        <div class="image-banner pb-50 off-white-bg">
            <div class="container">
                <div class="col-img">
                    <a href="#"><img src="<?php echo base_url(); ?>assets/truemart/img/head/h2-banner.png" alt="image banner"></a>
                </div>
            </div>
            <!-- Container End -->
        </div>
        <!-- Brand Banner Area End Here -->