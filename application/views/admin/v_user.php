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
    <div class="wrapper">

        <?php
        $this->load->view('template/head');
        $this->load->view('template/sidebar');
        ?>

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Data User</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item active">User</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box bg-info">
                                <span class="info-box-icon"><i class="fas fa-users"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Jumlah User</span>
                                    <span class="info-box-number" id="jml">0</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box bg-success">
                                <span class="info-box-icon"><i class="far fa-thumbs-up"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">User Aktif</span>
                                    <span class="info-box-number" id="aktif">0</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box bg-warning">
                                <span class="info-box-icon"><i class="far fa-calendar-alt"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">User Nonaktif</span>
                                    <span class="info-box-number" id="non">0</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box bg-danger">
                                <span class="info-box-icon"><i class="fas fa-comments"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Transaksi Terbanyak</span>
                                    <span class="info-box-number" id="max">0</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->

                <section class="content">
                    <div class="row">
                        <?php 
                            $idform = 1;
                            foreach ($data->result() as $row) :
                            $idform++;
                            if($row->Jenis=="0"){ $gender = "Laki-Laki";}
                            elseif($row->Jenis=="1"){ $gender = "Perempuan";}
                            else{ $gender = "";}
                        ?>
                                                    
                            <!-- /.col -->
                            <div class="col-md-4">
                                <!-- Widget: user widget style 1 -->
                                <div class="card card-widget widget-user">
                                    <!-- Add the bg color to the header using any of the bg-* classes -->
                                    <div class="widget-user-header bg-info">
                                    <form id="<?php echo $idform ?>" action="<?php echo site_url('Admin/User/detail'); ?>" method="post">
                                    <input type="hidden" name="id" value="<?php echo html_escape($row->ID) ?>">
                                    <input type="hidden" name="kode" value="<?php echo html_escape($row->Refuser) ?>">
                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                    <a style="color:white"  href="javascript:;" onclick="document.getElementById('<?php echo $idform ?>').submit();"><h3 class="widget-user-username"><?php echo html_escape($row->Refuser); ?></h3></a>
                                        <a style="color:white"  href="javascript:;" onclick="document.getElementById('<?php echo $idform ?>').submit();"><h5 class="widget-user-desc"><?php echo html_escape($row->Nama); ?></h5></a>
                                    </form>
                                    </div>
                                    <div class="widget-user-image">
                                        <img class="img-circle elevation-2" src="<?php echo base_url(); ?>assets/AdminLTE/dist/img/user1-128x128.jpg" alt="User Avatar">
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <ul class="list-group list-group-unbordered col-sm-12">
                                                <li class="list-group-item">
                                                    <b>Email :</b> <a class="float-right"><?php echo html_escape($row->Email); ?></a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Telp</b> <a class="float-right"><?php echo html_escape($row->Telp); ?></a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Jenis Kelamin</b> <a class="float-right"><?php echo $gender; ?></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- /.row -->
                                    </div>
                                </div>
                                <!-- /.widget-user -->
                            </div>
                            <!-- /.col -->
                        <?php endforeach; ?>
                    </div>
                    <div class="row">
                        <div class="col">
                            <!--Tampilkan pagination-->
                            <?php echo $pagination; ?>
                        </div>
                    </div>
                </section>
            </div>
        </div>

        <?php
        $this->load->view('template/footer');
        $this->load->view('template/js');
        ?>

<script>
    $(document).ready(function() {
          get_count();
    });

    function get_count(){
      $.ajax({
          url : "<?php echo site_url('Admin/User/getcount'); ?>",
          type: "GET",
          data: "",
          dataType: "json",
          cache:false,
          success: function(data){
            $('#jml').text(data.jml);
            $('#aktif').text(data.aktif);
            $('#non').text(data.non);
            $('#max').text(data.pasif);
          },
          error: function (jqXHR, textStatus, errorThrown){
              console.log(errorThrown);
          }
        });
    }
</script>

</body>

</html>