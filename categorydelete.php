<?php
	
	include('dbconnect.php');
	
	$id=$_GET['id'];

	$sql="delete from categories where id=:id";
	$stmt=$conn->prepare($sql);
	$stmt->bindParam(':id',$id);
	if ($stmt->execute()) {
		header('Location:categorylist.php');
	}else
	{
		echo "Something Wrong";
	}
?>