<?php
// Cek tanggal sekarang
$currentDate = date('Y-m-d');

$query = "SELECT
            p.id,
            p.nama_pasien,
            p.alamat,
            p.no_hp,
			p.nomor,
            m.tanggal_periksa,
            m.diagnosa,
            m.keterangan
          FROM
            tbl_pasien p
          INNER JOIN
            tbl_medical_check m ON p.nomor = m.nomor ORDER BY tanggal_periksa DESC";


?>

<!-- Awal Isi Halaman -->
<!-- <div class="container container-fluid"> -->
<div style="margin-left: 150px; margin-right: 150px; margin-bottom: 50px;">

	<!-- START: Category -->
	<div class="card mt-4 mb-4">
		<div class="card-body">
			<h5 class="card-title">Dashboard</h5>
			<!-- <div class="row"> -->
			<div class="row text-center" style="display: flex; justify-content: center;">

				<div class="col-md">
					<div class="card text-white bg-info" style="max-width: 18rem;">
						<div class="card-body">
							<h1 class="card-title d-flex align-items-center justify-content-between">
								<i class="fas fa-user"></i>
								<span class="text-right"><?= numQueryData("SELECT * FROM tbl_medical_check WHERE tbl_medical_check.tanggal_periksa = '$currentDate'"); ?></span>
							</h1>
							<p class="card-text">Pasien Hari ini</p>
						</div>
					</div>
				</div>

				<div class="col-md">
					<div class="card text-white bg-primary" style="max-width: 18rem;">
						<div class="card-body">
							<h1 class="card-title d-flex align-items-center justify-content-between">
								<i class="fas fa-users"></i>
								<span class="text-right"><?= numData("tbl_pasien"); ?></span>
							</h1>
							<p class="card-text">Jumlah Total Pasien</p>
						</div>
					</div>
				</div>

				<div class="col-md">
					<div class="card text-white bg-success" style="max-width: 18rem;">
						<div class="card-body">
							<h1 class="card-title d-flex align-items-center justify-content-between">
								<i class="far fa-calendar-alt"></i>
								<span class="text-right"><?= date('d-m-Y'); ?></span>
							</h1>
							<p class="card-text">Tanggal Sekarang</p>
						</div>
					</div>
				</div>


			</div>
		</div>
	</div>
	<!-- END: Category -->



	<!-- START: Data Cek Pasien Terakhir -->
	<div class="card mt-4">
		<div class="card-header">
			<h5>Riwayat Cek Pasien Terakhir</h5>
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
							<th>Nama</th>
							<th>Tanggal Periksa</th>
							<th>Nomor</th>
							<th>No HP</th>
							<th>Alamat</th>
							<th>Keterangan</th>
							<th>Diagnosa</th>
							<th>Detail</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1; ?>
						<?php $catatan = viewDatas($query); ?>
						<?php foreach ($catatan as $data) : ?>
							<tr>
								<td><?= $no++; ?></td>
								<td style="max-width: 100px; word-wrap: break-word;"><?= $data['nama_pasien']; ?></td>
								<td><?= date('d-m-Y', strtotime($data['tanggal_periksa'])); ?></td>
								<td><?= $data['nomor']; ?></td>
								<td><?= $data['no_hp']; ?></td>
								<td style="max-width: 100px; word-wrap: break-word;">
									<?php
									$alamat = $data['alamat'];
									$truncatedAlamat = strlen($alamat) > 100 ? substr($alamat, 0, 80) . '...' : $alamat;
									echo nl2br($truncatedAlamat);
									?>
								</td>
								<td style="max-width: 100px; word-wrap: break-word;">
									<?php
									$keterangan = $data['keterangan'];
									$truncatedKeterangan = strlen($keterangan) > 100 ? substr($keterangan, 0, 80) . '...' : $keterangan;
									echo nl2br($truncatedKeterangan);
									?>
								</td>
								<td style="max-width: 100px; word-wrap: break-word;">
									<?php
									$diagnosa = $data['diagnosa'];
									$truncatedDiagnosa = strlen($diagnosa) > 100 ? substr($diagnosa, 0, 80) . '...' : $diagnosa;
									echo nl2br($truncatedDiagnosa);
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
	<!-- END: Data Cek Pasien Terakhir -->

</div>
<!-- Akhir Isi Halaman -->