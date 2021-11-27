<?php
	include('connect.php');

		if(isset($_POST['updateReservasiKamar']))
		{
			
			$jenisKamar=$_POST['jenis_kamar'];
            $kelasKamar=$_POST['kelas_kamar'];
            $ruang=$_POST['ruang'];
			$catid=intval($_GET['id']);
			$sql="UPDATE tb_reservasikamar set jenis_kamar=:jenisKamar, kelas_kamar=:kelasKamar, ruang=:ruang where id=:catid";
			$query = $dbh->prepare($sql);
			$query->bindParam(':jenisKamar',$jenisKamar,PDO::PARAM_STR);
			$query->bindParam(':kelasKamar',$kelasKamar,PDO::PARAM_STR);
            $query->bindParam(':ruang',$ruang,PDO::PARAM_STR);
			$query->bindParam(':catid',$catid,PDO::PARAM_STR);
			$query->execute();
			$_SESSION['updatemsg']="Brand updated successfully";
			header('location:index.php?halaman=clinicalmng-pasien');
		}
	
?>