<?php
include'connect.php';
		if(isset($_POST['updateDokter']))
		{
			$drUID = $_POST['dr_uid'];
            $drNama = $_POST['dr_nama'];
            $drNIK = $_POST['dr_nik'];
            $drJenisKelamin = $_POST['dr_jk'];  
            $drAlamat = $_POST['dr_alamat'];
            $drKontak = $_POST['dr_kontak'];
            $drSpesialisasi = $_POST['dr_spesialisasi'];
            $id=intval($_GET['id']);
			$sql="UPDATE tb_dokter set rfid_uid=:drUID,nama_dokter=:drNama,nik_dokter=:drNIK,jenis_kelamin_dokter=:drJenisKelamin,alamat_dokter=:drAlamat,kontak_dokter=:drKontak,spesialis=:drSpesialisasi where id=:id";
			$query = $dbh->prepare($sql);
            $query->bindParam(':drUID',$drUID,PDO::PARAM_STR);
            $query->bindParam(':drNama',$drNama,PDO::PARAM_STR);
            $query->bindParam(':drNIK',$drNIK,PDO::PARAM_STR);
            $query->bindParam(':drJenisKelamin',$drJenisKelamin,PDO::PARAM_STR);
            $query->bindParam(':drAlamat',$drAlamat,PDO::PARAM_STR);
            $query->bindParam(':drKontak',$drKontak,PDO::PARAM_STR);
            $query->bindParam(':drSpesialisasi',$drSpesialisasi,PDO::PARAM_STR);
            $query->bindParam(':id',$id,PDO::PARAM_STR);
            $query->execute();
			header('location:index.php?halaman=daftartenagamedis');
		}
?>