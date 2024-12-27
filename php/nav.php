<style>
.dropbtn {
  background-color: #555599; 
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;

}

.dropbtn a {
  color: white;
  text-decoration: none;
}

.dropdown {
  position: relative;
  display: inline-block;


}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #8888cc; 
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
  display: block;
}

.dropdown:hover .dropbtn {
  background-color: #8888bb;
}
</style>


<!-- user tab -->
<div style="background-color:#555588; height:200px;" class="utab", >

	<div class="logo" style="float:left; margin:10px;">
	<img src="../img/logo.png"  height="180px">
	</div>
	
	<div class="butab" style="color:white; float:right;  ">
	<?php
	echo $_SESSION['username']; 
	echo "<br>";
	echo $_SESSION['ematype'];
	?>
	<br><a  style="text-decoration: none; color:red;" href="../user/logoff.php">Log Out</a>

	</div>
	
	
	
	<div style=" width:80%; float:right; margin-top:90px;">
		<div style="float:right; margin-right:10%; ">


		<div class="dropdown">
		  <a href="../home/"><button class="dropbtn">Home</button></a>
		  <div class="dropdown-content">
		  <a href="#">test</a>
		  <a href="#">test</a>
		  </div>
		  
		</div>

		<div class="dropdown">
		  <a href="../other"><button class="dropbtn">Other</button></a>
		  <div class="dropdown-content">
		  <a href="#">test</a>
		  <a href="#">test</a>
		  </div>
		  
		</div>

		<div class="dropdown">
		  <a href="#"><button class="dropbtn">TEST</button></a>
		  <div class="dropdown-content">
		  <a href="#">test</a>
		  <a href="#">test</a>
		  </div>
		  
		</div>
		
		<div class="dropdown">
		  <a href="#"><button class="dropbtn">TEST</button></a>
		  <div class="dropdown-content">
		  <a href="#">test</a>
		  <a href="#">test</a>
		  </div>
		  
		</div>
		  
		</div>
	</div>

</div>