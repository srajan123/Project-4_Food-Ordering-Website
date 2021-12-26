<!DOCTYPE html>
<html>
<head>
		<link rel="stylesheet" type="text/css" href="menu.css">

	<link rel="stylesheet" type="text/css" href="addmenu.css">
	<title></title>
</head>
<body>
 	<?php include 'header.php'; ?>

</body>
</html>
<?php 
include('connection.php'); 

$result = $con->query("SELECT * FROM menu");
$image=array();
$price=array();
$type=array();
$name=array();
$place=array();
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {	
					$i=0;
					$image[$i]=$row['image'];
					$price[$i]=$row['price'];
					$place[$i]=$row['name'];
					$name[$i]=$row['fooditem'];
					$type[$i]=$row['type'];
					echo "<div style=margin-right:15px;float:left;>";
				echo "<img src=uploads/$image[$i]>";
					echo "<h5>&#x20b9; $price[$i]</h5><h4>$name[$i]</h4>";
					if ($type[$i]=='Vegetarian') {
						echo "<h6 &#8865;><span style=color:green>&#8865; </span>$type[$i]</h6>";					}
						else{
							echo "<h6 &#8865;><span style=color:red>&#8865; </span>$type[$i]</h6>";

						}
					echo "<h3>Seller: $place[$i]</h6>";
					echo "</div>";
								$i=$i+1;

	}
}
 ?>
