<?php
$title 	= 'Setting';
include "../include/header.php";
include "../include/database.php";
?>

<?php
    $xcrud = Xcrud::get_instance();
	$xcrud->table('setting');
	$xcrud->table_name('Setting');
	$xcrud->change_type('logo', 'image');
	$xcrud->unset_add();
	$xcrud->unset_title();
	$xcrud->unset_remove();
	$xcrud->column_name( 'cost', 'Cost per (KM)' );
	$xcrud->change_type('theme','select','','skin-blue,skin-red');
    echo $xcrud->render();
	?>

<?php
$jquery;
include "../include/footer.php";
?>