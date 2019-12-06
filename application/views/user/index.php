





        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

          <div class="card mb-3" style="max-width: 840px;">
            <div class="row no-gitters">
              <div class="col-md-4">
                <img class="card-img-top" src="<?= base_url('assets/img/') . $user['image']; ?>" alt="Profile Image">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Detail Information</h5>

                  <hr class="sidebar-divider">
                    <dl class="row">
                      <dt class="col-sm-4">Name: </dt>
                      <dd class="col-sm-8"><?= $user['name']; ?></dd>
                    </dl>
                    <hr class="sidebar-divider">
                    <dl class="row">
                      <dt class="col-sm-4">Email: </dt>
                      <dd class="col-sm-8"><?= $user['email']; ?></dd>
                    </dl>
                    <hr class="sidebar-divider">
                    <dl class="row">
                      <dt class="col-sm-4">Date Created: </dt>
                      <dd class="col-sm-8"><?= date('l, d F Y, h:i A', $user['date_created']); ?></dd>
                    </dl>
                    <hr class="sidebar-divider">
                    <dl class="row">
                      <dt class="col-sm-4">Updated: </dt>
                      <dd class="col-sm-8"></dd>
                    </dl>
                    <hr class="sidebar-divider">
                    <a href="#" class="btn btn-primary">Update Profile</a>
                  
                </div>
              </div>
            </div>
              
          </div>
          



        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->


