<?php 
$output=NULL;

include('connection.php'); 


if (isset($_POST['submit'])) {

include 'upload.php';
	$name=$_SESSION['name'];
	$fooditem=$_POST['fooditem'];
	$price=$_POST['price'];
	$type=$_POST['type'];
	$category=$_POST['category'];

foreach ($fooditem as $key => $value) {
	$query = "SELECT * FROM menu WHERE fooditem = '" . $con->real_escape_string($fooditem[$key]) . "' LIMIT 1";
	$resultset = $con->query($query);
	if ($resultset->num_rows == 0) {
             move_uploaded_file($_FILES["photo"]["tmp_name"][$key], "uploads/" . $_FILES["photo"]["name"][$key]);
			$query="INSERT INTO menu(fooditem,price,type,category,name,image) VALUES ('"
			      . $con->real_escape_string($fooditem[$key]) .
			"','"
				  . $con->real_escape_string($price[$key]) .
			"','"
				  . $con->real_escape_string($type[$key]) .
			"','"
			      . $con->real_escape_string($category[$key]) .
			"','$name','"
			      . $con->real_escape_string($_FILES["photo"]["name"][$key]) .

			"')";
	$insert=$con->query($query);

	 } 
	 else{
 }
}
}
 ?>




<!--  HTML CODE -->
 <!DOCTYPE html>
 <html>
 <head>
 		<link rel="stylesheet" type="text/css" href="addmenu.css">
 	<script src="https://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="crossorigin="anonymous"></script>
  <script>
  $(document).ready(function(e) {
   var html='<p /><div> <input placeholder="Type dish name.." style="margin-left: 20px;" type="text" name="fooditem[]" id="fooditem" required><input placeholder="Price.." style="margin-left: 10px;" type="number" name="price[]" id="price" required><select style="margin-left:20px;" name="type[]" id="type"><option value="" disabled selected>-Dish Type-</option><option name="Vegetarian">Vegetarian</option><option name="Non-vegetarian">Non-vegetarian</option></select> <select style="margin-left: 20px;" name="category[]" id="category"><option value="" disabled selected>-Dish Category-</option><option name="Staters">Staters</option><option name="Snacks">Snacks</option><option name="Main course">Main course</option><option name="Continental">Continental</option><option name="Dessert">Dessert</option><option name="Drinks">Drinks</option><option name="others">others</option></select><input type="file" name="photo[]" id="fileSelect"><a style="margin-left: 20px;" href="#" id="remove">Remove</a><br><hr></div>';  
   

   $("#add").click(function(e) {
   	 $("#container").append(html);
   });


$("#container").on('click','#remove',function(e){
	$(this).parent('div').remove();

});

  	});
  </script>
 </head>
 <body>
 	<?php include 'header.php'; ?>
 	<form method="post" style="margin-left: 2%;margin-top: 4%;" enctype="multipart/form-data">
 		<div id="container">
		 <input placeholder="Type dish name.." type="text" name="fooditem[]" id="fooditem" required>
		<input type="number" placeholder="Price..." name="price[]" id="price" required>
<select name="type[]" id="type">
				<option value="" disabled selected>-Dish Type-</option>
				<option name="Vegetarian">Vegetarian</option>
				<option name="Non-vegetarian">Non-vegetarian</option>
</select>

		<select style="margin-left: 20px;" name="category[]" id="category">
				<option value="" disabled selected>-Dish Category-</option>
				<option name="Staters">Staters</option>
				<option name="Snacks">Snacks</option>
				<option name="Main course">Main course</option>
				<option name="Continental">Continental</option>
				<option name="Dessert">Dessert</option>
				<option name="Drinks">Drinks</option>
				<option name="others">others</option>
		</select>
        <input type="file" name="photo[]" id="fileSelect">
		<a href="#" id="add">+ Add Items</a><br><hr>
</div>
 <p />
 <input type="submit" name="submit" value="Ok">
</form>
</body>
</html>
 			