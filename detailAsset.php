<?php 
    require_once("connect.php");
    if(!empty($_POST["valAsset"])) 
    {
        $uidPinjamAsset=$_POST["valAsset"];
        $sql ="SELECT nama_aset,id,kategori,lokasi_penyimpanan FROM tb_inventory WHERE kode_rfid=:valAsset";
        $query= $dbh -> prepare($sql);
        $query-> bindParam(':valAsset', $uidPinjamAsset, PDO::PARAM_STR);
        $query-> execute();
        $results = $query -> fetchAll(PDO::FETCH_OBJ);
        $cnt=1;
        if($query -> rowCount() > 0)
        {
            foreach ($results as $result) {
                ?>
                    <label>Nama Aset</label><br>
                    <input type="text" class="form-control" value="<?php echo htmlentities($result->nama_aset);?>" readonly required>  <br>  
                    <label>Lokasi Penyimpanan</label><br>
                    <input type="text" class="form-control" value="<?php echo htmlentities($result->lokasi_penyimpanan);?> " readonly required>  <br>   
                    <?php
                    echo "<script>$('#submit').prop('disabled',false);</script>";
            }
        }
        else
        {
            echo "<span style='color:red'> UID Tidak Terdaftar.</span>";
            echo "<script>$('#submit').prop('disabled',true);</script>";
        }
    }
?>
