<?php
include 'database.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
		<form action="auto_insert.php" method="POST">
			<input type="text" name="name" placeholder="car name">
			<input type="text" name="image" placeholder="image name">
			<input type="text" name="price" placeholder="price float only">
			<button type="submit" name="">submit</button>
		</form>
	
	<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			insert_car($_POST['name'],$_POST['image'],$_POST['price']);
		}
	?>
		
	<?php
		function insert_car($name,$image,$price){
		    $conn = get_db_connection();
		   	$sql = "INSERT INTO products (NAME, IMAGE, PRICE) VALUES ('$name','$image','$price')";
	    	$query = mysqli_query($conn,$sql);
	    	$conn->close();

	    }
  ?>