

<?php

	include ('dbconnect.php');
	$name=$_POST['name'];
	$logo=$_FILES['logo'];
	$logo_name=$logo['name'];
	$source_dir="logo/";
	$file_name=mt_rand(100000,999999);
	$file_exe_array=explode('.', $logo_name); //string to array
	$file_exe=$file_exe_array[1];

	$file_path=$source_dir.$file_name.'.'.$file_exe;
	move_uploaded_file($logo['tmp_name'], $file_path);

	$sql="INSERT INTO brands(name,logo)VALUES(:name,:logo)";
	$stmt= $conn->prepare($sql);
	$stmt->bindParam(':name',$name);
	$stmt->bindParam(':logo',$file_path);
	$stmt->execute();
	header("Location:brandlist.php");

?>




<?php

  include('BackEnd_Footer.php');
?>