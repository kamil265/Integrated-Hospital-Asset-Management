<?php

	include('connect.php');

		if(isset($_POST['updateKaryawan']))
		{
            $UIDKaryawan = $_POST['karyawan_uid'];
            $namaKaryawan = $_POST['karyawan_nama'];
            $nikKaryawan = $_POST['karyawan_nik'];
            $jenisKelaminKaryawan = $_POST['karyawan_jk'];
            $alamatKaryawan = $_POST['karyawan_alamat'];
            $divisiKaryawan = $_POST['karyawan_divisi'];
            $kontakKaryawan = $_POST['karyawan_kontak'];
            $id=intval($_GET['id']);
			$sql="UPDATE tb_karyawan set kode_rfid=:UIDKaryawan,nama_karyawan=:namaKaryawan,nik_karyawan=:nikKaryawan,jenis_kelamin_karyawan=:jenisKelaminKaryawan,alamat_karyawan=:alamatKaryawan,kontak_karyawan=:kontakKaryawan,divisi_karyawan=:divisiKaryawan where id=:id";
			$query = $dbh->prepare($sql);
            $query->bindParam(':UIDKaryawan',$UIDKaryawan,PDO::PARAM_STR);
            $query->bindParam(':namaKaryawan',$namaKaryawan,PDO::PARAM_STR);
            $query->bindParam(':nikKaryawan',$nikKaryawan,PDO::PARAM_STR);
            $query->bindParam(':jenisKelaminKaryawan',$jenisKelaminKaryawan,PDO::PARAM_STR);
            $query->bindParam(':alamatKaryawan',$alamatKaryawan,PDO::PARAM_STR);
            $query->bindParam(':divisiKaryawan',$divisiKaryawan,PDO::PARAM_STR);
            $query->bindParam(':kontakKaryawan',$kontakKaryawan,PDO::PARAM_STR);
            $query->bindParam(':id',$id,PDO::PARAM_STR);
            $query->execute();
			header('location:index.php?halaman=daftartenagamedis');
		}
?>