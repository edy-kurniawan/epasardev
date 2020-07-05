<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>User</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <?php
  $this->load->view('template/css');
  ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
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
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <?php
    foreach ($user as $x) {
      if ($x->Jenis == "0") {
        $gender = "Laki-Laki";
      } elseif ($x->Jenis == "1") {
        $gender = "Perempuan";
      } else {
        $gender = "";
      }
    ?>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-3">

              <!-- Profile Image -->
              <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                  <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" src="<?php echo base_url(); ?>assets/AdminLTE/dist/img/user1-128x128.jpg" alt="User profile picture">
                  </div>

                  <h3 class="profile-username text-center"><?php echo html_escape($x->Refuser) ?></h3>

                  <p class="text-muted text-center"><?php echo html_escape($x->Nama) ?></p>

                  <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                      <center>Terakhir Online</center>
                    </li>
                  </ul>

                  <a href="#" class="btn btn-primary btn-block" id="btnStatus"><b><?php echo html_escape($x->Onlast) ?></b></a>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

              <!-- About Me Box -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Biodata</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <strong><i class="fas fa-envelope"></i></i> Email</strong>

                  <p class="text-muted">
                    <?php echo html_escape($x->Email) ?>
                  </p>

                  <hr>

                  <strong><i class="fas fa-calendar-alt"></i></i> Tgl Lahir</strong>

                  <p class="text-muted">
                    <?php echo html_escape($x->Tgllahir) ?>
                  </p>

                  <hr>

                  <strong><i class="fas fa-user"></i></i> Jenis Kelamin</strong>

                  <p class="text-muted">
                    <?php echo html_escape($gender) ?>
                  </p>

                  <hr>

                  <strong><i class="fas fa-phone-square"></i></i> Telp</strong>

                  <p class="text-muted">
                    <?php echo html_escape($x->Telp) ?>
                  </p>

                  <hr>

                  <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>

                  <p class="text-muted"><?php echo html_escape($x->Alamat);
                                        echo ". ";
                                        echo html_escape($x->kel);
                                        echo ". ";
                                        echo html_escape($x->kec);
                                        echo ". ";
                                        echo html_escape($x->kab);
                                        echo ". ";
                                        echo html_escape($x->prov); ?></p>

                  <hr>

                  <strong><i class="fas fa-file-signature mr-1"></i> Bergabung Sejak</strong>

                  <p class="text-muted">
                    <span class="tag tag-danger"><?php echo html_escape($x->Datei) ?></span>
                  </p>

                  <hr>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          <?php } ?>
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="active nav-link" href="#timeline" data-toggle="tab">History Transaksi</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Keranjang Belanja</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">

                  <div class="active tab-pane" id="timeline">
                    <table id="table" class="table table-bordered table-striped nowrap" width="100%">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Kode</th>
                          <th>Status</th>
                          <th>Metode</th>
                          <th>Total</th>
                          <th>Tanggal</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        foreach ($trx as $x) {
                          if ($x->Status == "0") {
                            $stts = "<span class='badge badge-success'>Menunggu Pembayaran</span>";
                          } elseif ($x->Status == "1") {
                            $stts = "<span class='badge badge-info'>Menunggu Konfirmasi Pembayaran</span>";
                          } elseif ($x->Status == "2") {
                            $stts = "<span class='badge badge-warning'>Pesanan Disiapkan</span>";
                          } elseif ($x->Status == "3") {
                            $stts = "<span class='badge badge-dark'>Pesanan Siap Dikirim / Diambil</span>";
                          } elseif ($x->Status == "4") {
                            $stts = "<span class='badge badge-primary'>Selesai</span>";
                          } elseif ($x->Status == "5") {
                            $stts = "<span class='badge badge-danger'>Dibatalkan</span>";
                          } else {
                            $stts = "";
                          }
                        ?>
                          <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo html_escape($x->Kode) ?></td>
                            <td><?php echo $stts ?></td>
                            <td><?php echo html_escape($x->Metode) ?></td>
                            <td>Rp. <?php echo html_escape(number_format($x->Total)) ?></td>
                            <td><?php echo html_escape($x->Datei) ?></td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <table id="table2" class="table table-bordered table-striped nowrap" width="100%">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama</th>
                          <th>Harga</th>
                          <th>Jumlah</th>
                          <th>Subtotal</th>
                          <th>Datei</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        foreach ($cart as $x) {

                        ?>
                          <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo html_escape($x->Nama) ?></td>
                            <td>Rp. <?php echo html_escape(number_format($x->Harga)) ?></td>
                            <td><?php echo html_escape($x->Jumlah) ?></td>
                            <td>Rp. <?php echo html_escape(number_format($x->Subtotal)) ?></td>
                            <td><?php echo html_escape($x->Datei) ?></td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  </div>

  <?php
  $this->load->view('template/footer');
  $this->load->view('template/js');
  ?>
  <script>
    var table;
    $(document).ready(function() {
      $('#table').DataTable({
        "processing": true,
        "responsive": true,
      });
      $('#table2').DataTable({
        "processing": true,
        "responsive": true,
      });
    });
  </script>
</body>

</html>