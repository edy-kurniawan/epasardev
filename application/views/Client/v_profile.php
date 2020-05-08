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
                                <a href="shop.html"><img src="<?php echo base_url(); ?>assets/upload/user/default.png" style="width:150px; class="img-round"; alt="slider-banner"; border-radius="50%";></a>
                            </div>
                            <div class="single-team mb-all-30">
                            <div class="team-img sidebar-img">
                                <img src="<?php echo base_url(); ?>assets/truemart/img/team/2.jpg" alt="team-image">
                                <div class="team-link">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="team-info">
                                <h4>Marcos Alonso</h4>
                                <p>web designer</p>
                            </div>
                        </div>
                            <div class="single-sidebar mb-30">
                                 <h3 class="sidebar-title">others</h3>
                                 <ul class="sidbar-style">
                                     <li><a href="login.html">History Transaksi</a></li>
                                     <li><a href="#">Ubah Password</a></li>
                                     <li><a href="#">Logout</a></li>
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
                                    <form>
                                        <div class="form-group">
                                            <label for="usr">Nama</label>
                                            <input type="text" name="nama" class="form-control" id="nama">
                                        </div>
                                        <div class="form-group">
                                            <label for="usr">Email</label>
                                            <input type="email" name="email" class="form-control" id="email" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="web-address">Jenis Kelamin</label>
                                            <select name="jenis" class="form-control" id="jenis">
                                                <option value="">-</option>
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
                                            <input type="text" name="telp" class="form-control" id="telp">
                                        </div>
                                        <div class="form-group">
                                            <label for="comment">Tanggal Lahir</label>
                                            <input name="tgl" class="form-control datepicker" id="tgl">
                                        </div>
                                        <div class="sbumit-reveiew">
                                            <input value="Submit" class="return-customer-btn" type="submit">
                                        </div>
                                    </form>
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