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
        if(isset($_POST['return']))
        {
            $rid=intval($_GET['rid']);
            $rstatus=1;
            $pstatus=1;
            $sql="UPDATE tb_inventory,tb_pinjaminventory set tb_pinjaminventory.status_pengembalian=:rstatus, tb_inventory.status=:pstatus where tb_pinjaminventory.id=:rid";
            $query = $dbh->prepare($sql);
            $query->bindParam(':rid',$rid,PDO::PARAM_STR);
            $query->bindParam(':rstatus',$rstatus,PDO::PARAM_STR);
            $query->bindParam(':pstatus',$pstatus,PDO::PARAM_STR);
            $query->execute();

            $_SESSION['msg']="Book Returned successfully";
            header('location:index.php?halaman=clinicalmng-inventory');
        }
    }
?>