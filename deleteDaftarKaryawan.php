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
        $id=intval($_GET['id']);
        $delstatus=0;
        $sql="UPDATE tb_karyawan set status=:delstatus where id=:id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':id',$id,PDO::PARAM_STR);
        $query->bindParam(':delstatus',$delstatus,PDO::PARAM_STR);
        $query->execute();

		echo '<script>alert("Berhasil Hapus Data");window.location="index.php?halaman=daftartenagamedis"</script>';
    }
?>