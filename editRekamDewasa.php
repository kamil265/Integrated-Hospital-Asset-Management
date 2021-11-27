<?php
include'connect.php';
		if(isset($_POST['updateDewasa']))
		{
			
            $inkode_rfid = $_POST['kode_rfid'];
            $innama = $_POST['nama'];
            $inpoli = $_POST['poli'];
            $inusia = $_POST['usia'];
            $indiagnosa = $_POST['diagnosa'];
            
            $ingol_darah = $_POST['gol_darah'];
            $intb = $_POST['tb'];
            $inbb = $_POST['bb'];
            $inhasil_diagnosa = $_POST['hasil_diagnosa'];

            
            $id=intval($_GET['id']);
			$sql="UPDATE rekammedis  set kode_rfid=:inkode_rfid,nama=:innama,poli=:inpoli,usia=:inusia,diagnosa=:indiagnosa,gol_darah=:ingol_darah,tb=:intb,bb=:inbb,hasil_diagnosa=:inhasil_diagnosa where id=:id AND  kategori_pasien='Dewasa'";
			$query = $dbh->prepare($sql);
            
            $query->bindParam(':inkode_rfid',$inkode_rfid,PDO::PARAM_STR);
            $query->bindParam(':innama',$innama,PDO::PARAM_STR);
            $query->bindParam(':inpoli',$inpoli,PDO::PARAM_STR);
            $query->bindParam(':inusia',$inusia,PDO::PARAM_STR);
            $query->bindParam(':indiagnosa',$indiagnosa,PDO::PARAM_STR);
            
            $query->bindParam(':ingol_darah',$ingol_darah,PDO::PARAM_STR);
            $query->bindParam(':intb',$intb,PDO::PARAM_STR);
            $query->bindParam(':inbb',$inbb,PDO::PARAM_STR);
            $query->bindParam(':inhasil_diagnosa',$inhasil_diagnosa,PDO::PARAM_STR);
            
            $query->bindParam(':id',$id,PDO::PARAM_STR);
            $query->execute();
			header('location:index.php?halaman=rekam_medis');
		}
?>