
    <div class="col-xs-12 col-sm-12 col-md-4">
      <div class="sidebar">
        <h4 class="judul" style="margin-top: 10px; color: #825e00;"><b>ENTRI POPULER</b></h4>
        <hr class="cool_line" style="margin-bottom: 15px;">
        <?php
        foreach($popular_data as $pop){
        ?>
        <a style="text-decoration:none;" href="<?php echo base_url('form_controller/article/'.$pop->slug);?>" ><h5 class="judul"><?php echo $pop->post_title; ?></span></h5></a>
        <?php }?>
      </div>
    </div>
   </div>
</div>
</div>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="footer">
        <div class="row">
          <div class="col-md-4">
            <div class="menu-footer">
                <ul class="list-menu-footer">
                  <li><a href="<?php echo base_url('menu/faq');?>">FAQ</a><li>
                  <li><a href="<?php echo base_url('menu/profile');?>">Profile</a><li>
                  <li><a href="<?php echo base_url('form_controller/sitemaps');?>">Site Maps</a></li>
                  <li><a href="<?php echo base_url('menu/download');?>">Download</a></li>
                </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="copyright">
          <p>Copyright &copy;khumm87</p>
      </div>
    </div>
  </div>
</div>
