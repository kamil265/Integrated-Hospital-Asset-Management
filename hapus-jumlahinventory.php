<?php
require_once('connect.php');
	$id = $_GET['id'];
	$sql = "DELETE FROM `jumlah_inventory` WHERE id= ?";
	$row = $dbh->prepare($sql);
	$row->execute(array($id));
	
	echo '<script>alert("Berhasil Hapus Data");window.location="index.php?halaman=jumlah-peralatanmedis"</script>';
?>


