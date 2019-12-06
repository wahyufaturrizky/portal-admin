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
        <a href="#" class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#newSubMenuModal">
        <span class="icon text-white-50">
              <i class="fas fa-plus"></i>
        </span>
        <span class="text">Add New Sub Menu</span>
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
            <th>Sub Menu</th>
            <th>Menu</th>
            <th>Url</th>
            <th>Icon</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>#</th>
            <th>Date Created</th>
            <th>Sub Menu</th>
            <th>Menu</th>
            <th>Url</th>
            <th>Icon</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </tfoot>
        <tbody>

          <!-- Lopping Menu Disini -->
          <?php $i=1; ?>
          <?php foreach( $submenu as $sm) : ?>
          
          
          <tr>
            <td><?= $i; ?></td>
            <td><?= date('d/m/Y, h:i A', $sm['date_created_sub_menu']); ?></td>
            <td><?= $sm['title']; ?></td>
            <td><?= $sm['menu']; ?></td>
            <td><?= $sm['url']; ?></td>
            <td><i class="<?= $sm['icon']?>"></i></td>
            <td>
              <?php if ($sm['is_active']) : ?>
                <span class="badge badge-pill badge-success">Active</span>
              <?php else : ?>
              <span class="badge badge-pill badge-danger">Not Active</span>
              <?php endif; ?>
            </td>
            <td>
                <li class="list-inline">
                    <a href="<?= base_url('menu/detail_sub_menu/');?><?= $sm['id']; ?>" class="btn btn-warning btn-circle">
                      <i class="fas fa-eye"></i>
                    </a>
                    <a href="<?= base_url('menu/edit_sub_menu/');?><?= $sm['id']; ?>" class="btn btn-info btn-circle">
                      <i class="fas fa-edit"></i>
                    </a>
                    <a href="<?= base_url('menu/delete_submenu/');?><?= $sm['id']; ?>" class="btn btn-danger btn-circle delete-button">
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

<div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newSubMenuModalLabel">Add New Sub Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('menu/submenu');?>" method="post">
        <div class="modal-body">
          
            <div class="form-group">
              <label for="title" class="col-form-label">Menu Sub Name:</label>
              <input type="text" class="form-control" id="title" name="title" placeholder="Enter name sub menu">
            </div>

            <div class="form-group">
                <label for="menu_id" class="col-form-label">Select by Menu:</label>
              <select name="menu_id" id="menu_id" class="form-control">
                  <option value="">Select Menu</option>
                  <?php foreach($menu as $m) : ?>
                    <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                  <?php endforeach; ?>
              </select>
            </div>

            <div class="form-group">
              <label for="url" class="col-form-label">Url Sub Menu:</label>
              <input type="text" class="form-control" id="url" name="url" placeholder="Enter url sub menu">
            </div>

            <div class="form-group">
              <label for="icon" class="col-form-label">Icon Sub Menu:</label>
              <input type="text" class="form-control" id="icon" name="icon" placeholder="Enter icon sub menu">
            </div>
          
            <div class="form-group">
              <div class="custom-control custom-switch">
                <input value="1" type="checkbox" class="custom-control-input" id="is_active" name="is_active" checked>
                <label class="custom-control-label" for="is_active">Status active or not?</label>
              </div>
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Add Sub Menu</button>
        </div>
        
      </form>
    </div>
  </div>
</div>

