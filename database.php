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

  ?>