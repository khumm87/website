  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
      <section class="content-header">
      <h1>
        <?php echo $title;?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="wraper">
      <br>
      <br>
    <form method="post" action="<?php echo base_url('admin/saveArticle')?>" enctype="multipart/form-data">
        <div class="form-group">
              <label for="exampleInputPassword1">Judul</label>
              <input type="text" class="form-control" name="judul" value="<?=$judul ?>">
              <input type="hidden" name="kode" value="<?=$kode ?>" />
              <input type="hidden" name="stat" value="<?=$stat ?>" />
        </div>
        <div class="form-group">
              <label for="exampleInputEmail1">Status</label>
              <select name="status"  class="form-control">
                  <option value="1"> Publish</option>
                  <option value="0"> Draft</option>
              </select> 
        </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Kategori</label>
              <select class="form-control" name="category">
                        <option value="uncategory">--Kategori--</option>
                        <option value="download">Download</option>
                        <option value="artikel">Artikel</option>
                        <option value="Profil">Profil</option>
              </select>
          </div>
          <!-- textarea tinymce-->
          <div class="form-group">
          <textarea style="height:400px;" name="content_article" ><?=$content ?></textarea>
          </div>
          <div class="form-group">
                  <label for="exampleInputFile">Insert Image</label>
                  <input type="file" id="exampleInputFile" name="filefoto">
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
          </div>
          </div>
        </form>
        </div>
      </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
