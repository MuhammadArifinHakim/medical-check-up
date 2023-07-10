<!-- START: Content -->
<!-- <div class="container" style="padding: 0;"> -->
<div style="margin-left: 150px; margin-right: 150px; margin-bottom: 50px;">
  <div class="card mt-4">
    <div class="card-header">
      <h5>Data Pasien</h5>
    </div>
    <div class="card-body">
      <!-- START: Button -->
      <div class="d-flex justify-content-start mb-4">
        <a href="?page=TambahPasien" type="button" class="btn btn-sm btn-primary mr-3"><i class="fas fa-plus fa-sm text-white"></i> Tambah Pasien</a>
      </div>
      <!-- END: Button -->
      <div class="table-responsive">
        <table id="dataTables" class="table table-hover">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Pasien</th>
              <th>Tanggal Lahir</th>
              <th>Usia</th>
              <th>Gender</th>
              <th>No HP</th>
              <th>Alamat</th>
              <th>#</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; ?>
            <?php $pasien = viewDatas("SELECT * FROM `tbl_pasien` ORDER BY id DESC"); ?>
            <?php foreach ($pasien as $data) : ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= $data['nama_pasien']; ?></td>
                <td><?= $data['tanggal_lahir'] !== '0000-00-00' ? date('d-m-Y', strtotime($data['tanggal_lahir'])) : '-'; ?></td>
                <td><?= $data['usia']; ?></td>
                <td><?= $data['gender']; ?></td>
                <td><?= $data['no_hp']; ?></td>
                <td>
                  <?php
                  $alamat = $data['alamat'];
                  $truncatedAlamat = strlen($alamat) > 150 ? substr($alamat, 0, 130) . '...' : $alamat;
                  echo nl2br($truncatedAlamat);
                  ?>
                </td>
                <td>
                  <a href="?page=DataPersonal&id=<?php echo $data['id']; ?>" class="btn btn-primary"><b>detail</b></a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
<!-- END: Content -->