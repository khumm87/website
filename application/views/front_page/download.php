<div class="container">
  <div class="wraping">
  <div class="row">
    <div class="col-md-8">
      <h3><b><?php echo $title;?></b></h2>
      <hr class="cool_line">
      <div class="article">
      <br>
      
      <?php
    
      foreach($data as $dat){
      ?>
        <div class="list-article">
          <div class="row">
              <div class="image">
                <div class="col-xs-12 col-sm-3 col-md-3">
                <a href="<?php echo base_url('form_controller/article/'.$dat->slug);?>" style="text-decoration:none"><img src="<?php echo base_url();?>assets/uploads/<?php echo $dat->namafile; ?>" alt="..." class="img-rounded img-responsive"></a>
                </div>
              </div>
              <div class="col-xs-12 col-sm-9 col-md-9">
              <a href="<?php echo base_url('form_controller/article/'.$dat->slug);?>" style="text-decoration:none;"><h3 class="judul"><b><?php echo $dat->post_title; ?></b></h3></a>
              <?php $content = $dat->post_content; 
                $content = character_limiter($content,130);
              ?>
              <style type="text/css">
            .short-content{ 
             margin-bottom: 0px;
             } 
            </style>
              <p class="short-content"><?php echo $content; ?><span><a style="text-decoration: none; color: #825e00" href="<?php echo base_url('form_controller/article/'.$dat->slug);?>">Read More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></span></p>

              <div>
               <i class="fa fa-eye" style="font-size: 11px; font-family: "MyriadPro-Light";" aria-hidden="true"></i> <span style="font-size: 11px;"><?php echo $dat->article_views; ?></span>

              </div>

            </div>
          </div>
          <style type="text/css">
            .cool_line{ 
             display:block;
             border:none;
             color:white;
             height:1px;
             background:lightgray;
            } 

          </style>
          <hr class="cool_line">
        </div>
        <?php 
          }
        ?>
              <center>
        <?php echo $halaman ?> <!--Memanggil variable pagination-->
      </center>
      </div>
    </div>


