<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>toko</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <?php
    $this->load->view('template/css');
  ?>
   <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/plugins/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') ?>">
  </head>

  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
  
  <?php
    $this->load->view('template/head');
    $this->load->view('template/sidebar');
  ?>

  <div class="modal fade" id="modal_form">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Large Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
          <div class="box-body pad">
            <form id="form" class="needs-validation" novalidate>
              <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
              <input type="hidden" name="id">
              <div class="form-row">
                <div class="col-md-3 mb-3">
                  <label for="validationCustom01">Kode</label>
                  <input type="text" class="form-control" name="kode" placeholder="Kode Toko" required>
                  <div class="invalid-feedback">
                    Masukan Kode !
                  </div>
                </div>
                <div class="col-md-5 mb-3">
                  <label for="validationCustom01">Nama</label>
                  <input type="text" class="form-control" name="nama" placeholder="Nama Toko" required>
                  <div class="invalid-feedback">
                    Masukan Nama !
                  </div>
                </div>
                <div class="col-md-4 mb-3">
                  <label for="validationCustom01">Pemilik</label>
                  <input type="text" class="form-control" name="pemilik" placeholder="Pemilik Toko" required>
                  <div class="invalid-feedback">
                    Masukan Pemilik !
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-4 mb-3">
                  <label for="validationCustom03">Lokasi</label>
                  <input type="text" class="form-control" name="lokasi" placeholder="Lokasi Toko" required>
                  <div class="invalid-feedback">
                    Masukan Lokasi !
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="validationCustom04">Telp</label>
                  <input type="text" class="form-control" onkeypress="return angka(event)" name="telp" placeholder="Telp" required>
                  <div class="invalid-feedback">
                    Masukan No Telp !
                  </div>
                </div>
                <div class="col-md-2 mb-3">
                  <label for="validationCustom05">Status</label>
                  <select name="status" class="form-control" required>
                      <option value="">-</option>
                      <option value="T">TRUE</option>
                      <option value="F">FALSE</option>                      
                      </select>
                  <div class="invalid-feedback">
                    Pilih Status !
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-3 mb-3">
                  <label for="validationCustom03">Buka</label>
                  <input  class="form-control datepicker" placeholder="" name="jambuka" required>
                  <div class="invalid-feedback">
                    Masukan Jam!
                  </div>
                </div>
                <div class="col-md-3 mb-3">
                  <label for="validationCustom04">Tutup</label>
                  <input  class="form-control datepicker" placeholder="" name="jamtutup" required>
                  <div class="invalid-feedback">
                    Masukan Jam!
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="validationCustom05">Ket</label>
                  <input type="text" class="form-control" placeholder="Keterangan" name="ket" >
                </div>
              </div>
          </div>
        </div>
          <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
            </div>
          </div>
          </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data Toko</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Toko</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-store-alt"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Jumlah Toko</span>
                <span class="info-box-number" id="toko">
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
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-thumbs-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Toko Aktif</span>
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
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-down"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Toko Nonaktif</span>
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
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-door-open"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Toko Buka</span>
                <span class="info-box-number">
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
              <button class="btn btn-info float-sm-right" onclick="add_toko()" data-toggle="tooltip" data-placement="top" title="Tambah Data"><span class="fas fa fa-plus"></span>Tambah</button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="table" class="table table-bordered table-striped" cellspacing="0" width="100%">      
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Pemilik</th>
                            <th>Lokasi</th>
                            <th>Telp</th>
                            <th>Status</th>
                            <th>Jam Buka</th>
                            <th>Jam Tutup</th>
                            <th>Ket</th>
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
    
  <?php
  $this->load->view('template/footer');
  $this->load->view('template/js');
  ?>
    <!-- DataTables -->
  <script src="<?php echo base_url(); ?>assets/AdminLTE/plugins/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script> 
  <!-- Bootstrap 4 -->
 
    <script type="text/javascript">
        var table;
        var tablemodal;
        var save_method;

        $(document).ready(function() {
          table = $('#table').DataTable({  
            "processing": true, 
            "responsive": true,

            "ajax": {
                "url": "<?php echo base_url('Admin/Toko/setView'); ?>",
                "type": "GET",
            },
            "columns": [

              { "data": "no" },  
              { "data": "kode" },  
              { "data": "nama" },
              { "data": "pemilik" },
              { "data": "lokasi" },
              { "data": "telp" },  
              { "data": "status" },
              { "data": "jambuka" },
              { "data": "jamtutup" },
              { "data": "ket" },
              { "data": "action" }
            ],
            "order": [[0, 'asc']]
          });
        });

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
    
    function sukses() {
      const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
        });
      Toast.fire({
        type: 'success',
        title: 'Data berhasil ditambahkan !'
      })
    }

    function sukseshapus() {
      const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
        });
      Toast.fire({
        type: 'error',
        title: 'Data berhasil dihapus !'
      })
    }

    function reload_table()
    {
    table.ajax.reload(null,false); //reload datatable ajax
    info();
    }

    function add_toko()
    {
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Input toko'); // Set Title to Bootstrap modal title
    }
    
    function edit_data(id)
    {
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    //Ajax Load data from ajax
    $.ajax({
    url : "<?php echo base_url('Admin/Toko/ajax_edit')?>/" + id,
    type: "GET",
    dataType: "JSON",
    success: function(data)
    {
    $('[name="id"]').val(data.ID);
    $('[name="kode"]').val(data.Kode);
    $('[name="nama"]').val(data.Nama);
    $('[name="pemilik"]').val(data.Pemilik);
    $('[name="lokasi"]').val(data.Lokasi);
    $('[name="telp"]').val(data.Telp);
    $('[name="status"]').val(data.Status);
    $('[name="jambuka"]').val(data.Jambuka);
    $('[name="jamtutup"]').val(data.Jamtutup);
    $('[name="ket"]').val(data.Ket);
    $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
    $('.modal-title').text('Edit Data toko'); // Set title to Bootstrap modal title
    
    },
    error: function (jqXHR, textStatus , errorThrown)
    {
    alert('Error get data from ajax');
    }
    });
    }

    function save()
    {
    $('#btnSave').text('Saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable
    var url;
    var notif;
    
    if(save_method == 'add') {
    url = "<?php echo base_url('Admin/Toko/ajax_add')?>";
    } else {
    url = "<?php echo base_url('Admin/Toko/ajax_update')?>";
    }
    // ajax adding data to database
    $.ajax({
    url : url,
    type: "POST",
    data: $('#form').serialize(),
    dataType: "JSON",
    success: function(data)
    {
    if(data.status) //if success close modal and reload ajax table
    {
    $('#modal_form').modal('hide');
    reload_table();
    sukses();
    }
    
    $('#btnSave').text('Save'); //change button text
    $('#btnSave').attr('disabled',false); //set button enable
    
    },
    error: function (jqXHR, textStatus , errorThrown)
    {
    Swal.fire(
      'Oops..',
      'Error adding data from ajax<br> <b>complete fields form!<b>',
      'error'
    )

    $('#btnSave').text('save'); //change button text
    $('#btnSave').attr('disabled',false); //set button enable
    
    }
    });
    }

    function delete_data(id){
    const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-danger'
      },
    })

    swalWithBootstrapButtons.fire({
      title: 'Are you sure?',
      text: "Delete Data ?",
      type: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes, delete it!',
      cancelButtonText: 'No, cancel!',
      reverseButtons: true
    }).then((result) => {
      if (result.value) {
        $.ajax({
                 url : "<?php echo base_url('Admin/Toko/ajax_delete')?>/" +id,
                 type: "DELETE",
                 dataType: "JSON",
                 })
                  reload_table();
                  sukseshapus();
      } else if (
        /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons.fire(
          'Cancelled',
          'cancel delete data',
          'error'
        )
      }
    })
    }
</script>
  <script>
  $(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
  });
  </script>

  <script>
    $( ".data" ).addClass( "active" );
  </script>

  <script>
  $(document).ready(function(){
  setTimeout(function() {
  $('.alrt-success').fadeOut('fast');
  }, 2000); 
  });

  function angka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
 
    return false;
    return true;
}
</script>

<script type="text/javascript">
  $(function(){
  $(".datepicker").datetimepicker({
    format: 'HH:mm A',
  });
  });
</script>

 <script type="text/javascript">
    $(document).ready(function() {
      $.ajax({
          url : "<?php echo site_url('Admin/Toko/getcount'); ?>",
          type: "GET",
          data: "",
          dataType: "json",
          cache:false,
          success: function(data){
            $('#toko').text(data.jml);
            $('#aktif').text(data.aktif);
            $('#non').text(data.non);
          },
          error: function (jqXHR, textStatus, errorThrown){
              console.log(errorThrown);
          }
        });

      });
  </script>

  </body>
</html>