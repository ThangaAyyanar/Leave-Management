<?php
include 'connections.php';
//starting the session
session_start();
if(!isset($_SESSION["user"])){
	echo "<a href='index.php'>Goto Login Page</a>";
	die("Login First");
}
if($_SESSION["user"]!='hod'){
	die("You need to login as HOD");
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="css/bootstrap.min.css"/>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<title>Dashboard for HOD</title>
</head>
<body>
  <div class="container">
	<div class="page-header">
	   <div class="row">
		<div class="col-sm-6">
			<h1 style="color:chocolate">Welcome HOD</h1>
		</div>
		<div class="col-sm-6">		
			&emsp;&emsp;&emsp;&emsp;
			<form action='logout.php'>
				<input class="btn btn-danger" type='submit' value='Logout'/>
			</form>
		</div>
	  </div>
	</div>
	<p>
		<!--<h3 style="color:#0066FF">Enter your staff id and password </h3><br>-->
      
	<div class="row">
		<div class="col-sm-4">
			
			<?php
				
				//variable to handle date operation
				$current_date = strtotime(date("d-m-Y"));
				$week_date = strtotime("+1 week",$current_date);

				//$sql="select * from absent where date < ".date("d-m-Y");
				$sql="select * from absent where date >= ".$current_date." and date <= ".$week_date;
	
				$query_result=mysqli_query($conn,$sql);

				//Below query is used to get the list of staff who want leave waiting for approval

				if($query_result==false)
					die("Problem in querying database");

				echo "<br><h3>Yet to approved</h3>";
				if(mysqli_num_rows($query_result)>0){
					echo "<table class='table' cellpadding='0' cellspacing='0' >";
					echo "<tr>";
					echo "<td>Staff Name</td>";
					echo "<td>Day Order</td>";
					echo "<td>Date</td>";
					echo "<td>Approval</td>";
					echo "<td>Reject</td>";
					echo "</tr>";
					while($values=mysqli_fetch_assoc($query_result)){

						//echo $values["data"];

						if($values["status"]==NULL && $values["forward"]==NULL){
							echo "<tr>";
							echo "<td>".get_staffName($values["staffid"])."</td>";
							echo "<td>".$values["dayorder"]."</td>";
							echo "<td>".date("d-m-Y",$values["date"])."</td>";
							echo "<td><form method='POST' action='approve.php'><input type='hidden' name='judge' value='1'/><input type='hidden' name='prime' value='".$values["id"]."'/><input type='submit' id='".$values["id"]."' value='Approve' /></td></form>";
							echo "<td><form method='POST' action='approve.php'><input type='hidden' name='judge' value='2'/><input type='hidden' name='prime' value='".$values["id"]."'/><input type='submit' id='".$values["id"]."' value='Reject' /></td></form>";
							echo "</tr>";
						//echo "<br>".get_staffName($values["staffid"])." ".$values["dayorder"]." ".date("d-m-Y",$values["date"]);
				//$staff_name=get_staffName($values["staffid"],$conn);
					}
					echo "</table>";	
					}
				}else{
					echo "<br>No Data";
				}	
			?>
			
		</div>
		<div class="col-sm-4">
			

		</div>
		<div class="col-sm-4">
			<?php
				//Below query is used to get of the list of staff absent on current date

				$sql="select * from absent where date=".date("d-m-Y");
				$query_result=mysqli_query($conn,$sql);

				if($query_result==false)
					die("Problem in querying database");
				echo "<br><h3>Absentees</h3>";
				if(mysqli_num_rows($query_result)>0){
					echo "<table class='table' cellpadding='0' cellspacing='0' >";
					echo "<tr>";
					echo "<td>Staff Name</td>";
					echo "<td>Day Order</td>";
					echo "<td>Date</td>";
					echo "</tr>";
					while($values=mysqli_fetch_assoc($query_result)){
						if($values["status"]=="enable"){
							//echo "<br>".get_staffName($values["staffid"])." ".$values["dayorder"]." ".$values["date"];
							echo "<tr>";
							echo "<td>".get_staffName($values["staffid"])."</td>";
							echo "<td>".$values["dayorder"]."</td>";
							echo "<td>".date("d-m-Y",$values["date"])."</td>";
							echo "</tr>";
						//$staff_name=get_staffName($values["staffid"],$conn);
						}
					}
					echo "</table>";
				}else{
					echo "<br>No Absentees";
				}
			?>
		</div>
	</div>
	<br>
	</p>
		

  </div>
</body>
</html>


<?php

	//echo "<h1> Welcome ".$_SESSION["user"]."</h1>";
	//echo "Today absentees are<br>";
	//echo "date is ".date("d-m-Y");


	

	mysqli_free_result($query_result);

	mysqli_close($conn);

?>
