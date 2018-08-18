<?php
$title 	= 'Data Pengawas';
include "../include/header.php";
include "../include/database.php";
?>

<?php
    $xcrud = Xcrud::get_instance();
	$xcrud->table('pengawas');
	$xcrud->unset_title();
	$xcrud->table_name('Data Pengawas');
	$xcrud->change_type('password', 'password', 'sha1', array('maxlength'=>20,'placeholder'=>'Masukan password'));
	$xcrud->change_type('foto', 'image');

    echo $xcrud->render();
	?>

<?php
$jquery;
include "../include/footer.php";
?>