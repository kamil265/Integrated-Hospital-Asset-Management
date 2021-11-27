<?php
    session_start();
    error_reporting(0);
    include('connect.php');
    if(strlen($_SESSION['alogin'])==0)
    {   
        header('location:index.php');
    }
    else
    { 
        if(isset($_POST['pindahAset']))
        {
            $uidPenanggungJawab=strtoupper($_POST['uid_penanggungjawab']);
            $uidPinjamAset=$_POST['uid_pinjamaset'];
            $sql="INSERT INTO  tb_pinjaminventory (asset_id,id_penanggungjawab) VALUES(:uidPinjamAset,:uidPenanggungJawab)";
            $query = $dbh->prepare($sql);
            $query->bindParam(':uidPenanggungJawab',$uidPenanggungJawab,PDO::PARAM_STR);
            $query->bindParam(':uidPinjamAset',$uidPinjamAset,PDO::PARAM_STR);
            $query->execute();
            $lastInsertId = $dbh->lastInsertId();
            if($lastInsertId)
            {
                header('location:index.php?halaman=clinicalmng-inventory');
            }
            else    
            {
                header('location:index.php');
            }
        }
    }
?>