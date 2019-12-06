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
  <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>
  <p class="mb-4"><?= date('l, d F Y, h:i A'); ?></p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      
      <ul class="list-inline">
        <li class="list-inline-item">
          <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?> List</h6>
        </li>
        
        <li class="list-inline-item float-right">
          <a href="#" class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#newRoleModal">
          <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
          </span>
          <span class="text">Add New Role</span>
          </a>
        </li>

      </ul>
    
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>#</th>
              <th>Date Created</th>
              <th>Role</th>
              <th>Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>#</th>
              <th>Date Created</th>
              <th>Role</th>
              <th>Action</th>
            </tr>
          </tfoot>
          <tbody>

            <!-- Lopping Menu Disini -->
            <?php $i=1; ?>
            <?php foreach( $role as $r) : ?>
            
            
            <tr>
              <td><?= $i; ?></td>
              <td><?= date('d/m/Y, h:i A', $r['date_created_role']); ?></td>
              <td><?= $r['role']; ?></td>
              <td>
                  <li class="list-inline">
                      <a href="<?= base_url('admin/access_role/');?><?= $r['id']; ?>" class="btn btn-success btn-circle">
                        <i class="fas fa-user-tie"></i>
                      </a>
                      <a href="<?= base_url('admin/detail_role/');?><?= $r['id']; ?>" class="btn btn-warning btn-circle">
                        <i class="fas fa-eye"></i>
                      </a>
                      <a href="<?= base_url('admin/edit_role/');?><?= $r['id']; ?>" class="btn btn-info btn-circle">
                        <i class="fas fa-edit"></i>
                      </a>
                      <a href="<?= base_url('admin/delete_role/');?><?= $r['id']; ?>" class="btn btn-danger btn-circle delete-button">
                        <i class="fas fa-trash"></i>
                      </a>
                  </li>
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

<!-- Modal Add New Menu -->

<div class="modal fade" id="newRoleModal" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newRoleModalLabel">Add New Role</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('admin/role');?>" method="post">
        <div class="modal-body">
          
            <div class="form-group">
              <label for="role" class="col-form-label">Role Name:</label>
              <input type="text" class="form-control" id="role" name="role" placeholder="Enter name role">
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Add Role</button>
        </div>
        
      </form>
    </div>
  </div>
</div>

