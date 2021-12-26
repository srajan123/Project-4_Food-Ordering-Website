<?php 
include('connection.php');
if (!isset($_SESSION['prefer'])) {
 $_SESSION['prefer']=' ';
$veg=$_SESSION['prefer'];
}
else
$veg=$_SESSION['prefer'];
 ?>

<!DOCTYPE html>
<html>
<head>



	<style>
		.every
{
    width: 100%;
    padding-top: 4px;
    border: none;
        font-family:'Quicksand-Regular';
        padding-top: 18px;
    font-size: 22px;
    margin-right: -6px;
    border-radius: 3px;
    height: 37px;
    background-color: #d7d5d5;
}
	</style>



	<link rel="stylesheet" type="text/css" href="addmenu.css">
	<link rel="stylesheet" type="text/css" href="menu.css">

	<title></title>
</head>
<body style="overflow-x:hidden; ">
 	<?php include 'header.php'; ?>


</body >
</html>
<?php 
$result = $con->query("SELECT * FROM menu");
$image=array();
$price=array();
$type=array();
$name=array();
$place=array();
			if ( $veg!=' ') {
						echo 	"<div class='every'>Recommended</div>";
					}


if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {	
					$i=0;
					$image[$i]=$row['image'];
					$price[$i]=$row['price'];
					$place[$i]=$row['name'];
					$name[$i]=$row['fooditem'];
					$type[$i]=$row['type'];
					if ($type[$i]==$veg && $veg!=' ') {

					echo "<div style=margin-right:15px;float:left;margin-top:4%;>";
				echo "<img src=uploads/$image[$i]>";
					echo "<h5>&#x20b9; $price[$i]</h5><h4>$name[$i]</h4>";
					if ($type[$i]=='Vegetarian')
					 {
												echo "<h6 &#8865;><span style=color:green;font-size:20px;>&#8865; </span>$type[$i]</h6>";					}
												else{
													echo "<h6 &#8865;><span style=color:red;font-size:20px;>&#8865; </span>$type[$i]</h6>";

												}
											echo "<h3>Seller: $place[$i]</h6>";

											echo "<form method=post action='neworder.php?name=$name[$i]&price=$price[$i]&place=$place[$i]&type=$type[$i]'>";
											echo "<input min=1 type=number name=number placeholder=Quantity style=margin-left:-2px;width:82px;>";
											echo "<input style=border:none;width:150px;background-color:#ffa93e;
						 type=submit name=submit value='Order Now'>";
						     		echo "</form>";
											echo "</div>";
														$i=$i+1;;
					 }

	}
}
?>


<?php echo "<div style=background-color:#d4d0d0;border:none;margin-bottom:-36%;margin-top:5%;border-radius:4px;height:40px;width:100%;float:left;font-size:23px;font-family:'Quicksand-Regular';>All Dishes ...</div style=border:none;>"; ?>
<?php 
$result = $con->query("SELECT * FROM menu");
$image=array();
$price=array();
$type=array();
$name=array();
$place=array();
 echo "<div style=margin-top:6%;border:none;>";
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {	
					$i=0;
					$image[$i]=$row['image'];
					$price[$i]=$row['price'];
					$place[$i]=$row['name'];
					$name[$i]=$row['fooditem'];
					$type[$i]=$row['type'];
						
					echo "<div style=margin-right:15px;float:left;margin-top:5%;>";
				echo "<img src=uploads/$image[$i]>";
					echo "<h5>&#x20b9; $price[$i]</h5><h4>$name[$i]</h4>";
					if ($type[$i]=='Vegetarian') {
						echo "<h6 &#8865;><span style=color:green;font-size:20px;>&#8865; </span>$type[$i]</h6>";					}
						else{
							echo "<h6 &#8865;><span style=color:red;font-size:20px;>&#8865; </span>$type[$i]</h6>";

						}
					echo "<h3>Seller: $place[$i]</h6>";

					echo "<form method=post action='neworder.php?name=$name[$i]&price=$price[$i]'>";
					echo "<input  type=number name=number placeholder=Quantity min=1 style=margin-left:-2px;width:82px;>";
					echo "<input style=border:none;width:150px;background-color:#ffa93e;
 type=submit name=submit value='Order Now'>";
     		echo "</form>";
					echo "</div>";
								$i=$i+1;

	}
}
echo "</div>";

 ?>