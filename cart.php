

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
						<?php
							echo "<div class=container>";
								echo "<div class=col-6 col-md-4>";
									echo"<form method=post action=cart.php>";
										echo "<h3 class=text-danger>$items[name]</h3>";
											echo "<img src=$items[image]>";
										echo"<h3>$items[price]></h3>";
										echo "<input type=text name=quantity class=form-control value=1>";
										echo "<input type=hidden name=name value=$items[name]>";
										echo "<input type=hidden name=price value=price $items[price]>";
										echo "<input type=submit name=additem value=Rent class=btn btn-dark style=margin-top: 10px>";
									echo "</form>";
								echo"</div>";
						   echo "</div>";
									 
						   ?>
						<?php
				}
			}
		}
	?>
	

</body>
</html>