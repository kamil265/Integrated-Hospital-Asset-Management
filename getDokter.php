<?php 
    require_once("connect.php");
    if(!empty($_POST["uid_jadwaldok"])) 
    {
        $uidJadwalDokter= strtoupper($_POST["uid_jadwaldok"]);
        $sql ="SELECT nama_dokter, spesialis FROM tb_dokter WHERE rfid_uid=:uid_jadwaldok";
        $query= $dbh -> prepare($sql);
        $query-> bindParam(':uid_jadwaldok', $uidJadwalDokter, PDO::PARAM_STR);
        $query-> execute();
        $results = $query -> fetchAll(PDO::FETCH_OBJ);
        $cnt=1;
        if($query -> rowCount() > 0)
        {
            foreach ($results as $result) {
                ?>
                <h6 class="mb-0">Nama Dokter :  <?php echo htmlentities($result->nama_dokter);?> </h6><br>
                <h6 class="mb-0">Spesialis : <?php echo htmlentities($result->spesialis);?> </h6><br>
                    
                    <?php
                    echo "<script>$('#submit').prop('disabled',false);</script>";
            }
        }
        else
        {
            echo "<span style='color:red'> UID Tidak Valid .</span>";
            echo "<script>$('#submit').prop('disabled',true);</script>";
        }
    }
?>
