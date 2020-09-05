<?php
	include ('dbconnect.php');

	$id=$_POST['id'];
	$oldlogo=$_POST['oldLogo'];
	$name=$_POST['name'];
	$newlogo=$_FILES['logo'];
$image_name=$newlogo['name'];
	if ($newlogo['size']>0)
	{
	$source_dir="logo/";
	$file_name=mt_rand(100000,999999);
	$file_exe_array=explode('.', $image_name); //string to array
	$file_exe=$file_exe_array[1];

	$file_path=$source_dir.$file_name.'.'.$file_exe;
	move_uploaded_file($newlogo['tmp_name'], $file_path);

	}else{
	$file_path=$_POST['oldLogo'];

	}
	$sql="UPDATE brands SET logo=:logo, name=:name WHERE id=:id";
	$stmt=$conn->prepare($sql);
	$stmt->bindParam(':id',$id);
	$stmt->bindParam(':logo',$file_path);
	$stmt->bindParam(':name',$name);
	$stmt->execute();
	header('Location:brandlist.php');
?>