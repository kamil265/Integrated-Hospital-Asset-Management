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
            $uidPas = $_POST['uid'];
            $kategori = $_POST['kategori'];
            $nik = $_POST['nik'];
            $nama = $_POST['nama'];
            $jenisKelamin = $_POST['jenisKelamin'];
            $tanggalLahir = $_POST['tanggalLahir'];
            $alamat = $_POST['alamat'];
            $pj = $_POST['pj'];
            $kontakPj = $_POST['kontak_pj'];
            $diagnosa = $_POST['diagnosa'];
            $dokterPenanggungjawab = $_POST['dokterPenanggungjawab'];
            $statusPasien = $_POST['statusPasien'];
            $sql="INSERT INTO tb_pasien(kode_rfid,nik,nama,jeniskelamin_pasien,tanggal_lahir,alamat,Penanggungjawab,diagnosa,dokter_penanggungjawab,kategori_pasien,status_pasien,nomor_telefon) VALUES (:uidPas,:nik,:nama,:jenisKelamin,:tanggalLahir,:alamat,:pj,:diagnosa,:dokterPenanggungjawab,:kategori,:statusPasien,:kontakPj)";
            $query = $dbh->prepare($sql);
            $query->bindParam(':uidPas',$uidPas,PDO::PARAM_STR);
            $query->bindParam(':kategori',$kategori,PDO::PARAM_STR);
            $query->bindParam(':nik',$nik,PDO::PARAM_STR);
            $query->bindParam(':nama',$nama,PDO::PARAM_STR);
            $query->bindParam(':jenisKelamin',$jenisKelamin,PDO::PARAM_STR);
            $query->bindParam(':tanggalLahir',$tanggalLahir,PDO::PARAM_STR);
            $query->bindParam(':alamat',$alamat,PDO::PARAM_STR);
            $query->bindParam(':pj',$pj,PDO::PARAM_STR);
            $query->bindParam(':kontakPj',$kontakPj,PDO::PARAM_STR);
            $query->bindParam(':diagnosa',$diagnosa,PDO::PARAM_STR);
            $query->bindParam(':dokterPenanggungjawab',$dokterPenanggungjawab,PDO::PARAM_STR);
            $query->bindParam(':statusPasien',$statusPasien,PDO::PARAM_STR);
            $query->execute();
            $lastInsertId = $dbh->lastInsertId();
            if($lastInsertId)
            {
                header('location:index.php?halaman=quickadd');
            }
            else 
            {
                header('location:index.php');
            }
        }
    }
?>