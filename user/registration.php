<?php
		
$mess = "";

if(isset($_POST["submit"])) {

	//conncet to the database
	require_once("../dbcon/user.php");
	include("../dbcon/dbcon.php");	//database connection function

	
	$fname=$_POST["fname"];
	$lname=$_POST["lname"];
	
	if(isset($_POST["gen"])) {
		$gen=$_POST["gen"];
	}
	
	$email=$_POST["email"];
	
	
	
	$username=$_POST["username"];
	$password=md5($_POST["password"]);
	$password_conf=md5($_POST["password_conf"]);
	
	
	
	if($password!=$password_conf) {
		$mess="<font color='red'>Password and confirmation doesn't match.</font>";
		exit;
	}
	
	$query = "INSERT INTO uinfo(fname, lname, gen, email,
					username, password) VALUES('$fname', '$lname', '$gen', '$email', '$username', '$password')";
	$result = mysqli_query($con,$query);
	
	if(!$result) {
		$error = mysqli_error($con);
		print $error;
		exit;
	}
	
	$mess = "<font color='blue'>User Successfully Created</font>";
}
?>
<html>
<head>
	<title>User Registration</title>
	
	<script language="javascript">
	<!--
		function testform() {
			if(document.user.first_name.value=='') {
				alert("Please enter your first name");
				return false;
			}
			if(document.user.email.value=='') {
				alert("Please enter your email address");
				return false;
			}
			if(document.user.username.value=='') {
				alert("Please enter your username");
				return false;
			}
			if(document.user.password.value=='') {
				alert("Please enter your password");
				return false;
			}
			if(document.user.password_conf.value=='') {
				alert("Please enter confirm password");
				return false;
			}
			if(document.user.password.value!=document.user.password_conf.value) {
				alert("Password and confirmation does not match");
				return false;
			}
			return confirm("Do you want to register?");
		}
	-->
	</script>	
</head>

<body>

	<center>
	<?php
		echo $mess;
	?>
	
	<form name="user" method="post" action="" onSubmit="return testform()">	
	
	<table width="40%" bgcolor="silver">
		<caption><font size="5"><b>Registration Form</b></font></caption>
		<br>
		<tr>
			<td>
				<br><br>
				
				<b>FIRST NAME:</b><br>
				<input type="text" name="fname" size="50" maxlength="60"><br><br>
				
				<b>LAST NAME:</b><br>
				<input type="text" name="lname" size="50" maxlength="60"><br><br>
						
									
				<b>GENDER:</b><br>
				<input type="radio" name="gen" value="Male"> &nbsp; Male
				<input type="radio" name="gen" value="Female"> &nbsp; Female
				<br><br>
		
				<b>E-MAIL:</b><br>
				<input type="text" name="email" size="50" maxlength="60"><br><br>
						
				<b>USER NAME:</b><br>
				<input type="textbox" name="username" size="20"><br><br>
				
				<b>PASSWORD:</b><br>
				<input type="password" name="password" size="20" maxlength="20"><br><br>
					
				<b>CONFIRM PASSWORD:</b><br>
				<input type="password" name="password_conf" size="20" maxlength="20"><br><br>
					
				<hr width="90%" color="black"><br>
				<div align=right>
					<input type="submit" name="submit" value=" Submit ">
					&nbsp;&nbsp;
					<input type="reset" name="reset_s" value="Cancel">
				</div>	
				
			</td>
		</tr>
	</table>
	</center>
	
	</form>

</body>
</html>