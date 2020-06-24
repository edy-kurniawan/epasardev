<style>
    .card {
        z-index: 0;
        background-color: #ECEFF1;
        padding-bottom: 20px;
        margin-top: 90px;
        margin-bottom: 90px;
        border-radius: 10px
    }

    .top {
        padding-top: 40px;
        padding-left: 13% !important;
        padding-right: 13% !important
    }

    #progressbar {
        margin-bottom: 30px;
        overflow: hidden;
        color: #455A64;
        padding-left: 0px;
        margin-top: 30px
    }

    #progressbar li {
        list-style-type: none;
        font-size: 13px;
        width: 25%;
        float: left;
        position: relative;
        font-weight: 400
    }

    #progressbar .step0:before {
        font-family: FontAwesome;
        content: "\f10c";
        color: #fff
    }

    #progressbar li:before {
        width: 40px;
        height: 40px;
        line-height: 45px;
        display: block;
        font-size: 20px;
        background: #C5CAE9;
        border-radius: 50%;
        margin: auto;
        padding: 0px
    }

    #progressbar li:after {
        content: '';
        width: 100%;
        height: 12px;
        background: #C5CAE9;
        position: absolute;
        left: 0;
        top: 16px;
        z-index: -1
    }

    #progressbar li:last-child:after {
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px;
        position: absolute;
        left: -50%
    }

    #progressbar li:nth-child(2):after,
    #progressbar li:nth-child(3):after {
        left: -50%
    }

    #progressbar li:first-child:after {
        border-top-left-radius: 10px;
        border-bottom-left-radius: 10px;
        position: absolute;
        left: 50%
    }

    #progressbar li:last-child:after {
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px
    }

    #progressbar li:first-child:after {
        border-top-left-radius: 10px;
        border-bottom-left-radius: 10px
    }

    #progressbar li.active:before,
    #progressbar li.active:after {
        background: #e62e04
    }

    #progressbar li.active:before {
        font-family: FontAwesome;
        content: "\f00c"
    }

    .icon {
        width: 60px;
        height: 60px;
        margin-right: 15px
    }

    .icon-content {
        padding-bottom: 20px
    }

    @media screen and (max-width: 992px) {
        .icon-content {
            width: 50%
        }
    }
</style>
<?php 
    foreach($detail as $x){ 
?>
<div class="container">
    <div class="card bg-light">
        <div class="row d-flex justify-content-between px-3 top">
            <div class="d-flex">
                <h5>Menunggu Konfirmasi Pembayaran</h5>
            </div>
            <div class="d-flex flex-column text-sm-right">
                <p>Kode Transaksi : <span class="text-info font-weight-bold"><?php echo html_escape($x->Kode) ?></span></p>
                <p class="mb-0"><span>Silahkan Lakukan Pembayaran Sebesar</span></p>
                <p><span class="text-info font-weight-bold">Rp. <?php echo html_escape(number_format($x->Total)) ?></span></p>
                <p>Ke Rekening <span class="text-info font-weight-bold">Bank X</span></p>
                <p><span class="text-info font-weight-bold">AN : Epasar-dev / No Rek : XXXX-XX</span></p>
            </div>
        </div> <!-- Add class 'active' to progress -->
        <div class="row d-flex justify-content-center">
            <div class="col-12">
                <ul id="progressbar" class="text-center">
                    <li class="active step0"></li>
                    <li class="step0"></li>
                    <li class="step0"></li>
                    <li class="step0"></li>
                </ul>
            </div>
        </div>
        <div class="row justify-content-between top">
            <div class="row d-flex icon-content"> <img class="icon" src="https://i.imgur.com/9nnc9Et.png">
                <div class="d-flex flex-column">
                    <p class="font-weight-bold">Proses<br>Order</p>
                </div>
            </div>
            <div class="row d-flex icon-content"> <img class="icon" src="https://i.imgur.com/u1AzR7w.png">
                <div class="d-flex flex-column">
                    <p class="font-weight">Order<br>Disiapkan</p>
                </div>
            </div>
            <div class="row d-flex icon-content"> <img class="icon" src="https://i.imgur.com/TkPm63y.png">
                <div class="d-flex flex-column">
                    <p class="font-weight">Order Dikirim<br>/ Dapat Diambil</p>
                </div>
            </div>
            <div class="row d-flex icon-content"> <img class="icon" src="https://i.imgur.com/HdsziHP.png">
                <div class="d-flex flex-column">
                    <p class="font-weight">Order<br>Diterima</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- checkout-area start -->
<div class="checkout-area pb-100 pt-15 pb-sm-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="checkbox-form mb-sm-40">
                    <h3>Detail Pembelian</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="checkout-form-list mb-sm-30">
                                <label>Kode Transaksi</label>
                                <input type="text" placeholder="" value="<?php echo html_escape($x->Kode) ?>" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkout-form-list mb-sm-30">
                                <label>Atas Nama</label>
                                <input type="text" placeholder="" value="<?php echo html_escape($x->An) ?>" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkout-form-list mb-30">
                                <label>No telp</label>
                                <input type="text" placeholder="" value="<?php echo html_escape($x->Telp) ?>" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkout-form-list mb-30">
                                <label>Metode</label>
                                <input type="text" placeholder="" value="<?php echo html_escape($x->Metode) ?>" />
                            </div>
                        </div>
                        <div class="order-notes col-md-12">
                            <div class="checkout-form-list">
                                <label>Alamat</label>
                                <textarea id="" cols="30" rows="10"><?php echo html_escape($x->Alamat); echo ". "; echo html_escape($x->kel); echo ". "; echo html_escape($x->kec); echo ". "; echo html_escape($x->kab); echo ". "; echo html_escape($x->prov); ?></textarea>
                            </div>
                        </div>
                        <div class="order-notes col-md-12">
                            <div class="checkout-form-list">
                                <label>Catatan</label>
                                <textarea id="checkout-mess" cols="30" rows="10"><?php echo html_escape($x->Ket) ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            <div class="col-lg-6 col-md-6">
                <div class="your-order">
                    <h3>Daftar Belanja</h3>
                    <div class="your-order-table table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th class="product-name">Product</th>
                                    <th class="product-total">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                foreach($barang as $x){ 
                            ?>
                                <tr class="cart_item">
                                    <td class="product-name">
                                    <?php echo html_escape($x->Nama) ?> <span class="product-quantity"> × <?php echo html_escape($x->Jumlah) ?></span>
                                    </td>
                                    <td class="product-total">
                                        <span class="amount">Rp. <?php echo html_escape(number_format($x->subtotal)) ?></span>
                                    </td>
                                </tr>
                            <?php } ?>   
                            </tbody>
                            <tfoot>
                            <?php 
                                foreach($total as $x){ 
                            ?>
                                <tr class="cart-subtotal">
                                    <th>Subtotal</th>
                                    <td><span class="amount">Rp. <?php echo html_escape(number_format($x->Subtotal)) ?></span></td>
                                </tr>
                                <tr class="cart-subtotal">
                                    <th>Ongkir</th>
                                    <td><span class="amount">Rp. <?php echo html_escape(number_format($x->Ongkir)) ?></span></td>
                                </tr>
                                <tr class="order-total">
                                    <th>Total</th>
                                    <td><span class="total amount">Rp. <?php echo html_escape(number_format($x->Total)) ?></span>
                                    </td>
                                </tr>
                            <?php } ?> 
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$this->load->view('template/client/footer');
?>
<script>
    $(document).ready(function() {
        count_cart();
    });

    function count_cart() {
        $.ajax({
            url: "<?php echo site_url('Client/Profile/count_cart'); ?>",
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
</script>