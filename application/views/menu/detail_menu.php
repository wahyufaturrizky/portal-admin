<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Detail Menu Management</h1>
    <p class="mb-4"><?= date('l, d F Y, h:i A'); ?></p>

    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Menu <?= $menu['menu'];?> Information</h6>
        </div>
        <div class="card-body">

                    <dl class="row">
                      <dt class="col-sm-4">Name Menu: </dt>
                      <dd class="col-sm-8"><?= $menu['menu'];?></dd>
                    </dl>
                    <hr class="sidebar-divider">
                    <dl class="row">
                      <dt class="col-sm-4">Date Created: </dt>
                      <dd class="col-sm-8"><?= date('l, d F Y, h:i A', $menu['date_created_menu']); ?></dd>
                    </dl>
                    <hr class="sidebar-divider">
                    <dl class="row">
                      <dt class="col-sm-4">Updated: </dt>
                      <dd class="col-sm-8"><?= date('l, d F Y, h:i A', $menu['update_menu']); ?></dd>
                    </dl>
                    <hr class="sidebar-divider">
                    <a href="<?= base_url('menu')?>" class="btn btn-secondary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-arrow-left"></i>
                    </span>
                    <span class="text">Back</span>
                  </a>
                  <a href="<?= base_url('menu/edit_menu/');?><?= $menu['id']; ?>" class="btn btn-info btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-edit"></i>
                    </span>
                    <span class="text">Edit Menu</span>
                  </a>
                  <a href="<?= base_url('menu/delete/');?><?= $menu['id']; ?>" class="btn btn-danger btn-icon-split delete-button">
                    <span class="icon text-white-50">
                      <i class="fas fa-trash"></i>
                    </span>
                    <span class="text">Delete Menu</span>
                  </a>
        </div>
    </div>
</div>



</div>
      <!-- End of Main Content -->