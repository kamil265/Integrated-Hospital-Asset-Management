<?php
    session_start();
    error_reporting(0);
    include 'connect.php';
    if(strlen($_SESSION['alogin'])==0)
    {   
        header('location:index.php');
    }
    else{ 
        if(isset($_POST['insertKaryawan']))
        {
            $UIDKaryawan = $_POST['karyawan_uid'];
            $namaKaryawan = $_POST['karyawan_nama'];
            $nikKaryawan = $_POST['karyawan_nik'];
            $jenisKelaminKaryawan = $_POST['karyawan_jk'];
            $alamatKaryawan = $_POST['karyawan_alamat'];
            $divisiKaryawan = $_POST['karyawan_divisi'];
            $kontakKaryawan = $_POST['karyawan_kontak'];
            $sql="INSERT INTO  tb_karyawan(kode_rfid,nama_karyawan,nik_karyawan,jenis_kelamin_karyawan,alamat_karyawan,divisi_karyawan,kontak_karyawan) VALUES (:UIDKaryawan,:namaKaryawan,:nikKaryawan,:jenisKelaminKaryawan,:alamatKaryawan,:divisiKaryawan,:kontakKaryawan)";
            $query = $dbh->prepare($sql);
            $query->bindParam(':UIDKaryawan',$UIDKaryawan,PDO::PARAM_STR);
            $query->bindParam(':namaKaryawan',$namaKaryawan,PDO::PARAM_STR);
            $query->bindParam(':nikKaryawan',$nikKaryawan,PDO::PARAM_STR);
            $query->bindParam(':jenisKelaminKaryawan',$jenisKelaminKaryawan,PDO::PARAM_STR);
            $query->bindParam(':alamatKaryawan',$alamatKaryawan,PDO::PARAM_STR);
            $query->bindParam(':divisiKaryawan',$divisiKaryawan,PDO::PARAM_STR);
            $query->bindParam(':kontakKaryawan',$kontakKaryawan,PDO::PARAM_STR);
            $query->execute();
            $lastInsertId = $dbh->lastInsertId();
            if($lastInsertId)
            {
                $_SESSION['msg']="Book Listed successfully";
                header('location:index.php?halaman=quickadd');
            }
            else 
            {
                $_SESSION['error']="Something went wrong. Please try again";
                header('location:index.php');
            }
        }
    }
?>