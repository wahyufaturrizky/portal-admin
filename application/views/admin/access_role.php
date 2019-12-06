<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Cek apakah ada yang error saat input data sub menu -->
  <?php if (validation_errors()) : ?>
    <div class="error-data" data-errordata="<?= validation_errors(); ?>"></div>
  <?php endif; ?>

  <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash') ?>"></div>

  <!-- Peringatan Alert apabila field menu tida disi -->
  <!-- <?= form_error('menu', 
                      '<div class="alert alert-danger alert-dismissible fade show" role="alert">', '
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button></div>'); ?> -->

  <!-- Alert menu sukses ditambahkan tampil disini -->
  <!-- <?= $this->session->flashdata('message') ?> -->

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Role <?= $role['role']; ?> :</h1>
  <p class="mb-4"><?= date('l, d F Y, h:i A'); ?></p>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('admin/role') ?>"><?= $title; ?></a></li>
        <li class="breadcrumb-item active" aria-current="page">Role <?= $role['role']; ?></li>
    </ol>
  </nav>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      
      <ul class="list-inline">
        <li class="list-inline-item">
          <h6 class="m-0 font-weight-bold text-primary"><?= $role['role']; ?> Access List</h6>
        </li>

      </ul>
    
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>#</th>
              <th>Menu</th>
              <th>Access</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>#</th>
              <th>Menu</th>
              <th>Access</th>
            </tr>
          </tfoot>
          <tbody>

            <!-- Lopping Menu Disini -->
            <?php $i=1; ?>
            <?php foreach( $menu as $m) : ?>
            
            
            <tr>
              <td><?= $i; ?></td>
              <td><?= $m['menu']; ?></td>
              <td>
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="customCheck<?= $role['id']; ?>" <?= check_access($role['id'], $m['id']); ?> data-role="<?= $role['id'] ?>" data-menu="<?= $m['id'] ?>">
                    <label class="custom-control-label mr-4" for="customCheck<?= $role['id']; ?>"></label>
                
                </div>
              </td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
          </tbody>
        </table>
        
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

