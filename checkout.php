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
			 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
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
		foreach ($cart as $rows => $cart_item){
		
			echo "<tr>";
			echo "<td>$cart_item[car_name]</td>";
			echo "<td>$cart_item[price]</td>";
			echo "<td>$cart_item[days]</td>";
			echo "</tr>";
			}
		echo"</table>"

	?>