<?php
    // session_start();
    // error_reporting(0);
    include ('connect.php');
    // if(strlen($_SESSION['alogin'])==0)
    // {   
    //     header('location:index.php');
    // }
    // else{ 
        if(isset($_POST['insertclinicalkamar']))
        {
    
            $nama = $_POST['clckamnama'];
            $nik = $_POST['clckamnik'];
            $nomor_telpon = $_POST['clckamnotelp'];
            $alamat = $_POST['clckamalamat'];
            $diagnosa = $_POST['clckamdiagnosa'];
            
            $sql="INSERT INTO  tb_clinical_kamar(nama_register,nik,nomor_telpon,alamat,diagnosa) VALUES (:nama,:nik,:nomor_telpon,:alamat,:diagnosa)";
            $query = $dbh->prepare($sql);
            $query->bindParam(':nama',$nama,PDO::PARAM_STR);
            $query->bindParam(':nik',$nik,PDO::PARAM_STR);
            $query->bindParam(':nomor_telpon',$nomor_telpon,PDO::PARAM_STR);
            $query->bindParam(':alamat',$alamat,PDO::PARAM_STR);
            $query->bindParam(':diagnosa',$diagnosa,PDO::PARAM_STR);
          
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
                header('location:index.php');
            }
        }
        // }}
?>