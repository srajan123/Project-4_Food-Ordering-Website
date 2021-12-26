<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
	<style>
		a
		{
			color: #ffb42b;
			font-family: 'Quicksand-Regular';
					}
		h2
		{
			text-align: center;
			font-family: helvetica;
		}
		h1{
    text-align: center;
    font-size: 41px;
    margin-top: -8%;
    color: #1d8b1d;
    font-family: 'Quicksand-Regular';
}
	</style>
	<title></title>
</head>
<body>
	<img style="margin-left: 23%; margin-top: -7%;" src="mail2.gif">
<?php 
$id=$_GET['id'];
if ($id==1) {
	echo "<h1>Your Order has been Successfully Placed ! Bon Appetite</h1>";
	echo "<h2>Go to <a href=index.php>Orders</a> page</h2>";
}


 ?>
</body>
</html>