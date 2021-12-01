<?php
require_once('connect.php');
	// untuk Hapus data barang berdasarkan id barang
	$id = $_GET['id'];
	$sql = "DELETE FROM tb_pemindahanpasien WHERE id= ?";
	$row = $dbh->prepare($sql);
	$row->execute(array($id));
	
	echo '<script>alert("Berhasil Hapus Data");window.location="index.php?halaman=clinicalmng-pasien"</script>';
?>