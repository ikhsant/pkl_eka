<?php
$title 	= 'Data Siswa';
include "../include/header.php";
?>

<?php 
// notif pesan
if (!empty($_SESSION['pesan'])) { ?>
	<div class="alert alert-success alert-dismissible">
		<i class="fa fa-check"></i> <?php echo $_SESSION['pesan']; ?>
	</div>
	<br>
	<?php 
	$_SESSION['pesan'] = '';
} 

// notif pesan ewrror
if (!empty($_SESSION['error'])) { ?>
	<div class="alert alert-danger alert-dismissible">
		<i class="fa fa-check"></i> <?php echo $_SESSION['error']; ?>
	</div>
	<br>
	<?php 
	$_SESSION['error'] = '';
} 
?>

<?php 
// mendapat detail dari database
// siswa id
$id_siswa = $_SESSION['id_siswa'];
$siswa = mysqli_fetch_assoc(mysqli_query($conn,"SELECT siswa.*, pembimbing.nama_pembimbing FROM siswa JOIN pembimbing ON siswa.id_pembimbing = pembimbing.id_pembimbing WHERE id_siswa = '$id_siswa' "));
?>

<div class="col-md-6">
	<div class="panel panel-default">
		<table class="table table-striped">
			<tr>
				<th>NIS</th>
				<td><?php echo $siswa['nis']; ?></td>
			</tr>
			<tr>
				<th>Nama</th>
				<td><?php echo $siswa['nama_siswa']; ?></td>
			</tr>
			<tr>
				<th>Jurusan</th>
				<td><?php echo $siswa['jurusan']; ?></td>
			</tr>
			<tr>
				<th>Pembimbing</th>
				<td><?php echo $siswa['nama_pembimbing']; ?></td>
			</tr>
		</table>
	</div>
</div>

<div class="col-md-6">
	<div class="panel panel-default">
		<div class="panel-heading">
			Daftar Perusahaan
		</div>
		<table class="table table-striped">
			<tr>
				<th>Nama Perusahaan</th>
				<th>Kuota PKL</th>
			</tr>
			<?php  
			$perusahaan = mysqli_query($conn,"SELECT * FROM perusahaan");
			foreach ($perusahaan as $perusahaan1) {
				?>
				<tr>
					<td><?php echo $perusahaan1['nama_perusahaan'] ?></td>
					<td><?php echo $perusahaan1['kapasitas'] ?></td>
				</tr>
				<?php	
			}
			?>
		</table>
	</div>
</div>

<div class="col-md-6">
	<div class="panel panel-default">
		<div class="panel-heading">
			PENGAJUAN PKL
		</div>
		<table class="table table-striped">
			<?php  
			$pengajuan = mysqli_query($conn, "SELECT pengajuan.*,perusahaan.nama_perusahaan FROM pengajuan JOIN perusahaan ON pengajuan.id_perusahaan = perusahaan.id_perusahaan WHERE id_siswa = '$id_siswa'");
			if (mysqli_num_rows($pengajuan) > 0) { 
				?>
				<tr>
					<th>Perusahaan</th>
					<th>Status</th>
				</tr>
				<?php  
				while($row = mysqli_fetch_assoc($pengajuan)) {?>
					<tr>
						<td><?php echo $row['nama_perusahaan'] ?></td>
						<td><?php echo $row['status'] ?></td>
					</tr>
				<?php } ?>
				<?php
			}else{
				?>
				<div class="panel-body">
					<h4>Belum ada pengajuan</h4>
					<button class="btn btn-primary" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus"></i> Tambah</button>
				</div>
			<?php } ?>
			
		</table>
	</div>
</div>

<div class="modal fade" id="modal-default">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Pengajuan</h4>
				</div>
				<form method="post">
					<div class="modal-body">
						<div class="form-group">
							<label>Perusahaan</label>
							<select class="form-control" name="perusahaan">
								<?php  
								foreach($perusahaan as $perusahaan2){
									?>
									<option value="<?php echo $perusahaan2['id_perusahaan'] ?>"><?php echo $perusahaan2['nama_perusahaan'] ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary" name="submit" onclick="return confirm('Yakin?, pilihan tidak dapat di rubah')"><i class="fa fa-save"></i> Save</button>
					</div>
				</form>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->
	<?php 
	if (isset($_POST['submit'])) {
		$perusahaan_dipilih = $_POST['perusahaan'];
	// menyimpan ke db pilihan yang di pilih
		mysqli_query($conn, "INSERT INTO pengajuan (id_perusahaan,id_siswa) VALUES ('$perusahaan_dipilih','$id_siswa')");
	// redirect
		echo '<meta http-equiv="refresh" content="0"; URL="siswa_list.php" />';

	}

	?>
	<?php
	include "../include/footer.php";
	?>