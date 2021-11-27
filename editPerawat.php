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
		if(isset($_POST['updatePerawat']))
		{
			$perawatUID = $_POST['perawat_uid'];
            $perawatNama = $_POST['perawat_nama'];
            $perawatNIK = $_POST['perawat_nik'];
            $perawatJenisKelamin = $_POST['perawat_jk'];
            $perawatAlamat = $_POST['perawat_alamat'];
            $perawatKontak = $_POST['perawat_kontak'];
            $id=intval($_GET['id']);
			$sql="UPDATE tb_perawat set rfid_uid=:perawatUID,nama_perawat=:perawatNama,nik_perawat=:perawatNIK,jenis_kelamin=:perawatJenisKelamin,alamat=:perawatAlamat,kontak_perawat=:perawatKontak where id=:id";
			$query = $dbh->prepare($sql);
            $query->bindParam(':perawatUID',$perawatUID,PDO::PARAM_STR);
            $query->bindParam(':perawatNama',$perawatNama,PDO::PARAM_STR);
            $query->bindParam(':perawatNIK',$perawatNIK,PDO::PARAM_STR);
            $query->bindParam(':perawatJenisKelamin',$perawatJenisKelamin,PDO::PARAM_STR);
            $query->bindParam(':perawatAlamat',$perawatAlamat,PDO::PARAM_STR);
            $query->bindParam(':perawatKontak',$perawatKontak,PDO::PARAM_STR);
			$query->bindParam(':id',$id,PDO::PARAM_STR);
			$query->execute();
			header('location:index.php?halaman=daftartenagamedis');
		}
	}
?>