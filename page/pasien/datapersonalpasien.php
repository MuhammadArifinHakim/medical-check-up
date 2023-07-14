<?php
// Jika tidak ada ID di URL
if (!isset($_GET['id'])) {
  header("Location: ?page=Pasien");
  exit;
}

// Ambil ID dari URL
$id = $_GET['id'];

// Ambil semua data karyawan berdasarkan ID
$data = viewData("SELECT * FROM tbl_pasien WHERE id = '$id'");

?>

<!-- START: Content -->

<div style="margin-left: 150px; margin-right: 150px; margin-bottom: 50px;">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mt-4 mb-4">
    <h1>Data Medical Check Pasien</h1>
    <a href="?page=Pasien" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
      <i class="fas fa-chevron-left fa-sm text-white-50"></i> Back</a>
  </div>

  <div class="col" style="padding: 0;">

    <div class="col-md" style="padding: 0;">
      <!-- About Me Box -->
      <div class="card">
        <div class="card-body">
          <strong><i class="fas fa-user mr-1"></i> Nama</strong>
          <p class="text-muted"><?= $data['nama_pasien']; ?></p>
          <hr>

          <strong><i class="fas fa-venus-mars mr-1"></i> Jenis Kelamin</strong>
          <p class="text-muted"><?= $data['gender']; ?></p>
          <hr>

          <strong><i class="fas fa-phone-alt mr-1"></i> Phone</strong>
          <p class="text-muted"><?= $data['no_hp']; ?></p>
          <hr>

          <strong><i class="fas fa-hourglass-half mr-1"></i> Umur</strong>
          <p class="text-muted"><?= $data['usia']; ?></p>
          <hr>

          <strong><i class="far fa-calendar-alt mr-1"></i> Tanggal Lahir</strong>
          <p class="text-muted"><?= $data['tanggal_lahir'] !== '0000-00-00' ? date('d-m-Y', strtotime($data['tanggal_lahir'])) : '-'; ?></p>

          <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>
          <p class="text-muted"><?= $data['alamat']; ?></p>
          <div class="d-flex justify-content-end">
            <a href="?page=EditPasien&id=<?php echo $data['id']; ?>" class="btn btn-primary"><b>Edit Data Pasien</b></a>
            <a href="?page=HapusPasien&id=<?php echo $data['id']; ?>" class="btn btn-danger ml-2" onclick="return confirm('Yakin ingin hapus <?= $data['nama_pasien']; ?>');">
              <b>Hapus Data Pasien</b>
            </a>
          </div>

        </div>
        <!-- /.card-body -->
      </div>
    </div>

    <div class="card mt-4">
      <div class="card-header">
        <h5>Riwayat Cek Pasien Terakhir</h5>
      </div>
      <div class="card-body">
        <!-- START: Button -->
        <div class="d-flex justify-content-start mb-4">
          <a href="?page=TambahCatatanMedis&id=<?php echo $data['id']; ?>" type="button" class="btn btn-sm btn-primary mr-3"><i class="fas fa-plus fa-sm text-white"></i> Tambah Medical Check</a>
          <a href="page/pasien/laporanpasien.php?id=<?= $data['id']; ?>" target="_blank" type="button" class="btn btn-sm btn-info mr-3"><i class="fas fa-download fa-sm text-white"></i> Hasilkan PDF</a>
        </div>
        <!-- END: Button -->
        <div class="table-responsive">
          <table id="dataTables" class="table table-hover">
            <thead>
              <tr>
                <th rowspan="2">No</th>
                <!-- <th rowspan="2">Nama Pasien</th> -->
                <th rowspan="2">Tanggal Periksa</th>
                <th colspan="3" style="text-align: center;">Kondisi</th>
                <th colspan="2" style="text-align: center;">Darah</th>
                <th rowspan="2">Keterangan</th>
                <th rowspan="2">Diagnosa</th>
                <th rowspan="2">Pengobatan</th>
                <th rowspan="2">Edit</th>
                <th rowspan="2">Hapus</th>
              </tr>
              <tr>
                <th>Tensi</th>
                <th>Tinggi</th>
                <th>Berat</th>
                <th>Gula</th>
                <th>Golongan</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; ?>
              <?php $pasien = viewDatas("SELECT * FROM `tbl_medical_check` WHERE nomor = '" . $data['nomor'] . "' ORDER BY tanggal_periksa DESC"); ?>
              <?php foreach ($pasien as $catatan) : ?>

                <tr>
                  <td><?= $no++; ?></td>
                  <!-- <td><?= $catatan['nama_pasien']; ?></td> -->
                  <td><?= date('d-m-Y', strtotime($catatan['tanggal_periksa'])); ?></td>
                  <td><?= $catatan['tensi'] !== '' ? $catatan['tensi'] . ' mmHg' : '-'; ?></td>
                  <td><?= $catatan['tinggi'] !== '0' ? $catatan['tinggi'] . ' cm' : '-'; ?></td>
                  <td><?= $catatan['berat'] !== '0' ? $catatan['berat'] . ' kg' : '-'; ?></td>
                  <td><?= $catatan['gula_darah'] !== '0' ? $catatan['gula_darah'] : '-'; ?></td>
                  <td><?= $catatan['gol_darah'] !== '' ? $catatan['gol_darah'] : '-'; ?></td>
                  <td style="max-width: 110px; word-wrap: break-word;">
                    <?php
                    $keterangan = $catatan['keterangan'];
                    $truncatedKeterangan = strlen($keterangan) > 100 ? substr($keterangan, 0, 110) . '...' : $keterangan;
                    echo nl2br($truncatedKeterangan);
                    ?>
                  </td>
                  <td style="max-width: 110px; word-wrap: break-word;">
                    <?php
                    $diagnosa = $catatan['diagnosa'];
                    $truncatedDiagnosa = strlen($diagnosa) > 150 ? substr($diagnosa, 0, 130) . '...' : $diagnosa;
                    echo nl2br($truncatedDiagnosa);
                    ?>
                  </td>
                  <td style="max-width: 110px; word-wrap: break-word;">
                    <?php
                    $pengobatan = $catatan['pengobatan'];
                    $truncatedPengobatan = strlen($pengobatan) > 150 ? substr($pengobatan, 0, 150) . '...' : $pengobatan;
                    echo nl2br($truncatedPengobatan);
                    ?>
                  </td>
                  <td>
                    <a href="?page=EditCatatanMedis&id=<?php echo $catatan['id']; ?>" class="btn btn-primary"><b>Edit</b></a>
                  </td>
                  <td>
                    <a href="?page=HapusCatatanMedis&id=<?php echo $catatan['id']; ?>" class="btn btn-danger ml-2" onclick="return confirm('Yakin ingin hapus catatan medis pada tanggal <?= date('d-m-y', strtotime($catatan['tanggal_periksa'])); ?>');">
                      <b>Hapus</b>
                    </a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- /.row -->
  </div>
</div>