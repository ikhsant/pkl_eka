<?php
$title 	= 'Kunjungan';
include "../include/header.php";
include "../include/database.php";
?>

<?php
    $xcrud = Xcrud::get_instance();
	$xcrud->table('kunjungan');
	$xcrud->unset_title();
	$xcrud->relation('perusahaan','perusahaan','id_perusahaan','nama_perusahaan');
	$xcrud->relation('pembimbing','pembimbing','id_pembimbing','nama_pembimbing');
    echo $xcrud->render();
	?>

<?php
include "../include/footer.php";
?>