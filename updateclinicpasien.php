<?php
include 'connect.php';
		if(isset($_POST['editclinicalpasien']))
		{
			$rfid_uid = $_POST['clcrfid'];
            $tanggal_masuk = $_POST['clctanggal'];
            $kategori = $_POST['clckategori'];
			$nama_pasien = $_POST['clcnama'];
            $dokter = $_POST['clcdokter'];
            $diagnosa = $_POST['clcdiagnosa'];
            $clc_status = $_POST['clcstatus'];
			$asal = $_POST['clcasalruang'];
			$tujuan = $_POST['clcruangutujuan'];

            $id = intval($_GET['id']);
			$sql = "UPDATE tb_clinical_pasien set tag_id=:rfid_uid,tanggal_masuk=:tanggal_masuk,jenis_pasien=:kategori,nama_pasien=:nama_pasien,dokter=:dokter,diagnosa=:diagnosa,status=:clc_status,asal_ruang=:asal,ruang_pemindahan=:tujuan where id=:id";

			$query = $dbh->prepare($sql);
            $query->bindParam(':rfid_uid',$rfid_uid,PDO::PARAM_STR);
            $query->bindParam(':tanggal_masuk',$tanggal_masuk,PDO::PARAM_STR);
            $query->bindParam(':kategori',$kategori,PDO::PARAM_STR);
            $query->bindParam(':nama_pasien',$nama_pasien,PDO::PARAM_STR);
            $query->bindParam(':dokter',$dokter,PDO::PARAM_STR);
            $query->bindParam(':diagnosa',$diagnosa,PDO::PARAM_STR);
            $query->bindParam(':clc_status',$clc_status,PDO::PARAM_STR);
			$query->bindParam(':asal',$asal,PDO::PARAM_STR);
			$query->bindParam(':tujuan',$tujuan,PDO::PARAM_STR);
            $query->bindParam(':id',$id,PDO::PARAM_STR);
            $query->execute();
			header('location:index.php?halaman=clinicalmng-pasien');
		}
?>