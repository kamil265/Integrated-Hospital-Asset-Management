<?php
	session_start();
	error_reporting(0);
	include('connect.php');
	if(strlen($_SESSION['alogin'])==0)
    {   
		header('location:index.php');
	}
	else
	{ 
		if(isset($_POST['updateAset']))
		{
			$uidAsset=$_POST['uid_aset_edit'];
            $namaAsset=$_POST['nama_aset_edit'];
			$kategoriAsset=$_POST['kategori_aset_edit'];
            $lokasiAsset=$_POST['penyimpanan_aset_edit'];
			$assetid=intval($_GET['assetid']);
			$sql="UPDATE tb_inventory SET kode_rfid=:uidAsset,nama_aset=:namaAsset,kategori=:kategoriAsset,lokasi_penyimpanan=:lokasiAsset where id=:assetid";
			$query = $dbh->prepare($sql);
			$query->bindParam(':uidAsset',$uidAsset,PDO::PARAM_STR);
			$query->bindParam(':namaAsset',$namaAsset,PDO::PARAM_STR);
			$query->bindParam(':kategoriAsset',$kategoriAsset,PDO::PARAM_STR);
			$query->bindParam(':lokasiAsset',$lokasiAsset,PDO::PARAM_STR);
			$query->bindParam(':assetid',$assetid,PDO::PARAM_STR);
			$query->execute();
			$_SESSION['updatemsg']="Brand updated successfully";
			header('location:index.php?halaman=clinicalmng-inventory');
		}
	}
?>