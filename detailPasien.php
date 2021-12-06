<?php 
    require_once("connect.php");
    if(!empty($_POST["valPasien"])) 
    {
        $uidPasien=$_POST["valPasien"];
        $sql ="SELECT * FROM tb_pasien WHERE kode_rfid=:valPasien";
        $query= $dbh -> prepare($sql);
        $query-> bindParam(':valPasien', $uidPasien, PDO::PARAM_STR);
        $query-> execute();
        $results = $query -> fetchAll(PDO::FETCH_OBJ);
        $cnt=1;
        if($query -> rowCount() > 0)
        {
            foreach ($results as $result) {
                ?>
                    <label>Nama Pasien</label><br>
                    <input type="text" class="form-control" value="<?php echo htmlentities($result->nama);?>" readonly required>  <br>  
                    <label>NIK</label><br>
                    <input type="text" class="form-control" value="<?php echo htmlentities($result->nik);?> " readonly required>  <br> 
                    <label>Kategori Pasien</label><br>
                    <input type="text" class="form-control" value="<?php echo htmlentities($result->kategori_pasien);?> " readonly required>  <br> 
                    <label>Tanggal Lahir</label><br>
                    <input type="date" class="form-control" value="<?php echo htmlentities($result->tanggal_lahir);?>" readonly required>  <br>  
                    <label>Jenis Kelamin</label><br>
                    <input type="text" class="form-control" value="<?php echo htmlentities($result->jeniskelamin_pasien);?> " readonly required>  <br>  
                    <label>Alamat</label><br>
                    <input type="text" class="form-control" value="<?php echo htmlentities($result->alamat);?>" readonly required>  <br>  
                    <label>Penanggungjawab</label><br>
                    <input type="text" class="form-control" value="<?php echo htmlentities($result->Penanggungjawab);?> " readonly required>  <br>  
                    <label>Diagnosa</label><br>
                    <input type="text" class="form-control" value="<?php echo htmlentities($result->diagnosa);?>" readonly required>  <br>  
                    <label>Dokter Penanggungjawab</label><br>
                    <input type="text" class="form-control" value="<?php echo htmlentities($result->dokter_penanggungjawab);?> " readonly required>  <br>    
                    <?php
                    echo "<script>$('#submit').prop('disabled',false);</script>";
            }
        }
        else
        {
            echo "<span style='color:red'> UID Tidak Terdaftar .</span>";
            echo "<script>$('#submit').prop('disabled',true);</script>";
        }
    }
?>
