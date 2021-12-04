<?php
    session_start();
    error_reporting(0);
    include 'connect.php';
    if(strlen($_SESSION['alogin'])==0)
    {   
        header('location:index.php');
    }
    else{ 
        if(isset($_POST['insertPerawat']))
        {
            $perawatUID = $_POST['perawat_uid'];
            $perawatNama = $_POST['perawat_nama'];
            $perawatNIK = $_POST['perawat_nik'];
            $perawatJenisKelamin = $_POST['perawat_jk'];
            $perawatAlamat = $_POST['perawat_alamat'];
            $perawatDivisi = $_POST['perawat_divisi'];
            $perawatKontak = $_POST['perawat_kontak'];
            $sql="INSERT INTO  tb_perawat(rfid_uid,nama_perawat,nik_perawat,jenis_kelamin,alamat,kontak_perawat,divisi) VALUES (:perawatUID,:perawatNama,:perawatNIK,:perawatJenisKelamin,:perawatAlamat,:perawatKontak,:perawatDivisi)";
            $query = $dbh->prepare($sql);
            $query->bindParam(':perawatUID',$perawatUID,PDO::PARAM_STR);
            $query->bindParam(':perawatNama',$perawatNama,PDO::PARAM_STR);
            $query->bindParam(':perawatNIK',$perawatNIK,PDO::PARAM_STR);
            $query->bindParam(':perawatJenisKelamin',$perawatJenisKelamin,PDO::PARAM_STR);
            $query->bindParam(':perawatAlamat',$perawatAlamat,PDO::PARAM_STR);
            $query->bindParam(':perawatDivisi',$perawatDivisi,PDO::PARAM_STR);
            $query->bindParam(':perawatKontak',$perawatKontak,PDO::PARAM_STR);

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