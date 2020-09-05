<?php
	
	include('dbconnect.php');
	
	$id=$_GET['id'];

	$sql="delete from items where id=:id";
	$stmt=$conn->prepare($sql);
	$stmt->bindParam(':id',$id);
	if ($stmt->execute()) {
		header('Location:itemlist.php');
	}else
	{
		echo "Something Wrong";
	}
?>