<!-- Breadcrumb Start -->
        <div class="breadcrumb-area mt-30">
            <div class="container">
                <div class="breadcrumb">
                    <ul class="d-flex align-items-center">
                        <li><a href="#">Home</a></li>
                        <li class="active"><a href="#">Register</a></li>
                    </ul>
                </div>
            </div>
            <!-- Container End -->
        </div>
        <!-- Breadcrumb End -->
<!-- Register Account Start -->
        <div class="register-account ptb-100 ptb-sm-60">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="register-title">
                            <h3 class="mb-10">DAFTAR AKUN</h3>
                            <p class="mb-10">Jika anda sudah mempunyai akun silahkan kunjungi <a href="<?php echo site_url('signin'); ?>">login page</a></p>
                        </div>
                    </div>
                </div>
                <!-- Row End -->
                <div class="row">
                    <div class="col-sm-12">
                        <form class="form-register" action="<?php echo site_url('Client/Register/register'); ?>" method="post" onsubmit="if(document.getElementById('agree').checked) { return true; } else { alert('Please indicate that you have read and agree to the Terms and Conditions and Privacy Policy'); return false; }">
                            <fieldset>
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                <legend>Data Diri</legend>
                                <div class="form-group d-md-flex align-items-md-center">
                                    <label class="control-label col-md-2" for="f-name"><span class="require">*</span>Username</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="username" id="f-name" placeholder="Masukan username" required>
                                    </div>
                                </div>
                                <div class="form-group d-md-flex align-items-md-center">
                                    <label class="control-label col-md-2" for="f-name"><span class="require">*</span>Nama</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="nama" id="f-name" placeholder="Masukan nama" required>
                                    </div>
                                </div>
                                <div class="form-group d-md-flex align-items-md-center">
                                    <label class="control-label col-md-2" for="email"><span class="require">*</span>Email</label>
                                    <div class="col-md-10">
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Masukan email" required>
                                    </div>
                                </div>
                                <div class="form-group d-md-flex align-items-md-center">
                                    <label class="control-label col-md-2" for="number"><span class="require">*</span>No Telp</label>
                                    <div class="col-md-10">
                                        <input type="number" name="telp" class="form-control" maxlength="14" minlength="7" id="number" placeholder="Masukan no telp" required>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <legend>Password</legend>
                                <div class="form-group d-md-flex align-items-md-center">
                                    <label class="control-label col-md-2" for="pwd"><span class="require">*</span>Password:</label>
                                    <div class="col-md-10">
                                        <input type="password" name="password" class="form-control" id="pwd" placeholder="Masukan password" required>
                                    </div>
                                </div>
                                <div class="form-group d-md-flex align-items-md-center">
                                    <label class="control-label col-md-2" for="pwd-confirm"><span class="require">*</span>Password</label>
                                    <div class="col-md-10">
                                        <input type="password" name="password2" class="form-control" id="pwd-confirm" placeholder="Ulangi password" required>
                                    </div>
                                </div> 
                                <?php echo $this->session->flashdata('message');?></br>
                                <?php echo validation_errors(); ?>
                            </fieldset>
                            <div class="terms">
                                <div class="float-md-right">
                                    <span>I have read and agree to the <a href="#" class="agree"><b>Privacy Policy</b></a></span>
                                    <input type="checkbox" id="agree" name="agree" value="1"> &nbsp;
                                    <input type="submit" value="Continue" class="return-customer-btn">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Row End -->
            </div>
            <!-- Container End -->
        </div>
        <!-- Register Account End -->
        <!-- Toastr -->
        <script src="<?php echo base_url(); ?>assets/AdminLTE/plugins/toastr/toastr.min.js"></script>
         <!-- jquery 3.2.1 -->
        <script src="<?php echo base_url(); ?>assets/truemart/js/vendor/jquery-3.2.1.min.js"></script>
        <script type="text/javascript">
           $(document).ready(function() {
            $.ajax({
                   url: "<?php echo site_url('Client/Profile/count_cart'); ?>",
                   type: "GET",
                   data: "",
                   dataType: "json",
                   cache: false,
                   success: function(data) {
                       $('#total-pro').text(data.jml);
                   },
                   error: function(jqXHR, textStatus, errorThrown) {
                       console.log(errorThrown);
                   }
               });
           });
       </script>