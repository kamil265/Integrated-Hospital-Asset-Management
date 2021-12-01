<?php 
    require_once("connect.php");
    if(!empty($_POST["uid_pemindahanpasien"])) 
    {
        $uidPemindahanPasien= strtoupper($_POST["uid_pemindahanpasien"]);
        $sql ="SELECT kode_rfid, tanggal_masuk, kategori_pasien, nama, dokter_penanggungjawab, diagnosa, status_pasien FROM tb_pasien WHERE kode_rfid=:uid_pemindahanpasien";
        $query= $dbh -> prepare($sql);
        $query-> bindParam(':uid_pemindahanpasien', $uidPemindahanPasien, PDO::PARAM_STR);
        $query-> execute();
        $results = $query -> fetchAll(PDO::FETCH_OBJ);
        $cnt=1;
        if($query -> rowCount() > 0)
        {
            foreach ($results as $result) {
                ?>
                <h6 class="mb-0">Nama Pasien :  <?php echo htmlentities($result->nama);?> </h6><br>
                <h6 class="mb-0">Diagnosa : <?php echo htmlentities($result->diagnosa);?> </h6><br>
                <h6 class="mb-0">Status : <?php echo htmlentities($result->status_pasien);?> </h6><br>
                    
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
