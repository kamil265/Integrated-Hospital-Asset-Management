<?php 
    require_once("connect.php");
    if(!empty($_POST["uid_jadwalprwt"])) 
    {
        $uidJadwalPerawat= strtoupper($_POST["uid_jadwalprwt"]);
        $sql ="SELECT nama_perawat,divisi FROM tb_perawat WHERE rfid_uid=:uid_jadwalprwt";
        $query= $dbh -> prepare($sql);
        $query-> bindParam(':uid_jadwalprwt', $uidJadwalPerawat, PDO::PARAM_STR);
        $query-> execute();
        $results = $query -> fetchAll(PDO::FETCH_OBJ);
        $cnt=1;
        if($query -> rowCount() > 0)
        {
            foreach ($results as $result) {
                ?>
                <h6 class="mb-0">Nama Perawat :  <?php echo htmlentities($result->nama_perawat);?> </h6><br>
                <h6 class="mb-0">Divisi : <?php echo htmlentities($result->divisi);?> </h6><br>
                    
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
