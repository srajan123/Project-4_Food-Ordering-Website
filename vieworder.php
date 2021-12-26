<?php include('connection.php');
 ?>
<!DOCTYPE html>
<html>
<head>
		<link rel="stylesheet" type="text/css" href="addmenu.css">
	<style>
		u
		{
			margin-right: 12px;
		}
		h4
		{
			font-family: 'Quicksand-Regular';
			margin-right: 10px;
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
if (!isset($_SESSION['type'])) {
	$result = $con->query("SELECT * FROM orders WHERE user_name='$user' ORDER BY time desc;");
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {	
				echo "<h4><u>Your order contains: </u></h4>"."<b>".$row['item_name']."</b>";
				echo "<h4 ><u>Amount payed: </u></h4>"."&#x20b9;". "<b>".$row['price']."</b>";
				echo "<h4><u>Ordered from:</u></h4> "."<b>".$row['restaurant_name']."</b>";
				echo "<h4 ><u>Quantity:</u></h4> "."<b>".$row['quantity']."</b>";
				echo "<h4><u>veg/non-veg:</u><span style=color:green;font-size:25px;> &#8865; </span></h4>";
				echo "<h4><u>Ordered on: </u>"."    ".  date('d-M-Y', strtotime($row['time']))."</h4>";
				echo "<hr style=border-width:1px;>";
			}
		}
}



	
?>



