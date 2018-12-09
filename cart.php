<?php  

ini_set('display_errors', 1);
error_reporting(E_ALL|E_STRICT);

	session_start();

	function insert_item($car_name,$img_url,$price,$days){

		if(isset($_SESSION['cart'])){
			$cart = $_SESSION['cart'];
		}
		else{
			//create a blank array
			$cart = [];
		}
		
		$item_number = 1;
		if(count($cart)>0){
			//get the last item, increment the item number
		}
		

		$new_item = array("car_name"=>$car_name,"img_url"=>$img_url,"price"=>$price,"days"=>$days);


		//push the item
		array_push($cart, $new_item);
		$_SESSION['cart'] = $cart;


	}


	function remove_item($item_number){
		//need to rebalance the item numbers after a remove
		// if(isset($_SESSION['cart'])){
		// 	$cart = $_SESSION['cart'];
		// }
		// else{
		// 	//nothing in cart
		// 	exit();
		// }

		$temp_cart = [];
		$_SESSION['cart'] = $temp_cart;
		header("Location:inventory.php");


		}

	


 	
?>