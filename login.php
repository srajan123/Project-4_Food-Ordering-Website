<?php 
include('connection.php');
if (isset($_POST['login'])) {

	$email=$_POST['email'];
	$epass=$_POST['pass'];
	$pass=md5($epass);
	$query =mysqli_query($con,"SELECT * FROM users WHERE email='$email' AND password='$pass';");
	$count=mysqli_num_rows($query);
	$row=mysqli_fetch_array($query,MYSQLI_ASSOC);
		if($count) 
	      {
	      	$_SESSION['prefer']=$row['prefer'];
	        $_SESSION['name']=$row['name'];

	        header('location: index.php');
	      }
	      else
	      {
	      	echo "<h2 style=font-family:Quicksand-Bold;color:#fff9ed;position:absolute;left:42%;top:23%;>Invalid Password or Email!</h2>"	;      }
}

if (isset($_POST['register'])) {

$email=$_POST['email'];
$text=$_POST['text'];
$prefer=$_POST['prefer'];
$pass=$_POST['pass'];
$pass1=$_POST['pass1'];
$query=mysqli_query($con,"SELECT email FROM users WHERE email='$email';");
$count=mysqli_num_rows($query);
if (!$count) 
      {

       if($pass==$pass1)
            {
            	$epass=md5($pass);
             $sql=mysqli_query($con,"INSERT INTO users (email,name,prefer,password) VALUES('$email','$text','$prefer','$epass');");
                        $_SESSION['prefer']=$prefer;
                        $_SESSION['name']=$text;
                        header('location: index.php');
                }  
                else
      echo '<h2 style=font-family:Quicksand-Bold;color:#fff9ed;position:absolute;left:42%;top:23%;>Password does not match!</h2>';
      }

  else
       echo '<h2 style=font-family:Quicksand-Bold;color:#fff9ed;position:absolute;left:42%;top:23%;>User Already Exist!</h2>';
        

}
 ?>
<!DOCTYPE html>
<html>
<head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" type="text/css" href="login.css">
	<title>Login</title>
</head>

<body>
<img style="height:100px;position: absolute;left:30px;" src="foodshala1.png">
<input type='checkbox' id='form-switch'>
		<form class="extra" style="transform: translate(0%,230%);" id='login-form' action="login.php" method='post'>
							<header >Customer Login</header>
							<input type="email" name="email" required placeholder="Email address">
						    <input type="password" placeholder="Password" name="pass" required>
						    <button class="loginbutton" type='submit' name="login">Login</button>
						    <br> <label  class="switchlabel" for='form-switch'><span style="color: white;">Not a member? </span>Click here</label>
				</form>
			<form style="width: 278px;transform: translate(221%,96%);margin-bottom: -70px;" id='register-form' action="login.php" method='post'>
							<header style="text-align: center;position: absolute;top: -35%;">Customer Registration</header>

						  <input type="email" placeholder="Email" name="email" required>
						  <input type="text" name="text" placeholder="your name" required>
						  <select style="color: #858182;width:322px;" name="prefer" placeholder="Email">
								 	<option value="" disabled selected>What do you prefer most...</option>
								 	<option name="Veg">Vegetarian</option>
									<option name="Non-veg">Non-vegetarian</option>
						  </select>

						  <input type="password" placeholder="Password" name="pass" required >
						  <input type="password" placeholder="Confirm Password" name="pass1" required >
						  <button  class="loginbutton" type='submit' name="register">Register</button>
						  <br><label class="switchlabel" for='form-switch'><span style="color: white;">Already member? </span>login here</label>
			</form>
			<br><h6>-or <a href="restaurantlogin.php" style="color:#e09c2a;background: #160f0a;">signin</a> as restaurant</h6>

</body>
</html>