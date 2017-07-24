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
    <form method="post" action="<?php echo base_url('admin/menusave')?>" enctype="multipart/form-data">
        <div class="form-group">
              <label for="exampleInputPassword1">Menu Name</label>
              <input type="text" class="form-control" name="menu_name" value="<?=$menu_name ?>">
              <input type="hidden" name="kode" value="<?=$kode ?>" />
              <input type="hidden" name="stat" value="<?=$stat ?>" />
        </div>
        <div class="form-group">
              <label for="exampleInputPassword1">Menu URL</label>
              <input type="text" class="form-control" name="menu_name" value="<?=$menu_url ?>">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Parent Menu</label>
              <select class="form-control" name="parent_id">
                        <option value="uncategory">--Root--</option>
                        <?php foreach ($menu->result() as $parent){?>
                        <option value="<?=$menu_url ?>"><?php echo $parent->menu_name ; ?></option>
                        <?php }?>
              </select>
        </div>
        <div class="form-group">
              <label for="exampleInputEmail1">Type</label>
              <select name="view_type"  class="form-control">
                  <option value="1"> Url</option>
                  <option value="0"> Kategori</option>
              </select> 
        </div>
        <div class="form-group">
              <label for="exampleInputEmail1">Status</label>
              <select name="status"  class="form-control">
                  <option value="1"> Publish</option>
                  <option value="0"> Draft</option>
              </select> 
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
