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
?>
<div style="height:100%;";>
	<center>
		
		<h2>Delete users</h2>
		
		<?php
			echo "$mess<br>";
		?>
		
	<?php

if(isset($_POST["yes"])) {
	
	if(isset($_GET["uname"])) {
	
		include("../dbcon/user.php");
		require_once("../dbcon/dbcon.php");
		
		
		$uname = $_GET["uname"];
		
		$query="DELETE FROM uinfo WHERE username = '$uname'";

		$result=mysqli_query($con,$query);
		if(!$result) {	
			print mysqli_error($con);
			exit();  
		}
		
		echo "<font color='blue'><b>Information has been deleted.</b></font>"; 
	echo "<br>";
	echo "<a href='./userinfo.php'>back</a>";
	
	exit;
	}
}

echo "<font>Delete user:".$_GET['uname']."??</font>
	";
	?>
	
	
	<script type="text/javascript">
		function dlt() {

			return confirm("Do you want to delet?");
		}		
	</script>
	


	<form name="admin_edit" method="post" action="" onSubmit="dlt()">
	<input type="submit" name="yes" value=" Yes">
	</form>
	
	<button><a href="./index.php">no</a></button>
	
<?php
	include ('../php/ftr.php');
?>