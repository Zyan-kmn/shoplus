<?php
	
	include('dbconnect.php');
	
	$id=$_GET['id'];

	$sql="delete from subcategories where id=:id";
	$stmt=$conn->prepare($sql);
	$stmt->bindParam(':id',$id);
	if ($stmt->execute()) {
		header('Location:subcategorylist.php');
	}else
	{
		echo "Something Wrong";
	}
?>