<?php
$title 	= 'Data Siswa';
include "../include/header.php";
include "../include/database.php";
?>

<?php
    $xcrud = Xcrud::get_instance();
	$xcrud->table('siswa');
	$xcrud->unset_title();
	$xcrud->table_name('Data Siswa');
	$xcrud->change_type('password', 'password', 'sha1', array('maxlength'=>20,'placeholder'=>'Masukan password'));
	$xcrud->change_type('foto', 'image');

	$xcrud->relation('id_pembimbing','pembimbing','id_pembimbing','nama_pembimbing');

    echo $xcrud->render();
	?>

<?php
$jquery;
include "../include/footer.php";
?>