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
        if(isset($_POST['tambahJadwalPerawat']))
        {
            $uidPerawat=$_POST['uid_jadwalper'];
            $hariPraktik=$_POST['tanggal_praktik'];
            $jamMulai=$_POST['jam_mulai'];
            $jamSelesai=$_POST['jam_selesai'];
            $sql="INSERT INTO  tb_jadwalperawat (perawat_id,hari_praktik,jam_mulai,jam_selesai) VALUES(:uidPerawat,:hariPraktik,:jamMulai,:jamSelesai)";
            $query = $dbh->prepare($sql);
            $query->bindParam(':uidPerawat',$uidPerawat,PDO::PARAM_STR);
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
            header('location:index.php?halaman=clinicalmng-nakes');
        }
    }
?>