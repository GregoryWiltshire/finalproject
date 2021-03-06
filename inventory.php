<?php

session_start();
?>
<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.w3-sidebar a {font-family: "Roboto", sans-serif}
body,h1,h2,h3,h4,h5,h6,.w3-wide {font-family: "Montserrat", sans-serif;}
#logoutButton {
  position: absolute;
  top: 10px;
  right: 300px;
}
#loginButton {
  position: absolute;
  top: 10px;
  right: 400px;
}
#registerButton {
  position: absolute;
  top: 10px;
  right: 490px;
}
</style>
<body class="w3-content" style="max-width:1200px">



  <?php

    include 'grid.php';
    include 'cart.php';

        //remove item from the cart
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          
          if(isset($_POST['item_number'])){
            $item_number = $_POST['item_number'];
             remove_item($item_number);
             remove_item(1);

          }

          if(isset($_POST['additem'])){

            
            
            $car_name = $_POST['car_name'];
            $img_url = $_POST['img_url'];
            $price = $_POST['price'];
            $days= $_POST['days'];

            insert_item($car_name,$img_url,$price,$days);

          }

        }





?>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">
    <div class="w3-container w3-display-container w3-padding-16">
      <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
      <h3 class="w3-wide"><b>A.G.S.</b></h3>
    </div>
    <!-- <div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold">
      <h3 id="inven"> <a href="inventory.php" class="w3-bar-item w3-button">Inventory</a></h3>
      <h5 class="w3-bar-item" id="filter">Filter By Car Type</h5>
      <a href="#" class="w3-bar-item w3-button">Sedan</a>
      <a href="#" class="w3-bar-item w3-button">Mid-Size</a>
      <a href="#" class="w3-bar-item w3-button">Luxury</a>
    </div> -->
  </nav>
<!-- Top menu on small screens -->
<header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">
  <div class="w3-bar-item w3-padding-24 w3-wide">LOGO</div>
  <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-24 w3-right" onclick="w3_open()"><i class="fa fa-bars"></i></a>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:250px">

  <!-- Push down content on small screens -->
  <div class="w3-hide-large" style="margin-top:83px"></div>



  <!--MENUBAR-->
  <div class="w3-top">
  <div class="w3-bar w3-black w3-card">
    <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>

    <form action="index.php" method="post">
          <input class=btn-dark type="submit" name="log_out" value="Logout" />

   
    </form>
    <a href="index.php" class="w3-bar-item w3-button w3-padding-large">HOME</a>
    <div class="w3-dropdown-hover w3-hide-small">
      <button class="w3-padding-large w3-button" title="More"><a href="checkout.php">YOUR CART </a><i class="fa fa-shopping-cart w3-margin-right"></i></button>
      <div class="w3-dropdown-content w3-bar-block w3-card-4">

        <!-- generate cart -->
        <?php
generate_cart($_SESSION['cart']);
?>

        </div>
      </div>
    </div>
</div>

  <!-- Product grid -->
  <div class="w3-container" style="padding-bottom: 100px">
    <div class="w3-col l3 s6">
        <?php

          generate_grid();
        ?>


      </div>
    </div>


  <!-- Footer -->
  <footer class="w3-padding-64 w3-light-grey w3-small w3-center" id="footer">
    <div class="w3-row-padding">
      <div class="w3-col s4">
      </div>

      <div class="w3-col s4">
        <h4>About</h4>
        <p><a href="#">About us</a></p>
        <p><a href="#">Help</a></p>
      </div>

      <div class="w3-col s4 w3-justify">
        <h4>Store</h4>
        <p><i class="fa fa-fw fa-map-marker"></i>Alpha Squad</p>
        <p><i class="fa fa-fw fa-phone"></i> 111-111-1111</p>
        <p><i class="fa fa-fw fa-envelope"></i> alpha@mail.com</p>
        <h4>We accept</h4>
        <p><i class="fa fa-fw fa-cc-amex"></i> Amex</p>
        <p><i class="fa fa-fw fa-cc-amex"></i> Visa</p>
        <p><i class="fa fa-fw fa-cc-amex"></i> Mastercard</p>
        <br>
      </div>
    </div>
  </footer>
  <!-- End page content -->
</div>



<script>
// Accordion
function myAccFunc() {
    var x = document.getElementById("demoAcc");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}

// Click on the "Jeans" link on page load to open the accordion for demo purposes
// document.getElementById("myBtn").click();


// Script to open and close sidebar
function w3_open(){
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}

function w3_close(){
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}

</script>
  <?php
      if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['log_out']))
      {
        destroy_session();
        header("Location:index.php");
        exit();
      }
  ?>

</body>
</html>

