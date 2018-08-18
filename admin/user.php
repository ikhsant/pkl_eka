<?php
$title 	= 'Data User';
include "../include/header.php";
include "../include/database.php";
?>

<?php
    $xcrud = Xcrud::get_instance();
	$xcrud->table('user');
	$xcrud->unset_title();
	$xcrud->table_name('Data User');
	$xcrud->change_type('password', 'password', 'sha1', array('maxlength'=>10,'placeholder'=>'Masukan password'));
	$xcrud->change_type('foto', 'image');
	$xcrud->change_type('akses_level','select','','admin,operator');

    echo $xcrud->render();
	?>

<?php
$jquery;
include "../include/footer.php";
?>