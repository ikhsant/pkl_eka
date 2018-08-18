<?php
$title 	= 'Data Perusahaan';
include "../include/header.php";
include "../include/database.php";
?>

<?php
    $xcrud = Xcrud::get_instance();
	$xcrud->table('perusahaan');
	$xcrud->unset_title();
	$xcrud->table_name('Data Perusahaan');
	$xcrud->change_type('password', 'password', 'sha1', array('maxlength'=>20,'placeholder'=>'Masukan password'));
	$xcrud->change_type('foto', 'image');

	$xcrud->relation('id_pengawas','pengawas','id_pengawas','nama_pengawas');

    echo $xcrud->render();
	?>

<?php
$jquery;
include "../include/footer.php";
?>