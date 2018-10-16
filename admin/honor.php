<?php
$title 	= 'Honor';
include "../include/header.php";
include "../include/database.php";
?>

<?php
 //    $xcrud = Xcrud::get_instance();
	// $xcrud->table('kunjungan');
	// $xcrud->join('pembimbing','pembimbing','id_pembimbing');
	// $xcrud->join('perusahaan','perusahaan','id_perusahaan');
	// $xcrud->columns('perusahaan,pembimbing,cost');
	// $xcrud->table_name('Data Honor');
 //    echo $xcrud->render();
	?>

	<div class="panel panel-default">
		<div class="panel-heading">
			Honor Kunjungan Guru Pembimbing
		</div>
		<div class="panel-body">
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>Guru Pembimbing</th>
						<th>Perusahaan</th>
						<th>Honor</th>
					</tr>
				</thead>
				<tbody>
					<?php  
					$perjalanan = mysqli_query($conn, "
						SELECT kunjungan.*, pembimbing.nama_pembimbing, perusahaan.nama_perusahaan, perusahaan.jarak
						FROM kunjungan
						JOIN pembimbing
						ON pembimbing = id_pembimbing
						JOIN perusahaan
						ON perusahaan = id_perusahaan
						");
					foreach($perjalanan as $perjalanan){
						$honor = $setting['cost'] * $perjalanan['jarak'];
					?>
					<tr>
						<td><?php echo $perjalanan['nama_pembimbing']; ?></td>
						<td><?php echo $perjalanan['nama_perusahaan']; ?></td>
						<td><?php echo $honor; ?></td>
					</tr>
				<?php } ?>
				</tbody>
			</table>			
		</div>
	</div>

<?php
include "../include/footer.php";
?>