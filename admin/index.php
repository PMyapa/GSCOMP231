<html>
<head>
	<title>T2001</title>
</head>
<body>




<?php

$mess="";

session_start();
	if(!isset($_SESSION["admin"])) 
	{
		
		
		
		
		
	
			if(isset($_POST["submit"])&&$_POST["submit"]=="Sign in") {	
				//conncet to the database
				require_once("../dbcon/user.php");
				include("../dbcon/dbcon.php");	//database connection function
				
				
				$admin=$_POST["admin"];
				$password=md5($_POST["password"]);
				
				
				//retriving data from db
				$query = "SELECT admin FROM admint WHERE admin = '$admin' AND password = '$password'";
				$result=mysqli_query($con,$query);
					
				while($row=mysqli_fetch_array($result)) {
					$admina=$row["0"];

				}
				
				if(mysqli_affected_rows($con)==0) {
					$mess = "<font color=purple size=2><b>Wronge username or password.<br>Please try again.</b></font>";
				} else {
					$_SESSION["admin"]=$admina;

					
					header("Location:./userinfo.php");
					exit;
				}
			}
			?>

			<div style="height:100%";>
				<center>
					<h1 >Administrative Login</h1>
						
					
					

					<div class="loginh" style="background-color:#5555aa; width:300px; height:45px;  margin:20px 0 0 0;  border:solid; border-width:1px 0 0 1px;;">
					<h1 style="margin:0;">Admin login</h1>
					</div>
							
					<div class="login" style=" width:300px;  border:solid; border-width:1px;   ">
					<form name="signin" method="post"  action="">
						
						<table height="80px">
							<tr><td>Admin:
								<td><input type="text" name="admin" value="" >
									
							<tr><td>Password:
								<td><input type="password" name="password" value="">
						
						</table>
						
						<input style="border-radius: 10px; margin:20px;" type="submit" name="submit" value="Sign in">
						
						
					</form>
					</div>
					
				
				<?php	
					echo $mess."<br><br>";	
				?>
					
					
				
						
					
						<br>

				</center>

					
			</body>


					
					<br><br><br>
					
				</center>
			</div>

					
					
					
					
			<?php		
					
		
		
	}
	else
	{
		header("Location:./userinfo.php");
		exit;	

	}

	
include ('../php/ftr.php');
?>
