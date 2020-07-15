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
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/AdminLTE/plugins/toastr/toastr.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/plugins/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') ?>">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/plugins/select2/css/select2.css')?>">
   <!-- Modernizer js -->
    <script src="<?php echo base_url(); ?>assets/truemart/js/vendor/modernizr-3.5.0.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    
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
                    <img src="<?php echo base_url(); ?>assets/truemart/img/head/header.jpg" alt="">
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
                            <li><a href="#">Checkout</a></li>
                        </ul>
                        <ul>     
                            <li><a href="#"><strong>#Dirumahaja</strong><i class="lnr lnr-chevron-right"></i></a>
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
                                <a href="<?php echo site_url(); ?>"><img src="<?php echo base_url(); ?>assets/truemart/img/logo/logo3.png" alt="logo-image"></a>
                            </div>
                        </div>
                        <!-- Categorie Search Box Start Here -->
                        <div class="col-lg-5 col-md-8 ml-auto mr-auto col-10">
                            <div class="categorie-search-box">
                            <form id="form" action="<?php echo site_url('search'); ?>" method="post">
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                    <div class="form-group">
                                        <select class="bootstrap-select" name="poscats">
                                            <option value="">Semua Kategori</option>
                                        <?php 
                                            foreach($kat as $x){ 
                                        ?>
                                            <option value="<?php echo html_escape($x->Kode) ?>"><?php echo html_escape($x->Nama) ?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                    <input type="text" name="keyword" placeholder="Cari Barang..." minlength="3" required>
                                    <button type="submit"><i class="lnr lnr-magnifier"></i></button>
                                </form>
                            </div>
                        </div>
                        <!-- Categorie Search Box End Here -->
                        <!-- Cart Box Start Here -->
                        <div class="col-lg-4 col-md-12">
                            <div class="cart-box mt-all-30">
                                <ul class="d-flex justify-content-lg-end justify-content-center align-items-center">
                                    <li><a href="#"><i class="lnr lnr-cart"></i><span class="my-cart"><span class="total-pro" id="total-pro">0</span><span>cart</span></span></a>
                                        <ul class="ht-dropdown cart-box-width">
                                            <li>
                                            <?php 
                                                $subtotal = 0;
                                                $idform = 1;
                                                foreach($cart as $x){ 
                                                    $subtotal += $x->Subtotal;
                                                    $idform++;
                                            ?>
                                                <!-- Cart Box Start -->
                                                <div class="single-cart-box">
                                                    <div class="cart-img">
                                                        <a href="#"><img src="<?php echo base_url(); ?>assets/upload/barang/<?php echo html_escape($x->Img) ?>" alt="cart-image"></a>
                                                        <span class="pro-quantity">X<?php echo html_escape($x->Jumlah) ?></span>
                                                    </div>
                                                    <div class="cart-content">
                                                        <h6><a href="#"><?php echo html_escape($x->Nama) ?></a></h6>
                                                        <span class="cart-price">Rp. <?php echo html_escape(number_format($x->Subtotal)) ?></span>
                                                        <span>Rp. <?php echo html_escape(number_format($x->Harga)) ?> /<?php echo html_escape($x->Satuan) ?></span>
                                                    </div>
                                                    <form id="<?php echo $idform ?>" action="<?php echo site_url('Client/Home/delete_cart'); ?>" method="post">
                                                    <input type="hidden" name="id" value="<?php echo html_escape($x->ID) ?>">
                                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                                    <a class="del-icone" href="javascript:;" onclick="document.getElementById('<?php echo $idform ?>').submit();"><i class="ion-close"></i></a>
                                                    </form>
                                                </div>
                                                <!-- Cart Box End -->
                                            <?php } ?>
                                                <!-- Cart Footer Inner Start -->
                                                <div class="cart-footer">
                                                   <ul class="price-content">
                                                       <li>Subtotal <span>Rp. <?php echo number_format($subtotal) ?></span></li>
                                                   </ul>
                                                    <div class="cart-actions text-center">
                                                        <a class="cart-checkout" href="<?php echo site_url('cart'); ?>">Pesan</a>
                                                    </div>
                                                </div>
                                                <!-- Cart Footer Inner End -->
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="#"><i class="lnr lnr-heart"></i><span class="my-cart"><span>Wish</span><span>list (0)</span></span></a>
                                    </li>
                                    <li>
                                    <?php if($this->session->userdata('logged_user') == TRUE): ?> 
                                        <a href="<?php echo site_url('user'); ?>"><i class="lnr lnr-user"></i><span class="my-cart"><span>Welcome</span><span><strong><?php echo $this->session->userdata("username"); ?></strong></span></span></a>
                                    <?php endif; ?>
                                    <?php if($this->session->userdata('logged_user') != TRUE): ?> 
                                        <a href="<?php echo site_url('signin'); ?>"><i class="lnr lnr-user"></i><span class="my-cart"><span> <strong>Sign in</strong> Or</span><span> Sign up</span></span></a>
                                    <?php endif; ?>
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
                                    <li class="active"><a href="#">Home<i class="fa fa-angle-down"></i></a>
                                        <!-- Home Version Dropdown Start -->
                                        <ul class="ht-dropdown">
                                            <li><a href="#">Hot Sale</a></li>
                                            <li><a href="#">Rekomendasi</a></li>
                                            <li><a href="#">Terlaris</a></li>
                                        </ul>
                                        <!-- Home Version Dropdown End -->
                                    </li>
                                    <li><a href="#">Voucher<i class="fa fa-angle-down"></i></a>
                                        <!-- Home Version Dropdown Start -->
                                        <ul class="ht-dropdown dropdown-style-two">
                                            <li><a href="#">Cashback</a></li>
                                            <li><a href="#">Gratis Ongkir</a></li>
                                        </ul>
                                        <!-- Home Version Dropdown End -->
                                    </li>
                                    <li><a href="#">Akun<i class="fa fa-angle-down"></i></a>
                                        <!-- Home Version Dropdown Start -->
                                        <ul class="ht-dropdown dropdown-style-two">
                                            <li><a href="<?php echo site_url('user'); ?>">Profile</a></li>
                                            <li><a href="<?php echo site_url('cart'); ?>">Keranjang Belanja</a></li>
                                            <li><a href="<?php echo site_url('transaksi'); ?>">History Transaksi</a></li>
                                        </ul>
                                        <!-- Home Version Dropdown End -->
                                    </li>
                                    <li><a href="#">Bantuan<i class="fa fa-angle-down"></i></a>
                                        <!-- Home Version Dropdown Start -->
                                        <ul class="ht-dropdown dropdown-style-two">
                                            <li><a href="#">Hubungi Kami</a></li>
                                            <li><a href="#">FAQ</a></li>
                                        </ul>
                                        <!-- Home Version Dropdown End -->
                                    </li>
                                    <li><a href="#">Tentang kami</a></li>
                                </ul>
                            </nav>
                            <div class="mobile-menu d-block d-lg-none">
                                <nav>
                                    <ul>
                                        <li><a href="#">Home</a>
                                            <!-- Home Version Dropdown Start -->
                                            <ul>
                                                <li><a href="#">Hot sale</a></li>
                                                <li><a href="#">Rekomendasi</a></li>
                                                <li><a href="#">Terlaris</a></li>
                                            </ul>
                                            <!-- Home Version Dropdown End -->
                                        </li>
                                        <li><a href="#">Akun</a>
                                            <!-- Mobile Menu Dropdown Start -->
                                            <ul>
                                                <li><a href="#">Profile</a></li>
                                                <li><a href="#">Keranjang Belanja</a></li>
                                                <li><a href="#">checkout</a></li>
                                            </ul>
                                            <!-- Mobile Menu Dropdown End -->
                                        </li>
                                        <li><a href="#">Bantuan</a>
                                            <!-- Mobile Menu Dropdown Start -->
                                            <ul>
                                                <li><a href="#">Hubungi Kami</a></li>
                                            </ul>
                                            <ul>
                                                <li><a href="#">FAQ</a></li>
                                            </ul>
                                            <!-- Mobile Menu Dropdown End -->
                                        </li>
                                        <li><a href="#">Tentang kami</a></li>
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
                                        <li class="has-sub"><a href="#">Beras</a>
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
                                        <li><a href="#">Daging ayam</a></li>
                                        <li><a href="#">Daging Sapi</a></li>
                                        <li><a href="#">Telur Ayam</a></li>
                                    </ul>
                                    <!-- category submenu end-->
                                </li>
                                <li class="has-sub"><a href="#">Bumbu</a>
                                    <ul class="category-sub">
                                        <li><a href="#">Cabai</a></li>
                                        <li><a href="#">Bawang</a></li>
                                        <li><a href="#">Garam</a></li>
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
        <div class="main-page-banner home-3">
            <div class="container">
                <div class="row">
                    <!-- Vertical Menu Start Here -->
                    <div class="col-xl-3 col-lg-4 d-none d-lg-block">
                        <div class="vertical-menu mb-all-30">
                            <nav>
                                <ul class="vertical-menu-list">
                                    <li class=""><a href="#"><span><img src="<?php echo base_url(); ?>assets/truemart/img/vertical-menu/1.png" alt="menu-icon"></span>Bahan Pokok<i class="fa fa-angle-right" aria-hidden="true"></i></a>

                                        <ul class="ht-dropdown mega-child">
                                            <li><a href="#">Beras<i class="fa fa-angle-right"></i></a>
                                                 <!-- category submenu end-->
                                                <ul class="ht-dropdown mega-child">
                                                    <li><a href="#">Premium</a></li>
                                                    <li><a href="#">Medium</a></li>
                                                    <li><a href="#">Termurah</a></li>
                                                </ul>
                                                <!-- category submenu end-->
                                            </li>                                          
                                            <li><a href="#">Gula</a></li>
                                            <li><a href="#">Minyak Goreng</a></li>
                                        </ul>
                                        <!-- category submenu end-->
                                    </li>
                                    <li><a href="#"><span><img src="<?php echo base_url(); ?>assets/truemart/img/vertical-menu/3.png" alt="menu-icon"></span>Daging & Telur<i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                        <!-- Vertical Mega-Menu Start -->
                                        <ul class="ht-dropdown megamenu first-megamenu">
                                            <!-- Single Column Start -->
                                            <li class="single-megamenu">
                                                <ul>
                                                    <li class="menu-tile">Ayam</li>
                                                    <li><a href="#">Ayam Ras</a></li>
                                                    <li><a href="#">Ayam Kampung</a></li>
                                                </ul>
                                                <ul>
                                                    <li class="menu-tile">Sapi</li>
                                                    <li><a href="#">Sirloin</a></li>
                                                    <li><a href="#">Tenderloin</a></li>
                                                    <li><a href="#">Sapi Paha</a></li>
                                                    <li><a href="#">Sapi Tetelan</a></li>
                                                </ul>
                                            </li>
                                            <!-- Single Column End -->
                                            <!-- Single Column Start -->
                                            <li class="single-megamenu">
                                                <ul>
                                                    <li class="menu-tile">Telur</li>
                                                    <li><a href="#">Ayam Kampung</a></li>
                                                    <li><a href="#">Ayam Ras</a></li>
                                                </ul>
                                                <ul>
                                                    <li class="menu-tile">Ikan</li>
                                                    <li><a href="#">Ikan Kembung</a></li>
                                                    <li><a href="#">Ikan Teri Asin</a></li>
                                                </ul>
                                            </li>
                                            <!-- Single Column End -->
                                            <!-- Single Megamenu Image Start -->
                                            <li class="megamenu-img">
                                                <a href="#"><img src="<?php echo base_url(); ?>assets/truemart/img/vertical-menu/sub-img1.jpg" alt="menu-image"></a>
                                                <a href="#"><img src="<?php echo base_url(); ?>assets/truemart/img/vertical-menu/sub-img2.jpg" alt="menu-image"></a>
                                                <a href="#"><img src="<?php echo base_url(); ?>assets/truemart/img/vertical-menu/sub-img3.jpg" alt="menu-image"></a>
                                            </li>
                                            <!-- Single Megamenu Image End -->
                                        </ul>
                                        <!-- Vertical Mega-Menu End -->
                                    </li>
                                    <li><a href="#"><span><img src="<?php echo base_url(); ?>assets/truemart/img/vertical-menu/6.png" alt="menu-icon"></span>Bumbu<i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                        <!-- Vertical Mega-Menu Start -->
                                        <ul class="ht-dropdown megamenu megamenu-two">
                                            <!-- Single Column Start -->
                                            <li class="single-megamenu">
                                                <ul>
                                                    <li class="menu-tile">Cabai</li>
                                                    <li><a href="#">Merah Keriting</a></li>
                                                    <li><a href="#">Merah Besar</a></li>
                                                    <li><a href="#">Rawit Merah</a></li>
                                                    <li><a href="#">Rawit Hijau</a></li>
                                                </ul>
                                            </li>
                                            <!-- Single Column End -->
                                            <!-- Single Column Start -->
                                            <li class="single-megamenu">
                                                <ul>
                                                    <li class="menu-tile">Lainnya</li>
                                                    <li><a href="#">Bawang Merah</a></li>
                                                    <li><a href="#">Bawang Putih</a></li>
                                                    <li><a href="#">Garam</a></li>
                                                    <li><a href="#">Tepung</a></li>
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
                                                    <li><a href="#"><span><img src="<?php echo base_url(); ?>assets/truemart/img/vertical-menu/11.png" alt="menu-icon"></span>Accessories</a></li>
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
                </div>
                <!-- Row End -->
            </div>
            <!-- Container End -->
        </div>
        