
<?php
	session_start();
	if(isset($_SESSION["username"]))  {
		header("Location: ./home");
		exit;
	}
	


$mess="";


if(isset($_POST["submit"])&&$_POST["submit"]=="Sign in") {	
	//conncet to the database
	require_once("./dbcon/user.php");
	include("./dbcon/dbcon.php");	//database connection function
	
	
	$user=$_POST["uname"];
	$password=md5($_POST["password"]);
	
	
	//retriving data from db
	$query = "SELECT username,email FROM uinfo WHERE username = '$user' AND password = '$password'";
	$result=mysqli_query($con,$query);
		
	while($row=mysqli_fetch_array($result)) {
		$name=$row["0"];
		$ema=$row["1"];
	}
	
	if(mysqli_affected_rows($con)==0) {
		$mess = "<font color=purple size=2><b>Wronge username or password.<br>Please try again.</b></font>";
	} else {
		$_SESSION["username"]=$name;
		$_SESSION["ematype"]=$ema;
		
		header("Location:./home");
		exit;
	}
}

?>
<html>
<head>
	<title>index page</title>
</head>
<body>
	<center>		
		
		<!-- start of user loging part -->
		
		<div class="login" style="background: linear-gradient(#4AB7DF,#98FAF3,#4AB7DF); width:300px; border-radius: 20px; margin:200px 0 0 0;  ">

		<h1>Login</h1>
		<hr>
		<form name="signin" method="post"  action="">
			
			<table height="80px">
				<tr><td>User Name:
					<td><input type="text" name="uname" value="" >
						
				<tr><td>Password:
					<td><input type="password" name="password" value="">
			
			</table>
			
			<input style="border-radius: 10px; margin:20px;" type="submit" name="submit" value="Sign in">
			
			
		</form>
		</div>
		
	
	<?php	
		echo $mess."<br><br>";	
	?>
		<!-- end of loging part -->
		
	</center>		
			
		
	<!-- start of new user registration link -->
	<center>
	
		<font size="3">If you are a new user</font><br>
		<div class="regw" style="background-color:#90FF00; border-radius:10px; padding:5px; width:100px;">
		<a href="./user/registration.php">Register now</a>
		</div>
	</center>
	<!-- end of new user registration link -->
		
</body>
</html>