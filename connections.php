<?php
	$host="localhost";
	$db_user="root";
	$db_pass="";
	$db_name="leave";
	$conn=mysqli_connect($host,$db_user,$db_pass,$db_name);
	if(!$conn){
		die("Problem in connecting to the database");
	}	
	function get_staffName($id){
		$staff_query="select name from user where staffid='".$id."'";
		//echo "<br>".$staff_query;
		$result=mysqli_query($GLOBALS['conn'],$staff_query);
		if($result==false){
			die('Error in query while getting staff name');
		}if(mysqli_num_rows($result)>0){
			$values=mysqli_fetch_row($result);
			return $values[0];	
		}
	}
?>
