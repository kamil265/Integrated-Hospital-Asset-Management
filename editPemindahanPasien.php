<?php
	include('connect.php');

		if(isset($_POST['updatePemindahanPasien']))
		{
			
			$asalRuang=$_POST['asal_ruang'];
            $ruangPemindahan=$_POST['ruang_pemindahan'];
			$catid=intval($_GET['id']);
			$sql="UPDATE tb_pemindahanpasien set asal_ruang=:asalRuang, ruang_pemindahan=:ruangPemindahan where id=:catid";
			$query = $dbh->prepare($sql);
			$query->bindParam(':asalRuang',$asalRuang,PDO::PARAM_STR);
			$query->bindParam(':ruangPemindahan',$ruangPemindahan,PDO::PARAM_STR);
			$query->bindParam(':catid',$catid,PDO::PARAM_STR);
			$query->execute();
			$_SESSION['updatemsg']="Brand updated successfully";
			header('location:index.php?halaman=clinicalmng-pasien');
		}
	
?>