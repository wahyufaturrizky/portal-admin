<div class="container-fluid">

<?php if (validation_errors()) : ?>
  <div class="error-data" data-errordata="<?= validation_errors(); ?>"></div>
<?php endif; ?>

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Edit Sub Menu Management</h1>
    <p class="mb-4"><?= date('l, d F Y, h:i A'); ?></p>

    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Sub Menu <?= $submenu['title'];?> Information</h6>
        </div>
        <form action="" method="post">
        <div class="card-body">
                    
        

        
                    <input  type="hidden" name="id" id="id" value="<?= $submenu['id']; ?>">

                    <dl class="row">
                      <dt class="col-sm-4">Name Sub Menu: </dt>
                      <dd class="col-sm-8"><input autofocus value="<?= $submenu['title']; ?>" type="text" class="form-control" id="title" name="title" placeholder="Enter name sub menu"></dd>
                    </dl>
                    <hr class="sidebar-divider">

                    <dl class="row">
                      <dt class="col-sm-4">Choose Menu: </dt>
                      <dd class="col-sm-8">
                      <select name="menu_id" id="menu_id" class="form-control">
                          <?php foreach($menu as $m) : ?>
                            <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                          <?php endforeach; ?>
                      </select>
                      </dd>
                    </dl>
                    <hr class="sidebar-divider">

                    <dl class="row">
                      <dt class="col-sm-4">Url Sub Menu: </dt>
                      <dd class="col-sm-8"><input value="<?= $submenu['url']; ?>" type="text" class="form-control" id="url" name="url" placeholder="Enter url"></dd>
                    </dl>
                    <hr class="sidebar-divider">

                    <dl class="row">
                      <dt class="col-sm-4">Icon Sub Menu: </dt>
                      <dd class="col-sm-8"><input value="<?= $submenu['icon']; ?>" type="text" class="form-control" id="icon" name="icon" placeholder="Enter icon"></dd>
                    </dl>
                    <hr class="sidebar-divider">

                    <dl class="row">
                      <dt class="col-sm-4">Status Sub Menu: </dt>
                      <dd class="col-sm-8">
                        <div class="custom-control custom-switch">

                        <?php if ($submenu['is_active']) : ?>
                          <input value="1" type="checkbox" class="custom-control-input" id="is_active" name="is_active" checked>
                        <?php else : ?>
                          <input value="1" type="checkbox" class="custom-control-input" id="is_active" name="is_active">
                        <?php endif; ?>

                        <?php if ($submenu['is_active']) : ?>
                          <label class="custom-control-label mr-4" for="is_active">Status:</label><span class="badge badge-pill badge-success">Active</span>
                        <?php else : ?>
                          <label class="custom-control-label mr-4" for="is_active">Status:</label><span class="badge badge-pill badge-danger">Not Active</span>
                        <?php endif; ?>
                          
                        </div>
                      </dd>

                    </dl>
                    <hr class="sidebar-divider">

                  <a href="<?= base_url('menu/submenu')?>" class="btn btn-secondary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-arrow-left"></i>
                    </span>
                    <span class="text">Back</span>
                  </a>
                  <button type="submit" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-save"></i>
                    </span>
                    <span class="text">Save Menu</span>
                  </button>
        </div>
        </form>
    </div>
</div>


</div>
      <!-- End of Main Content -->

