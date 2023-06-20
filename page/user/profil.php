<div class="container">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mt-4 mb-4">
    <h1>Profil</h1>
    <a href="?page=index.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
			<i class="fas fa-chevron-left fa-sm text-white-50"></i> Back</a>
  </div>

  <div class="row">

    <div class="col-md-3">
      <!-- Profile Image -->
      <div class="card card-primary card-outline">
        <div class="card-body box-profile">
          <div class="text-center">
            <img class="profile-user-img img-fluid img-circle" src="upload/karyawan/<?= $user['image']; ?>"
              alt="User profile picture">
          </div>
          <h5 class="text-center mt-3"><?= $user['nama']; ?></h5>
          <p class="text-muted text-center"><?= $user['username']; ?></p>

          <a href="?page=EditProfil" class="btn btn-primary btn-block"><b>Edit Profil</b></a>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    
    <div class="col-md">
      <!-- About Me Box -->
      <div class="card">
        <div class="card-body">
          <strong><i class="fas fa-mail-bulk mr-1"></i> Email</strong>
          <p class="text-muted"><?= $user['email']; ?></p>
          <hr>

          <strong><i class="fas fa-phone-alt mr-1"></i> Phone</strong>
          <p class="text-muted"><?= $user['no_hp']; ?></p>
          <hr>

          <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
          <p class="text-muted"><?= $user['alamat']; ?></p>
          <hr>

          <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>
          <p class="text-muted"><?= $user['catatan']; ?></p>
        </div>
        <!-- /.card-body -->
      </div>
    </div>

  </div>
  <!-- /.row -->
</div>