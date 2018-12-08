

<!DOCTYPE html>
<html>
<head>
	<title>Cars</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
	
	<?php
	
	include 'database.php';

      function generate_grid(){
      	$table = get_products_table();

		if($table){
			if(mysqli_num_rows($table)>0){
				while($items=mysqli_fetch_assoc($table)){
					?>
						<?php
							echo "<div class=container style='padding-top: 100px'>";
								echo "<div class=col-6 col-md-4>";
									echo"<form method=post action=cart.php>";
										echo "<h3 class=text-danger>$items[NAME]</h3>";
											echo "<img src=IMG/$items[IMAGE]>";
										echo"<h3>$items[PRICE]</h3>";
										echo "<input type=text name=quantity class=form-control value=1>";
										echo "<input type=hidden name=name value=$items[NAME]>";
										echo "<input type=hidden name=price value=price $items[PRICE]>";
										echo"<input type=submit name=additem value=Rent class=btn-dark style=margin-top: 10px;>";
									echo "</form>";
								echo"</div>";
						   echo "</div>";
									 
						   ?>
						<?php
				}
			}
		}
	}
	?>
	

</body>
</html>