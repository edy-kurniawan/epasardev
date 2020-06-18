<!-- Breadcrumb Start -->
        <div class="breadcrumb-area mt-30">
            <div class="container">
                <div class="breadcrumb">
                    <ul class="d-flex align-items-center">
                        <li><a href="#">Home</a></li>
                        <li class="active"><a href="#">Login</a></li>
                    </ul>
                </div>
            </div>
            <!-- Container End -->
        </div>
        <!-- Breadcrumb End -->
        <!-- LogIn Page Start -->
        <div class="log-in ptb-100 ptb-sm-60">
            <div class="container">
                <div class="row">
                    <!-- New Customer Start -->
                    <div class="col-md-6">
                        <div class="well mb-sm-30">
                            <div class="new-customer">
                                <h3 class="custom-title">Daftar Akun</h3>
                                <p class="mtb-10"><strong></strong></p>
                                <p>Jika anda belum mempunyai akun silahkan kunjungi halaman daftar</p>
                                <a class="customer-btn" href="<?php echo site_url('signup'); ?>">Daftar</a>
                                <p><?php echo $this->session->flashdata('message');?></p>
                            </div>
                        </div>
                    </div>
                    <!-- New Customer End -->
                    <!-- Returning Customer Start -->
                    <div class="col-md-6">
                        <div class="well">
                            <div class="return-customer">
                                <h3 class="mb-10 custom-title">Login Page</h3>
                                <p class="mb-10"><strong>Saya sudah mempunyai akun</strong></p>
                                <form action="<?php echo site_url('Client/Login/aksi_login'); ?>" method="post">
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="username" placeholder="Masukan username" id="input-email" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="pass" placeholder="Password" id="input-password" class="form-control" required>
                                    </div>
                                    <p class="lost-password"><a href="#">Forgot password?</a></p>
                                    <p><?php echo $this->session->flashdata('error');?></p>
                                    <input type="submit" value="Login" class="return-customer-btn">
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Returning Customer End -->
                </div>
                <!-- Row End -->
            </div>
            <!-- Container End -->
        </div>
        <!-- LogIn Page End -->
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