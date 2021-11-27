<?php
    include'connect.php';
        if(isset($_POST['tambahKategori']))
        {
            $category=$_POST['kategori_aset'];
            $sql="INSERT INTO  tb_catinventory(category_name) VALUES(:category)";
            $query = $dbh->prepare($sql);
            $query->bindParam(':category',$category,PDO::PARAM_STR);
            $query->execute();
            $lastInsertId = $dbh->lastInsertId();
        }
        if($lastInsertId)
        {
            $_SESSION['msg']="Brand Listed successfully";
            header('location:index.php?halaman=clinicalmng-inventory');
        }
        else 
        {
            $_SESSION['error']="Something went wrong. Please try again";
            header('location:index.php?halaman=clinicalmng-inventory');
        }
?>