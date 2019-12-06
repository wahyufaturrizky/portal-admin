<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Detail Sub Menu Management</h1>
    <p class="mb-4"><?= date('l, d F Y, h:i A'); ?></p>

    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Sub Menu <?= $submenu['title'];?> Information</h6>
        </div>
        <div class="card-body">

                    <dl class="row">
                      <dt class="col-sm-4">Name Sub Menu: </dt>
                      <dd class="col-sm-8"><?= $submenu['title'];?></dd>
                    </dl>
                    <hr class="sidebar-divider">

                    <dl class="row">
                      <dt class="col-sm-4">Main Menu: </dt>
                      <dd class="col-sm-8"><?= $submenu['menu'];?></dd>
                    </dl>
                    <hr class="sidebar-divider">

                    <dl class="row">
                      <dt class="col-sm-4">Url Sub Menu: </dt>
                      <dd class="col-sm-8"><?= $submenu['url'];?></dd>
                    </dl>
                    <hr class="sidebar-divider">

                    <dl class="row">
                      <dt class="col-sm-4">Icon Sub Menu: </dt>
                      <dd class="col-sm-8"><i class="<?= $submenu['icon']?>"></i> <?= $submenu['icon']?></dd>
                    </dl>
                    <hr class="sidebar-divider">

                    <dl class="row">
                      <dt class="col-sm-4">Status Sub Menu: </dt>
                      <dd class="col-sm-8">
                        <?php if ($submenu['is_active']) : ?>
                          <span class="badge badge-pill badge-success">Active</span>
                        <?php else : ?>
                        <span class="badge badge-pill badge-danger">Not Active</span>
                        <?php endif; ?>
                      </dd>
                    </dl>
                    <hr class="sidebar-divider">
                    <dl class="row">
                      <dt class="col-sm-4">Date Created: </dt>
                      <dd class="col-sm-8"><?= date('l, d F Y, h:i A', $submenu['date_created_sub_menu']); ?></dd>
                    </dl>
                    <hr class="sidebar-divider">
                    <dl class="row">
                      <dt class="col-sm-4">Updated: </dt>
                      <dd class="col-sm-8"><?= date('l, d F Y, h:i A', $submenu['updated_sub_menu']); ?></dd>
                    </dl>
                    <hr class="sidebar-divider">


                    <a href="<?= base_url('menu/submenu')?>" class="btn btn-secondary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-arrow-left"></i>
                    </span>
                    <span class="text">Back</span>
                  </a>
                  <a href="<?= base_url('menu/edit_sub_menu/');?><?= $submenu['id']; ?>" class="btn btn-info btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-edit"></i>
                    </span>
                    <span class="text">Edit Menu</span>
                  </a>
                  <a href="<?= base_url('menu/delete_submenu/');?><?= $submenu['id']; ?>" class="btn btn-danger btn-icon-split delete-button">
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