<!-- Begin Page Content -->
<div class="container-fluid">

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
        <a href="#" class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#newMenuModal">
        <span class="icon text-white-50">
              <i class="fas fa-plus"></i>
        </span>
        <span class="text">Add New Menu</span>
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
            <th>Name Menu</th>
            <th>Action</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>#</</th>
            <th>Date Created</th>
            <th>Name Menu</th>
            <th>Action</th>
          </tr>
        </tfoot>
        <tbody>

          <!-- Lopping Menu Disini -->
          <?php $i=1; ?>
          <?php foreach( $menu as $m) : ?>
          
          
          <tr>
            <td><?= $i; ?></td>
            <td><?= date('d/m/Y, h:i A', $m['date_created_menu']); ?></td>
            <td><?= $m['menu']; ?></td>
            <td>
                <li class="list-inline">
                    <a href="<?= base_url('menu/detail_menu/');?><?= $m['id']; ?>" class="btn btn-warning btn-circle">
                      <i class="fas fa-eye"></i>
                    </a>
                    <a href="<?= base_url('menu/edit_menu/');?><?= $m['id']; ?>" class="btn btn-info btn-circle">
                      <i class="fas fa-edit"></i>
                    </a>
                    <a href="<?= base_url('menu/delete/');?><?= $m['id']; ?>" class="btn btn-danger btn-circle delete-button">
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

<div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newMenuModalLabel">Add New Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('menu');?>" method="post">
        <div class="modal-body">
          
            <div class="form-group">
              <label for="menu" class="col-form-label">Menu Name:</label>
              <input type="text" class="form-control" id="menu" name="menu" placeholder="Enter name menu">
            </div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Add Menu</button>
        </div>
        
      </form>
    </div>
  </div>
</div>

