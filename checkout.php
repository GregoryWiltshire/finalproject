	<!DOCTYPE html>
	<html>
	<head>
		<title>Cart</title>
		  <style type="text/css">
				table{
				border: 1px solid black;
		        table-layout: fixed;
		        width: 200px;
		      }
				th,td{
					border: 1px solid black;
		            width: 100px;
		            text-align: center;
				}
				tr {
				    border-bottom: 1px solid black;
				    border-top: 1px solid black;
				    border-collapse: collapse;
				}
			</style>
	</head>
	<body>

	</body>
	</html>
	
	<?php
	session_start();

		$cart=$_SESSION	['cart'];
		echo"<table border=1 width=500 height=500 rules=none>";
		echo"<th>Car Rented</th>";
		echo"<th>Car Price</th>";
		echo"<th>Number of Days</th>";
		echo"<th>Rental Start/End Days</th>";
		foreach ($cart as $rows => $cart_item){
		
			echo "<tr>";
			echo "<td>$cart_item[car_name]</td>";
			echo "<td>$cart_item[price]</td>";
			echo "<td>$cart_item[days]</td>";
			echo "<td>$cart_item[rental_start]-$cart_item[rental_start]</td>";

			echo "</tr>";
			

			}
		echo"</table>"

	?>