<?php
    session_start();
    error_reporting(0);
    include'connect.php';
    if(strlen($_SESSION['alogin'])==0)
    {   
        header('location:login.php');
    }
    else
    { 
        if(isset($_POST['tambahReservasi']))
        {
            $uidReservasiKamar=$_POST['uid_reservasikamar'];
            $jenisKamar=$_POST['jenis_kamar'];
            $kelasKamar=$_POST['kelas_kamar'];
            $ruang=$_POST['ruang'];
            $sql="INSERT INTO  tb_reservasikamar (pasien_id,jenis_kamar,kelas_kamar,ruang) VALUES(:uidReservasiKamar,:jenisKamar,:kelasKamar,:ruang)";
            $query = $dbh->prepare($sql);
            $query->bindParam(':uidReservasiKamar',$uidReservasiKamar,PDO::PARAM_STR);
            $query->bindParam(':jenisKamar',$jenisKamar,PDO::PARAM_STR);
            $query->bindParam(':kelasKamar',$kelasKamar,PDO::PARAM_STR);
            $query->bindParam(':ruang',$ruang,PDO::PARAM_STR);
            $query->execute();
            $lastInsertId = $dbh->lastInsertId();
        }
        if($lastInsertId)
        {
            $_SESSION['msg']="Brand Listed successfully";
            header('location:index.php?halaman=clinicalmng-pasien');
        }
        else 
        {
            $_SESSION['error']="Something went wrong. Please try again";
            header('location:index.php?halaman=clinicalmng-pasien');
        }
    }
?>