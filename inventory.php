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
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
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
  right: 350px;
}
</style>
<body class="w3-content" style="max-width:1200px">
  <?php
 
include 'grid.php';

$cart = array
    (
      //carname,imageurl,price/day,rentalstart,rentalend,days
    array("car_name"=>"Yaris","img_url"=>"yaris.png","price"=>29.99,"rental_start"=>"12/8/18","rental_end"=>"12/10/18","item_number"=>2),
    array("car_name"=>"Corolla","img_url"=>"corolla.png","price"=>199.99,"rental_start"=>"12/8/18","rental_end"=>"12/10/18","item_number"=>2)     
    );

    if(!isset($_SESSION['cart'])){
      $_SESSION['cart'] = $cart;
    }
    

//remove item from the cart
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  remove_item($_POST['item_number']);
}


?>
<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">
    <div class="w3-container w3-display-container w3-padding-16">
      <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
      <h3 class="w3-wide"><b>A.G.S.</b></h3>
    </div>
    <div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold">
      <h3 id="inven"> <a href="inventory.php" class="w3-bar-item w3-button">Inventory</a></h3>
      <h5 class="w3-bar-item" id="filter">Filter By Car Type</h5>
      <a href="#" class="w3-bar-item w3-button">Sedan</a>
      <a href="#" class="w3-bar-item w3-button">Mid-Size</a>
      <a href="#" class="w3-bar-item w3-button">Luxury</a>
    </div>
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

  <!-- Top header -->
<!--   <header class="w3-container w3-xlarge">
    <p class="w3-left">Jeans</p>
    <p class="w3-right">
      <i class="fa fa-shopping-cart w3-margin-right"></i>
      <i class="fa fa-search"></i>
    </p>
  </header> -->

  <!--MENUBAR-->
  <div class="w3-top">
  <div class="w3-bar w3-black w3-card">
    <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <form action="inventory.php" method="post">
          <input type="submit" name="someAction" class="btn btn-light" value="logout" id="logoutButton"/>
    </form>
    <form action="inventory.php" method="post">
          <input type="submit" name="someAction" class="btn btn-light" value="login" id="loginButton"/>
    </form>
    <a href="#" class="w3-bar-item w3-button w3-padding-large">HOME</a>
    <div class="w3-dropdown-hover w3-hide-small">
      <button class="w3-padding-large w3-button" title="More">YOUR CART <i class="fa fa-shopping-cart w3-margin-right"></i></button>
      <div class="w3-dropdown-content w3-bar-block w3-card-4">

        <!-- generate cart -->
        <?php
          generate_cart($_SESSION['cart']);
        ?>

        </div>
      </div>
    </div>
</div>

  <!-- Image header -->
  <!-- <div class="w3-display-container w3-container">
    <img src="/w3images/jeans.jpg" alt="Jeans" style="width:100%">
    <div class="w3-display-topleft w3-text-white" style="padding:24px 48px">
      <h1 class="w3-hide-large w3-hide-medium">New arrivals</h1>
      <h1 class="w3-hide-small">COLLECTION 2016</h1>

    </div>
  </div> -->
  <!-- Product grid -->
  <div class="w3-container" style="padding-bottom: 100px">
    <div class="w3-col l3 s6">

        <?php
          generate_grid();
        ?>

      <!-- <div class="w3-container">
        <img src="/w3images/jeans1.jpg" style="width:100%">
        <p>Ripped Skinny Jeans<br><b>$24.99</b></p>
      </div>
      <div class="w3-container">
        <img src="/w3images/jeans2.jpg" style="width:100%">
        <p>Mega Ripped Jeans<br><b>$19.99</b></p> -->
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

<!-- Newsletter Modal -->
<!-- <div id="newsletter" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom" style="padding:32px">
    <div class="w3-container w3-white w3-center">
      <i onclick="document.getElementById('newsletter').style.display='none'" class="fa fa-remove w3-right w3-button w3-transparent w3-xxlarge"></i>
      <h2 class="w3-wide">NEWSLETTER</h2>
      <p>Join our mailing list to receive updates on new arrivals and special offers.</p>
      <p><input class="w3-input w3-border" type="text" placeholder="Enter e-mail"></p>
      <button type="button" class="w3-button w3-padding-large w3-red w3-margin-bottom" onclick="document.getElementById('newsletter').style.display='none'">Subscribe</button>
    </div>
  </div> -->
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
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}

function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}
</script>
  

  <?php
      if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['someAction']))
      {
          destroy_session();
      }
        function destroy_session()
        {
            session_destroy();    
        }
  ?>
</body>
</html>
