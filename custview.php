<?php include('connection.php');
 ?>
<!DOCTYPE html>
<html>
<head>
		<link rel="stylesheet" type="text/css" href="addmenu.css">
	<style>
		h4
		{
			font-family: 'Quicksand-Regular';
		}
		u
		{
			margin-right: 12px;
		}
	</style>
	<title></title>
</head>
<body>
 	<?php include 'header.php'; ?>
</body>
</html>
<?php 
$user=$_SESSION['name'];
if (isset($_SESSION['name'])) {
	$result = $con->query("SELECT * FROM orders WHERE restaurant_name='$user' ORDER BY time DESC;");
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {	
				echo "<h4><u>Customer order contains: </u></h4>"."<b>".$row['item_name']."</b>";
				echo "<h4 ><u>Amount payed: </u></h4>"."&#x20b9;". "<b>".$row['price']."</b>";
				echo "<h4><u>Ordered by:</u></h4> "."<b>".$row['user_name']."</b>";
				echo "<h4 ><u>Quantity:</u></h4> "."<b>".$row['quantity']."</b><br>";
				echo "<h4><u>Ordered on: </u>"."    ".  date('d-M-Y', strtotime($row['time']))."</h4>";
				echo "<h4><u>veg/non-veg:</u><span style=color:green;font-size:25px;> &#8865; </span></h4>";
				echo "<hr style=border-width:1px;>";
			}
		}
}
?>



