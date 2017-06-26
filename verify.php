<?php
	include 'connections.php';
	session_start();
	if($_SERVER["REQUEST_METHOD"]=="POST"){
		$user=$_POST["username"];
		$pass=$_POST["password"];
		//echo "From other page : ".$user;
		$_SESSION["user"]=$user;
		$sql="select * from user where name='".$user."' and password='".$pass."'";
		$result=mysqli_query($conn,$sql);
		//echo (string)$result;
		if($result==false){
			die("Wrong Username password");
		}
		if(mysqli_num_rows($result)>0){
			while($row=mysqli_fetch_assoc($result)){
				echo $row["name"];
				if($row["name"]=="hod"){
					//if(!isset($_SESSION["user"]))
						//$_SESSION["user"]=$user;
					header("location:hod.php");
				}else if($row["name"]=="principal"){
					//if(!isset($_SESSION["user"])
					//$_SESSION["user"]=$user;
					header("location:principal.php");
				}else{
					header("location:staff.php");
				}
			}
		}else{
			header("location:error.php");
		}
	}	
	mysqli_close($conn);
?>
