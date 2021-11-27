<?php
	session_start();
	error_reporting(0);
	include('connect.php');
	if(strlen($_SESSION['alogin'])==0)
    {   
		header('location:index.php');
	}
	else
	{ 
		if(isset($_POST['update']))
		{
			$category=$_POST['kategori_aset'];
			$status=$_POST['status'];
			$catid=intval($_GET['catid']);
			$sql="UPDATE tb_catinventory set category_name=:category where id=:catid";
			$query = $dbh->prepare($sql);
			$query->bindParam(':category',$category,PDO::PARAM_STR);
			$query->bindParam(':catid',$catid,PDO::PARAM_STR);
			$query->execute();
			$_SESSION['updatemsg']="Brand updated successfully";
			header('location:index.php?halaman=clinicalmng-inventory');
		}
	}
?>