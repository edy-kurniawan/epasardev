<link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/plugins/fontawesome-free/css/all.min.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/plugins/sweetalert2/sweetalert2.min.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/plugins/sweetalert2/sweetalert2.css') ?>">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/truemart/css/font-awesome.min.css">
<div class="modal fade" id="modal_qty">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Masukan Jumlah Beli</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form" class="needs-validation" role="form" action="<?php echo site_url('Client/Home/save_cart'); ?>" method="post">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <input type="hidden" name="id">
                    <input type="hidden" name="kode">
                    <input type="hidden" name="harga">
                    <p>
                        <center>
                            <div class="btn-group">
                                <button type="button" id="kurang" class="btn btn-default"><i class="fas fa-minus"></i></button>
                                <input type="number" class="quantity" name="qty" id="hasil" min="1" value="1">
                                <button type="button" id="tambah" class="btn btn-default"><i class="fas fa-plus"></i></button>
                            </div>
                        </center>
                    </p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="submit" id="btnSave" class="btn btn-primary">Masukan keranjang</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- Hot Deal Products Start Here -->
<div class="hot-deal-products off-white-bg pb-90 pb-sm-50">
    <div class="container">
        <!-- Product Title Start -->
        <div class="post-title pb-30">
            <h2>Produk Terbaru</h2>
        </div>
        <!-- Product Title End -->
        <!-- Hot Deal Product Activation Start -->
        <div class="hot-deal-active owl-carousel">
            <?php
            foreach ($barang as $x) {
            ?>
                <!-- Single Product Start -->
                <div class="single-product">
                    <!-- Product Image Start -->
                    <span class="sticker-new">new</span>
                    <div class="pro-img">
                        <a href="#">
                            <img class="primary-img" src="<?php echo base_url(); ?>assets/upload/barang/<?php echo $x->Img ?>" alt="single-product">
                            <img class="secondary-img" src="<?php echo base_url(); ?>assets/upload/barang/<?php echo $x->Img ?>" alt="single-product">
                        </a>
                        <div class="countdown" data-countdown="2020/06/21"></div>
                        <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                    </div>
                    <!-- Product Image End -->
                    <!-- Product Content Start -->
                    <div class="pro-content">
                        <div class="pro-info">
                            <h4><a href="#"><?php echo html_escape($x->Nama) ?></a></h4>
                            <p><span class="price">Rp. <?php echo html_escape(number_format($x->Harga)) ?></span><br>Stok <?php echo number_format($x->Stok) ?></p>
                            <div class="label-product l_sale">/ <?php echo html_escape($x->Satuan) ?></span></div>
                        </div>
                        <div class="pro-actions">
                            <div class="actions-primary">
                                <?php if ($this->session->userdata('logged_user') == TRUE) : ?>
                                    <a href="javascript:void(0)" onclick="add_cart('<?php echo html_escape($x->ID) ?>')" title="Add to Cart"> + Add To Cart</a>
                                <?php endif; ?>
                                <?php if ($this->session->userdata('logged_user') != TRUE) : ?>
                                    <a href="<?php echo site_url('redirect-login'); ?>" title="Add to Cart"> + Add To Cart</a>
                                <?php endif; ?>
                            </div>
                            <div class="actions-secondary">
                                <a href="#" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To Compare</span></a>
                                <a href="#" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to WishList</span></a>
                            </div>
                        </div>
                    </div>
                    <!-- Product Content End -->
                </div>
                <!-- Single Product End -->
            <?php } ?>
        </div>
        <!-- Hot Deal Product Active End -->

    </div>
    <!-- Container End -->
</div>
<!-- Hot Deal Products End Here -->
<!-- Hot Deal Products End Here -->

<!-- Big Banner Start Here -->
<div class="big-banner mt-100 pb-85 mt-sm-60 pb-sm-45">
    <div class="container banner-2">
        <div class="banner-box">
            <div class="col-img">
                <a href="#"><img src="<?php echo base_url(); ?>assets/truemart/img/blog/psembako.jpg" alt="banner 3"></a>
            </div>
            <div class="col-img">
                <a href="#"><img src="<?php echo base_url(); ?>assets/truemart/img/blog/telurdaging.jpg" alt="banner 3"></a>
            </div>
        </div>
        <div class="banner-box">
            <div class="col-img">
                <a href="#"><img src="<?php echo base_url(); ?>assets/truemart/img/blog/promo.jpg" alt="banner 3"></a>
            </div>
        </div>
        <div class="banner-box">
            <div class="col-img">
                <a href="#"><img src="<?php echo base_url(); ?>assets/truemart/img/blog/bumbu.jpg" alt="banner 3"></a>
            </div>
            <div class="col-img">
                <a href="#"><img src="<?php echo base_url(); ?>assets/truemart/img/blog/ikan.jpg" alt="banner 3"></a>
            </div>
        </div>
        <div class="banner-box">
            <div class="col-img">
                <a href="#"><img src="<?php echo base_url(); ?>assets/truemart/img/blog/promo.jpg" alt="banner 3"></a>
            </div>
        </div>
        <div class="banner-box">
            <div class="col-img">
                <a href="#"><img src="<?php echo base_url(); ?>assets/truemart/img/blog/buah.jpg" alt="banner 3"></a>
            </div>
            <div class="col-img">
                <a href="#"><img src="<?php echo base_url(); ?>assets/truemart/img/blog/sayur.jpg" alt="banner 3"></a>
            </div>
        </div>
    </div>
    <!-- Container End -->
</div>
<!-- Big Banner End Here -->
<!-- Arrivals Products Area Start Here -->
<div class="arrivals-product pb-85 pb-sm-45">
    <div class="container">
        <div class="main-product-tab-area">
            <div class="tab-menu mb-25">
                <div class="section-ttitle">
                    <h2>Semua Produk</h2>
                </div>
                <!-- Nav tabs -->
                <ul class="nav tabs-area" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#fshion">Fashion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#beauty">Beauty</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#electronics">Sport/Outdoor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#kids">Living</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#beauty">Food</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#kids">Baby/Kids</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#electronics">Electronics </a>
                    </li>
                </ul>

            </div>

            <!-- Tab Contetn Start -->
            <div class="tab-content">
                <div id="fshion" class="tab-pane fade">
                    <!-- Arrivals Product Activation Start Here -->
                    <div class="electronics-pro-active owl-carousel">
                        <!-- Double Product Start -->
                        <div class="double-product">
                            <!-- Single Product Start -->
                            <div class="single-product">
                                <!-- Product Image Start -->
                                <div class="pro-img">
                                    <a href="product.html">
                                        <img class="primary-img" src="<?php echo base_url(); ?>assets/truemart/img/products/1.jpg" alt="single-product">
                                        <img class="secondary-img" src="<?php echo base_url(); ?>assets/truemart/img/products/2.jpg" alt="single-product">
                                    </a>
                                    <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                                </div>
                                <!-- Product Image End -->
                                <!-- Product Content Start -->
                                <div class="pro-content">
                                    <div class="pro-info">
                                        <h4><a href="product.html">Work Lamp Silver Proin</a></h4>
                                        <p><span class="price">$320.45</span><del class="prev-price">$400.50</del></p>
                                        <div class="label-product l_sale">30<span class="symbol-percent">%</span></div>
                                    </div>
                                    <div class="pro-actions">
                                        <div class="actions-primary">
                                            <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                                        </div>
                                        <div class="actions-secondary">
                                            <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To Compare</span></a>
                                            <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to WishList</span></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Content End -->
                                <span class="sticker-new">new</span>
                            </div>
                            <!-- Single Product End -->
                            <!-- Single Product Start -->
                            <div class="single-product">
                                <!-- Product Image Start -->
                                <div class="pro-img">
                                    <a href="product.html">
                                        <img class="primary-img" src="<?php echo base_url(); ?>assets/truemart/img/products/3.jpg" alt="single-product">
                                        <img class="secondary-img" src="<?php echo base_url(); ?>assets/truemart/img/products/1.jpg" alt="single-product">
                                    </a>
                                    <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                                </div>
                                <!-- Product Image End -->
                                <!-- Product Content Start -->
                                <div class="pro-content">
                                    <div class="pro-info">
                                        <h4><a href="product.html">Gpoly and Bark Eames Style</a></h4>
                                        <p><span class="price">$150.30</span><del class="prev-price">$175.50</del></p>
                                        <div class="label-product l_sale">10<span class="symbol-percent">%</span></div>
                                    </div>
                                    <div class="pro-actions">
                                        <div class="actions-primary">
                                            <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                                        </div>
                                        <div class="actions-secondary">
                                            <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To Compare</span></a>
                                            <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to WishList</span></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Content End -->
                                <span class="sticker-new">new</span>
                            </div>
                            <!-- Single Product End -->
                        </div>
                        <!-- Double Product End -->
                        <!-- Double Product Start -->
                        <div class="double-product">
                            <!-- Single Product Start -->
                            <div class="single-product">
                                <!-- Product Image Start -->
                                <div class="pro-img">
                                    <a href="product.html">
                                        <img class="primary-img" src="<?php echo base_url(); ?>assets/truemart/img/products/5.jpg" alt="single-product">
                                        <img class="secondary-img" src="<?php echo base_url(); ?>assets/truemart/img/products/6.jpg" alt="single-product">
                                    </a>
                                    <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                                </div>
                                <!-- Product Image End -->
                                <!-- Product Content Start -->
                                <div class="pro-content">
                                    <div class="pro-info">
                                        <h4><a href="product.html">Poly and Bark Vortex Side</a></h4>
                                        <p><span class="price">$84.45</span><del class="prev-price">$105.50</del></p>
                                        <div class="label-product l_sale">20<span class="symbol-percent">%</span></div>
                                    </div>
                                    <div class="pro-actions">
                                        <div class="actions-primary">
                                            <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                                        </div>
                                        <div class="actions-secondary">
                                            <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To Compare</span></a>
                                            <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to WishList</span></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Content End -->
                                <span class="sticker-new">new</span>
                            </div>
                            <!-- Single Product End -->
                            <!-- Single Product Start -->
                            <div class="single-product">
                                <!-- Product Image Start -->
                                <div class="pro-img">
                                    <a href="product.html">
                                        <img class="primary-img" src="<?php echo base_url(); ?>assets/truemart/img/products/8.jpg" alt="single-product">
                                        <img class="secondary-img" src="<?php echo base_url(); ?>assets/truemart/img/products/9.jpg" alt="single-product">
                                    </a>
                                    <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                                </div>
                                <!-- Product Image End -->
                                <!-- Product Content Start -->
                                <div class="pro-content">
                                    <div class="pro-info">
                                        <h4><a href="product.html">Eames and Bark Style</a></h4>
                                        <p><span class="price">$180.45</span><del class="prev-price">$200.50</del></p>
                                        <div class="label-product l_sale">18<span class="symbol-percent">%</span></div>
                                    </div>
                                    <div class="pro-actions">
                                        <div class="actions-primary">
                                            <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                                        </div>
                                        <div class="actions-secondary">
                                            <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To Compare</span></a>
                                            <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to WishList</span></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Content End -->
                                <span class="sticker-new">new</span>
                            </div>
                            <!-- Single Product End -->
                        </div>
                        <!-- Double Product End -->
                        <!-- Double Product Start -->
                        <div class="double-product">
                            <!-- Single Product Start -->
                            <div class="single-product">
                                <!-- Product Image Start -->
                                <div class="pro-img">
                                    <a href="product.html">
                                        <img class="primary-img" src="<?php echo base_url(); ?>assets/truemart/img/products/11.jpg" alt="single-product">
                                        <img class="secondary-img" src="<?php echo base_url(); ?>assets/truemart/img/products/12.jpg" alt="single-product">
                                    </a>
                                    <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                                </div>
                                <!-- Product Image End -->
                                <!-- Product Content Start -->
                                <div class="pro-content">
                                    <div class="pro-info">
                                        <h4><a href="product.html">Eames and Vortex Side</a></h4>
                                        <p><span class="price">$160.45</span><del class="prev-price">$190.50</del></p>
                                        <div class="label-product l_sale">12<span class="symbol-percent">%</span></div>
                                    </div>
                                    <div class="pro-actions">
                                        <div class="actions-primary">
                                            <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                                        </div>
                                        <div class="actions-secondary">
                                            <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To Compare</span></a>
                                            <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to WishList</span></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Content End -->
                                <span class="sticker-new">new</span>
                            </div>
                            <!-- Single Product End -->
                            <!-- Single Product Start -->
                            <div class="single-product">
                                <!-- Product Image Start -->
                                <div class="pro-img">
                                    <a href="product.html">
                                        <img class="primary-img" src="<?php echo base_url(); ?>assets/truemart/img/products/15.jpg" alt="single-product">
                                        <img class="secondary-img" src="<?php echo base_url(); ?>assets/truemart/img/products/16.jpg" alt="single-product">
                                    </a>
                                    <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                                </div>
                                <!-- Product Image End -->
                                <!-- Product Content Start -->
                                <div class="pro-content">
                                    <div class="pro-info">
                                        <h4><a href="product.html">Bark Vortex Side Eames</a></h4>
                                        <p><span class="price">$84.45</span><del class="prev-price">$105.50</del></p>
                                        <div class="label-product l_sale">20<span class="symbol-percent">%</span></div>
                                    </div>
                                    <div class="pro-actions">
                                        <div class="actions-primary">
                                            <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                                        </div>
                                        <div class="actions-secondary">
                                            <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To Compare</span></a>
                                            <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to WishList</span></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Content End -->
                                <span class="sticker-new">new</span>
                            </div>
                            <!-- Single Product End -->
                        </div>
                        <!-- Double Product End -->
                        <!-- Double Product Start -->
                        <div class="double-product">
                            <!-- Single Product Start -->
                            <div class="single-product">
                                <!-- Product Image Start -->
                                <div class="pro-img">
                                    <a href="product.html">
                                        <img class="primary-img" src="<?php echo base_url(); ?>assets/truemart/img/products/1.jpg" alt="single-product">
                                        <img class="secondary-img" src="<?php echo base_url(); ?>assets/truemart/img/products/14.jpg" alt="single-product">
                                    </a>
                                    <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                                </div>
                                <!-- Product Image End -->
                                <!-- Product Content Start -->
                                <div class="pro-content">
                                    <div class="pro-info">
                                        <h4><a href="product.html">Poly and Bark Vortex Side</a></h4>
                                        <p><span class="price">$84.45</span><del class="prev-price">$105.50</del></p>
                                        <div class="label-product l_sale">20<span class="symbol-percent">%</span></div>
                                    </div>
                                    <div class="pro-actions">
                                        <div class="actions-primary">
                                            <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                                        </div>
                                        <div class="actions-secondary">
                                            <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To Compare</span></a>
                                            <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to WishList</span></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Content End -->
                                <span class="sticker-new">new</span>
                            </div>
                            <!-- Single Product End -->
                            <!-- Single Product Start -->
                            <div class="single-product">
                                <!-- Product Image Start -->
                                <div class="pro-img">
                                    <a href="product.html">
                                        <img class="primary-img" src="<?php echo base_url(); ?>assets/truemart/img/products/1.jpg" alt="single-product">
                                        <img class="secondary-img" src="<?php echo base_url(); ?>assets/truemart/img/products/7.jpg" alt="single-product">
                                    </a>
                                    <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                                </div>
                                <!-- Product Image End -->
                                <!-- Product Content Start -->
                                <div class="pro-content">
                                    <div class="pro-info">
                                        <h4><a href="product.html">Poly and Bark Vortex Side</a></h4>
                                        <p><span class="price">$84.45</span><del class="prev-price">$105.50</del></p>
                                        <div class="label-product l_sale">20<span class="symbol-percent">%</span></div>
                                    </div>
                                    <div class="pro-actions">
                                        <div class="actions-primary">
                                            <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                                        </div>
                                        <div class="actions-secondary">
                                            <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To Compare</span></a>
                                            <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to WishList</span></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Content End -->
                                <span class="sticker-new">new</span>
                            </div>
                            <!-- Single Product End -->
                        </div>
                        <!-- Double Product End -->
                    </div>
                    <!-- Arrivals Product Activation End Here -->
                </div>
                <!-- #fshion End Here -->
                <div id="kids" class="tab-pane fade show active">
                    <!-- Arrivals Product Activation Start Here -->
                    <div class="electronics-pro-active owl-carousel">
                        <!-- Double Product Start -->
                        <div class="double-product">
                            <!-- Single Product Start -->
                            <div class="single-product">
                                <!-- Product Image Start -->
                                <div class="pro-img">
                                    <a href="product.html">
                                        <img class="primary-img" src="<?php echo base_url(); ?>assets/truemart/img/products/42.jpg" alt="single-product">
                                        <img class="secondary-img" src="<?php echo base_url(); ?>assets/truemart/img/products/43.jpg" alt="single-product">
                                    </a>
                                    <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                                </div>
                                <!-- Product Image End -->
                                <!-- Product Content Start -->
                                <div class="pro-content">
                                    <div class="pro-info">
                                        <h4><a href="product.html">Utensils and Knives Block</a></h4>
                                        <p><span class="price">$84.45</span><del class="prev-price">$105.50</del></p>
                                        <div class="label-product l_sale">20<span class="symbol-percent">%</span></div>
                                    </div>
                                    <div class="pro-actions">
                                        <div class="actions-primary">
                                            <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                                        </div>
                                        <div class="actions-secondary">
                                            <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To Compare</span></a>
                                            <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to WishList</span></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Content End -->
                                <span class="sticker-new">new</span>
                            </div>
                            <!-- Single Product End -->
                            <!-- Single Product Start -->
                            <div class="single-product">
                                <!-- Product Image Start -->
                                <div class="pro-img">
                                    <a href="product.html">
                                        <img class="primary-img" src="<?php echo base_url(); ?>assets/truemart/img/products/40.jpg" alt="single-product">
                                        <img class="secondary-img" src="<?php echo base_url(); ?>assets/truemart/img/products/41.jpg" alt="single-product">
                                    </a>
                                    <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                                </div>
                                <!-- Product Image End -->
                                <!-- Product Content Start -->
                                <div class="pro-content">
                                    <div class="pro-info">
                                        <h4><a href="product.html">Terra Xpress HE Cooking </a></h4>
                                        <p><span class="price">$84.45</span><del class="prev-price">$300.50</del></p>
                                        <div class="label-product l_sale">25<span class="symbol-percent">%</span></div>
                                    </div>
                                    <div class="pro-actions">
                                        <div class="actions-primary">
                                            <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                                        </div>
                                        <div class="actions-secondary">
                                            <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To Compare</span></a>
                                            <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to WishList</span></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Content End -->
                                <span class="sticker-new">new</span>
                            </div>
                            <!-- Single Product End -->
                        </div>
                        <!-- Double Product End -->
                        <!-- Double Product Start -->
                        <div class="double-product">
                            <!-- Single Product Start -->
                            <div class="single-product">
                                <!-- Product Image Start -->
                                <div class="pro-img">
                                    <a href="product.html">
                                        <img class="primary-img" src="<?php echo base_url(); ?>assets/truemart/img/products/39.jpg" alt="single-product">
                                        <img class="secondary-img" src="<?php echo base_url(); ?>assets/truemart/img/products/38.jpg" alt="single-product">
                                    </a>
                                    <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                                </div>
                                <!-- Product Image End -->
                                <!-- Product Content Start -->
                                <div class="pro-content">
                                    <div class="pro-info">
                                        <h4><a href="product.html">Robert Welch Knife Block</a></h4>
                                        <p><span class="price">$100.45</span><del class="prev-price">$150.50</del></p>
                                        <div class="label-product l_sale">30<span class="symbol-percent">%</span></div>
                                    </div>
                                    <div class="pro-actions">
                                        <div class="actions-primary">
                                            <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                                        </div>
                                        <div class="actions-secondary">
                                            <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To Compare</span></a>
                                            <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to WishList</span></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Content End -->
                                <span class="sticker-new">new</span>
                            </div>
                            <!-- Single Product End -->
                            <!-- Single Product Start -->
                            <div class="single-product">
                                <!-- Product Image Start -->
                                <div class="pro-img">
                                    <a href="product.html">
                                        <img class="primary-img" src="<?php echo base_url(); ?>assets/truemart/img/products/36.jpg" alt="single-product">
                                        <img class="secondary-img" src="<?php echo base_url(); ?>assets/truemart/img/products/37.jpg" alt="single-product">
                                    </a>
                                    <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                                </div>
                                <!-- Product Image End -->
                                <!-- Product Content Start -->
                                <div class="pro-content">
                                    <div class="pro-info">
                                        <h4><a href="product.html">Poly and Bark Vortex Side</a></h4>
                                        <p><span class="price">$90.50</span><del class="prev-price">$120.50</del></p>
                                        <div class="label-product l_sale">15<span class="symbol-percent">%</span></div>
                                    </div>
                                    <div class="pro-actions">
                                        <div class="actions-primary">
                                            <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                                        </div>
                                        <div class="actions-secondary">
                                            <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To Compare</span></a>
                                            <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to WishList</span></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Content End -->
                                <span class="sticker-new">new</span>
                            </div>
                            <!-- Single Product End -->
                        </div>
                        <!-- Double Product End -->
                        <!-- Double Product Start -->
                        <div class="double-product">
                            <!-- Single Product Start -->
                            <div class="single-product">
                                <!-- Product Image Start -->
                                <div class="pro-img">
                                    <a href="product.html">
                                        <img class="primary-img" src="<?php echo base_url(); ?>assets/truemart/img/products/1.jpg" alt="single-product">
                                        <img class="secondary-img" src="<?php echo base_url(); ?>assets/truemart/img/products/36.jpg" alt="single-product">
                                    </a>
                                    <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                                </div>
                                <!-- Product Image End -->
                                <!-- Product Content Start -->
                                <div class="pro-content">
                                    <div class="pro-info">
                                        <h4><a href="product.html">Bark and Vortex Side</a></h4>
                                        <p><span class="price">$69.20</span><del class="prev-price">$145.50</del></p>
                                        <div class="label-product l_sale">20<span class="symbol-percent">%</span></div>
                                    </div>
                                    <div class="pro-actions">
                                        <div class="actions-primary">
                                            <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                                        </div>
                                        <div class="actions-secondary">
                                            <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To Compare</span></a>
                                            <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to WishList</span></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Content End -->
                                <span class="sticker-new">new</span>
                            </div>
                            <!-- Single Product End -->
                            <!-- Single Product Start -->
                            <div class="single-product">
                                <!-- Product Image Start -->
                                <div class="pro-img">
                                    <a href="product.html">
                                        <img class="primary-img" src="<?php echo base_url(); ?>assets/truemart/img/products/34.jpg" alt="single-product">
                                        <img class="secondary-img" src="<?php echo base_url(); ?>assets/truemart/img/products/1.jpg" alt="single-product">
                                    </a>
                                    <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                                </div>
                                <!-- Product Image End -->
                                <!-- Product Content Start -->
                                <div class="pro-content">
                                    <div class="pro-info">
                                        <h4><a href="product.html">Compary and Bark Vortex Shewe</a></h4>
                                        <p><span class="price">$84.45</span><del class="prev-price">$105.50</del></p>
                                        <div class="label-product l_sale">20<span class="symbol-percent">%</span></div>
                                    </div>
                                    <div class="pro-actions">
                                        <div class="actions-primary">
                                            <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                                        </div>
                                        <div class="actions-secondary">
                                            <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To Compare</span></a>
                                            <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to WishList</span></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Content End -->
                                <span class="sticker-new">new</span>
                            </div>
                            <!-- Single Product End -->
                        </div>
                        <!-- Double Product End -->
                        <!-- Double Product Start -->
                        <div class="double-product">
                            <!-- Single Product Start -->
                            <div class="single-product">
                                <!-- Product Image Start -->
                                <div class="pro-img">
                                    <a href="product.html">
                                        <img class="primary-img" src="<?php echo base_url(); ?>assets/truemart/img/products/32.jpg" alt="single-product">
                                        <img class="secondary-img" src="<?php echo base_url(); ?>assets/truemart/img/products/33.jpg" alt="single-product">
                                    </a>
                                    <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                                </div>
                                <!-- Product Image End -->
                                <!-- Product Content Start -->
                                <div class="pro-content">
                                    <div class="pro-info">
                                        <h4><a href="product.html">kallery kids weare</a></h4>
                                        <p><span class="price">$84.45</span><del class="prev-price">$105.50</del></p>
                                        <div class="label-product l_sale">20<span class="symbol-percent">%</span></div>
                                    </div>
                                    <div class="pro-actions">
                                        <div class="actions-primary">
                                            <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                                        </div>
                                        <div class="actions-secondary">
                                            <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To Compare</span></a>
                                            <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to WishList</span></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Content End -->
                                <span class="sticker-new">new</span>
                            </div>
                            <!-- Single Product End -->
                            <!-- Single Product Start -->
                            <div class="single-product">
                                <!-- Product Image Start -->
                                <div class="pro-img">
                                    <a href="product.html">
                                        <img class="primary-img" src="<?php echo base_url(); ?>assets/truemart/img/products/1.jpg" alt="single-product">
                                        <img class="secondary-img" src="<?php echo base_url(); ?>assets/truemart/img/products/7.jpg" alt="single-product">
                                    </a>
                                    <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                                </div>
                                <!-- Product Image End -->
                                <!-- Product Content Start -->
                                <div class="pro-content">
                                    <div class="pro-info">
                                        <h4><a href="product.html">Poly and Bark Vortex Side</a></h4>
                                        <p><span class="price">$84.45</span><del class="prev-price">$105.50</del></p>
                                        <div class="label-product l_sale">20<span class="symbol-percent">%</span></div>
                                    </div>
                                    <div class="pro-actions">
                                        <div class="actions-primary">
                                            <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                                        </div>
                                        <div class="actions-secondary">
                                            <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To Compare</span></a>
                                            <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to WishList</span></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Content End -->
                                <span class="sticker-new">new</span>
                            </div>
                            <!-- Single Product End -->
                        </div>
                        <!-- Double Product End -->
                    </div>
                    <!-- Arrivals Product Activation End Here -->
                </div>
                <!-- #fshion End Here -->
                <div id="beauty" class="tab-pane fade">
                    <!-- Arrivals Product Activation Start Here -->
                    <div class="electronics-pro-active owl-carousel">
                        <!-- Double Product Start -->
                        <div class="double-product">
                            <!-- Single Product Start -->
                            <div class="single-product">
                                <!-- Product Image Start -->
                                <div class="pro-img">
                                    <a href="product.html">
                                        <img class="primary-img" src="<?php echo base_url(); ?>assets/truemart/img/products/43.jpg" alt="single-product">
                                        <img class="secondary-img" src="<?php echo base_url(); ?>assets/truemart/img/products/42.jpg" alt="single-product">
                                    </a>
                                    <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                                </div>
                                <!-- Product Image End -->
                                <!-- Product Content Start -->
                                <div class="pro-content">
                                    <div class="pro-info">
                                        <h4><a href="product.html">Poly and Bark Vortex Side</a></h4>
                                        <p><span class="price">$84.45</span><del class="prev-price">$105.50</del></p>
                                        <div class="label-product l_sale">20<span class="symbol-percent">%</span></div>
                                    </div>
                                    <div class="pro-actions">
                                        <div class="actions-primary">
                                            <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                                        </div>
                                        <div class="actions-secondary">
                                            <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To Compare</span></a>
                                            <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to WishList</span></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Content End -->
                                <span class="sticker-new">new</span>
                            </div>
                            <!-- Single Product End -->
                            <!-- Single Product Start -->
                            <div class="single-product">
                                <!-- Product Image Start -->
                                <div class="pro-img">
                                    <a href="product.html">
                                        <img class="primary-img" src="<?php echo base_url(); ?>assets/truemart/img/products/41.jpg" alt="single-product">
                                        <img class="secondary-img" src="<?php echo base_url(); ?>assets/truemart/img/products/39.jpg" alt="single-product">
                                    </a>
                                    <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                                </div>
                                <!-- Product Image End -->
                                <!-- Product Content Start -->
                                <div class="pro-content">
                                    <div class="pro-info">
                                        <h4><a href="product.html">Poly and Bark Vortex Side</a></h4>
                                        <p><span class="price">$84.45</span><del class="prev-price">$105.50</del></p>
                                        <div class="label-product l_sale">20<span class="symbol-percent">%</span></div>
                                    </div>
                                    <div class="pro-actions">
                                        <div class="actions-primary">
                                            <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                                        </div>
                                        <div class="actions-secondary">
                                            <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To Compare</span></a>
                                            <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to WishList</span></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Content End -->
                                <span class="sticker-new">new</span>
                            </div>
                            <!-- Single Product End -->
                        </div>
                        <!-- Double Product End -->
                        <!-- Double Product Start -->
                        <div class="double-product">
                            <!-- Single Product Start -->
                            <div class="single-product">
                                <!-- Product Image Start -->
                                <div class="pro-img">
                                    <a href="product.html">
                                        <img class="primary-img" src="<?php echo base_url(); ?>assets/truemart/img/products/5.jpg" alt="single-product">
                                        <img class="secondary-img" src="<?php echo base_url(); ?>assets/truemart/img/products/6.jpg" alt="single-product">
                                    </a>
                                    <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                                </div>
                                <!-- Product Image End -->
                                <!-- Product Content Start -->
                                <div class="pro-content">
                                    <div class="pro-info">
                                        <h4><a href="product.html">Poly and Bark Vortex Side</a></h4>
                                        <p><span class="price">$84.45</span><del class="prev-price">$105.50</del></p>
                                        <div class="label-product l_sale">20<span class="symbol-percent">%</span></div>
                                    </div>
                                    <div class="pro-actions">
                                        <div class="actions-primary">
                                            <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                                        </div>
                                        <div class="actions-secondary">
                                            <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To Compare</span></a>
                                            <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to WishList</span></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Content End -->
                                <span class="sticker-new">new</span>
                            </div>
                            <!-- Single Product End -->
                            <!-- Single Product Start -->
                            <div class="single-product">
                                <!-- Product Image Start -->
                                <div class="pro-img">
                                    <a href="product.html">
                                        <img class="primary-img" src="<?php echo base_url(); ?>assets/truemart/img/products/9.jpg" alt="single-product">
                                        <img class="secondary-img" src="<?php echo base_url(); ?>assets/truemart/img/products/10.jpg" alt="single-product">
                                    </a>
                                    <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                                </div>
                                <!-- Product Image End -->
                                <!-- Product Content Start -->
                                <div class="pro-content">
                                    <div class="pro-info">
                                        <h4><a href="product.html">Poly and Bark Vortex Side</a></h4>
                                        <p><span class="price">$84.45</span><del class="prev-price">$105.50</del></p>
                                        <div class="label-product l_sale">20<span class="symbol-percent">%</span></div>
                                    </div>
                                    <div class="pro-actions">
                                        <div class="actions-primary">
                                            <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                                        </div>
                                        <div class="actions-secondary">
                                            <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To Compare</span></a>
                                            <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to WishList</span></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Content End -->
                                <span class="sticker-new">new</span>
                            </div>
                            <!-- Single Product End -->
                        </div>
                        <!-- Double Product End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    $this->load->view('template/client/footer');
?>
<script src="<?php echo base_url(); ?>assets/AdminLTE/plugins/sweetalert2/sweetalert2.all.min.js"></script>

<script>
    $(document).ready(function() {
        count_cart();
    });

    function add_cart(id) {
        $('#form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        //Ajax Load data from ajax
        $.ajax({
            url: "<?php echo base_url('Client/Home/add_cart') ?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('[name="id"]').val(escapeHtml(data.ID));
                $('[name="kode"]').val(escapeHtml(data.Kode));
                $('[name="harga"]').val(escapeHtml(data.Harga));
                $('#modal_qty').modal('show'); // show bootstrap modal

            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(errorThrown);
            }
        });
    }

    function count_cart() {
        $.ajax({
            url: "<?php echo site_url('Client/Home/count_cart'); ?>",
            type: "GET",
            data: "",
            dataType: "json",
            cache: false,
            success: function(data) {
                $('#total-pro').text(data.jml);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(errorThrown);
            }
        });
    }

    function escapeHtml(unsafe) {
        return unsafe
            .replace(/&/g, "&amp;")
            .replace(/</g, "&lt;")
            .replace(/>/g, "&gt;")
            .replace(/"/g, "&quot;")
            .replace(/'/g, "&#039;");
    }
</script>
<script>
    $(function() {
        function reposition() {
            var modal = $(this),
                dialog = modal.find('.modal-dialog');
            modal.css('display', 'block');

            // Dividing by two centers the modal exactly, but dividing by three 
            // or four works better for larger screens.
            dialog.css("margin-top", Math.max(0, ($(window).height() - dialog.height()) / 2));
        }
        // Reposition when a modal is shown
        $('.modal').on('show.bs.modal', reposition);
        // Reposition when the window is resized
        $(window).on('resize', function() {
            $('.modal:visible').each(reposition);
        });
    });
</script>
<script>
    var tambah = document.getElementById("tambah");
    var kurang = document.getElementById("kurang");
    var hasil = document.getElementById("hasil");
    var no = 1;
    tambah.onclick = function() {
        hasil = no++;
        $('#hasil').val(hasil);
    }
    kurang.onclick = function() {
        if (hasil == '1') {

        } else {
            hasil = no--;
            $('#hasil').val(hasil);
        }
    }
</script>
</body>