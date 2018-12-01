<?php
session_start();
include "user.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="test1.css">
</head>
<body>
	<?php
  $logattempts="";
	$user="";
	$pass="";
	$validate=true;
// define variables and set to empty values

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["username"])) {
    $user= "User Name is required";
    $validate=false;
  }
  if (empty($_POST["password"])) {
    $pass= "Password is required";
    $validate=false;
  }
  if (!empty($_POST["password"])&& !empty($_POST["username"])&&checklogin($_POST["username"],$_POST["password"])!=true) {
    $_SESSION['count']++;
    $logattempts="Login Failed ".$_SESSION['count']." times";
    $user= "User Name doesn't match";
    $pass= "Password Does Not Match";
    $validate=false;
    
  }

  
  //if (!empty($_POST["username"])&& checklogin($_POST["username"])!=true) {
  	  //$user= "User Name doesn't match";
  	    //$validate=false;
 
  //}
if($validate===true){
  session_destroy ();
  header('Location:https://bryantarchway.com/what-is-the-true-meaning-of-success/');

	}
  //echo $_SESSION['user'];
  //echo $_SESSION['pass'];
}
?>
	<div class="container" id="test2"> 
  <form id="contact" action="" method="post"> 
    <h1>Login to Play</h1>
    <fieldset>
    <fieldset>
     <?php echo $logattempts;?>
     <?php echo "<br>";?>
     <?php echo $user;?>
     <input placeholder="Your User Name " type="text" tabindex="3" name="username" class="in" >
    </fieldset>
     <fieldset>
      <?php echo $pass;?>
      <input placeholder="Your Password" type="password" tabindex="4" name="password" class="in">
       </fieldset>
     </fieldset>
      <button name="submit" type="submit" id="contact-submit">Log in</button>
    </fieldset>
    <a href="test1.php" style="margin: 0 auto; display:block; text-align: center;  text-decoration: none; padding-top: 10px; font-size: 15px;
   ">Register</a>
   </form>
</div>
</body>
</html>