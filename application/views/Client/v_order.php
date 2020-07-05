<!doctype html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Order</title>
    <!-- Favicons -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/truemart/img/favicon.ico">
    <!-- Fontawesome css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/truemart/css/font-awesome.min.css">
    <!-- Jquery ui price slider css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/truemart/css/jquery-ui.min.css">
    <!-- Meanmenu css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/truemart/css/meanmenu.min.css">
    <!-- Nivo slider css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/truemart/css/nivo-slider.css">
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/truemart/css/bootstrap.min.css">
    <!-- Custom css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/truemart/css/default.css">
    <!-- Main css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/truemart/style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/truemart/css/responsive.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/plugins/select2/css/select2.css') ?>">
    <style>
        body {
            color: #000;
            overflow-x: hidden;
            height: 100%;
            background-color: #ededed;
            background-repeat: no-repeat
        }

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
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script type='text/javascript' src='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js'></script>
    <script src="<?php echo base_url('assets/AdminLTE/plugins/select2/js/select2.full.min.js') ?>"></script>
    <script type='text/javascript'></script>
</head>

<body>
    <div class="container px-1 px-md-4 py-5 mx-auto">
        <div class="card bg-light">
            <div class="row d-flex justify-content-between px-3 top">
                <div class="d-flex">
                    <h5>Pilih Metode Pengambilan Barang</h5>
                </div>
                <div class="d-flex flex-column text-sm-right">
                    <p class="mb-0" id="date"><span>0</span></p>
                    <p>Kode Transaksi <span class="text-info font-weight-bold"><?php echo html_escape($kode) ?></span></p>
                    <?php 
                    foreach($total as $x){ 
                    ?>
                    <p>Subtotal : <span class="text-info font-weight-bold">Rp. <?php echo html_escape(number_format($x->Subtotal)) ?></span></p>
                    <?php } ?>
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

        <!-- Product Thumbnail Description Start -->
        <div class="thumnail-desc pb-100 pb-sm-60">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="main-thumb-desc nav tabs-area" role="tablist">
                            <li><a class="active" data-toggle="tab" href="#dtail">Ambil Di Tempat</a></li>
                            <li><a data-toggle="tab" href="#review">Diantar #1</a></li>
                            <li><a data-toggle="tab" href="#custom">Diantar #2</a></li>
                        </ul>
                        <!-- Product Thumbnail Tab Content Start -->
                        <div class="tab-content thumb-content border-default">
                            <div id="dtail" class="tab-pane fade show active">
                                <!-- Reviews Start -->
                                <div class="review border-default universal-padding">
                                    <div class="group-title">
                                        <h2>Barang diambil ditempat</h2>
                                    </div>
                                    <form method="POST" action="<?php echo site_url('Client/Order/ambil_order'); ?>">
                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                        <!-- /input-group -->
                                        <?php
                                        foreach ($user as $x) {
                                        ?>
                                            <strong>Atas Nama</strong>
                                            <div class="input-group mb-3">
                                                <input type="text" name="an" id="namaambil" value="<?php echo html_escape($x->Nama) ?>" placeholder="Nama Pengambil Barang" class="form-control rounded-0" required>
                                                <span class="input-group-append">
                                                    
                                                </span>
                                            </div>
                                            <strong>No Hp</strong>
                                            <div class="input-group mb-3">
                                                <input type="number" name="telp" id="noambil" maxlength="14" minlength="7" value="<?php echo html_escape($x->Telp) ?>" placeholder="Nomor Hp" class="form-control rounded-0" required>
                                                <span class="input-group-append">
                                                    
                                                </span>
                                            </div>
                                            <strong>Catatan Untuk Penjual</strong>
                                            <div class="input-group mb-3">
                                                <input type="text" name="ket" placeholder="Opsional" class="form-control rounded-0">
                                            </div>
                                            <div class="input-group mb-3">
                                                <strong><?php echo $this->session->flashdata('message');?></strong>
                                            </div>
                                        <?php } ?>
                                        <!-- /input-group -->
                                        <button type="submit" class="customer-btn">Lanjutkan</button>
                                    </form>
                                </div>
                                <!-- Reviews End -->
                            </div>
                            <div id="review" class="tab-pane fade">
                                <!-- Reviews Start -->
                                <div class="review border-default universal-padding">
                                    <div class="group-title">
                                        <h2>Antar ke alamat anda</h2>
                                    </div>
                                    <form method="POST" action="<?php echo site_url('Client/Order/deliv1_order'); ?>">
                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                        
                                        <strong>Atas Nama</strong>
                                        <div class="input-group mb-3">
                                            <?php
                                            foreach ($user as $x) {
                                            ?>
                                                <input type="text" name="nama" value="<?php echo html_escape($x->Nama) ?>" placeholder="Nama Penerima Barang" class="form-control rounded-0" required>
                                                <span class="input-group-append">
                                                    
                                                </span>
                                        </div>
                                        <strong>No Hp</strong>
                                        <div class="input-group mb-3">
                                            <input type="number" name="notelp" minlength="7" value="<?php echo html_escape($x->Telp) ?>" placeholder="Nomor Hp" class="form-control rounded-0" required>
                                            <span class="input-group-append">
                                                
                                            </span>
                                        </div>
                                        <strong>Alamat</strong>
                                        <div class="input-group mb-3">
                                            <textarea type="textarea" rows="3" name="alamat" id="alamat" class="form-control" disabled><?php echo html_escape($x->Alamat);
                                                                                                                                        echo ". ";
                                                                                                                                        echo html_escape($x->kel);
                                                                                                                                        echo ". ";
                                                                                                                                        echo html_escape($x->kec);
                                                                                                                                        echo ". ";
                                                                                                                                        echo html_escape($x->kab);
                                                                                                                                        echo ". ";
                                                                                                                                        echo html_escape($x->prov); ?></textarea>
                                        </div>
                                        <div class="" id="ongkir">
                                                
                                        </div>
                                        <strong>Catatan Untuk Penjual</strong>
                                            <div class="input-group mb-3">
                                                <input type="text" name="catatan" placeholder="Opsional" class="form-control rounded-0">
                                            </div>
                                    <?php } ?>
                                    <div class="" id="form-submit">
                                        <div class="col-md-12">

                                        </div>
                                    </div>

                                    </form>
                                </div>
                                <!-- Reviews End -->
                            </div>
                            <div id="custom" class="tab-pane fade">
                                <!-- Reviews Start -->
                                <div class="review border-default universal-padding">
                                    <div class="group-title">
                                        <h2>Antar ke alamat lain</h2>
                                    </div>
                                    <form method="POST" action="<?php echo site_url('Client/Order/deliv2_order'); ?>">
                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                         <strong>Atas Nama</strong>
                                        <div class="input-group mb-3">
                                            <?php
                                            foreach ($user as $x) {
                                            ?>
                                                <input type="text" name="atasnama" value="<?php echo html_escape($x->Nama) ?>" id="namakirim" placeholder="Nama Penerima Barang" class="form-control rounded-0" required>
                                        </div>
                                        <strong>No Hp</strong>
                                        <div class="input-group mb-3">
                                            <input type="number" name="nohp" id="nohp" minlength="7" value="<?php echo html_escape($x->Telp) ?>" placeholder="Nomor Hp" class="form-control rounded-0" required>
                                        </div>
                                        <label for="prov"><strong>Provinsi</strong></label>
                                        <div class="form-control">
                                            <select class="form-control select2" name="prov" id="prov" required>
                                                <?php foreach ($prov as $row) : ?>
                                                    <option value="<?php echo $row->id_prov; ?>"><?php echo $row->nama; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <label for="kab"><strong>Kota/Kabupaten</strong></label>
                                        <div class="form-control">
                                            <select class="form-control select2" id="kab" name="kab" required>
                                                <?php foreach ($kab as $row) : ?>
                                                    <option value="<?php echo $row->id_kab; ?>"><?php echo $row->nama; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <label for="kec"><strong>Kecamatan</strong></label>
                                        <div class="form-control">
                                            <select class="form-control select2" id="kec" name="kec" required>
                                                <option value="">Pilih Kecamatan</option>
                                                <?php foreach ($kec  as $row) : ?>
                                                    <option value="<?php echo $row->id_kec; ?>"><?php echo $row->nama; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <label for="kel"><strong>Kelurahan</strong></label>
                                        <div class="form-control">
                                            <select class="form-control select2" id="kel" name="kel" required>
                                                <option value="">Pilih Kelurahan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat"><strong>Alamat</strong></label>
                                            <input type="text" name="alamat2" placeholder="contoh: desa A Rt.00 Rw.00 Jl. Mawar No.00" class="form-control" id="alamat2" require>
                                        </div>
                                        <strong>Catatan Untuk Penjual</strong>
                                            <div class="input-group mb-3">
                                                <input type="text" name="ket" placeholder="Opsional" class="form-control rounded-0">
                                            </div>
                                        <div class="form-group">
                                            <p class="text-danger"><strong>*fitur delivery hanya tersedia dibeberapa wilayah tertentu</strong></p>
                                        </div>
                                    <?php } ?>
                                    <button type="submit" class="customer-btn">Lanjutkan</button>
                                    </form>
                                </div>
                                <!-- Reviews End -->
                            </div>
                        </div>
                        <!-- review end -->
                    </div>
                    <!-- Product Thumbnail Tab Content End -->
                </div>
                <script type="text/javascript">
                    $(document).ready(function() {
                        $.ajax({
                            url: "<?php echo base_url('Client/Order/verivy_kel') ?>",
                            type: "GET",
                            dataType: "JSON",
                            success: function(data) {

                                if (data.ongkir == null) {
                                    $('#form-submit div').html('<p class="text-danger"><strong>*lokasi anda tidak mendukung delivery order</strong></p>');
                                } else {
                                    $('#form-submit div').html('<button type="submit" class="customer-btn">Lanjutkan</button>');
                                    $('#ongkir').html('<div class="form-group"><label for="ongkir"><strong>Ongkir</strong></label><input type="text" name="ongkir" id="ongkir" value="Rp. '+ data.ongkir +'" class="form-control rounded-0" disabled></div>');
                                }

                            },
                            error: function(jqXHR, textStatus, errorThrown) {
                                alert('Error get data from ajax');
                            }
                        });
                    });
                </script>
                <script type="text/javascript">
                    $(document).ready(function() {
                        $('#kec').change(function() {
                            var id = $(this).val();
                            $.ajax({
                                url: "<?php echo base_url(); ?>Client/Order/get_kel",
                                method: "POST",
                                data: {
                                    '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
                                    "id": id
                                },
                                async: true,
                                dataType: 'json',
                                success: function(data) {

                                    var html = '';
                                    var i;
                                    for (i = 0; i < data.length; i++) {
                                        html += '<option value=' + data[i].id_kel + '>' + data[i].nama + " + ongkir Rp. " + data[i].ongkir + '</option>';
                                    }
                                    $('#kel').html(html);

                                }
                            });
                            return false;
                        });

                    });
                </script>
                <script type='text/javascript'>
                    var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                    var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
                    var date = new Date();
                    var day = date.getDate();
                    var month = date.getMonth();
                    var thisDay = date.getDay(),
                        thisDay = myDays[thisDay];
                    var yy = date.getYear();
                    var year = (yy < 1000) ? yy + 1900 : yy;
                    $('#date').text(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);
                </script>
</body>

</html>