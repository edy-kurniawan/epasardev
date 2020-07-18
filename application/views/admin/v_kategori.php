<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Kategori</title>
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
            <form id="form" class="needs-validation" role="form">
              <input type="hidden" name="id">
              <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
              <div class="form-row">
                <div class="col-md-4 mb-3">
                  <label for="validationCustom01">Kode</label>
                  <input type="text" class="form-control" name="kode" placeholder="Kode" required>
                  <div class="invalid-feedback">
                    Masukan Kode !
                  </div>
                </div>
                <div class="col-md-8 mb-3">
                  <label for="validationCustom01">Nama</label>
                  <input type="text" class="form-control" name="nama" placeholder="Nama Kategori" required>
                  <div class="invalid-feedback">
                    Masukan Nama !
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-12 mb-3">
                  <label for="validationCustom01">Keterangan</label>
                  <input type="text" class="form-control" name="ket" placeholder="Keterangan" required>
                  <div class="invalid-feedback">
                    Masukan Pemilik !
                  </div>
                </div>
              </div>
          </div>
        </div>
          <div class="modal-footer justify-content-between">
              <?php if($this->session->userdata("user") == "admin") { ?>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
              <?php }else { ?>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" id="btnSave" class="btn btn-primary">Save</button>
              <?php } ?>
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
            <h1 class="m-0 text-dark">Data Kategori</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Kategori</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-server"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Jumlah Kategori</span>
                <span class="info-box-number" id="total">
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
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-check-circle"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Jumlah Sembako</span>
                <span class="info-box-number" id="sembako">
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
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-minus-circle"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Jumlah Daging</span>
                <span class="info-box-number" id="daging">
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
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-cart-plus"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Jumlah Kategori Lain</span>
                <span class="info-box-number" id="else">
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
              <table id="table" class="table table-bordered table-striped nowrap" width="100%">      
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama</th>
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
          get_count();
          table = $('#table').DataTable({  
            "processing": true, 
            "responsive": true,

            "ajax": {
                "url": "<?php echo base_url('Admin/Kategori/setView'); ?>",
                "type": "GET",
            },
            "columns": [

              { "data": "no" },  
              { "data": "kode" },  
              { "data": "nama" },
              { "data": "ket" },
              { "data": "action" }
            ],
            "order": [[0, 'asc']]
          });
          new $.fn.dataTable.FixedHeader( table );
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
    get_count();
    }

    function get_count(){
      $.ajax({
          url : "<?php echo site_url('Admin/Kategori/getcount'); ?>",
          type: "GET",
          data: "",
          dataType: "json",
          cache:false,
          success: function(data){
            $('#total').text(data.total);
            $('#daging').text(data.daging);
            $('#sembako').text(data.sembako);
            $('#else').text(data.else);
          },
          error: function (jqXHR, textStatus, errorThrown){
              console.log(errorThrown);
          }
        });
    }

    function add_toko()
    {
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Input Kategori'); // Set Title to Bootstrap modal title
    }
    
    function edit_data(id)
    {
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    //Ajax Load data from ajax
    $.ajax({
    url : "<?php echo base_url('Admin/Kategori/ajax_edit')?>/" + id,
    type: "GET",
    dataType: "JSON",
    success: function(data)
    {
    $('[name="id"]').val(escapeHtml(data.ID));
    $('[name="kode"]').val(escapeHtml(data.Kode));
    $('[name="nama"]').val(escapeHtml(data.Nama));
    $('[name="ket"]').val(escapeHtml(data.Ket));
    $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
    $('.modal-title').text('Edit Data Kategori'); // Set title to Bootstrap modal title
    
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
    url = "<?php echo base_url('Admin/Kategori/ajax_add')?>";
    } else {
    url = "<?php echo base_url('Admin/Kategori/ajax_update')?>";
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
                 url : "<?php echo base_url('Admin/Kategori/ajax_delete')?>/" +id,
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

    function escapeHtml(unsafe) {
    return unsafe
         .replace(/&/g, "&amp;")
         .replace(/</g, "&lt;")
         .replace(/>/g, "&gt;")
         .replace(/"/g, "&quot;")
         .replace(/'/g, "&#039;");
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

</script>
<!-- disable klik kanan & ctrl + u -->
<script type='text/javascript'>
document.addEventListener("contextmenu", function(e){
    e.preventDefault();
}, false)
//<![CDATA[
shortcut={all_shortcuts:{},add:function(a,b,c){var d={type:"keydown",propagate:!1,disable_in_input:!1,target:document,keycode:!1};if(c)for(var e in d)"undefined"==typeof c[e]&&(c[e]=d[e]);else c=d;d=c.target,"string"==typeof c.target&&(d=document.getElementById(c.target)),a=a.toLowerCase(),e=function(d){d=d||window.event;if(c.disable_in_input){var e;d.target?e=d.target:d.srcElement&&(e=d.srcElement),3==e.nodeType&&(e=e.parentNode);if("INPUT"==e.tagName||"TEXTAREA"==e.tagName)return}d.keyCode?code=d.keyCode:d.which&&(code=d.which),e=String.fromCharCode(code).toLowerCase(),188==code&&(e=","),190==code&&(e=".");var f=a.split("+"),g=0,h={"`":"~",1:"!",2:"@",3:"#",4:"$",5:"%",6:"^",7:"&",8:"*",9:"(",0:")","-":"_","=":"+",";":":","'":'"',",":"<",".":">","/":"?","\\":"|"},i={esc:27,escape:27,tab:9,space:32,"return":13,enter:13,backspace:8,scrolllock:145,scroll_lock:145,scroll:145,capslock:20,caps_lock:20,caps:20,numlock:144,num_lock:144,num:144,pause:19,"break":19,insert:45,home:36,"delete":46,end:35,pageup:33,page_up:33,pu:33,pagedown:34,page_down:34,pd:34,left:37,up:38,right:39,down:40,f1:112,f2:113,f3:114,f4:115,f5:116,f6:117,f7:118,f8:119,f9:120,f10:121,f11:122,f12:123},j=!1,l=!1,m=!1,n=!1,o=!1,p=!1,q=!1,r=!1;d.ctrlKey&&(n=!0),d.shiftKey&&(l=!0),d.altKey&&(p=!0),d.metaKey&&(r=!0);for(var s=0;k=f[s],s<f.length;s++)"ctrl"==k||"control"==k?(g++,m=!0):"shift"==k?(g++,j=!0):"alt"==k?(g++,o=!0):"meta"==k?(g++,q=!0):1<k.length?i[k]==code&&g++:c.keycode?c.keycode==code&&g++:e==k?g++:h[e]&&d.shiftKey&&(e=h[e],e==k&&g++);if(g==f.length&&n==m&&l==j&&p==o&&r==q&&(b(d),!c.propagate))return d.cancelBubble=!0,d.returnValue=!1,d.stopPropagation&&(d.stopPropagation(),d.preventDefault()),!1},this.all_shortcuts[a]={callback:e,target:d,event:c.type},d.addEventListener?d.addEventListener(c.type,e,!1):d.attachEvent?d.attachEvent("on"+c.type,e):d["on"+c.type]=e},remove:function(a){var a=a.toLowerCase(),b=this.all_shortcuts[a];delete this.all_shortcuts[a];if(b){var a=b.event,c=b.target,b=b.callback;c.detachEvent?c.detachEvent("on"+a,b):c.removeEventListener?c.removeEventListener(a,b,!1):c["on"+a]=!1}}},shortcut.add("Ctrl+U",function(){alert('Mau ngapain sih?')});
//]]>
</script>
</body>
</html>