<?php
$title 	= 'Data Siswa di awas';
include "../include/header.php";
?>

<div class="panel panel-default">
	<div class="table-responsive">
		<table class="table table-hovered">
			<tr>
				<th>Nama Siswa</th>
				<th>Jurusan</th>
				<th>Nilai</th>
				<th>Aksi</th>
			</tr>
			<?php  
			$id_pengawas = $_SESSION['id_pengawas'];
			$siswa = mysqli_query($conn,"SELECT siswa.*,pengajuan.*,perusahaan.* FROM siswa LEFT JOIN pengajuan ON siswa.id_siswa = pengajuan.id_siswa LEFT JOIN perusahaan ON pengajuan.id_perusahaan = perusahaan.id_perusahaan WHERE id_pengawas = '$id_pengawas' ");
			foreach($siswa as $siswa1){
				?>
				<tr>
					<td><?php echo $siswa1['nama_siswa'] ?></td>
					<td><?php echo $siswa1['jurusan'] ?></td>
					<td><?php echo $siswa1['nilai'] ?></td>
					<td width="20%">
						<button class="btn btn-primary" data-toggle="modal" data-target="#modal-default<?php echo $siswa1['id_siswa'] ?>"><i class="fa fa-plus"></i> Beri Nilai</button>
					</td>
				</tr>

				<div class="modal fade" id="modal-default<?php echo $siswa1['id_siswa'] ?>">
					<div class="modal-dialog">
						<div class="modal-content">
							<form method="post">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title">Beri Nilai</h4>
									</div>
									<div class="modal-body">
										<div class="form-group">
											<label>NILAI</label>
											<input type="text" name="nilai" class="form-control" required>
											<input type="hidden" name="id_siswa" class="form-control" value="<?php echo $siswa1['id_siswa'] ?>">
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
										<button type="submit" class="btn btn-primary" name="submit"><i class="fa fa-save"></i> Save</button>
									</div>
								</form>
							</div>
							<!-- /.modal-content -->
						</div>
						<!-- /.modal-dialog -->
					</div>
					<!-- /.modal -->
				<?php } ?>
			</table>
		</div>
	</div>

	<?php  
	if (isset($_POST['submit'])) {
		$nilai = $_POST['nilai'];
		$id_siswa = $_POST['id_siswa'];
		mysqli_query($conn,"UPDATE siswa SET nilai = '$nilai' WHERE id_siswa = '$id_siswa' ");
		// redirect
		echo '<meta http-equiv="refresh" content="0"; URL="pengawas_menu.php" />';

	}
	?>
	<?php
	include "../include/footer.php";
	?>