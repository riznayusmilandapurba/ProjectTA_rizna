<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Data Rapor Siswa</title>
	<style>
		body {
			padding: 0;
			margin: 0;
		}

		.page {

			/* margin: 0 auto;' */
			/* position: absolute; */
			/* top: 170px; */
			position: relative;
			top: 25;
		}

		table th,
		table td {
			text-align: left;
		}

		table.layout {
			width: 100%;
			border-collapse: collapse;
		}

		table.display {
			margin: 1em 0;
		}

		table.display th,
		table.display td {
			border: 1px solid #B3BFAA;
			padding: .5em 1em;
		}

		table.display th {
			background: #D5E0CC;
		}

		table.display td {
			background: #fff;
		}

		/* table.responsive-table{
            box-shadow: 0 1px 10px rgba(0, 0, 0, 0.2);
        }  */

		.customer {
			padding-left: 600px;
		}

		.logo {
			position: absolute;
			left: 0px;
			top: 20px;
			z-index: 999;
		}

		.logo-baru {
			position: absolute;
			right: 0px;
			top: 20px;
			z-index: 999;
		}

		.koplaporan {
			height: 120px;
		}

		.logo img {
			width: 120px;
			height: 80px;

		}

		.logo-baru img {
			width: 120px;
			height: 80px;

		}

		.judul {
			/* position: absolute; */
			top: 0;
			text-align: center;
		}

		.garis {
			/* margin-top: 160px; */
			height: 3px;
			border-top: 3px solid black;
			border-bottom: 1px solid black;
		}

		.info {
			/* position: relative; */
			top: 60px;
			font-size: 20px;
			text-align: center;
		}

		.sub-header {
			font-size: 20px;
		}
	</style>
</head>

<body onload="window.print()">
	<div class="header">
		<?php
		if ($data == null) {
		?>
			<div class="alert alert-danger">
				<center>Maaf untuk saat ini nilai <strong>Belum Tersedia</strong></center>
			</div>
		<?php
		} else {  ?>
			<div class="koplaporan">
				<div class="logo">
					<img src="<?php echo base_url('assets/img/laporan/kop2.png') ?>">
				</div>
				<div class="logo-baru">
					<img src="<?php echo base_url('assets/img/laporan/kop1.png') ?>">
				</div>
				<div class="judul">
					<h2>
						PEMERINTAH KABUPATEN TANAH DATAR
					</h2>
					<div style="margin-top:-1em;margin-bottom:.9em">
						<span class="sub-header">YAYASAN QUR'AN USWATUN HASANAH</span><br>
						<span class="sub-header">SD QUR'AN USWATUN HASANAH</span><br>
						<span class="sub-header">KECAMATAN SEPULUH KOTO KABUPATEN TANAH DATAR</span><br>
						<span>Jl. Usang, Pandai Sikek, Kec. Sepuluh Koto, Kabupaten Tanah Datar, Sumatera Barat 26181</span><br>
					</div>
				</div>
				<div class="garis"></div>
			</div>

	</div>
	<?php $dataSession = $this->session->all_userdata();
			$id_user = $this->db->query("SELECT id_user, role_id FROM tbl_user WHERE email='$dataSession[email]' ")->row();

			if ($id_user->role_id == 2) {
				$pengajar = $this->db->query("SELECT nama_pengajar, id_pengajar FROM tbl_data_pengajar WHERE id_user='$id_user->id_user' ")->row();

				$data_kelas = $this->db->query("SELECT id_kelas, nama_kelas FROM tbl_data_kelas WHERE id_pengajar='$pengajar->id_pengajar' ")->row();
			} else if ($id_user->role_id == 3) {
				$kelas = $this->db->query("SELECT tbl_data_kelas.nama_kelas, tbl_data_kelas.id_pengajar FROM tbl_data_siswa
					JOIN tbl_data_kelas ON tbl_data_siswa.id_kelas=tbl_data_kelas.id_kelas
					WHERE id_user='$id_user->id_user' ")->row();

				$pengajar = $this->db->query("SELECT nama_pengajar, id_pengajar FROM tbl_data_pengajar WHERE id_pengajar='$kelas->id_pengajar' ")->row();

				$data_kelas = $this->db->query("SELECT id_kelas, nama_kelas FROM tbl_data_kelas WHERE id_pengajar='$pengajar->id_pengajar' ")->row();
			}

	?>
	<div class="info" style="margin-top:30px;">
		<strong>Laporan Nilai Siswa </strong> <br>
		<table style="margin-left: auto; margin-right: auto">

			<tr>
				<td>Nama Siswa</td>
				<td style="padding-left: 10px; padding-right: 10px ">:</td>
				<td>
					<?= $siswa->nama_siswa; ?>
				</td>
			</tr>

			<tr>
				<td>Kelas</td>
				<td style="padding-left: 10px; padding-right: 10px ">:</td>
				<td><?= $data_kelas->nama_kelas; ?></td>
			</tr>

			<tr>
				<td>Tahun Ajar/(Semester)</td>
				<td style="padding-left: 10px; padding-right: 10px ">:</td>
				<td><?= $ajar->tahun_ajar ?>/(<?= $ajar->semester ?>)</td>
			</tr>

		</table>
	</div>
	<div class="page">
		<table class="layout display responsive-table" style="font-size: 18px">
			<thead>
				<tr>
					<th scope="col">No</th>
					<th scope="col">Nama Mapel</th>
					<th scope="col">KKM</th>
					<th scope="col">Nilai Tugas</th>
					<th scope="col">Nilai UH</th>
					<th scope="col">Nilai UTS</th>
					<th scope="col">Nilai UAS</th>
					<th scope="col">Nilai Akhir</th>
					<th scope="col">Nilai Predikat</th>
					<th scope="col">Keterangan</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$jumlah_mata_pelajaran = 0;

				$jumlah_nilai = 0;
				?>
				<?php foreach ($data as $i => $d) {
				?>
					<tr>
						<th scope="row"><?= $i + 1 ?></th>
						<td><?= $d->nama_mapel; ?></td>
						<td><?= $d->kkm ?: 0; ?></td>
						<td><?= $d->nilai_tugas ?: 0; ?></td>
						<td><?= $d->nilai_uh ?: 0; ?></td>
						<td><?= $d->nilai_uts ?: 0; ?></td>
						<td><?= $d->nilai_uas ?: 0; ?></td>
						<td><?= $d->nilai_akhir ?: 0; ?></td>
						<td><?= $d->predikat ?: "-"; ?></td>
						<td><?= $d->keterangan ?: "-"; ?></td>

					</tr>

					<?php
					$jumlah_mata_pelajaran += 1;
					$jumlah_nilai += $d->nilai_akhir;
					?>
				<?php } ?>

			</tbody>
		</table>

	</div>

	<?php
			$rata_rata = 0;
			$message = "";
			$kelas = 0;
			$rata_rata = round($jumlah_nilai / $jumlah_mata_pelajaran);

			if ((int)$ajar->semester % 2 == 0) {
				if ($rata_rata >= 70) {
					$kelas = $data_kelas->id_kelas + 1;
					//$this->db->query("UPDATE tbl_data_siswa SET id_kelas=$kelas WHERE id_siswa=$siswa->id_siswa");
					// $message = "Selamat Anda Naik Ke Kelas " . $kelas;
				} else {
					// $message = "Maaf Anda Tinggal Kelas";
				}
			}


	?>
	<p><?= $message ?></p>


	<div class="tandatangan" style="float:right;margin-right:1.2em;width:20%;text-align:center;">
		<div class="tanggal">
			<p>Tanah Datar, <?= date('d-m-Y') ?></p>
		</div>
		<div class="ruangttd" style="margin-bottom:5em"></div>
		<div class="namapengajar">
			<!-- <span style="border-bottom:2px solid black;padding-right:20px;padding-left:20px;"><?= strtoupper($pengajar->nama_pengajar); ?></span> -->
			<br>
			<span>Wali Kelas</span>
		</div>
	</div>
<?php } ?>
</body>

</html>
