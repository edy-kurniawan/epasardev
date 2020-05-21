       <!-- Breadcrumb Start -->
        <div class="breadcrumb-area mt-30">
            <div class="container">
                <div class="breadcrumb">
                    <ul class="d-flex align-items-center">
                        <li><a href="<?php echo site_url('client/home'); ?>">Home</a></li>
                        <li class="active"><a href="<?php echo site_url('client/profile'); ?>">Profile</a></li>
                    </ul>
                </div>
            </div>
            <!-- Container End -->
        </div>
        <!-- Breadcrumb End -->
        <!-- Img Style External -->
        <style type="text/css">
            img-round { 
                border-radius: 50%;
            }
        </style>
        <!-- end style -->
        <!-- Single Blog Page Start Here -->
        <div class="single-blog ptb-100  ptb-sm-60">
            <div class="container">
                <div class="row">
                    <!-- Single Blog Sidebar Start -->
                    <div class="col-lg-3 order-2 order-lg-1">
                        <aside>
                            <div class="col-img mb-30">
                                <div class="form-group" id="photo-preview">
                                    <div class="col-md-9">
                                        (No photo)
                                    <span class="help-block"></span>
                                    </div>
                                </div>    
                            </div>
                            <div class="single-sidebar mb-30">
                                 <h3 class="sidebar-title"><?php echo $this->session->userdata("username"); ?></h3>
                                 <ul class="sidbar-style">
                                     <li><a href="login.html">History Transaksi</a></li>
                                     <li><a href="#">Ubah Password</a></li>
                                     <li><a href="<?php echo site_url('client/login/logout'); ?>">Logout</a></li>
                                 </ul>
                            </div>
                        </aside>
                    </div>
                    <!-- Single Blog Sidebar End -->
                    <!-- Single Blog Sidebar Description Start -->
                    <div class="col-lg-9 order-1 order-lg-2">
                        <div class="single-sidebar-desc mb-all-40">
                            <!-- Contact Email Area Start -->
                            <div class="blog-detail-contact">
                                <h3 class="mb-15 leave-reply">Profil Anda</h3>
                                <div class="submit-review">
                                    <form action="<?php echo site_url('Client/Profile/ajax_update'); ?>" method="post">
                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                        <input type="hidden" name="id" id="id">
                                        <div class="form-group">
                                            <label for="usr">Nama</label>
                                            <input type="text" name="nama" class="form-control" id="nama" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="usr">Email</label>
                                            <input type="email" name="email" class="form-control" id="email" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="web-address">Jenis Kelamin</label>
                                            <select name="jenis" class="form-control" id="jenis">
                                                <option value="L">Laki-Laki</option>
                                                <option value="P">Perempuan</option>                      
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="web-address">Alamat</label>
                                            <input type="text" name="alamat" class="form-control" id="alamat">
                                        </div>
                                        <div class="form-group">
                                            <label for="sub">Telp:</label>
                                            <input type="number" name="telp" class="form-control" id="telp" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="comment">Tanggal Lahir</label>
                                            <input name="tgl" class="form-control datepicker" id="tgl" disabled>
                                        </div>
                                        <div class="sbumit-reveiew">
                                            <input value="Simpan Data" class="return-customer-btn" type="submit">
                                        </div>
                                    </form>
                                            <button class="return-customer-btn"  onclick="enable()">Update</button>
                                </div>
                            </div>
                            <!-- Contact Email Area End -->
                        </div>
                    </div>
                    <!-- Single Blog Sidebar Description End -->
                </div>
            </div>
            <!-- Container End -->
        </div>

        <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Foto Profile</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <?php echo form_open_multipart('client/profile/img_update');?>
              <input type="hidden" name="id">
              <input type="hidden" name="img">
              <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            <center>
            <div class="form-group" id="photo-preview">
                <div class="col-md-9">
                    (No photo)
                <span class="help-block"></span>
                </div>
            </div>
            </center>
            <div class="form-group">
                <label for="customFile" id="label-photo">Upload Gambar</label>
                <div class="custom-file">
                <input name="photo" type="file" id="photo">
                </br><input type="checkbox" name="remove_photo" /> <strong>Remove photo when saving </strong>
            </div>
        </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit"  class="btn btn-primary">Save changes</button>
            </div>
          </div>
          </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <!-- Footer Area Start Here -->
      <footer class="off-white-bg2 pt-95 bdr-top pt-sm-55">
            <!-- Footer Top Start -->
            <div class="footer-top">
                <div class="container">    
        <!-- Support Area Start Here -->             
        <div class="support-area bdr-top">
            <div class="container">
                <div class="d-flex flex-wrap text-center">
                    <div class="single-support">
                        <div class="support-icon">
                            <i class="lnr lnr-gift"></i>
                        </div>
                        <div class="support-desc">
                            <h6>Great Value</h6>
                            <span>Dapatkan banyak promo dan diskon menarik.</span>
                        </div>
                    </div>
                    <div class="single-support">
                        <div class="support-icon">
                            <i class="lnr lnr-rocket" ></i>
                        </div>
                        <div class="support-desc">
                            <h6>Delivery Order</h6>
                            <span>Fitur antar pesanan ke beberapa lokasi yang ditentukan</span>
                        </div>
                    </div>
                    <div class="single-support">
                        <div class="support-icon">
                           <i class="lnr lnr-lock"></i>
                        </div>
                        <div class="support-desc">
                            <h6>Safe Payment</h6>
                            <span>Proses pembayaran yang dijamin aman</span>
                        </div>
                    </div>
                    <div class="single-support">
                        <div class="support-icon">
                           <i class="lnr lnr-enter-down"></i>
                        </div>
                        <div class="support-desc">
                            <h6>Shop Confidence</h6>
                            <span>Developer dan toko yang terpercaya</span>
                        </div>
                    </div>
                    <div class="single-support">
                        <div class="support-icon">
                           <i class="lnr lnr-users"></i>
                        </div>
                        <div class="support-desc">
                            <h6>24/7 Help Center</h6>
                            <span>Dukungan customer service 24 jam</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container End -->
        </div>
        <!-- Support Area End Here -->
                </div>
                <!-- Container End -->
            </div>
            <!-- Footer Top End -->
            <!-- Single Footer Start -->
            <center>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="single-footer mb-sm-40">
                                <h3 class="footer-title">Tentang Kami</h3>
                                <div class="footer-content">
                                    <ul class="footer-list address-content">
                                        <li><i class="lnr lnr-map-marker"></i> Alamat: Jl. Jend. Sudirman,  Larangan Kulon, Kec. Sukoharjo, Kabupaten Sukoharjo</li>
                                        <li><i class="lnr lnr-envelope"></i><a href="#"> Email: Support@epasar.com </a></li>
                                        <li>
                                            <i class="lnr lnr-phone-handset"></i> Telphone: (+0271) 123 456 789)
                                        </li>
                                    </ul>
                                    <div class="payment mt-25 bdr-top pt-30">
                                        <a href="#"><img class="img" src="<?php echo base_url(); ?>assets/truemart/img/payment/1.png" alt="payment-image"></a>
                                    </div>                                   
                                </div>
                            </div>
                        </div>
                        </center>
                        <!-- Single Footer Start -->
            <!-- Footer Middle Start -->
            <div class="footer-middle text-center">
                <div class="container">
                    <div class="footer-middle-content pt-20 pb-30">
                            <ul class="social-footer">
                                <li><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="https://twitter.com/"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="https://plus.google.com/"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="https://www.linkedin.com/"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><img src="<?php echo base_url(); ?>assets/truemart/img/icon/social-img1.png" alt="google play"></a></li>
                                <li><a href="#"><img src="<?php echo base_url(); ?>assets/truemart/img/icon/social-img2.png" alt="app store"></a></li>
                            </ul>
                    </div>
                </div>
                <!-- Container End -->
            </div>
            <!-- Footer Middle End -->
            <!-- Footer Bottom Start -->
            <div class="footer-bottom pb-30">
                <div class="container">

                     <div class="copyright-text text-center">                    
                        <p>Copyright © 2020 <a target="_blank" href="#"><b>E-Pasar</b></a> All Rights Reserved.</p>
                     </div>
                </div>
                <!-- Container End -->
            </div>
            <!-- Footer Bottom End -->
        </footer>
        <!-- Footer Area End Here -->
       

    <!-- jquery 3.2.1 -->
    <script src="<?php echo base_url(); ?>assets/truemart/js/vendor/jquery-3.2.1.min.js"></script>
    <!-- Countdown js -->
    <script src="<?php echo base_url(); ?>assets/truemart/js/jquery.countdown.min.js"></script>
    <!-- Mobile menu js -->
    <script src="<?php echo base_url(); ?>assets/truemart/js/jquery.meanmenu.min.js"></script>
    <!-- ScrollUp js -->
    <script src="<?php echo base_url(); ?>assets/truemart/js/jquery.scrollUp.js"></script>
    <!-- Nivo slider js -->
    <script src="<?php echo base_url(); ?>assets/truemart/js/jquery.nivo.slider.js"></script>
    <!-- Fancybox js -->
    <script src="<?php echo base_url(); ?>assets/truemart/js/jquery.fancybox.min.js"></script>
    <!-- Jquery nice select js -->
    <script src="<?php echo base_url(); ?>assets/truemart/js/jquery.nice-select.min.js"></script>
    <!-- Jquery ui price slider js -->
    <script src="<?php echo base_url(); ?>assets/truemart/js/jquery-ui.min.js"></script>
    <!-- Owl carousel -->
    <script src="<?php echo base_url(); ?>assets/truemart/js/owl.carousel.min.js"></script>
    <!-- Bootstrap popper js -->
    <script src="<?php echo base_url(); ?>assets/truemart/js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="<?php echo base_url(); ?>assets/truemart/js/bootstrap.min.js"></script>
    <!-- Plugin js -->
    <script src="<?php echo base_url(); ?>assets/truemart/js/plugins.js"></script>
    <!-- Main activaion js -->
    <script src="<?php echo base_url(); ?>assets/truemart/js/main.js"></script>
    <!-- Toastr -->
    <script src="<?php echo base_url(); ?>assets/AdminLTE/plugins/toastr/toastr.min.js"></script>
      <!-- DataTables -->
    <script src="<?php echo base_url(); ?>assets/AdminLTE/plugins/moment/moment.min.js"></script>
     <!-- jQuery -->
    <script src="<?php echo base_url('assets/AdminLTE/plugins/jquery/jquery.min.js') ?>"></script>
    <script src="<?php echo base_url(); ?>assets/AdminLTE/plugins/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script> 
        <script type="text/javascript">
            $(function(){
            $(".datepicker").datetimepicker({
                format: 'YYYY-MM-DD',
            });
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function(){
            $.ajax({
            url : "<?php echo base_url('client/profile/get_user')?>",
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
            $('[name="id"]').val(data.ID);
            $('[name="nama"]').val(data.Nama);
            $('[name="email"]').val(data.Email);
            $('[name="telp"]').val(data.Telp);
            $('[name="tgl"]').val(data.Tgllahir);
            $('[name="jenis"]').val(data.Jenis);
            $('[name="alamat"]').val(data.Alamat);
            $('[name="img"]').val(data.Img);
            $('#photo-preview').show(); // show photo preview modal
                if(data.Img)
                {
                    $('#label-photo').text('Change Photo'); // label photo upload
                    $('#photo-preview div').html('<img src="<?php echo base_url();?>/assets/upload/user/'+data.Img+'" style="width:150px;" title="upload / remove" data-toggle="modal" data-target="#modal-default">'); // show photo// remove photo
                }
                else
                {
                    $('#label-photo').text('Upload Photo'); // label photo upload
                    $('#photo-preview div').text('(No photo)');
                }
            
            },
            error: function (jqXHR, textStatus , errorThrown)
            {
            alert('Error get data from ajax');
            }
            });
        });
    </script>

    <script type="text/javascript">

    function enable() {
    $('#nama').attr('disabled',false); //set button enable
    $('#telp').attr('disabled',false); //set button enable
    $('#tgl').attr('disabled',false); //set button enable
    }

    </script>
</body>