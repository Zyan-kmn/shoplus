<?php
	
	include('dbconnect.php');
	
	$id=$_GET['id'];

	$sql="delete from brands where id=:id";
	$stmt=$conn->prepare($sql);
	$stmt->bindParam(':id',$id);
	if ($stmt->execute()) {
		header('Location:brandlist.php');
	}else
	{
		echo "Something Wrong";
	}
?>