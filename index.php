<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="css/bootstrap.min.css"/>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<title>Attendance Management system for staff</title>
</head>
<body>
  <div class="container">
	<div class="page-header">
		<h1 style="color:chocolate">Welcome to Leave Management System</h1>
	</div>
	<p>
		<!--<h3 style="color:#0066FF">Enter your staff id and password </h3><br>-->
      
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4">
			<form action = "verify.php" method = "post">
        	          <b>UserName </b> <input type = "text" placeholder="Your id" name = "username" /><br /><br />
        	          <b>Password&nbsp;&nbsp; </b> <input type = "password" name = "password"  /><br/><br />
        	          <input type = "submit" class="b btn btn-success btn-block" value = "Submit "/><br />
        	       </form>

		</div>
		<div class="col-sm-4"></div>
	</div>
	<br>
	</p>
		

  </div>
</body>
</html>
