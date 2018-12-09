<?php
    //codd settings
    // function get_db_connection(){
    //     $servername = "localhost";
    //     $username = "gwiltshire2";
    //     $password = "gwiltshire2";
    //     $dbname = "gwiltshire2";

    //     // Create connection
    //     $conn = new mysqli($servername, $username, $password, $dbname);

    //     // Check connection
    //     if(!$conn){
    //         die("Connection failed: " . mysqli_connect_error());
    //     }

    //     return $conn;
    //   }

    //localhost settings

    function get_db_connection(){
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "rentaldb";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        return $conn;
    }

    function get_products_table(){
        $conn = get_db_connection();
        $query = 'SELECT * FROM products ORDER BY PRICE DESC';
        $table = mysqli_query($conn,$query);
        $conn->close();
        return $table;
    }

    function get_orders($username,$password){
        $conn = get_db_connection();
        $query = "SELECT * FROM orders WHERE USERNAME='$username' AND PASSWORD='$password'";
        
        if (!$result = $conn->query($query)){
        echo "unable to execute query";
        }
        $conn->close();
        return $result;
    }

    function create_order(){
        $conn = get_db_connection();
        //for each element in cart
        $cart = $_SESSION['cart'];

        foreach ($cart as $rows => $cart_item){
            

            $username = $_SESSION['username'];
            $password = $_SESSION['password'];
            $car_name = $cart_item['car_name'];
            $price = $cart_item['price'];
            $days = $cart_item['days'];



        $query = "INSERT INTO orders USERNAME, PASSWORD, CARNAME, AMOUNT, DAYS VALUES($username, $password, $car_name, $price, $days)";
        
        if (!$result = $conn->query($query)){
        echo "unable to execute query";
        }
        $conn->close();
    }
}


  ?>