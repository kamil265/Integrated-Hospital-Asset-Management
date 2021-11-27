<?php  
   require_once('connect.php');

   if(!empty($_POST['tanggal_masuk'])){
	$tanggal_masuk = $_POST['tanggal_masuk'];
	$kode_rfid = $_POST['kode_rfid'];
	$nama = $_POST['nama'];
	$poli = $_POST['poli'];
	$usia = $_POST['usia'];
	$diagnosa = $_POST['diagnosa'];
	$gol_darah = $_POST['gol_darah'];
 	$tb = $_POST['tb'];
 	$bb = $_POST['bb'];
	$hasil_diagnosa = $_POST['hasil_diagnosa'];
	$id = $_POST['id'];
		
	$data[] = $tanggal_masuk;
	$data[] = $kode_rfid;
	$data[] = $nama;
	$data[] = $poli;
	$data[] = $usia;
	$data[] = $diagnosa;
 	$data[] = $gol_darah;
 	$data[] = $tb;
 	$data[] = $bb;
	$data[] = $hasil_diagnosa;
	$data[] = $id;
	
		
   		$sql = "UPDATE `rekammedis` SET tanggal_masuk=?,kode_rfid=?,nama=?,poli=?,usia=?,diagnosa=?,gol_darah=?,tb=?,bb=?,hasil_diagnosa=? WHERE id=?";
   		$row = $dbh->prepare($sql);
   		$row->execute($data);
		
   		echo '<script>alert("Berhasil Edit Data");window.location="index.php?halaman=rekam_medis"</script>';
	   }
   
   	$id = $_GET['id'];
   	$sql = "SELECT *FROM `rekammedis` WHERE id= ?";
   	$row = $dbh->prepare($sql);
   	$row->execute(array($id));
   	$result = $row->fetch();
   ?>
   <!DOCTYPE HTML>
   <html>
   	<head>
   		<title>Edit - <?php echo $result['nama'];?></title>
   		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
   		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   	</head>
   	<body>
   		<div class="container">
   			 <br/>
   			 <h3>Edit - <?php echo $result['nama'];?></h3>
   			 <br/>
   			<div class="row">
   				 <div class="col-lg-6">
   					 <form action="" method="POST">
   						 <div class="form-group">
   							 <label>tanggal_masuk</label>
   							 <input type="text" value="<?php echo $result['tanggal_masuk'];?>" class="form-control" name="tanggal_masuk">
   						 </div>
   						 <div class="form-group">
   							 <label>kode_rfid</label>
   							 <input type="text" value="<?php echo $result['kode_rfid'];?>" class="form-control" name="kode_rfid">
   						 </div>
   						 <div class="form-group">
   							 <label>nama</label>
   							 <input type="text" value="<?php echo $result['nama'];?>" class="form-control" name="nama">
   						 </div>
   						 <div class="form-group">
   							 <label>poli</label>
   							 <input type="text" value="<?php echo $result['poli'];?>" class="form-control" name="poli">
   						 </div>
   						 <div class="form-group">
   							 <label>usia</label>
   							 <input type="text" value="<?php echo $result['usia'];?>" class="form-control" name="usia">
   						 </div>
                            <div class="form-group">
   							 <label>diagnosa</label>
   							 <input type="text" value="<?php echo $result['diagnosa'];?>" class="form-control" name="diagnosa">
   						 </div>
							<div class="form-group">
   							 <label>gol_darah</label>
   							 <input type="text" value="<?php echo $result['gol_darah'];?>" class="form-control" name="gol_darah">
   						 </div>
							<div class="form-group">
   							 <label>tb</label>
   							 <input type="text" value="<?php echo $result['tb'];?>" class="form-control" name="tb">
   						 </div>
							<div class="form-group">
   							 <label>bb</label>
   							 <input type="text" value="<?php echo $result['bb'];?>" class="form-control" name="bb">
   						 </div>
							<div class="form-group">
   							 <label>hasil_diagnosa</label>
   							 <input type="text" value="<?php echo $result['hasil_diagnosa'];?>" class="form-control" name="hasil_diagnosa">
   						 </div>
   						 <input type="hidden" value="<?php echo $result['id'];?>" name="id">
   						 <button class="btn btn-primary btn-md" name="create"><i class="fa fa-edit"> </i> Update</button>
   					 </form>
   				  </div>
   			</div>
   		</div>
   	</body>
   </html>