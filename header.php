<img style="height: 67px;width:70px;position: absolute;left:10px;" src="foodshala.png">

<nav> <!-- navigation bar-->
	
		<?php 						/* Toggle sign in and logout button according user is signed in or not*/
			if (isset($_SESSION['name'])) {
				echo "<a style=background-color:black;padding:5px;color:white;border-radius:3px;width:67px;font-weight:600; href='logout.php'>";
				echo "Logout";
				echo "</a>";
			}
			else
			{
				echo "<a style=background-color:black;padding:5px;color:white;border-radius:3px;width:67px;font-weight:600; href=login.php>";
				echo "Sign in";
				echo "</a>";
			}
					 ?>  <!-- upto here --> 

			<?php 						/* Toggle sign in and logout button according user is signed in or not*/
			if (isset($_SESSION['type'])) {
				echo "<a style=text-decoration:none;float:right;font-family:'Quicksand-Regular';color:black;font-size:18px;margin-right:125px; href='addmenu.php'>";
				echo "+ Add Items";
				echo "</a>";
			}
			
		 ?>
					
					<?php 		/* Toggle add restaurant and logout button according user is signed in or not*/
			if (!isset($_SESSION['type'])) {
				echo "<a style=color:black; href=restaurantlogin.php>";
				echo "Add restaurant";
				echo "</a>";
			}
		 ?> 	
		<?php 						/* Toggle sign in and logout button according user is signed in or not*/
			if (isset($_SESSION['type'])) {
				echo "<a style=text-decoration:none;float:right;font-family:'Quicksand-Regular';color:black;font-size:18px;margin-right:125px; href='custview.php'>";
				echo "View orders";
				echo "</a>";
			}
			else
			{
				echo "<a style=text-decoration:none;float:right;font-family:'Quicksand-Regular';color:black;font-size:18px;margin-right:125px; href=vieworder.php>";
				echo "View Orders";
				echo "</a>";
			}
					 ?>		 
					 <a href="index.php">Menu</a>
	</nav>