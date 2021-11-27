<?php
    session_start();
    error_reporting(0);
    include 'connect.php';
    if(strlen($_SESSION['alogin'])==0)
    {   
        header('location:index.php');
    }
    else{ 
        if(isset($_POST['insertPasien']))
        {
            $uid = $_POST['uid'];
            $kategori = $_POST['kategori'];
            $nik = $_POST['nik'];
            $nama = $_POST['nama'];
            $tanggalLahir = $_POST['tanggalLahir'];
            $jkPasien = $_POST['jk_pasien'];
            $alamat = $_POST['alamat'];
            $pj = $_POST['pj_pasien'];
            $diagnosa = $_POST['diagnosa'];
            $dokterPenanggungjawab = $_POST['dokterPenanggungjawab'];
            $statusPasien = $_POST['statusPasien'];
            $sql="INSERT INTO  tb_pasien(kode_rfid,nik,nama,tanggal_lahir,alamat,Penanggungjawab,diagnosa,dokter_penanggungjawab,kategori_pasien,status_pasien,jeniskelamin_pasien) VALUES (:uid,:nik,:nama,:tanggalLahir,:alamat,:pj,:diagnosa,:dokterPenanggungjawab,:kategori,:statusPasien,:jkPasien)";
            $query = $dbh->prepare($sql);
            $query->bindParam(':uid',$uid,PDO::PARAM_STR);
            $query->bindParam(':kategori',$kategori,PDO::PARAM_STR);
            $query->bindParam(':nik',$nik,PDO::PARAM_STR);
            $query->bindParam(':nama',$nama,PDO::PARAM_STR);
            $query->bindParam(':tanggalLahir',$tanggalLahir,PDO::PARAM_STR);
            $query->bindParam(':alamat',$alamat,PDO::PARAM_STR);
            $query->bindParam(':pj',$pj,PDO::PARAM_STR);
            $query->bindParam(':diagnosa',$diagnosa,PDO::PARAM_STR);
            $query->bindParam(':jkPasien',$jkPasien,PDO::PARAM_STR);
            $query->bindParam(':dokterPenanggungjawab',$dokterPenanggungjawab,PDO::PARAM_STR);
            $query->bindParam(':statusPasien',$statusPasien,PDO::PARAM_STR);
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
