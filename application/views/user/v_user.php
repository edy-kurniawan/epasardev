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
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Jumlah User</span>
                <span class="info-box-number" id="user">
                  0
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user-check"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">User Aktif</span>
                <span class="info-box-number" id="aktif">
                  0
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user-times"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">User Nonaktif</span>
                <span class="info-box-number" id="non">
                  0
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-user-clock"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">User Pasif</span>
                <span class="info-box-number" id="pasif">
                  0
                </span>
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
        <div class="col-12">
         <div class="card">
            <div class="card-header">
              <button class="btn btn-default " onclick="reload_table()" data-toggle="tooltip" data-placement="top" title="Reload Table"><i class="fas fa fa-sync"></i> Reload</button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="table" class="table table-bordered table-striped" cellspacing="0" width="100%">      
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Jenis Kelamin</th>
                            <th>Tgl Lahir</th>
                            <th>Alamat</th>
                            <th>Telp</th>
                            <th>Email</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody> 
                      </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
         </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
  </div>
</div>
<div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Large Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <section class="content">
      <div class="row">
        <div class="col-12">
         <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="table2" class="table table-bordered table-striped" cellspacing="0" width="100%">      
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jumalah</th>
                            <th>Subtotal</th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody> 
                      </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
         </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
  

  <<div class="modal fade" id="modal_form">
        <div class="modal-dialog modal-sm">
          <div class="modal-content bg-info">
            <div class="modal-header">
              <h4 class="modal-title">Detail</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
          <div class="box-body pad">
            <form  id="form" class="form-horizontal">
                <div class="form-body">      
                  <div class="form-group">
                    <label>Datei</label>
                      <input type="text" class="form-control" name="datei" disabled>
                      <i class="form-control-feedback"></i><span class="text-warning" ></span>
                  </div>     
                  <div class="form-group">
                    <label>Dateu</label>
                      <input type="text" class="form-control" name="dateu" disabled>
                      <i class="form-control-feedback"></i><span class="text-warning" ></span>
                  </div>         
              </div>
            </form>
          </div>
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    
  <?php
  $this->load->view('template/footer');
  $this->load->view('template/js');
  ?>
 
    <script type="text/javascript">
        var table;
        var table2;
        var tablemodal;
        var save_method;

        $(document).ready(function() {
          table = $('#table').DataTable({  
            "processing": true, 
            "responsive": true,

            "ajax": {
                "url": "<?php echo base_url('user/user/setView'); ?>",
                "type": "POST",
            },
            "columns": [

              { "data": "no" },  
              { "data": "kode" },  
              { "data": "nama" },
              { "data": "username" },
              { "data": "jenis" },
              { "data": "tgllahir" },
              { "data": "alamat" },  
              { "data": "telp" },
              { "data": "email" },
              { "data": "action" }
            ],
            "order": [[0, 'asc']]
          });
        });


    function cart(id){
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty();
    $('#modal-lg').modal('show'); // show bootstrap modal when complete loaded
    $('.modal-title').text('Detail Data Keranjang User');
          $.ajax({
            url : "<?php echo base_url('user/user/cart')?>/" +id,
            type: "POST",
            dataType: "JSON",
          })
             $(document).ready(function() {
          table2 = $('#table2').DataTable({  
            "processing": true, 
            "responsive": true,

            "ajax": {
                "url": "<?php echo base_url('user/user/cart'); ?>"+id,
                "type": "POST",
            },
            "columns": [

              { "data": "no" },  
              { "data": "nama" },  
              { "data": "jml" },
              { "data": "subtotal" }
            ],
            "order": [[0, 'asc']]
          });
        });
      
    
    }

    function info() {
      const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
        });
      Toast.fire({
        type: 'info',
        title: 'Table reloaded !'
      })
    }

    function reload_table()
    {
    table.ajax.reload(null,false); //reload datatable ajax
    info();
    }
    
    function edit_data(id)
    {
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    //Ajax Load data from ajax
    $.ajax({
    url : "<?php echo base_url('user/user/ajax_edit')?>/" + id,
    type: "GET",
    dataType: "JSON",
    success: function(data)
    {
    $('[name="datei"]').val(data.Datei);
    $('[name="dateu"]').val(data.Dateu);
    $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
    $('.modal-title').text('Detail Data'); // Set title to Bootstrap modal title
    
    },
    error: function (jqXHR, textStatus , errorThrown)
    {
    alert('Error get data from ajax');
    }
    });
    }

</script>

 <script type="text/javascript">
    $(document).ready(function() {
      $.ajax({
          url : "<?php echo site_url('user/user/getcount'); ?>",
          type: "POST",
          data: "",
          dataType: "json",
          cache:false,
          success: function(data){
            $('#user').text(data.jml);
            $('#aktif').text(data.aktif);
            $('#non').text(data.non);
            $('#pasif').text(data.pasif);
          },
          error: function (jqXHR, textStatus, errorThrown){
              console.log(errorThrown);
          }
        });

      });
  </script>

  </body>
</html>