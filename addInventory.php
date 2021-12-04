<?php
    include 'connect.php';
        if(isset($_POST['tambahAset']))
        {
            $uid=$_POST['uid_aset'];
            $namaAset=$_POST['nama_aset'];
            $kategoriAset=$_POST['kategoriaset'];
            $penyimpananAset=$_POST['penyimpanan_aset'];
            
            try
	        {
                $sql="INSERT INTO  tb_inventory(kode_rfid,nama_aset,kategori,lokasi_penyimpanan) VALUES (:uid,:namaAset,:kategoriAset,:penyimpananAset)";
                $query = $dbh->prepare($sql);
                $query->bindParam(':uid',$uid,PDO::PARAM_STR);
                $query->bindParam(':namaAset',$namaAset,PDO::PARAM_STR);
                $query->bindParam(':kategoriAset',$kategoriAset,PDO::PARAM_STR);
                $query->bindParam(':penyimpananAset',$penyimpananAset,PDO::PARAM_STR);
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
	        catch (PDOException $e)
	        {
                if ($e->errorInfo[1] == 1062) {
                    echo '<script>alert("Gagal Mendaftarkan Aset : UID telah Terdaftar");window.location="index.php?clinicalmng-inventory"</script>';
                 } else {
                    echo"UNKNOWN ERROR";
                }
	        }
        }
?>