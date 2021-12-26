<?php 
include('connection.php');
if (isset($_POST['login'])) {

	$email=$_POST['email'];
	$epass=$_POST['pass'];
	$pass=md5($epass);
	$query =mysqli_query($con,"SELECT * FROM restaurant WHERE email='$email' AND password='$pass';");
	$count=mysqli_num_rows($query);
	$row=mysqli_fetch_array($query,MYSQLI_ASSOC);
		if($count) 
	      {
	      	$_SESSION['type']=$row['type'];
	        $_SESSION['name']=$row['name'];
	        header('location: index.php');
	      }
	      else
	      {
	      	echo "<h2 style=font-family:Quicksand-Bold;color:#fff9ed;position:absolute;left:42%;top:18%;>Invalid Password or Email!</h2>"	; 
	      }
}

if (isset($_POST['register'])) {

$email=$_POST['email'];
$name=$_POST['text'];
$type='yes';
$number=$_POST['number'];
$pass=$_POST['pass'];
$pass1=$_POST['pass1'];
$query=mysqli_query($con,"SELECT email FROM restaurant WHERE email='$email' AND name='$text' AND numbers='$number' ;");
$count=mysqli_num_rows($query);
if (!$count) 
      {

       if($pass==$pass1)
            {
            	$epass=md5($pass);
             $sql=mysqli_query($con,"INSERT INTO restaurant (name,password,numbers,email,type) VALUES('$name','$epass','$number','$email','$type');");
					$_SESSION['type']=$type;
	       			 $_SESSION['name']=$name;                      
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


	<style>
		header
{
  font-weight: bold;
    font-size: 29px;
    font-family: 'Quicksand-Regular';
    top: -57px;
    position: absolute;
    color: orange;
    left: 8%;
}
	</style>



		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" type="text/css" href="restaurantlogin.css">
	<title>Login</title>
</head>

<body>

<img style="height:100px;position: absolute;left:30px;" src="foodshala1.png">

			<input type='checkbox' id='form-switch'>
				<form class="extra"  id='login-form' action="restaurantlogin.php" method='post'>
							<header style="position: absolute;top: -35%;">Restaurant Registration</header>

							<input type="text" name="text" required placeholder="Restaurant name">
							<input type="email" name="email" required placeholder="Email address">
						    <input type="password" placeholder="Password" name="pass" required>
						    <input type="password" placeholder="Confirm Password" name="pass1" required>
						    <input type="text" name="number" placeholder="Mobile number" pattern="[1-9]{1}[0-9]{9}" required>
						    <button style="width: 100%;" class="loginbutton" type='submit' name="register">Register</button>
						    <br> <label  class="switchlabel" for='form-switch'><span style="color: white;">Already Registered? </span>Login</label>
				</form>

			<form class="extra" style="transform: translate(0%,241%);" id='register-form' action="restaurantlogin.php" method='post'>
							<header style="left: 8%;">Restaurant Login</header>

						  <input type="email" placeholder="Email" name="email" required>
						  <input type="password" placeholder="Password" name="pass" required >
						  <button style="width: 100%;"  class="loginbutton" type='submit' name="login">login</button>
						  <br><label class="switchlabel" for='form-switch'><span style="color: white;">Add Restaurant? </span>Click here</label>
			</form>
</body>
</html>