<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ongkir</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?php
    $this->load->view('template/css');
    ?>
    <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/plugins/select2/css/select2.css') ?>">
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
                                <div class="col-lg-12">
                                    <div class="form-group">
                                    <label>Kecamatan</label>
                                    <br>
                                        <select class="form-control" name="kec" id="kec" required>
                                            <option>Pilih Kecamatan</option>
                                            <?php foreach ($kec as $row) : ?>
                                                <option value="<?php echo $row->id_kec; ?>"><?php echo $row->nama; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Kelurahan</label>
                                    <br>
                                        <select class="form-control" id="kel" name="kel" required>
                                            <option value="">Pilih Kelurahan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-8 mb-3">
                                        <label for="validationCustom03">Ongkir</label>
                                        <input type="number" class="form-control" min="1" name="ongkir" placeholder="Masukan Harga Ongkir /Kg" required>
                                        <div class="invalid-feedback">
                                            Masukan Lokasi !
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom05">Status</label>
                                        <select name="status" class="form-control" required>
                                            <option value="">-</option>
                                            <option value="t">TRUE</option>
                                            <option value="f">FALSE</option>                      
                                        </select>
                                        <div class="invalid-feedback">
                                            Pilih Status !
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

        <div class="modal fade" id="modal_update">
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
                            <form id="form_update" class="needs-validation" role="form">
                                <input type="hidden" name="id2">
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                <div class="form-row">
                                    <div class="col-md-8 mb-3">
                                        <label for="validationCustom03">Ongkir</label>
                                        <input type="number" class="form-control" min="1" name="ongkir2" placeholder="Masukan Harga Ongkir /Kg" required>
                                        <div class="invalid-feedback">
                                            Masukan Lokasi !
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom05">Status</label>
                                        <select name="status2" class="form-control" required>
                                            <option value="">-</option>
                                            <option value="t">TRUE</option>
                                            <option value="f">FALSE</option>                      
                                        </select>
                                        <div class="invalid-feedback">
                                            Pilih Status !
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" id="btnSave2" onclick="update()" class="btn btn-primary">Save</button>
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
                            <h1 class="m-0 text-dark">Data Ongkir</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item active">Ongkir</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-12">
                            <div class="card card-dark">
                                <div class="card-header">
                                    <h3 class="card-title">Cakupan Wilayah</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom01">Provinsi</label>
                                            <input type="text" class="form-control" name="kode" placeholder="JAWA TENGAH" disabled>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom01">Kabupaten / Kota</label>
                                            <input type="text" class="form-control" name="nama" placeholder="KAB. SUKOHARJO" disabled>
                                        </div>
                                        <div class="col-md-2 mb-3">
                                            <label for="validationCustom01">Tambah Data Ongkir</label>
                                            <button class="btn btn-info" onclick="add_toko()" data-toggle="tooltip" data-placement="top" title="Tambah Data"><span class="fas fa fa-plus"></span> Tambah</button>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->

                <section class="content">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <button class="btn btn-default float-sm-right" onclick="reload_table()" data-toggle="tooltip" data-placement="top" title="Reload Table"><i class="fas fa fa-sync"></i> Reload</button>

                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="table" class="table table-bordered table-striped nowrap" width="100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kecamatan</th>
                                                <th>Kelurahan</th>
                                                <th>Ongkir</th>
                                                <th>Status</th>
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
        <script src="<?php echo base_url('assets/AdminLTE/plugins/select2/js/select2.full.min.js') ?>"></script>
        <script type="text/javascript">
            var table;
            var tablemodal;
            var save_method;

            $(document).ready(function() {
                $('.select2').select2();
                table = $('#table').DataTable({
                    "processing": true,
                    "responsive": true,

                    "ajax": {
                        "url": "<?php echo base_url('Admin/Ongkir/setView'); ?>",
                        "type": "GET",
                    },
                    "columns": [

                        {
                            "data": "no"
                        },
                        {
                            "data": "kec"
                        },
                        {
                            "data": "kel"
                        },
                        {
                            "data": "ongkir"
                        },
                        {
                            "data": "status"
                        },
                        {
                            "data": "action"
                        }
                    ],
                    "order": [
                        [0, 'asc']
                    ]
                });
                new $.fn.dataTable.FixedHeader(table);
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

            function reload_table() {
                table.ajax.reload(null, false); //reload datatable ajax
                info();
            }

            function add_toko() {
                save_method = 'add';
                $('#form')[0].reset(); // reset form on modals
                $('.form-group').removeClass('has-error'); // clear error class
                $('.help-block').empty(); // clear error string
                $('#modal_form').modal('show'); // show bootstrap modal
                $('.modal-title').text('Input Kategori'); // Set Title to Bootstrap modal title
            }

            function edit_data(id) {
                save_method = 'update';
                $('#form_update')[0].reset(); // reset form on modals
                $('.form-group').removeClass('has-error'); // clear error class
                $('.help-block').empty(); // clear error string
                //Ajax Load data from ajax
                $.ajax({
                    url: "<?php echo base_url('Admin/Ongkir/ajax_edit') ?>/" + id,
                    type: "GET",
                    dataType: "JSON",
                    success: function(data) {
                        $('[name="id2"]').val(data.id_kel);
                        $('[name="ongkir2"]').val(data.ongkir);
                        $('[name="status2"]').val(data.status);
                        $('#modal_update').modal('show'); // show bootstrap modal when complete loaded
                        $('.modal-title').text('Edit Data Ongkir'); // Set title to Bootstrap modal title

                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Error get data from ajax');
                    }
                });
            }

            function save() {
                $('#btnSave').text('Saving...'); //change button text
                $('#btnSave').attr('disabled', true); //set button disable
                var url;
                var notif;

                if (save_method == 'add') {
                    url = "<?php echo base_url('Admin/Ongkir/ajax_add') ?>";
                } else {
                    url = "<?php echo base_url('Admin/Ongkir/ajax_update') ?>";
                }
                // ajax adding data to database
                $.ajax({
                    url: url,
                    type: "POST",
                    data: $('#form').serialize(),
                    dataType: "JSON",
                    success: function(data) {
                        if (data.status) //if success close modal and reload ajax table
                        {
                            $('#modal_form').modal('hide');
                            reload_table();
                            sukses();
                        }

                        $('#btnSave').text('Save'); //change button text
                        $('#btnSave').attr('disabled', false); //set button enable

                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        Swal.fire(
                            'Oops..',
                            'Error adding data from ajax<br> <b>complete fields form!<b>',
                            'error'
                        )

                        $('#btnSave').text('save'); //change button text
                        $('#btnSave').attr('disabled', false); //set button enable

                    }
                });
            }

            function update() {
                $('#btnSave').text('Saving...'); //change button text
                $('#btnSave').attr('disabled', true); //set button disable
                
                var notif;
                $.ajax({
                    url: "<?php echo base_url('Admin/Ongkir/ajax_update') ?>",
                    type: "POST",
                    data: $('#form_update').serialize(),
                    dataType: "JSON",
                    success: function(data) {
                        if (data.status) //if success close modal and reload ajax table
                        {
                            $('#modal_form').modal('hide');
                            reload_table();
                            sukses();
                        }

                        $('#btnSave').text('Save'); //change button text
                        $('#btnSave').attr('disabled', false); //set button enable

                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        Swal.fire(
                            'Oops..',
                            'Error adding data from ajax<br> <b>complete fields form!<b>',
                            'error'
                        )

                        $('#btnSave').text('save'); //change button text
                        $('#btnSave').attr('disabled', false); //set button enable

                    }
                });
            }

            function delete_data(id) {
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
                            url: "<?php echo base_url('Admin/Ongkir/ajax_delete') ?>/" + id,
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
            $(document).ready(function() {
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>

        <script>
            $(".data").addClass("active");
        </script>

        <script>
            $(document).ready(function() {
                setTimeout(function() {
                    $('.alrt-success').fadeOut('fast');
                }, 2000);
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#kec').change(function() {
                    var id = $(this).val();
                    $.ajax({
                        url: "<?php echo base_url(); ?>Admin/Ongkir/get_kel",
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
                                html += '<option value=' + data[i].id_kel + '>' + data[i].nama +'</option>';
                            }
                            $('#kel').html(html);

                        }
                    });
                    return false;
                });

            });
        </script>

</body>

</html>