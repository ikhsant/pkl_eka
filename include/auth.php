<?php
session_start();
if(!isset($_SESSION["akses_level"])){
header("Location: login.php");
exit();
}
?>