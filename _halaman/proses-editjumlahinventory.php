<?php
include'connect.php';
		if(isset($_POST['updatejumlahperalatan']))
		{
			$kode_rfid = $_POST['kode_rfid'];
			$nama_aset = $_POST['nama_aset'];
			$jumlah = $_POST['jumlah'];
			$tempat = $_POST['tempat'];
			$terpakai = $_POST['terpakai'];
			$tersedia = $_POST['tersedia'];
			$id = $_POST['id'];
            $id=intval($_GET['id']);
			$sql = "UPDATE `jumlah_inventory` SET kode_rfid=?,nama_aset=?,jumlah=?,tempat=?,terpakai=?,tersedia=? WHERE id=?";
			// $sql="UPDATE tb_dokter set rfid_uid=:drUID,nama_dokter=:drNama,nik_dokter=:drNIK,jenis_kelamin_dokter=:drJenisKelamin,alamat_dokter=:drAlamat,kontak_dokter=:drKontak,spesialis=:drSpesialisasi where id=:id";
			$query = $dbh->prepare($sql);
            $query->bindParam(':kode_rfid',$kode_rfid,PDO::PARAM_STR);
            $query->bindParam(':nama_aset',$nama_aset,PDO::PARAM_STR);
            $query->bindParam(':jumlah',$jumlah,PDO::PARAM_STR);
            $query->bindParam(':tempat',$tempat,PDO::PARAM_STR);
            $query->bindParam(':terpakai',$terpakai,PDO::PARAM_STR);
            $query->bindParam(':tersedia',$tersedia,PDO::PARAM_STR);           
            $query->bindParam(':id',$id,PDO::PARAM_STR);
            $query->execute();
			header('location:index.php?halaman=jumlah-peralatanmedis');
		}
?>