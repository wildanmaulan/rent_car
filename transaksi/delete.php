<?php


session_start();
require '../config.php';


$db->transaksi->deleteOne(['_id' => $_GET['id']]);


$_SESSION['success'] = "Data berhasil dihapus";
header("Location: index.php");


?>