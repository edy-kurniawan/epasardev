<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Epasar Dev | Transaksi</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 4 -->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/AdminLTE/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/AdminLTE/dist/css/adminlte.min.css">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
  
  <?php
    $this->load->view('template/head');
    $this->load->view('template/sidebar');
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail Pembelian</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Detail Pembelian</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <?php
        foreach ($trx as $x) {

    ?>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="callout callout-info">
              <h5><i class="fas fa-info"></i> Catatan Pembeli:</h5>
              <?php echo html_escape($x->Ket) ?>
            </div>


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> E-Pasar .Dev
                    <small class="float-right">Tanggal: <?php echo html_escape($x->Datei) ?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  Pembeli
                  <address>
                    <strong><?php echo html_escape($x->Refuser) ?></strong><br>
                    No Hp: <?php echo html_escape($x->hp) ?><br>
                    Email: <?php echo html_escape($x->Email) ?>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                <strong><?php echo html_escape($x->Metode) ?></strong>
                  <address>
                    <strong><?php echo html_escape($x->An) ?></strong><br>
                    No Hp: <?php echo html_escape($x->Telp) ?><br>
                    <?php if($x->kel!=null && $x->kec!=null){ ?>
                    Alamat: <?php echo html_escape($x->Alamat); echo ", "; echo html_escape($x->kel); echo ", "; echo html_escape($x->kec); echo ", "; echo html_escape($x->kab); echo ", "; echo html_escape($x->prov); ?>
                    <?php } ?>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Invoice #<?php echo html_escape($x->Kode) ?></b>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
    <?php } ?>
              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Jumlah</th>
                      <th>Nama</th>
                      <th>Harga</th>
                      <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach ($detail as $d) {
                    ?>
                    <tr>
                      <td><?php echo html_escape($d->Jumlah) ?></td>
                      <td><?php echo html_escape($d->Nama) ?></td>
                      <td>Rp. <?php echo html_escape(number_format($d->Harga)) ?></td>
                      <td>Rp. <?php echo html_escape(number_format($d->Subtotal)) ?></td>
                    </tr>
                        <?php } ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead">Metode Pembayaran:</p>
                  <img src="<?php echo base_url(); ?>assets/AdminLTE/dist/img/credit/visa.png" alt="Visa">
                  <img src="<?php echo base_url(); ?>assets/AdminLTE/dist/img/credit/mastercard.png" alt="Mastercard">
                
                <?php
                    foreach ($trx as $x) {

                ?>
                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                    Silahkan Lakukan Pembayaran Sebesar Rp. <b><?php echo html_escape(number_format($x->Total)) ?></b>
                        </br>
                    Ke Rekening Ke Rekening <b>Bank X <br> AN : Epasar-dev / No Rek : XXXX-XX</b>
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                
                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>Rp. <?php echo html_escape(number_format($x->Subtotal)) ?></td>
                      </tr>
                      <tr>
                        <th>Ongkir:</th>
                        <td>Rp. <?php echo html_escape(number_format($x->Ongkir)) ?></td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td><b>Rp. <?php echo html_escape(number_format($x->Total)) ?></b></td>
                      </tr>
                    </table>
                  </div>
                </div>
                    <?php } ?>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<script type="text/javascript"> 
  window.addEventListener("load", window.print());
</script>
</body>
</html>
