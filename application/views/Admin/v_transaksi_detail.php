<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Transaksi</title>
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
                    
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a href="<?php echo site_url('Admin/Transaksi/print/'); echo $x->ID;?>" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                  
                </div>
              </div>
            </div>
            <?php } ?>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
    
  <?php
  $this->load->view('template/footer');
  $this->load->view('template/js');
  ?>
    <!-- DataTables -->
  <script src="<?php echo base_url(); ?>assets/AdminLTE/plugins/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script> 
  <!-- Bootstrap 4 -->
  <script>
  $(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
  });
  </script>

  <script>
    var table;
    $(document).ready(function() {
      table = $('#table').DataTable({
        "processing": true,
        "responsive": true,
        "ajax": {
                "url": "<?php echo base_url('Admin/Transaksi/setView'); ?>",
                "type": "GET",
            },
            "columns": [

              { "data": "no" },  
              { "data": "kode" },  
              { "data": "nama" },
              { "data": "metode" },
              { "data": "status" },  
              { "data": "total" },
              { "data": "ket" },
              { "data": "action" }
            ],
            "order": [[0, 'asc']]
          });
          new $.fn.dataTable.FixedHeader( table );
    });

    function reload_table()
    {
    table.ajax.reload(null,false); //reload datatable ajax
    info();
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

    function detail_data(id)
    {
      window.location.href = "<?php echo base_url('Admin/Transaksi/get_detail'); ?>/"+id;
    }

    function edit_data(id)
    {
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    //Ajax Load data from ajax
    $.ajax({
    url : "<?php echo base_url('Admin/Transaksi/ajax_edit')?>/" + id,
    type: "GET",
    dataType: "JSON",
    success: function(data)
    {
    $('[name="id"]').val(escapeHtml(data.ID));
    $('[name="status"]').val(escapeHtml(data.Status));
    $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
    $('.modal-title').text('Edit Status Pesanan'); // Set title to Bootstrap modal title
    
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
    
    // ajax adding data to database
    $.ajax({
    url : "<?php echo base_url('Admin/Transaksi/ajax_update')?>",
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

    function sukses() {
      const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
        });
      Toast.fire({
        type: 'success',
        title: 'Data berhasil diubah !'
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