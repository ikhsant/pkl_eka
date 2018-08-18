<?php
$title 	= 'Data Pengajuan';
include "../include/header.php";
include "../include/database.php";
?>

<?php
    $xcrud = Xcrud::get_instance();
	$xcrud->table('pengajuan');
	$xcrud->unset_title();
	$xcrud->table_name('Data Pengajuan');
	$xcrud->relation('id_siswa','siswa','id_siswa','nama_siswa');
	$xcrud->relation('id_perusahaan','perusahaan','id_perusahaan','nama_perusahaan');

    echo $xcrud->render();
	?>

<?php
$jquery;
include "../include/footer.php";
?>