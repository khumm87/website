<section>
     <div class="container">
          <script type="text/javascript">
           $(document).ready(function() {
               $('#carouselFade').carousel({
               interval: 2000

               })
          });
          </script>

          <div class="wraper header">
               <div id="carouselFade" class="carousel slide carousel-fade" data-ride="carousel">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                    <!-- Active Item -->
                         <?php
                         $i = 1;
                         foreach ($gallery as $dat): 
                         $item_class = ($i === 1) ? 'item active' : 'item';                    
                         ?>

                         <div class="<?php echo $item_class ?>">
                              <div class="carousel-caption">
                                   <h3><?php echo $dat->title_gallery; ?></h3>
                                   <p><?php echo $dat->description; ?></p>
                              </div>
                              <center>
                              <img src="<?php echo base_url();?>assets/slide/<?php echo $dat->image_name; ?>"/>
                              </center>
                         </div>
                         <?php  
                              $i++;
                              endforeach;
                         ?>
                    </div>
               </div>
          </div>
     </div>
</section>
