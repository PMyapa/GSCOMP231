<html>
<head>
	<title>T2001</title>
</head>
<body>
	
<?php

	session_start();
	if(!isset($_SESSION["admin"])) 
		{
		header("Location:../error.html");
		exit;
	} else
	{
		echo "<font style='margin:50px;' >Admin:</font>".$_SESSION['admin']; 
		echo ("<br><a  style='text-decoration: none; color:red; margin:50px;' href='./logoff.php'>Log Out</a>") ;
	}

	
		$mess = "";
		
		$username = $_GET["uname"];

		



	echo "<center>

	<h2>Edit of User Information</h2></center>";
		
	?>


<?php
			
			
	/*Connect to MySQL database*/
	include("../dbcon/user.php");
	require_once("../dbcon/dbcon.php");


	/*Execute SQL command*/
	$query = "SELECT regno,fname, lname, gen,  email, username FROM
				uinfo WHERE username='$username'";
	$result=mysqli_query($con,$query);	
	$myrow1=mysqli_fetch_row($result);
			
			
if(isset($_POST["submit"]))
	{
		


	
	$fname=$_POST["fname"];
	$lname=$_POST["lname"];	
	$email=$_POST["email"];
	
	
	
	
	
		
	$query = "UPDATE uinfo
				SET fname='$fname', lname='$lname', email='$email'
				WHERE username='$username' ";
		$result = mysqli_query($con,$query);
		
		if(!$result) {
			$error = mysqli_error($con);
			print $error;
			exit;
		}
		else{
		$mess = "<font color='blue'>User Successfully Updated</font>";
		header("Refresh:1");
		}
	
	

}
?>


	
	<script language="javascript" >
	<!--
		function testform()
		{
			if(document.user.fname.value=='') { 
			alert("Please enter your first name");
			document.user.fname.focus();
			return false;
			
			}
			if(document.user.lname.value=='') { 
			alert("Please enter your last name");
			document.user.lname.focus();
			return false;
			
			}
			if(document.user.email.value=='') { 
			alert("Please enter your email address");
			document.user.email.focus();
			return false;
			
			}

			
			return confirm("Do you want to update?");
					
		}
	-->
	</script>	


	<?php
		echo "<center>".$mess."</center>";


	
	echo '<form name="user" method="post" action="" onSubmit="return testform()">	

	<div  class="myd" style="border-radius:10px; width:60%; padding:2%; margin:0 10% 2% 10%;">
		<caption><font size="8 "><b>Edit User Details</b></font></caption>
		<br>
				<br><br>
				<font>User Name:  <b>'. $myrow1[5].'</b> </font>
				
				<br/>
				<br/>
				
				<b>First Name:</b><br>
				<input style="border-style: hidden; " type="text" name="fname" value='. $myrow1[1].' size="50" maxlength="60"><br><br>
				
				<b>Last Name:</b><br>
				<input style="border-style: hidden; " type="text" name="lname" value='. $myrow1[2].' size="50" maxlength="60"><br><br>
						
									
				<b>Gender:</b><br>
				<font color="#444444">'. $myrow1[3].' </font>
				<br><br>
				

				<b>E-mail:</b><br>
				<input style="border-style: hidden; " type="text" name="email" value='. $myrow1[4].' size="50" maxlength="60"><br><br>
		
				
					
				<hr width="90%" color="black"/><br>
				<div align=right>
					<input type="submit" name="submit" value="UPDATE ">
					&nbsp;&nbsp;
					<input type="reset" name="reset_s" value="Discard">
				</div>	
				

	</div>
	
	</form>'
	;

?>
 <center><a href="./index.php">back</a></center>
	
<?php

	include ('../php/ftr.php');
?>