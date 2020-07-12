<link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/plugins/fontawesome-free/css/all.min.css') ?>">
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
<!-- Trending Products End Here -->
<div class="trendig-product pb-10 off-white-bg">
    <div class="container">
        <div class="trending-box">
            </br>
            <div class="title-box">
                <h2>Hasil pencarian "<?php echo $this->session->flashdata('keyword'); ?>"</h2>
            </div>
            <div class="product-list-box">
                <!-- Arrivals Product Activation Start Here -->
                <div class="trending-pro-active owl-carousel">
                    <?php
                    foreach ($search as $x) {
                    ?>
                        <!-- Single Product Start -->
                        <div class="single-product">
                            <!-- Product Image Start -->
                            <div class="pro-img">
                                <a href="#">
                                    <img class="primary-img" src="<?php echo base_url(); ?>assets/upload/barang/<?php echo html_escape($x->Img) ?>" alt="single-product">
                                    <img class="secondary-img" src="<?php echo base_url(); ?>assets/upload/barang/<?php echo html_escape($x->Img) ?>" alt="single-product">
                                </a>
                                <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                            </div>
                            <!-- Product Image End -->
                            <!-- Product Content Start -->
                            <div class="pro-content">
                                <div class="pro-info">
                                    <h4><a href="#"><?php echo html_escape($x->Nama) ?></a></h4>
                                    <p><span class="price">Rp. <?php echo html_escape(number_format($x->Harga)) ?></span></p>
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
                <!-- Arrivals Product Activation End Here -->
            </div>
            <!-- main-product-tab-area-->
        </div>
    </div>
    <!-- Container End -->
</div>
<!-- Trending Products End Here -->
<!-- jquery 3.2.1 -->
<script src="<?php echo base_url(); ?>assets/truemart/js/vendor/jquery-3.2.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $.ajax({
            url: "<?php echo site_url('Client/Profile/count_cart'); ?>",
            type: "GET",
            dataType: "json",
            cache: false,
            success: function(data) {
                $('#total-pro').text(data.jml);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(errorThrown);
            }
        });
    });

    function add_cart(id)
    {
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    //Ajax Load data from ajax
    $.ajax({
    url : "<?php echo base_url('Client/Home/add_cart')?>/" + id,
    type: "GET",
    dataType: "JSON",
    success: function(data)
    {
    $('[name="id"]').val(escapeHtml(data.ID));
    $('[name="kode"]').val(escapeHtml(data.Kode));
    $('[name="harga"]').val(escapeHtml(data.Harga));
    $('#modal_qty').modal('show'); // show bootstrap modal
    
    },
    error: function (jqXHR, textStatus , errorThrown)
    {
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