<!-- Latest Blog Area Start Here -->
<div class="blog-area ptb-95 off-white-bg ptb-sm-55">
    <div class="container">
        <div class="like-product-area">
            <h2 class="section-ttitle2 mb-30">Transaksi Pembelian</h2>
            <!-- Latest Blog Active Start Here -->
            <div class="latest-blog-active owl-carousel">
                <!-- Single Blog Start -->
                <?php 
                    $id_form = 21;
                    foreach($data as $x){ 
                        $id_form++;
                ?>
                <div class="single-latest-blog">
                    <div class="blog-img">
                        <a href="single-blog.html"><img src="<?php echo base_url(); ?>assets/truemart/img/blog/1.jpg" alt="blog-image"></a>
                    </div>
                    <div class="blog-desc">
                        <h4><a href="single-blog.html">NO Pesanan : <?php echo html_escape($x->Kode) ?></a></h4>
                        <ul class="meta-box d-flex">
                            <li><a href="#">AN : <?php echo html_escape($x->An) ?> | Total : Rp. <?php echo html_escape(number_format($x->Total)) ?></a></li>
                        </ul>
                        <p><?php echo html_escape($x->Metode); echo ". "; echo html_escape($x->Alamat);?></p>
                        <form id="<?php echo $id_form ?>" action="<?php echo site_url('detail-transaksi'); ?>" method="post">
                        <input type="hidden" name="id" value="<?php echo html_escape($x->ID) ?>">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <a class="readmore" href="javascript:void(0)" onclick="document.getElementById('<?php echo $id_form ?>').submit();">Lihat Detail</a>
                        </form>
                    </div>
                    <div class="blog-date">
                        <span>New</span>
                        
                    </div>
                </div>
                <!-- Single Blog End -->
                <?php } ?>
            </div>
            <!-- Latest Blog Active End Here -->
        </div>
        <!-- main-product-tab-area-->
    </div>
    <!-- Container End -->
</div>
<?php
    $this->load->view('template/client/footer');
?>
  <script>
    $(document).ready(function() {
        count_cart();
    });

    function count_cart(){
      $.ajax({
          url : "<?php echo site_url('Client/Home/count_cart'); ?>",
          type: "GET",
          data: "",
          dataType: "json",
          cache:false,
          success: function(data){
            $('#total-pro').text(data.jml);
          },
          error: function (jqXHR, textStatus, errorThrown){
              console.log(errorThrown);
          }
        });
    }
</script>
</body>
</html>                
