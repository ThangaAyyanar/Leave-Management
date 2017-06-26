<?php
include 'connections.php';
$judge = $_POST['judge'];
$id = $_POST['prime'];
//echo "The flag is ".$judge."<br>";
//echo "The identifier ".$id."<br>";
if($judge == 1){
	$sql = "update absent set status='enable' where id=".$id;
	$result = mysqli_query($conn,$sql);
	if($result>0){
		header("location:hod.php");
	}else{
		header("location:error.php");
	}
}
else if($judge == 2){
	$sql = "update absent set forward='no' where id=".$id;
	$result = mysqli_query($conn,$sql);	
	if($result>0){
		header("location:hod.php");
	}else{
		header("location:error.php");
	}
}else{
	header("location:error.php");
}
echo $result;

mysqli_free_result($query_result);
mysqli_close($conn);


?>
