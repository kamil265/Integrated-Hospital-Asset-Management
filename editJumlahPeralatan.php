<?php
include'connect.php';
		if(isset($_POST['updateInventory']))
		{
			$inkode_rfid = $_POST['pkode_rfid'];
            $innama_aset = $_POST['pnama_aset'];
            $injumlah = $_POST['pjumlah'];
            $intempat = $_POST['ptempat'];
            $interpakai = $_POST['pterpakai'];
            $intersedia = $_POST['ptersedia'];
            
            $id=intval($_GET['id']);
			$sql="UPDATE jumlah_inventory set kode_rfid=:inkode_rfid,nama_aset=:innama_aset,jumlah=:injumlah,tempat=:intempat,terpakai=:interpakai,tersedia=:intersedia where id=:id";
			$query = $dbh->prepare($sql);
            $query->bindParam(':inkode_rfid',$inkode_rfid,PDO::PARAM_STR);
            $query->bindParam(':innama_aset',$innama_aset,PDO::PARAM_STR);
            $query->bindParam(':injumlah',$injumlah,PDO::PARAM_STR);
            $query->bindParam(':intempat',$intempat,PDO::PARAM_STR);
            $query->bindParam(':interpakai',$interpakai,PDO::PARAM_STR);
            $query->bindParam(':intersedia',$intersedia,PDO::PARAM_STR);
            
            $query->bindParam(':id',$id,PDO::PARAM_STR);
            $query->execute();
			header('location:index.php?halaman=jumlah-peralatanmedis');
		}
?>