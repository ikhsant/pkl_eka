<?php
$title 	= 'Data Siswa di bimbing';
include "../include/header.php";
?>

<div class="panel panel-default">
	<div class="table-responsive">
	<table class="table table-hovered">
		<tr>
			<th>Nama Siswa</th>
			<th>Jurusan</th>
			<th>Pengajuan PKL</th>
			<th>Status</th>
		</tr>
		<?php  
		$id_pembimbing = $_SESSION['id_pembimbing'];
		$siswa = mysqli_query($conn,"SELECT siswa.*,pengajuan.*,perusahaan.nama_perusahaan FROM siswa LEFT JOIN pengajuan ON siswa.id_siswa = pengajuan.id_siswa LEFT JOIN perusahaan ON pengajuan.id_perusahaan = perusahaan.id_perusahaan WHERE id_pembimbing = '$id_pembimbing' ");
		foreach($siswa as $siswa1){
		?>
		<tr>
			<td><?php echo $siswa1['nama_siswa'] ?></td>
			<td><?php echo $siswa1['jurusan'] ?></td>
			<td><?php echo $siswa1['nama_perusahaan'] ?></td>
			<td><?php echo $siswa1['status'] ?></td>
		</tr>
		<?php } ?>
	</table>
</div>
</div>
<?php
include "../include/footer.php";
?>