

<?php

	include ('dbconnect.php');
	

	$image=$_FILES['photo'];
	$image_name=$image['name'];
	$source_dir="image/";
	$file_name=mt_rand(100000,999999);
	$file_exe_array=explode('.', $image_name); //string to array
	$file_exe=$file_exe_array[1];

	$file_path=$source_dir.$file_name.'.'.$file_exe;
	move_uploaded_file($image['tmp_name'], $file_path);
	$codeno=mt_rand(10000,99999);
	$name=$_POST['name'];
	$unitprice=$_POST['unitprice'];
	$disscount=$_POST['disscount'];
	$description=$_POST['description'];
	$brandid=$_POST['brandid'];
	$subcategoryid=$_POST['subcategoryid'];

	$sql="INSERT INTO items(codeno,name,photo,price,discount,description,brand_id,subcategory_id)VALUES(:codeno,:name,:photo,:price,:disscount,:description,:brandid,:subcategoryid)";
	$stmt= $conn->prepare($sql);
	$stmt->bindParam(':codeno',$codeno);
	$stmt->bindParam(':name',$name);
	$stmt->bindParam(':photo',$file_path);
	$stmt->bindParam(':price',$unitprice);
	$stmt->bindParam(':disscount',$disscount);
	$stmt->bindParam(':description',$description);
	$stmt->bindParam(':brandid',$brandid);
	$stmt->bindParam(':subcategoryid',$subcategoryid);

	$stmt->execute();
	header("Location:itemlist.php");

?>




<?php

  include('BackEnd_Footer.php');
?>