 <?php

	 include('dbconnect.php');
	$name=$_POST['name'];

	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$address=$_POST['address'];
	
	$file_exe=$file_exe_array[1];

	$sql="INSERT INTO users(name,phone,email,password,address)VALUES(:name,:phone,:email,:password,:address)";
	$stmt= $conn->prepare($sql);
	$stmt->bindParam(':name',$name);

	$stmt->bindParam(':phone',$phone);
	$stmt->bindParam(':email',$email);
	$stmt->bindParam(':password',$password);
	$stmt->bindParam(':address',$address);
	$stmt->execute();
	session_start();
	$_SESSION['reg_success']='Yes it was not easy, but you did it! Please Sign-in again.';
	header("Location:login.php");

?> 

<?php

  include('BackEnd_Footer.php');
?>