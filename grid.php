

<!DOCTYPE html>
<html>
<head>
	<title>Cars</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
	
<?php

	include 'database.php';


	function remove_item($item_number){
		// if(isset($_SESSION['cart'])){
		// 	$cart = $_SESSION['cart'];

		// 	foreach ($cart as $rows => $cart_item){
		// 		if($cart_item['item_number']==$item_number){
		// 			unset($cart_item);

						$cart = array
							    (
							
							    array("car_name"=>"Corolla","img_url"=>"corolla.png","price"=>199.99,"rental_start"=>"12/8/18","rental_end"=>"12/10/18","item_number"=>2)     
							    );
					$_SESSION['cart'] = $cart;
	}


	function generate_cart($cart){


		$cart = array
		(
		  //carname,imageurl,price/day,rentalstart,rentalend,days
		array("car_name"=>"Yaris","img_url"=>"yaris.png","price"=>29.99,"rental_start"=>"12/8/18","rental_end"=>"12/10/18","days"=>2),
		array("car_name"=>"Corolla","img_url"=>"corolla.png","price"=>199.99,"rental_start"=>"12/8/18","rental_end"=>"12/10/18","days"=>2)		  
		);

		$_SESSION['cart'] = $cart;
		
		if(isset($_SESSION['cart'])){
			
			$index =1;

			foreach ($cart as $rows => $cart_item){
			   	echo "<div class='w3-bar-item'>";
		      	echo "<form action='inventory.php' method='post'>";
		      		echo $cart_item["car_name"];
  	            	echo "<img class='object-fit_cover' src='IMG/$cart_item[img_url]' width=100 height=80>";
	           	 	echo "<input style = margin-left: 10% type=submit name=corolla class=button value=x>";
	            	echo "<input type=hidden name=item_number value=$index>";

		        echo "</form>";
          		echo "<div>$cart_item[rental_start]-$cart_item[rental_start]</div>";
		      	echo "</div>";
		      	$index++;

			}	   	
		}
	// echo "<div class='w3-bar-item'>";
         
   //        echo "<form action='index.html' method='post'>";
   //        echo "Car Name";
   //          <img class="object-fit_cover" src="IMG/corolla.png" width="100" height="80">
   //            <input style = "margin-left: 10%" type="button" name="corolla" class="button" value="x">
   //          </form>
   //        <div>$RENTAL_START-$RENTAL_END</div>
         
          
   //      </div>
   //      echo "<div class=container style='padding-top: 100px'>";
			// 					echo "<div class=col-6 col-md-4>";
			// 						echo"<form method=post action=cart.php>";
			// 							echo "<h3 class=text-danger>$items[NAME]</h3>";
			// 								echo "<img src=IMG/$items[IMAGE]>";
			// 							echo"<h3>$items[PRICE]</h3>";
			// 							echo "<input type=text name=quantity class=form-control value=1>";
			// 							echo "<input type=hidden name=name value=$items[NAME]>";
			// 							echo "<input type=hidden name=price value=price $items[PRICE]>";
			// 							echo"<input type=submit name=additem value=Rent class=btn-dark style=margin-top: 10px;>";
			// 						echo "</form>";
			// 					echo"</div>";
			// 			   echo "</div>";

	}
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