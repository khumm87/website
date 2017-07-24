     <div class="content-wrapper">
    <!-- Content Header (Page header) -->
          <section class="content-header">
          <h1><?php echo $title;?></h1>
          </section>

    <!-- Main content -->
          <section class="content">
               <div class="wraper">
               <br>
               <br>
               <form method="post" action="<?php echo base_url('admin/save_gallery')?>" enctype="multipart/form-data">
                    <div class="form-group">
                         <label for="exampleInputPassword1">Title</label>
                         <input type="text" class="form-control" name="judul" value="<?=$title_gallery ?>">
                         <input type="hidden" name="kode" value="<?=$kode ?>" />
                         <input type="hidden" name="stat" value="<?=$stat ?>" />
                    </div>

                    <div class="form-group">
                         <label for="exampleInputPassword1">Description</label>
                         <input type="text" class="form-control" name="deskripsi" value="<?=$description ?>">
                    </div>

                    <div class="form-group">
                         <label for="exampleInputEmail1">Status</label>
                         <select name="status"  class="form-control">
                              <option value="1"> Publish</option>
                              <option value="0"> Draft</option>
                         </select> 
                    </div>
               
                    <div class="form-group">
                         <label for="exampleInputFile">Insert Image</label>
                         <input type="file" id="exampleInputFile" name="filefoto">
                         <p>ukuran file harus 1140 px x 600 px</p>
                         <?php
                              if($stat == 'new'){
                                              
                              }
                              else
                              {
                         ?>
                         <br>
                         <img width="300px" height="200px" src="<?=site_url() ?>assets/uploads/<?=$image ?>">
                         <?php
                         }
                         ?>
                    </div>
                    <div class="form-group">
                         <button type="submit" class="btn btn-primary">
                         <?php
                              if($stat == 'new'){
                                   echo "Save";
                             }
                              else {
                                   echo "Update";
                             }
                         ?>
                         </button>
                    </div>
               </form>
               </div>
          </section>
    <!-- /.content -->
     </div>
  <!-- /.content-wrapper -->

