<?php
	include('connect.php');

		if(isset($_POST['updateJadwalKaryawan']))
		{
			
			$tanggalKerja=$_POST['tanggal_kerja'];
			$jamMulai=$_POST['jam_mulai'];
            $jamSelesai=$_POST['jam_selesai'];
			$catid=intval($_GET['id']);
			$sql="UPDATE tb_jadwalkaryawan set hari_kerja=:tanggalKerja, jam_mulai=:jamMulai, jam_selesai=:jamSelesai where id=:catid";
			$query = $dbh->prepare($sql);
			$query->bindParam(':tanggalKerja',$tanggalKerja,PDO::PARAM_STR);
			$query->bindParam(':jamMulai',$jamMulai,PDO::PARAM_STR);
			$query->bindParam(':jamSelesai',$jamSelesai,PDO::PARAM_STR);
			$query->bindParam(':catid',$catid,PDO::PARAM_STR);
			$query->execute();
			$_SESSION['updatemsg']="Brand updated successfully";
			header('location:index.php?halaman=clinicalmng-nakes');
		}
	
?>