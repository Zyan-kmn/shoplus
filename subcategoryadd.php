

<?php

	include ('dbconnect.php');
	$name=$_POST['name'];
	$category=$_POST['categoryid'];
	


	$sql="INSERT INTO subcategories(name,category_id)VALUES(:name,:categoryid)";
	$stmt= $conn->prepare($sql);
	$stmt->bindParam(':name',$name);
	$stmt->bindParam(':categoryid',$category);
	
	$stmt->execute();
	header("Location:subcategorylist.php");

?>




<?php

  include('BackEnd_Footer.php');
?>