

<!DOCTYPE html>
<html>
<head>
	<title>Cars</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
	<?php
	$connect=mysqli_connect('localhost:8889','root','root','rentaldb');
	$query='SELECT * FROM products ORDER BY id ASC';
	$table=mysqli_query($connect,$query);
		if($table){
			if(mysqli_num_rows($table)>0){
				while($items=mysqli_fetch_assoc($table)){
					
				

	
	?>
		<div class="container">
			<div class="col-6 col-md-4">
				<form method="post" action="cart.php">">
					<h3 class="text-danger"><?php echo $items['name'];?></h3>
					<img src="<?php echo $items['image'];?>">
					<h3> <?php echo $items['price'];?> </h3>
					<input type="text" name="quantity" class="form-control" value="">
					<input type="hidden" name="name" value="<?php echo $items['name']?>">
					<input type="hidden" name="price" value="<?php echo $items['price']?>">
					<input type="submit" name="additem" value="Rent" class="btn btn-dark" style="margin-top: 10px">
					
				</form>
				
			</div>
		
	    </div>

	<?php
		}
			}
		}
	?>
	

</body>
</html>