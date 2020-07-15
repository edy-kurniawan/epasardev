<link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/plugins/fontawesome-free/css/all.min.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/plugins/datatables-fixedheader/css/fixedHeader.bootstrap4.min.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') ?>">

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
            <form id="update_cart" class="needs-validation" role="form" action="<?php echo site_url('Client/Cart/update_cart'); ?>" method="post">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <input type="hidden" name="id">
                <input type="hidden" name="kode">
                <input type="hidden" name="harga">
                <p><center>
                <div class="btn-group">
                    <button type="button" id="kurang" class="btn btn-default"><i class="fas fa-minus"></i></button>
                    <input type="number" class="quantity" name="qty" id="hasil" min="1" value="1">
                    <button type="button" id="tambah" class="btn btn-default"><i class="fas fa-plus"></i></button>
                </div>
                </center></p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <button type="submit" id="btnSave" class="btn btn-primary">Ubah</button>
            </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

<div class="cart-main-area ptb-100 ptb-sm-60">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <center>
                    <h3>Keranjang Belanja</h3>
                </center>
                <table class="table table-bordered table-striped" id="table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th class="product-thumbnail">Gambar</th>
                            <th>Nama Barang</th>
                            <th>Deskripsi</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Subtotal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $idform = 1;
                        foreach ($cart as $x) {
                            $idform++;
                        ?>
                            <tr>
                                <td class="product-thumbnail"><img style="width:80px;" src="<?php echo base_url(); ?>assets/upload/barang/<?php echo html_escape($x->Img) ?>"></td>
                                <td><?php echo html_escape($x->Nama) ?></td>
                                <td><?php echo html_escape($x->Ket) ?></td>
                                <td><?php echo html_escape($x->Jumlah) ?></td>
                                <td>Rp. <?php echo html_escape(number_format($x->Harga)) ?> /<?php echo html_escape($x->Satuan) ?></td>
                                <td><strong>Rp. <?php echo html_escape(number_format($x->Subtotal)) ?></strong></td>
                                <td>
                                <a href="javascript:void(0)" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Edit" onclick="update_cart('<?php echo html_escape($x->ID) ?>')"><i class="fas fa-edit"></i></a>            
                                <a href="javascript:;" onclick="document.getElementById('<?php echo $idform ?>').submit();" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        </br>
        <div class="row">
            <!-- Cart Button Start -->
            <div class="col-md-8 col-sm-12">
                <div class="buttons-cart">
                    <a href="<?php echo site_url(); ?>">Lanjut Belanja</a>
                </div>
            </div>
            <!-- Cart Button Start -->
            <!-- Cart Totals Start -->
            <div class="col-md-4 col-sm-12">
                <div class="cart_totals float-md-right text-md-right">
                    <h2>Total Harga</h2>
                    <br />
                    <table class="float-md-right">
                        <tbody>
                            <tr class="order-total">
                                <th>Total</th>
                                <td>
                                <?php
                                    foreach ($total as $y) {
                                ?>
                                    <span class="amount">Rp. <?php echo html_escape(number_format($y->Subtotal)) ?></span>
                                <?php } ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="wc-proceed-to-checkout">
                        <a href="<?php echo site_url('order'); ?>">Proses Pesanan</a>
                    </div>
                    <br><?php echo $this->session->flashdata('message');?>
                </div>
            </div>
            <!-- Cart Totals End -->
        </div>
        <!-- Row End -->
    </div>
</div>


<!-- Footer Area Start Here -->
<footer class="off-white-bg2 pt-95 bdr-top pt-sm-55">
    <!-- Footer Top Start -->
    <div class="footer-top">
        <div class="container">
            <!-- Signup Newsletter Start -->
            <div class="row mb-60">
                <div class="col-xl-7 col-lg-7 ml-auto mr-auto col-md-8">
                    <div class="news-desc text-center mb-30">
                        <h3>Dapatkan Berita Terbaru</h3>
                        <p>Jadilah yang pertama tau berita terbaru</p>
                    </div>
                    <div class="newsletter-box">
                        <form action="#">
                            <input class="subscribe" placeholder="Masukan email anda" name="email" id="subscribe" type="text">
                            <button type="submit" class="submit">subscribe!</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Signup-Newsletter End -->
            <!-- Support Area Start Here -->
            <div class="support-area bdr-top">
                <div class="container">
                    <div class="d-flex flex-wrap text-center">
                        <div class="single-support">
                            <div class="support-icon">
                                <i class="lnr lnr-gift"></i>
                            </div>
                            <div class="support-desc">
                                <h6>Great Value</h6>
                                <span>Dapatkan banyak promo dan diskon menarik.</span>
                            </div>
                        </div>
                        <div class="single-support">
                            <div class="support-icon">
                                <i class="lnr lnr-rocket"></i>
                            </div>
                            <div class="support-desc">
                                <h6>Delivery Order</h6>
                                <span>Fitur antar pesanan ke beberapa lokasi yang ditentukan</span>
                            </div>
                        </div>
                        <div class="single-support">
                            <div class="support-icon">
                                <i class="lnr lnr-lock"></i>
                            </div>
                            <div class="support-desc">
                                <h6>Safe Payment</h6>
                                <span>Proses pembayaran yang dijamin aman</span>
                            </div>
                        </div>
                        <div class="single-support">
                            <div class="support-icon">
                                <i class="lnr lnr-enter-down"></i>
                            </div>
                            <div class="support-desc">
                                <h6>Shop Confidence</h6>
                                <span>Developer dan toko yang terpercaya</span>
                            </div>
                        </div>
                        <div class="single-support">
                            <div class="support-icon">
                                <i class="lnr lnr-users"></i>
                            </div>
                            <div class="support-desc">
                                <h6>24/7 Help Center</h6>
                                <span>Dukungan customer service 24 jam</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Container End -->
            </div>
            <!-- Support Area End Here -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Footer Top End -->
    <!-- Single Footer Start -->
    <center>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="single-footer mb-sm-40">
                <h3 class="footer-title">Tentang Kami</h3>
                <div class="footer-content">
                    <ul class="footer-list address-content">
                        <li><i class="lnr lnr-map-marker"></i> Alamat: Jl. Jend. Sudirman, Larangan Kulon, Kec. Sukoharjo, Kabupaten Sukoharjo</li>
                        <li><i class="lnr lnr-envelope"></i><a href="#"> Email: admin@epasar.it-cloud.net </a></li>
                        <li>
                            <i class="lnr lnr-phone-handset"></i> Telphone: (+0271) 123 456 789)
                        </li>
                    </ul>
                    <div class="payment mt-25 bdr-top pt-30">
                        <a href="#"><img class="img" src="<?php echo base_url(); ?>assets/truemart/img/payment/1.png" alt="payment-image"></a>
                    </div>
                </div>
            </div>
        </div>
    </center>
    <!-- Single Footer Start -->
    <!-- Footer Middle Start -->
    <div class="footer-middle text-center">
        <div class="container">
            <div class="footer-middle-content pt-20 pb-30">
                <ul class="social-footer">
                    <li><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="https://twitter.com/"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="https://plus.google.com/"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="https://www.linkedin.com/"><i class="fa fa-linkedin"></i></a></li>
                </ul>
                <ul>
                    </br>
                    <li><a href="#"><img src="<?php echo base_url(); ?>assets/truemart/img/icon/social-img1.png" alt="google play"></a>
                        <a href="#"><img src="<?php echo base_url(); ?>assets/truemart/img/icon/social-img2.png" alt="app store"></a></li>
                </ul>
            </div>
        </div>
        <!-- Container End -->
    </div>
    <!-- Footer Middle End -->
    <!-- Footer Bottom Start -->
    <div class="footer-bottom pb-30">
        <div class="container">

            <div class="copyright-text text-center">
                <p>Copyright © 2020 <a target="_blank" href="#"><b>E-Pasar</b></a> All Rights Reserved.</p>
            </div>
        </div>
        <!-- Container End -->
    </div>
    <!-- Footer Bottom End -->
</footer>
<!-- Footer Area End Here -->
<!-- jquery 3.2.1 -->
<script src="<?php echo base_url(); ?>assets/truemart/js/vendor/jquery-3.2.1.min.js"></script>
<!-- Countdown js -->
<script src="<?php echo base_url(); ?>assets/truemart/js/jquery.countdown.min.js"></script>
<!-- Mobile menu js -->
<script src="<?php echo base_url(); ?>assets/truemart/js/jquery.meanmenu.min.js"></script>
<!-- ScrollUp js -->
<script src="<?php echo base_url(); ?>assets/truemart/js/jquery.scrollUp.js"></script>
<!-- Nivo slider js -->
<script src="<?php echo base_url(); ?>assets/truemart/js/jquery.nivo.slider.js"></script>
<!-- Fancybox js -->
<script src="<?php echo base_url(); ?>assets/truemart/js/jquery.fancybox.min.js"></script>
<!-- Jquery nice select js -->
<script src="<?php echo base_url(); ?>assets/truemart/js/jquery.nice-select.min.js"></script>
<!-- Jquery ui price slider js -->
<script src="<?php echo base_url(); ?>assets/truemart/js/jquery-ui.min.js"></script>
<!-- Owl carousel -->
<script src="<?php echo base_url(); ?>assets/truemart/js/owl.carousel.min.js"></script>
<!-- Bootstrap popper js -->
<script src="<?php echo base_url(); ?>assets/truemart/js/popper.min.js"></script>
<!-- Bootstrap js -->
<script src="<?php echo base_url(); ?>assets/truemart/js/bootstrap.min.js"></script>
<!-- Plugin js -->
<script src="<?php echo base_url(); ?>assets/truemart/js/plugins.js"></script>
<!-- Main activaion js -->
<script src="<?php echo base_url(); ?>assets/truemart/js/main.js"></script>
<!-- Toastr -->
<script src="<?php echo base_url(); ?>assets/AdminLTE/plugins/toastr/toastr.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>assets/AdminLTE/plugins/moment/moment.min.js"></script>
<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/AdminLTE/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url(); ?>assets/AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/AdminLTE/plugins/datatables-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="<?php echo base_url(); ?>assets/AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script>
    $(document).ready(function() {
        count_cart(),
        $('#table').DataTable({
            "responsive": true,
        });
    });

    
    function update_cart(id)
    {
    $('#update_cart')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    //Ajax Load data from ajax
    $.ajax({
    url : "<?php echo base_url('Client/Cart/get_cart')?>/" + id,
    type: "GET",
    dataType: "JSON",
    success: function(data)
    {
    $('[name="id"]').val(data.ID);
    $('[name="kode"]').val(data.Kode);
    $('[name="harga"]').val(data.Harga);
    $('[name="qty"]').val(data.Jumlah);
    $('#modal_qty').modal('show'); // show bootstrap modal
    
    },
    error: function (jqXHR, textStatus , errorThrown)
    {
        console.log(errorThrown);
    }
    });
    }

    function count_cart(){
      $.ajax({
          url : "<?php echo site_url('Client/Home/count_cart'); ?>",
          type: "GET",
          data: "",
          dataType: "json",
          cache:false,
          success: function(data){
            $('#total-pro').text(data.jml);
          },
          error: function (jqXHR, textStatus, errorThrown){
              console.log(errorThrown);
          }
        });
    }
</script>
<script>
    $(function () {
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
    $(window).on('resize', function () {
    $('.modal:visible').each(reposition);
    });
    });
</script>
<script>
    var tambah = document.getElementById("tambah");
    var kurang = document.getElementById("kurang");
    var hasil  = document.getElementById("hasil");
    var no     = 1;
    tambah.onclick = function(){
    hasil= no++;
    $('#hasil').val(hasil);
    }
    kurang.onclick = function(){
        if(hasil=='1'){
            
        }else{    
            hasil= no--;
            $('#hasil').val(hasil);
        }
    }
</script>
</body>