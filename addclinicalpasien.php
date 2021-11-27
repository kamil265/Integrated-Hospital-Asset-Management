<?php
    // session_start();
    // error_reporting(0);
    include 'connect.php';
    // if(strlen($_SESSION['alogin'])==0)
    // {   
    //     header('location:index.php');
    // }
    // else{ 
        if(isset($_POST['insertclinicalpasien']))
        {
            $tag_id = $_POST['clcpasrfid'];
            $tanggal_masuk = $_POST['clcpastanggal'];
            $nama_pasien = $_POST['clcpasnama'];
            $jenis_pasien = $_POST['clcpaskategori'];
            $dokter = $_POST['clcpasdokter'];
            $diagnosa = $_POST['clcpasdiag'];
            $status = $_POST['clcpasstatus'];
            $asal_ruang = $_POST['clcpasasal'];
            $ruang_pemindahan = $_POST['clcpastujuan'];
            
            $sql = "INSERT INTO tb_clinical_pasien(tag_id,tanggal_masuk,nama_pasien,jenis_pasien,dokter,diagnosa,status,asal_ruang,ruang_pemindahan) VALUES (:tag_id,:tanggal_masuk,:nama_pasien,:jenis_pasien,:dokter,:diagnosa,:status,:asal_ruang,:ruang_pemindahan)";
            $query = $dbh->prepare($sql);
            $query->bindParam(':tag_id',$tag_id,PDO::PARAM_STR);
            $query->bindParam(':tanggal_masuk',$tanggal_masuk,PDO::PARAM_STR);
            $query->bindParam(':nama_pasien',$nama_pasien,PDO::PARAM_STR);
            $query->bindParam(':jenis_pasien',$jenis_pasien,PDO::PARAM_STR);
            $query->bindParam(':dokter',$dokter,PDO::PARAM_STR);
            $query->bindParam(':diagnosa',$diagnosa,PDO::PARAM_STR);
            $query->bindParam(':status',$status,PDO::PARAM_STR);
            $query->bindParam(':asal_ruang',$asal_ruang,PDO::PARAM_STR);
            $query->bindParam(':ruang_pemindahan',$ruang_pemindahan,PDO::PARAM_STR);
            
            $query->execute();
            $lastInsertId = $dbh->lastInsertId();
            if($lastInsertId)
            {
                $_SESSION['msg']="Book Listed successfully";
                header('location:index.php?halaman=clinicalmng-pasien');
            }
            else 
            {
                $_SESSION['error']="Something went wrong. Please try again";
                header('location:index.php?halaman=clinicalmng-pasien');
            }
        }
    // }
?>