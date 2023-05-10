<?php
include 'database.php';
session_start();
?> 

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HELP | TOKOKU</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="css/tolong.css" />
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fontawesome/css/all.css"/>
  </head>
  <body>
<!--navbar-->
  <nav>
    <div class="navbar">
      <i class='bx bx-menu'></i>
      <div class="logo"><a href="#">TOKOKU</a></div>
      <div class="nav-links">
        <div class="sidebar-logo">
          <span class="logo-name">TOKOKU</span>
          <i class='bx bx-x' ></i>
        </div>
        <ul class="links">
          <li><a href="home.php"><i class="fa-solid fa-home"></i>Home</a></li>
          <li>
            <a href="#"><i class="fa-solid fa-lock"></i>Products</a>
            <i class='bx bxs-chevron-down js-arrow arrow '></i>
            <ul class="js-sub-menu sub-menu">
              <li><a href="produk.php"><i class="fa-solid fa-pen"></i>Control Product</a></li>
              <li><a href="form.php"><i class="fa-solid fa-pen-to-square"></i>Order Product</a></li>
            </ul>
          </li>
          <li><a href="tolong.php"><i class="fa-solid fa-circle-info"></i>Help</a></li>
          <li><a href="keluar.php"><i class="fa-solid fa-arrow-right-from-bracket"></i>Exit</a></li>
        </ul>
      </div>
      <div class="search-box">
        <i class='bx bx-search'></i>
        <div class="input-box">
            <form action="" method="get">
                <input type="search" name="search"placeholder="Search Games / E-wallet">
                <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
      </div>
    </div>
  </nav>
<div class="help">
  <h2>HELP PAGE</h2>
  <div class="card mb-3" style="max-width: 70%;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="ss/e1.png" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">1. How to Order E-Wallet Product</h5>
        <p class="card-text">Click the E-Wallet application that you want to fill with digital money.</p>
      </div>
    </div>
  </div>
</div>
</br>
<div class="card mb-3" style="max-width: 70%;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="ss/e2.png" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">2. How to Order E-Wallet Product</h5>
        <p class="card-text">Select the desired balance then copy and paste your choice then click Order Now.</p>
      </div>
    </div>
  </div>
</div>
</br>
<div class="card mb-3" style="max-width: 70%;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="ss/e3.png" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">3. How to Order E-Wallet Product</h5>
        <p class="card-text">Choose your preferred payment method.</p>
      </div>
    </div>
  </div>
</div>
</br>
<div class="card mb-3" style="max-width: 70%;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="ss/e4.png" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">4. How to Order E-Wallet Product</h5>
        <p class="card-text">After the transfer, swipe down to fill out the form according to the existing information, on the form 'Game ID / Tag' can be passed if filling in the e-wallet, and don't forget to include proof of transfer then click submit. Wait for a few minutes the admin will process your order. If more than 10 minutes of no confirmation you can send a message to the admin on the bottom page</p>
      </div>
    </div>
  </div>
</div>
</br>
</br>
<div class="card mb-3" style="max-width: 70%;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="ss/g1.png" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">1. How to Order Game Product</h5>
        <p class="card-text">Click the game application to be recharged with digital money.</p>
      </div>
    </div>
  </div>
</div>
</br>
<div class="card mb-3" style="max-width: 70%;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="ss/g2.png" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">2. How to Order Game Product</h5>
        <p class="card-text">Select the desired balance then copy and paste your choice then click Order Now.</p>
      </div>
    </div>
  </div>
</div>
</br>
<div class="card mb-3" style="max-width: 70%;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="ss/e3.png" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">3. How to Order Game Product</h5>
        <p class="card-text">Choose your preferred payment method.</p>
      </div>
    </div>
  </div>
</div>
</br>
<div class="card mb-3" style="max-width: 70%;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="ss/g4.png" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">4. How to Order Game Product</h5>
        <p class="card-text">After the transfer, swipe down to fill out the form according to the existing information, and don't forget to include proof of transfer then click submit. Wait for a few minutes the admin will process your order. If more than 10 minutes of no confirmation you can send a message to the admin on the bottom page</p>
      </div>
    </div>
  </div>
</div>
</br>
<div class="card mb-3" style="max-width: 70%;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="ss/h1.png" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">How to ask an admin for help</h5>
        <p class="card-text">If there is a problem you can contact one of the contacts located at the bottom of the page.</p>
      </div>
    </div>
  </div>
</div>
</div>
  
  <!-- footer -->
  <footer>
        <div class="waves">
            <div class="wave" id="wave1"></div>
            <div class="wave" id="wave2"></div>
            <div class="wave" id="wave3"></div>
            <div class="wave" id="wave4"></div>
        </div>
        <p>If there are problems, please contact us</p>

        <ul class="social_icon">
          <li><a href="https://www.facebook.com/"><i class="fa-brands fa-facebook-f"></i></a></li>
          <li><a href="https://twitter.com/?lang=en-id"><i class="fa-brands fa-twitter"></i></a></li>
          <li><a href="https://www.instagram.com/ianwijayaa__/"><i class="fa-brands fa-instagram"></i></a></li>
          <li><a href="https://wa.me/6285173122742"><i class="fa-brands fa-whatsapp"></i></a></li>
        </ul>

        <p>&copy; <script>document.write(new Date().getFullYear())</script> Website Top Up Games & E-Wallet | Created By IF21A</p>
    </footer>

  <script src="./js/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>
