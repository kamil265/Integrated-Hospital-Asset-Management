<?php
    session_start();
    error_reporting(0);
    include 'connect.php';
    if(strlen($_SESSION['alogin'])==0)
    {   
        header('location:index.php');
    }
    else{ 
        if(isset($_POST['insertDokter']))
        {
            $drUID = $_POST['dr_uid'];
            $drNama = $_POST['dr_nama'];
            $drNIK = $_POST['dr_nik'];
            $drJenisKelamin = $_POST['dr_jk'];
            $drAlamat = $_POST['dr_alamat'];
            $drKontak = $_POST['dr_kontak'];
            $drSpesialisasi = $_POST['dr_spesialisasi'];
            $sql="INSERT INTO  tb_dokter(rfid_uid,nama_dokter,nik_dokter,jenis_kelamin_dokter,alamat_dokter,kontak_dokter,spesialis) VALUES (:drUID,:drNama,:drNIK,:drJenisKelamin,:drAlamat,:drKontak,:drSpesialisasi)";
            $query = $dbh->prepare($sql);
            $query->bindParam(':drUID',$drUID,PDO::PARAM_STR);
            $query->bindParam(':drNama',$drNama,PDO::PARAM_STR);
            $query->bindParam(':drNIK',$drNIK,PDO::PARAM_STR);
            $query->bindParam(':drJenisKelamin',$drJenisKelamin,PDO::PARAM_STR);
            $query->bindParam(':drAlamat',$drAlamat,PDO::PARAM_STR);
            $query->bindParam(':drKontak',$drKontak,PDO::PARAM_STR);
            $query->bindParam(':drSpesialisasi',$drSpesialisasi,PDO::PARAM_STR);
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