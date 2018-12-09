<!DOCTYPE html>
<html>
<head>
	<title>Cars</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
	
<?php

	include 'database.php';


	

	function generate_cart($cart){


		// $cart = array
		// (
		//   //carname,imageurl,price/day,rentalstart,rentalend,days
		// array("car_name"=>"Yaris","img_url"=>"yaris.png","price"=>29.99,"rental_start"=>"12/8/18","rental_end"=>"12/10/18","days"=>2),
		// array("car_name"=>"Corolla","img_url"=>"corolla.png","price"=>199.99,"rental_start"=>"12/8/18","rental_end"=>"12/10/18","days"=>2)		  
		// );

		$_SESSION['cart'] = $cart;
		if(isset($_SESSION['cart'])){
			
			$index =1;

		    echo "<form action='inventory.php' method='post'>";

			echo "<input style = margin-left: 10% type=submit name=remove class=btn-dark value=EMPTY CART>";

			foreach ($_SESSION['cart'] as $rows => $cart_item){
			   	echo "<div class='w3-bar-item'>";
			   	//echo "<form action='blank.php' method='post'>";

		      		echo $cart_item["car_name"];
  	            	echo "<img class='object-fit_cover' src='IMG/$cart_item[img_url]' width=100 height=80>";
	           	 	//echo "<input style = margin-left: 10% type=submit name=remove class=button value=x>";
	            	echo "<input type=hidden name=car_name value=$cart_item[car_name]>";
	            	echo "<input type=hidden name=img_url value=$cart_item[img_url]>";
	            	echo "<input type=hidden name=price value=$cart_item[price]>";
	            	echo "<input type=hidden name=rental_start value=$cart_item[days]>";

	            	
	            	echo "<input type=hidden name=item_number value=$index>";
	            	
	            	$cart_item['item_number'] = $index;

	            	foreach ( $cart_item as $var ) {
	            	    echo $var;
	            	}

	            

		        echo "</form>";
          	
		      	echo "</div>";
		      	$index++;
			}	   	
		}


	}


	function generate_grid(){
		$table = get_products_table();
		if($table){
			if(mysqli_num_rows($table)>0){
				while($items=mysqli_fetch_assoc($table)){
					?>
						<?php
							echo "<div class=container style='padding-top: 100px'>";
								echo "<div >";
								//changing to blank.php
								echo"<form method=post action=inventory.php>";

									// echo"<form method=post action=blank.php>";
										echo "<h3 class=text-danger>$items[NAME]</h3>";
											echo "<img src=IMG/$items[IMAGE]>";
										echo"<h3>$$items[PRICE]</h3>";
										echo"<h5>Days to rent:</h5>";
										echo "<input type=text name=days class=form-control value=1>";
										echo "<input type=hidden name=car_name value=$items[NAME]>";
										echo "<input type=hidden name=price value=$items[PRICE]>";
										echo "<input type=hidden name=img_url value=$items[IMAGE]>";


										echo"<input type=submit name=additem value='Add To Cart' class=btn-dark style=margin-top: 10px;>";
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