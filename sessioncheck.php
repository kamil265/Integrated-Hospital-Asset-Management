<?php 
	
	include 'connect.php';
	session_start();
    error_reporting(0);
    if($_SESSION['alogin']!='')
    {
        $_SESSION['alogin']='';
    }
    if(isset($_POST['login']))
    {
        $email=$_POST['email'];
        $password=($_POST['password']);
        $sql ="SELECT email,password FROM register WHERE email=:email and password=:password";
        $query= $dbh -> prepare($sql);
        $query-> bindParam(':email', $email, PDO::PARAM_STR);
        $query-> bindParam(':password', $password, PDO::PARAM_STR);
        $query-> execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        if($query->rowCount() > 0)
        {
            $_SESSION['alogin']=$_POST['email'];
            header("location:index.php?halaman=dashboard");
        } 
        else
        {
			header("location:login.php");
        }
    }
	else{
		echo"login gagal";
	}
?>