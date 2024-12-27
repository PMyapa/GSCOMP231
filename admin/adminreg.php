<?php
include ("../php/head.php");
		
$mess = "";

if(isset($_POST["submit"])) {
		
	//conncet to the database
	require_once("../dbcon/user.php");
	include("../dbcon/dbcon.php");	//database connection function
	
	
	$admin=$_POST["admin"];
	$password=md5($_POST["password"]);
	$password_conf=md5($_POST["password_conf"]);
	
	
	
	if($password!=$password_conf) {
		$mess="<font color='red'>Password and confirmation doesn't match.</font>";
	}
	
	$querya = "SELECT admin FROM admint WHERE admin = '$admin' ";
	$resulta=mysqli_query($con,$querya);
	
	if(mysqli_num_rows($resulta)>0) {
		$mess = "<font color='red'>Account name already taken</font>";			
			}
	else
	{
		
		$query = "INSERT INTO admint(admin, password) VALUES('$admin', '$password')";
			$result = mysqli_query($con,$query);
			
			if(!$result) {
				$error = mysqli_error($con);
				print $error;
				exit;
			}
			else{
			$mess = "<font color='blue'>Account Successfully Created</font>";
			}
	}
	

}
?>

	
	<script language="javascript" >
	<!--
		function testform()
		{			
			if(document.user.admin.value=='') { 
			alert("Please enter a Account name");
			document.user.username.focus();
			return false;
			
			}
			if(document.user.password.value=='') { 
			alert("Please enter a password");
			document.user.password.focus();
			return false;
			}
			
			if(document.user.password_conf.value=='') { 
			alert("Please confirm your password");
			document.user.password_conf.focus();
			return false;
			
			}
			if(document.user.password.value!=document.user.password_conf.value) {
			alert("Password and confirmation does not match");
			document.user.password_conf.focus();
			return false;
			}
			return confirm("Do you want to create new admin account?");
					
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
	
	<table width="40%" >
		<caption><font size="10" ><b>Create New Account</b></font></caption>
		<br>
		<tr>
			<td>
				<br><br>				
						
				<b>Account:</b><br>
				<input type="textbox" name="admin" size="20"><br><br>
				
				<b>Password:</b><br>
				<input type="password" name="password" size="20" maxlength="20"><br><br>
					
				<b>Confirm Password:</b><br>
				<input type="password" name="password_conf" size="20" maxlength="20"><br><br>
					
				<hr width="90%" color="black"><br>
				<div align=right>
					<input type="submit" name="submit" value="Submit ">
					&nbsp;&nbsp;
					<input type="reset" name="reset_s" value="Discard">
				</div>	
				
			</td>
		</tr>
	</table>
</center>
	
	</form>

<?php
	include ('../php/ftr.php');
?>