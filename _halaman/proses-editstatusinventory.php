<?php  
   require_once('connect.php');
	
   	 
   	if(!empty($_POST['kode_rfid'])){
   		$kode_rfid = $_POST['kode_rfid'];
   		$nama_karyawan = $_POST['nama_karyawan'];
   		$nama_aset = $_POST['nama_aset'];
   		$kategori = $_POST['kategori'];
   		$tgl_pinjam = $_POST['tgl_pinjam'];
   		$status = $_POST['status'];
   		$id = $_POST['id'];
		
   		$data[] = $kode_rfid;
   		$data[] = $nama_karyawan;
   		$data[] = $nama_aset;
   		$data[] = $kategori;
   		$data[] = $tgl_pinjam;
   		$data[] = $status;
   		$data[] = $id;
	
		
   		$sql = "UPDATE `view_peminjaman` SET kode_rfid=?,nama_karyawan=?,nama_aset=?,kategori=?,tgl_pinjam=?,status=? WHERE id=?";
   		$row = $dbh->prepare($sql);
   		$row->execute($data);
		
   		echo '<script>alert("Berhasil Edit Data");window.location="index.php?halaman=status-peralatanmedis"</script>';
	   }
   
   	$id = $_GET['id'];
   	$sql = "SELECT *FROM `view_peminjaman` WHERE id= ?";
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
   							 <label>Tag ID</label>
   							 <input type="text" value="<?php echo $result['kode_rfid'];?>" class="form-control" name="kode_rfid">
   						 </div>
   						 <div class="form-group">
   							 <label>Nama Alat</label>
   							 <input type="text" value="<?php echo $result['nama_aset'];?>" class="form-control" name="nama_aset">
   						 </div>
   						 <div class="form-group">
   							 <label>Kategori</label>
   							 <input type="text" value="<?php echo $result['kategori'];?>" class="form-control" name="kategori">
   						 </div>
   						 <div class="form-group">
   							 <label>Penanggungjawab</label>
   							 <input type="text" value="<?php echo $result['nama_karyawan'];?>" class="form-control" name="nama_karyawan">
   						 </div>
   						 <div class="form-group">
   							 <label>Tanggal Peminjaman</label>
   							 <input type="text" value="<?php echo $result['tgl_pinjam'];?>" class="form-control" name="tgl_pinjam">
   						 </div>
   						 <div class="form-group">
   							 <label>Status</label>
   							 <input type="text" value="<?php echo $result['status'];?>" class="form-control" name="status">
   						 </div>
   						 <input type="hidden" value="<?php echo $result['id'];?>" name="id">
   						 <button class="btn btn-primary btn-md" name="create"><i class="fa fa-edit"> </i> Update</button>
   					 </form>
   				  </div>
   			</div>
   		</div>
   	</body>
   </html>