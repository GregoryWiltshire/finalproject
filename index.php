<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
  crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="parkingTest.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
  crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
  crossorigin="anonymous"></script>
<style>
  .w3-sidebar a {font-family: "Roboto", sans-serif}
      body,h1,h2,h3,h4,h5,h6,.w3-wide {font-family: "Montserrat", sans-serif;}
      #inven{
      color: black;
      }
      #title{
      text-align: center;
      margin-top: 50px;
      }
      #filter{
      color: black;
      font-style: bold;
      }
      #logo{
      width: 15%;
      height: auto;
      display: block;
      margin-left: auto;
      margin-right: auto;
      }
      #moveright {
        position: absolute;
        left: 1000px;
        top: 100px;
      }
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
        <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)"
          onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
        <a href="index.html" class="w3-bar-item w3-button w3-padding-large">HOME</a>
        <div class="w3-dropdown-hover w3-hide-small">
          <button class="w3-padding-large w3-button" title="More">YOUR CART <i class="fa fa-shopping-cart w3-margin-right"></i></button>
          <a href="account.php" class="w3-bar-item w3-button w3-padding-large">Account</a>
          <form action="inventory.php" method="post">
          <input type="submit" name="someAction" class="btn btn-light" value="logout" id="logoutButton"/>
    </form>
    <form action="inventory.php" method="post">
          <input type="submit" name="someAction" class="btn btn-light" value="login" id="loginButton"/>
    </form>
    <form action="inventory.php" method="post">
          <input type="submit" name="someAction" class="btn btn-light" value="register" id="registerButton"/>
    </form>
          <div class="w3-dropdown-content w3-bar-block w3-card-4">
            <!-- generate cart -->
            <?php
include 'grid.php';
generate_cart($_SESSION['cart']);
?>
          </div>
        </div>
      </div>
      <a href="javascript:void(0)" class="w3-padding-large w3-hover-red w3-hide-small w3-right"><i class="fa fa-search"></i></a>
    </div>
  </div>

  <!-- Image header -->
  <div class="w3-row w3-grayscale">
    <div class=" w3-light-grey">
      <h1 id="title">Welcome to A.G.S. Rentals</h1>
      <img src="logo.png" alt="logo" id="logo">
      <div>
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
        <div class="center">
          <small class="display-5">Leaving Date</small>
          <input type="date" id="myDate1">
          <br>
          <small class="display-5">Return Date</small>
          <input type="date" id="myDate2">
          <br>
          <div class="btn-group">
            <button type="button" class="btn btn-outline-dark" id="myButton"> Check Rates </button>
            <button type="button" class="btn btn-outline-dark"> Reserve </button>
          </div>
          <div class="w3-col s4 w3-justify" id="moveright">
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
    document.getElementById("myBtn").click();
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
</body>

</html>