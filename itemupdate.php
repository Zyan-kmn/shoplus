<?php
	include ('dbconnect.php');

	$id=$_POST['id'];
	$oldphoto=$_POST['oldPhoto'];

	$newphoto=$_FILES['photo'];
	$image_name=$newphoto['name'];
	if ($newphoto['size']>0)
	{
	$source_dir="image/";
	$file_name=mt_rand(100000,999999);
	$file_exe_array=explode('.', $image_name); //string to array
	$file_exe=$file_exe_array[1];

	$file_path=$source_dir.$file_name.'.'.$file_exe;
	move_uploaded_file($newphoto['tmp_name'], $file_path);


	}else{
	$file_path=$_POST['oldPhoto'];

	}


	$codeno=$_POST['codeno'];
	$name=$_POST['name'];
	$unitprice=$_POST['unitprice'];
	$disscount=$_POST['disscount'];
	$description=$_POST['description'];
	$brandid=$_POST['brandid'];
	$subcategoryid=$_POST['subcategoryid'];


	$sql="UPDATE items SET photo=:photo,codeno=:codeno,name=:name, price=:unitprice, discount=:discount, description=:description, brand_id=:brandid,subcategory_id=:subcategoryid    WHERE id=:id";	
	$stmt=$conn->prepare($sql);
	$stmt->bindParam(':id',$id);
	$stmt->bindParam(':photo',$file_path);
	$stmt->bindParam(':codeno',$codeno);
	$stmt->bindParam(':name',$name);
	$stmt->bindParam(':unitprice',$unitprice);
	$stmt->bindParam(':discount',$disscount);
	$stmt->bindParam(':description',$description);
	$stmt->bindParam(':brandid',$brandid);
	$stmt->bindParam(':subcategoryid',$subcategoryid);

	$stmt->execute();
	header('Location:itemlist.php');
?>