<?php
include 'registration_controller.php';

session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
  <link rel="stylesheet" type="text/css" href="test1.css">
</head>
<body>
  <?php
  $namerror="";
  $emailerror="";
  $user="";
  $pass="";
  $cpass="";
  $validate=true;
// define variables and set to empty values

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $namerror = "Name is required";
    $validate=false;
 } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $namerror = "Only letters and white space allowed"; 
        $validate=false;
      }
  }
  
  if (empty($_POST["email"])) {
    $emailerror = "Email is required";
    $validate=false;
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailerror = "Invalid email format"; 
      $validate=false;
    }
    else{
      if(validate_person($_POST["email"],"email")==true){
      $validate=false;
      $emailerror="Email exists already";
    }
}
    


    }

  
  
  

  if (empty($_POST["username"])) {
    $user= "User Name is required";
    $validate=false;
  }
  elseif(validate_person($_POST["username"],"username")==true){
          $validate=false;
          $user="User exists already";
  }
  else{
    
  }

  if (empty($_POST["password"])) {
    $pass= "Password is required";
    $validate=false;
  }
  if (!empty($_POST["password"])&& empty($_POST['cpass'])) {
    $validate=false;
    $cpass= "Confirm Password";
  }
  if (!empty($_POST["password"])&& !empty($_POST['cpass'])&& $_POST["password"]!=$_POST['cpass']) {
    $pass= "Password Does Not Match";
    $validate=false;
  }
  if (!empty($_POST["password"])&& !empty($_POST['cpass'])&& $_POST["password"]===$_POST['cpass']) {
 
  }
if($validate===true){
  $_SESSION['user']=$_POST["username"];
  $_SESSION['pass']=$_POST["password"];
  $_SESSION['email']=$_POST["email"];
  insert_user($_SESSION['user'],$_SESSION['pass'],$_SESSION['email']);
 
  header('Location:login.php');

  
}
 
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
  <div class="container">  
  <form id="contact" action="" method="post">
    <h1>Registration</h1>
    <fieldset>
      <?php echo $namerror;?>
      <input placeholder="Your name" type="text" tabindex="1"  autofocus name="name">
    </fieldset>
    <fieldset>
     <?php echo $emailerror;?>
     <input placeholder="Your Email Address" type="text" tabindex="2" name="email">
    </fieldset>
    <fieldset>
     <?php echo $user;?>
     <input placeholder="Your User Name " type="text" tabindex="3" name="username" >
    </fieldset>
     <fieldset>
      <?php echo $pass;?>
      <input placeholder="Your Password" type="password" tabindex="4" name="password">
       </fieldset>
      <fieldset>
       <?php echo $cpass;?>
      <input placeholder="Confirm Password" type="password" tabindex="5" name="cpass">
    </fieldset>
    <fieldset>
      <textarea placeholder="Played our games before? Tell us what you think" tabindex="6"></textarea>
    </fieldset>
    <fieldset>
      <button name="submit" type="submit" id="contact-submit">Submit</button>
    </fieldset>
   </form>
</div>
</body>
</html>