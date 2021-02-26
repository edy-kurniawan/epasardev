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
                    <h5>Menunggu Konfirmasi Ketersediaan Pesanan</h5>
                </div>
                <div class="d-flex flex-column text-sm-right">
                    <p class="mb-0"><span>Transaksi yang lebih dari <storng>jam 15.00WIB</storng></span></p>
                    <p class="mb-0"><span>akan diproses dihari berikutnya.</span></p>
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
            <div class="row justify-content-between top">
                <div class="row d-flex icon-content">
                    <div class="buttons-cart">
                            <a href="<?php echo site_url('transaksi'); ?>">Status Transaksi</a>
                    </div>
                </div>
            </div>
                <p>&nbsp;&nbsp;&nbsp; <span class="text-danger font-weight-bold"> *) Simpan Bukti Pembayaran</span></p>
        </div>
    <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5ef7ddd89e5f694422916f26/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
</body>
</html>