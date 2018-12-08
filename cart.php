

<!DOCTYPE html>
<html>
<head>
	<title>Cars</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
	
	<?php
	
	include 'database.php';

	$conn = get_db_connection();
	$query = 'SELECT * FROM products ORDER BY PRICE DESC';
	$table = mysqli_query($conn,$query);
	$conn->close();

		if($table){
			if(mysqli_num_rows($table)>0){
				while($items=mysqli_fetch_assoc($table)){
						?>
							<div class="container">
								<div class="col-6 col-md-4">
									<form method="post" action="cart.php">
										<h3 class="text-danger"><?php echo $items['NAME'];?></h3>
										<img src="IMG/<?php echo $items['IMAGE'];?>">
										<h3> <?php echo $items['PRICE'];?> </h3>
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