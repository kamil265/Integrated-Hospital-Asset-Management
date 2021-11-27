<?php  
   require_once('connect.php');
	
   	 
   	if(!empty($_POST['kode_rfid'])){
   		$kode_rfid = $_POST['kode_rfid'];
   		$nama_aset = $_POST['nama_aset'];
   		$jumlah = $_POST['jumlah'];
   		$tempat = $_POST['tempat'];
   		$terpakai = $_POST['terpakai'];
   		$tersedia = $_POST['tersedia'];
   		$id = $_POST['id'];
		
   		$data[] = $kode_rfid;
   		$data[] = $nama_aset;
   		$data[] = $jumlah;
   		$data[] = $tempat;
   		$data[] = $terpakai;
   		$data[] = $tersedia;
   		$data[] = $id;
	
		
   		$sql = "UPDATE `jumlah_inventory` SET kode_rfid=?,nama_aset=?,jumlah=?,tempat=?,terpakai=?,tersedia=? WHERE id=?";
   		$row = $dbh->prepare($sql);
   		$row->execute($data);
		
   		echo '<script>alert("Berhasil Edit Data");window.location="index.php?halaman=jumlah-peralatanmedis"</script>';
	   }
   
   	$id = $_GET['id'];
   	$sql = "SELECT *FROM `jumlah_inventory` WHERE id= ?";
   	$row = $dbh->prepare($sql);
   	$row->execute(array($id));
   	$result = $row->fetch();
   ?>
   <!DOCTYPE HTML>
   <html>
   	<head>
   		<title>Edit - <?php echo $result['kode_rfid'];?></title>
   		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
   		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   	</head>
   	<body>
   		<div class="container">
   			 <br/>
   			 <h3>Edit - <?php echo $result['kode_rfid'];?></h3>
   			 <br/>
   			<div class="row">
   				 <div class="col-lg-6">
   					 <form action="" method="POST">
   						 <div class="form-group">
   							 <label>RFID UID</label>
   							 <input type="text" value="<?php echo $result['kode_rfid'];?>" class="form-control" name="kode_rfid">
   						 </div>
   						 <div class="form-group">
   							 <label>NAMA ALAT</label>
   							 <input type="text" value="<?php echo $result['nama_aset'];?>" class="form-control" name="nama_aset">
   						 </div>
   						 <div class="form-group">
   							 <label>JUMLAH</label>
   							 <input type="text" value="<?php echo $result['jumlah'];?>" class="form-control" name="jumlah">
   						 </div>
   						 <div class="form-group">
   							 <label>TEMPAT</label>
   							 <input type="text" value="<?php echo $result['tempat'];?>" class="form-control" name="tempat">
   						 </div>
   						 <div class="form-group">
   							 <label>TERPAKAI</label>
   							 <input type="text" value="<?php echo $result['terpakai'];?>" class="form-control" name="terpakai">
   						 </div>
   						 <div class="form-group">
   							 <label>TERSEDIA</label>
   							 <input type="text" value="<?php echo $result['tersedia'];?>" class="form-control" name="tersedia">
   						 </div>
   						 <input type="hidden" value="<?php echo $result['id'];?>" name="id">
   						 <button class="btn btn-primary btn-md" name="create"><i class="fa fa-edit"> </i> Update</button>
   					 </form>
   				  </div>
   			</div>
   		</div>
   	</body>
   </html>