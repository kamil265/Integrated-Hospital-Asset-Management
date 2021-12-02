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
        if(isset($_POST['tambahPemindahanPasien']))
        {
            $uidPemindahanPasien=$_POST['uid_pemindahanpasien'];
            $asalRuang=$_POST['asal_ruang'];
            $ruangPemindahan=$_POST['ruang_pemindahan'];
            $sql="INSERT INTO  tb_pemindahanpasien (pasien_id,asal_ruang,ruang_pemindahan) VALUES(:uidPemindahanPasien,:asalRuang,:ruangPemindahan)";
            $query = $dbh->prepare($sql);
            $query->bindParam(':uidPemindahanPasien',$uidPemindahanPasien,PDO::PARAM_STR);
            $query->bindParam(':asalRuang',$asalRuang,PDO::PARAM_STR);
            $query->bindParam(':ruangPemindahan',$ruangPemindahan,PDO::PARAM_STR);
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