<?php 
include 'connection.php';
if (isset($_POST['submit'])) {
if (!isset($_SESSION['name']) || isset($_SESSION['type'])) {
	     header('location: login.php');
}
 
else{	

$quantity=$_POST['number'];
$fooditem= $_GET['name']; 
$price= $_GET['price'];
 $place=$_GET['place'];
 $type=$_GET['type'];
$user=$_SESSION['name'];

$sql=mysqli_query($con,"INSERT INTO orders (restaurant_name,user_name,item_name,quantity,price,type) VALUES('$place','$user','$fooditem','$quantity','$price','$type');");
	     header('location: success.php?id=1');


}
}
 ?>