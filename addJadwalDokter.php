<?php
    session_start();
    error_reporting(0);
    include 'connect.php';
    if(strlen($_SESSION['alogin'])==0)
    {   
        header('location:login.php');
    }
    else
    { 
        if(isset($_POST['tambahJadwal']))
        {
            $uidDokter=$_POST['uid_jadwaldok'];
            $hariPraktik=$_POST['tanggal_praktik'];
            $jamMulai=$_POST['jam_mulai'];
            $jamSelesai=$_POST['jam_selesai'];
            $sql="INSERT INTO  tb_jadwaldokter (dokter_id,hari_praktik,jam_mulai,jam_selesai) VALUES(:uidDokter,:hariPraktik,:jamMulai,:jamSelesai)";
            $query = $dbh->prepare($sql);
            $query->bindParam(':uidDokter',$uidDokter,PDO::PARAM_STR);
            $query->bindParam(':hariPraktik',$hariPraktik,PDO::PARAM_STR);
            $query->bindParam(':jamMulai',$jamMulai,PDO::PARAM_STR);
            $query->bindParam(':jamSelesai',$jamSelesai,PDO::PARAM_STR);
            $query->execute();
            $lastInsertId = $dbh->lastInsertId();
        }
        if($lastInsertId)
        {
            $_SESSION['msg']="Brand Listed successfully";
            header('location:index.php?halaman=clinicalmng-nakes');
        }
        else 
        {
            $_SESSION['error']="Something went wrong. Please try again";
            header('location:index.php?halaman=clinicalmng-inventory');
        }
    }
?>