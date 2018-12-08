<?php
function insert(){
session_start();

$servername = "localhost:8889";
$username = "rashad";
$password = "h";
$dbname = "rentaldb";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO users (username,password,email)
VALUES ('$_SESSION[user]', '$_SESSION[pass]', '$_SESSION[email]')";


if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
}


function checkuser($checkuser){
$servername = "localhost:8889";
$username = "rashad";
$password = "h";
$dbname = "rentaldb";
$usertocheck=$checkuser;

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql ="SELECT * FROM users WHERE username ='$usertocheck'";
//$count=mysqli_num_rows($conn,$sql);
$query=mysqli_query($conn,$sql);
if (mysqli_num_rows($query) > 0)
  {
      return true;
  }

mysqli_close($conn);

}

function checkemail($checkemail){
$servername = "localhost:8889";
$username = "rashad";
$password = "h";
$dbname = "rentaldb";
$emailtocheck=$checkemail;

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql ="SELECT * FROM users WHERE email ='$emailtocheck'";
//$count=mysqli_num_rows($conn,$sql);
$query=mysqli_query($conn,$sql);
if (mysqli_num_rows($query) > 0)
  {
      return true;
  }

mysqli_close($conn);

}


function checklogin($user, $pass){
$servername = "localhost:8889";
$username = "rashad";
$password = "h";
$dbname = "rentaldb";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql ="SELECT * FROM users WHERE username= '$user' AND password = '$pass' ";

$query=mysqli_query($conn,$sql);
if (mysqli_num_rows($query) > 0)
  {
      return true;
  }
  else{
   return false;
}
mysqli_close($conn);


}

?>
