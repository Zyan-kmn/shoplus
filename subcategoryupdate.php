<?php
	include ('dbconnect.php');

	$id=$_POST['id'];
	
	$name=$_POST['name'];
	$category=$_POST['categoryid'];

	$sql="UPDATE subcategories SET  name=:name, category_id=:categoryid WHERE id=:id";
	$stmt=$conn->prepare($sql);
	$stmt->bindParam(':id',$id);
	$stmt->bindParam(':name',$name);
	$stmt->bindParam(':categoryid',$category);
	$stmt->execute();
	header('Location:subcategorylist.php');
?>