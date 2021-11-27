<?php
include'connect.php';
		if(isset($_POST['updatePasien']))
		{
			$uid = $_POST['uid'];
            $kategori = $_POST['kategori'];
            $nik = $_POST['nik'];
            $nama = $_POST['nama'];
            $tanggalLahir = $_POST['tanggalLahir'];
            $alamat = $_POST['alamat'];
            $pj = $_POST['pj_pasien'];
            $diagnosa = $_POST['diagnosa'];
            $dokterPenanggungjawab = $_POST['dokterPenanggungjawab'];
            $statusPasien = $_POST['statusPasien'];
            $id=intval($_GET['id']);
			$sql="UPDATE tb_pasien set kode_rfid=:uid,kategori_pasien=:kategori,nik=:nik,nama=:nama,tanggal_lahir=:tanggalLahir,alamat=:alamat,Penanggungjawab=:pj, diagnosa=:diagnosa, dokter_penanggungjawab=:dokterPenanggungjawab, status_pasien=:statusPasien where id=:id";
			$query = $dbh->prepare($sql);
            $query->bindParam(':uid',$uid,PDO::PARAM_STR);
            $query->bindParam(':kategori',$kategori,PDO::PARAM_STR);
            $query->bindParam(':nik',$nik,PDO::PARAM_STR);
            $query->bindParam(':nama',$nama,PDO::PARAM_STR);
            $query->bindParam(':tanggalLahir',$tanggalLahir,PDO::PARAM_STR);
            $query->bindParam(':alamat',$alamat,PDO::PARAM_STR);
            $query->bindParam(':pj',$pj,PDO::PARAM_STR);
            $query->bindParam(':diagnosa',$diagnosa,PDO::PARAM_STR);
            $query->bindParam(':dokterPenanggungjawab',$dokterPenanggungjawab,PDO::PARAM_STR);
            $query->bindParam(':statusPasien',$statusPasien,PDO::PARAM_STR);
            $query->bindParam(':id',$id,PDO::PARAM_STR);
            $query->execute();
			header('location:index.php?halaman=pasien');
		}
?>