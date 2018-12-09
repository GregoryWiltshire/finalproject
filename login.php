<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="test1.css">
</head>
<body>
<?php

  $logattempts = "";
  $user = "";
  $pass = "";
  // define variables and set to empty values

  include 'login_model.php';

  if($_SERVER["REQUEST_METHOD"] == "POST"){
      if (empty($_POST["username"])){
          $user = "User Name is required";
      }
      if (empty($_POST["password"])){
          $pass = "Password is required";
      }
      if(!empty($_POST["password"]) && !empty($_POST["username"])){
        if(!valid_credentials($_POST["username"], $_POST["password"])){
          $_SESSION['count']++;
          $logattempts = "Login Failed " . $_SESSION['count'] . " times";
          $user = "User Name doesn't match";
          $pass = "Password Does Not Match";
        }

        else{
          $_SESSION['username']=$_POST['username'];
          $_SESSION['password']=$_POST['password'];
          header('Location:index.php');
        }
      }
    }
  

?>
  <div class="container" id="test2">
  <form id="contact" action="" method="post">
    <h1>Login</h1>
    <fieldset>
    <fieldset>
     <?php echo $logattempts; ?>
     <?php echo "<br>"; ?>
     <?php echo $user; ?>
     <input placeholder="Your User Name " type="text" tabindex="3" name="username" class="in" >
    </fieldset>
     <fieldset>
      <?php echo $pass; ?>
      <input placeholder="Your Password" type="password" tabindex="4" name="password" class="in">
       </fieldset>
     </fieldset>
      <button name="submit" type="submit" id="contact-submit">Log in</button>
    </fieldset>
   </form>
</div>
</body>
</html>