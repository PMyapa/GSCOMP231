
<html>
<head>
	<title>T2001</title>
</head>
<body>
	

<div style="background-color:#555588; height:200px;" class="utab", >

	<div class="logo" style="float:left; margin:10px;">
	<img src="../img/logo.png"  height="180px">
	</div>
</div>
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
?>
<div style="height:100%;";>
	<center>
		
		<h2>View of User Information</h2>
		
		<?php
			echo "$mess<br>";
		?>

<?php
	/*Connect to MySQL database*/
	include("../dbcon/user.php");
	require_once("../dbcon/dbcon.php");


	/*Execute SQL command*/
	$query = "SELECT regno,fname, lname, gen, email,username FROM
				uinfo";
	$result=mysqli_query($con,$query);	
	
	
	/* Output results as HTML table */
	echo "<table border=1  width=90%>\n";

	/* Output field names as table header */
	echo "<caption><font >User Information</font></caption>
		<tr>
		<th width='2%'>Index</th>
		<th width='2%'>First Name</th>
		<th width='2%'>Last Name</th>
		<th width='2%'>Gender</th>
		<th width='2%'>Email</th>
		<th width='2%'>Edit</th>
		<th width='2%'>Delete</th>
		
		</tr>";
	
	
	/* Output all records */
	while($myrow=mysqli_fetch_row($result) )  {
		echo "<tr>";
		for($f=0;$f<mysqli_num_fields($result)-1;$f++)  {
			echo "<td>&nbsp;".htmlspecialchars($myrow[$f]);
			
			
			
			
		}
		
	
	echo "<td><a href='./edituser.php?uname=".urlencode($myrow[5])."'>edit</a></td>";
	echo "<td><a href='./deleteuser.php?uname=".urlencode($myrow[5])."'>delete</a></td>";
	
	

	

		
	
	}
	echo "</table>\n";

	
?>
		<br/><br/><br/>
		<div class="regw" style="border:solid; border-width:2px; padding:5px; width:100px;">
		<a href="./adminreg.php">New Admin..</a>
		</div>
		
	</center>
</div>
<?php
	include ('../php/ftr.php');
?>

