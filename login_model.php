<?php

  include 'database.php';

  function create_user($username,$password,$email){
    $conn = get_db_connection();

    if(column_value_exist($username,"USERNAME")){
      //abort
      $conn->close();
      echo "user exists";
      exit;
    }

    $sql = "INSERT INTO users (USERNAME, EMAIL, PASSWORD) VALUES ('$username','$email','$password')";

    $query = mysqli_query($conn,$sql);

    if(!$query){
        echo "unable to execute create_user query";
        $conn->close();
        exit;
    }

    // if (!$conn->query($sql)){
    //     echo "unable to execute create_user query";
    //     $conn->close();
    //     exit;

    // }
     $conn->close();
  }

  function column_value_exist($value,$column){
    $conn = get_db_connection();
    $sql ="SELECT $column FROM users WHERE $column = '$value'";
    if (!$result = $conn->query($sql)){
        echo "unable to execute query column_value_exist";
        $conn->close();
        exit;
    }
    if(mysqli_num_rows($result)==1){return true;}
    else{return false;}
    $result->free();
    $conn->close();
  }
  
  function valid_credentials($user, $pass){
    $conn = get_db_connection();
    // Perform an SQL query
    $sql ="SELECT USERNAME,PASSWORD FROM users WHERE USERNAME = '$user' AND PASSWORD = '$pass' ";
    if (!$result = $conn->query($sql)){
        echo "unable to execute query";
        $conn->close();
        exit;
    }


    if(mysqli_num_rows($result)==1){
          return true;
      }
      else{
       return false;
      }
    $result->free();
    $conn->close();
  }

  //testing 
  // if(valid_credentials('greg','pw1234')){
  //   echo("credentials were valid");
  // } 
  // else{
  //       echo("credentials not valid");
  // }



  //testing username 
  // if(column_value_exist('greg','USERNAME')){
  //   echo("user was valid");
  // } 
  // else{
  //       echo("user was not valid");
  // }

  //testing pw
  // if(column_value_exist('Bollucks','PASSWORD')){
  //   echo("pw was valid");
  // } 
  // else{
  //       echo("pw was not valid");
  // }


  //create_user("samir","purple","booty@booty.com");


?>