<?php 
$output=NULL;

include('connection.php');
if (isset($_POST['submit'])) {

	$fooditem=$_POST['fooditem'];
	$price=$_POST['price'];
	$type=$_POST['type'];
	$category=$_POST['category'];

foreach ($fooditem as $key => $value) {
	$query = "SELECT * FROM menu WHERE fooditem = '" . $con->real_escape_string($fooditem[$key]) . "' LIMIT 1";
	$resultset = $con->query($query);
	if ($resultset->num_rows == 0) {
			$query="INSERT INTO menu(fooditem,price,type,category) VALUES ('"
			      . $con->real_escape_string($fooditem[$key]) .
			"','"
				  . $con->real_escape_string($price[$key]) .
			"','"
				  . $con->real_escape_string($type[$key]) .
			"','"
			      . $con->real_escape_string($category[$key]) .
			"')";
	$insert=$con->query($query);

	 } 
	 else{
echo "Alreasy exist"; }
}





}
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<style>
 		 @font-face
{
  font-family: 'Quicksand-Regular';
  src: url('Quicksand-Regular.otf');
}
		nav > a /* Child selector in CSS*/
		{
			text-decoration: none;
    float: right;
    font-family: 'Quicksand-Regular';
    color: black;
    font-size: 18px;
    margin-right: 125px;
}
nav
{
	background-color: #ffb939;
    height: 25px;
    margin-top: -8px;
    padding: 20px;
    margin-left: -10px;
    width: 100%;
}
 		#remove
 		{
		    padding: 1px;
		    background-color: #dc3030;
		    color: white;
		    border-radius: 5px;
		    padding-right: 8px;
		    padding-left: 8px;
		    font-family: helvetica;
		    text-decoration: none;
 		}
 		#add
 		{
 		padding: 10px;
    background-color: #dc3030;
    color: white;
    border-radius: 3px;
    padding-right: 12px;
    padding-left: 12px;
    font-family: helvetica;
    text-decoration: none;
    color: #ffffff;
    background-color: #337ab7;
}

    	 input,select {
  margin-bottom:3px;
  padding:10px;
  width: 175px;
  margin-left: 20px;
  border:1px solid #CCC
}
 		}
 	</style>
 	<script
  src="https://code.jquery.com/jquery-3.4.0.min.js"
  integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
  crossorigin="anonymous"></script>
  <script>
  $(document).ready(function(e) {
   var html='<p /><div> <input placeholder="Type dish name.." style="margin-left: 20px;" type="text" name="fooditem[]" id="fooditem" required><input placeholder="Price.." style="margin-left: 10px;" type="number" name="price[]" id="price" required><select style="margin-left:20px;" name="type[]" id="type"><option value="" disabled selected>-Dish Type-</option><option name="Vegetarian">Vegetarian</option><option name="Non-vegetarian">Non-vegetarian</option></select> <select style="margin-left: 20px;" name="category[]" id="category"><option value="" disabled selected>-Dish Category-</option><option name="Staters">Staters</option><option name="Snacks">Snacks</option><option name="Main course">Main course</option><option name="Continental">Continental</option><option name="Dessert">Dessert</option><option name="Drinks">Drinks</option><option name="others">others</option></select><a style="margin-left: 20px;" href="#" id="remove">Remove</a><br><hr></div>';  
   

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
 	<form method="post" style="margin-top: 20%;">
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
		<a href="#" id="add">+ Add</a><br><hr>
</div>
 <p />
 <input type="submit" name="submit">
</form>
</body>
</html>
 			