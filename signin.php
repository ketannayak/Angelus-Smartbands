<!DOCTYPE html>
<html>

  <head>
    <link rel="stylesheet" href="/angelus/styles/main.css">
	<link rel="stylesheet" href="/angelus/styles/css/font-awesome.min.css">
	
  </head>

  <body>
	<?php include('sql.php') ?>
  
    <div class="nav">
      <div class="topmenucontainer">
        <ul class="mainmenu">
          <li>
			<div class = "topmenuoption firstmenuoption">
				<a href="index.html">Angelus</a>
			</div>
	  </li>
          <li>
			<div class = "topmenuoption midmenuoption">
				<a href="javascript:void(0)">About Us</a>
			</div>
   	  </li>
	  <li>
			<div class = "topmenuoption midmenuoption">
				<a href="javascript:void(0)">Pre-order now</a>
			</div>
	  </li>
	  <li>
			<div class = "topmenuoption midmenuoption">
				<a href="signin.php">Manage your Angelus</a>
			</div>
	  </li>
          <li>
			<div class="topmenuoption midmenuoption">
				<a href="">Log out</a>
			<div>
	  </li>
	</ul>
      </div>
    </div>

	<div class = "aboutmesignin">
			<center>
				<img  class="angelhalo" src ="/angelus/images/angelhalo.png" />	
				<p class = "subtitle"> Always there for you.</>
			</center>
			<hr>
	</div>


	<div class = "aboutme">
	<div class = "container">
	<center>
<?php
	$result = $connect->query("SELECT nickname FROM cores WHERE userId = 1 ORDER BY nickname; ");
	while ($row = $result->fetch_row()) {
	echo "<h1 style='padding-bottom: 1em'>Hello, " . $row[0]. ".</h1>";
}

?>
	<h2 class = "contactsheader">Caregiver Information</h2>
	<?php
	$result =$connect->query("SELECT * FROM coreUsers WHERE coreID ='53ff69066667574820252067' ORDER BY nickname ASC ;");
	
	$resultval =mysqli_num_rows ($result);
	echo "<h3>You currently have  " . $resultval . " contacts listed for assistance. </h3>" ;
	?>
	 <i class = "fa fa-users fa-2x experienceicon"></i>

	</center>
	<center>
	<form class ="bestform" method="POST" action="updatedcontacts.php" id = "form1">
	<table  class ="contactstable" >
		<tr>
			<th>Name</th>
			<th>Phone number</th>
		</tr>

	<?php
	$result =$connect->query("SELECT * FROM coreUsers WHERE coreID ='53ff69066667574820252067' ORDER BY nickname ASC ;");
	
		
	$j=1;	
	while($row = $result->fetch_row()) {
			echo "<tr><td><i class = 'fa fa-user'></i><input type= 'text' name='name" . $j . "' value =  '" . $row[2] . "'></td><td><i class = 'fa fa-phone'></i><input type ='text' name='phonenumber" . $j . "'  value = '" . $row[1] . "'></td></tr>";
			$j++;
	}
	for($i = ($result->num_rows + 1); $i<=5 ; $i++) {
		echo "<tr><td><i class = 'fa fa-user'></i><input type='text' name ='name" . $i . "'></td><td><i class = 'fa fa-phone'></i><input type='text' name='phonenumber" . $i . "'></td></tr>";
	} 

	?>
	</table>
	</form>
	</center>

	<center>
	<button class = "resumebutton" type="submit" form = "form1" value="Submit">Update contacts</button>
	</center>


	</div>
	</div>
	
	
	<div class = "footer">
		<div class = "container">
				<div	 class = "linkstablecontainer">
					<table class ="linkstable">
						<tr>
							<td><a href="https://www.facebook.com/nayak.ketan"><i class = "fa fa-facebook-square fa-lg"></i></a></td>
							<td><a href="https://twitter.com/KetanNayak"><i class = "fa fa-twitter-square fa-lg"></i></a></td> 
							<td><a href="javascript:void(0)"><i class = "fa fa-android fa-lg"></i></a></td>
							<td><a href="javascript:void(0)"><i class = "fa fa-apple fa-lg"></i></a></td> 
							<td><a href="javascript:void(0)"><i class = "fa fa-windows fa-lg"></i></a></td>
						</tr>
					</table>
				</div>	
				<center>
				<p>
					Copyright &copy Angelus 2015. All rights reserved
				</p>
			</center>
		</div>
	</div>	
				
  </body>
</html>
