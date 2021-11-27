<?php 
    require_once("connect.php");
    if(!empty($_POST["uid_jadwalkar"])) 
    {
        $uidJadwalKaryawan= strtoupper($_POST["uid_jadwalkar"]);
        $sql ="SELECT nama_karyawan, divisi_karyawan FROM tb_karyawan WHERE kode_rfid=:uid_jadwalkar";
        $query= $dbh -> prepare($sql);
        $query-> bindParam(':uid_jadwalkar', $uidJadwalKaryawan, PDO::PARAM_STR);
        $query-> execute();
        $results = $query -> fetchAll(PDO::FETCH_OBJ);
        $cnt=1;
        if($query -> rowCount() > 0)
        {
            foreach ($results as $result) {
                ?>
                <h6 class="mb-0">Nama Karyawan :  <?php echo htmlentities($result->nama_karyawan);?> </h6><br>
                <h6 class="mb-0">Divisi : <?php echo htmlentities($result->divisi_karyawan);?> </h6><br>
                    
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
