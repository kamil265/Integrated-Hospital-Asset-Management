<?php 
    require_once("connect.php");
    if(!empty($_POST["uid_pinjamaset"])) 
    {
        $uidPinjamAsset=$_POST["uid_pinjamaset"];
        $sql ="SELECT nama_aset,id,kategori,lokasi_penyimpanan FROM tb_inventory WHERE (kode_rfid=:uid_pinjamaset)";
        $query= $dbh -> prepare($sql);
        $query-> bindParam(':uid_pinjamaset', $uidPinjamAsset, PDO::PARAM_STR);
        $query-> execute();
        $results = $query -> fetchAll(PDO::FETCH_OBJ);
        $cnt=1;
        if($query -> rowCount() > 0)
        {
            foreach ($results as $result) 
            {?>
                <b>Nama Aset :</b> <?php echo htmlentities($result->nama_aset);?><br>
                <b>Lokasi Penyimpanan :</b> <?php echo htmlentities($result->lokasi_penyimpanan);?>
<?php
            }
        }
        else
        {?>
            <?php echo "<span style='color:red'> UID Tidak Valid .</span>";?>
<?php
             echo "<script>$('#submit').prop('disabled',true);</script>";
        }
    }
?>
