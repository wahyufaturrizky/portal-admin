<div class="container-fluid">

<?php if (validation_errors()) : ?>
<div class="error-data" data-errordata="<?= validation_errors(); ?>"></div>
<?php endif; ?>

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Edit Menu Management</h1>
    <p class="mb-4"><?= date('l, d F Y, h:i A'); ?></p>

    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Menu <?= $menu['menu'];?> Information</h6>
        </div>
        <form action="" method="post">
        <div class="card-body">
                    
        

        
                    <input  type="hidden" name="id" id="id" value="<?= $menu['id']; ?>">
                    <dl class="row">
                      <dt class="col-sm-4">Name Menu: </dt>
                      <dd class="col-sm-8"><input autofocus value="<?= $menu['menu']; ?>" type="text" class="form-control" id="menu" name="menu" placeholder="Enter name menu"></dd>
                    </dl>
                    <hr class="sidebar-divider">
                    <a href="<?= base_url('menu')?>" class="btn btn-secondary btn-icon-split">
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

