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
            $insert="INSERT INTO  tb_pinjaminventory (asset_id,id_penanggungjawab) VALUES(:uidPinjamAset,:uidPenanggungJawab)";
            $query = $dbh->prepare($insert);
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
            $uidPinjamAset=$_POST['uid_pinjamaset'];
            $stts=0;
            $update="UPDATE tb_inventory set status=:stts where kode_rfid=:uidPinjamAset";
            $upquery = $dbh->prepare($update);
            $upquery->bindParam(':stts',$stts,PDO::PARAM_STR);
            $upquery->bindParam(':uidPinjamAset',$uidPinjamAset,PDO::PARAM_STR);
            $upquery->execute();
        }
    }
?>