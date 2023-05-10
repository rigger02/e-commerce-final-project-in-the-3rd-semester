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
    <title>Homepage | TOKOKU</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="css/home.css" />
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
  <!-- Img Slider -->
  <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
    </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="images/slide-1.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="images/slide-2.png" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="images/slide-3.png" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="images/slide-4.png" class="d-block w-100" alt="...">
        </div>
      </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
        </button>
  </div>
  
  <!-- Konten -->
    <h3 class="title-p">GAMES & E-WALLET</h3>
    <section id="populer" class="populer">
        <?php
        if(isset($_GET['search'])){
            $search = $_GET['search'];
            $produk=mysqli_query($konek,"SELECT * FROM buat_produk WHERE product_status = 1 AND product_name like '%".$search."%'");
           
        } else{
            $produk=mysqli_query($konek,"SELECT * FROM buat_produk WHERE product_status = 1 ORDER BY product_id DESC" );
        }
        while ($rawr = mysqli_fetch_array($produk)){
        ?>
            <div class="produk">
                <div class="link">
                    <a href="#<?php echo $rawr['product_id']?>">
                        <img src="produk/<?php echo $rawr['product_image']?>" alt="">
                        <div class="judul-produk"><?php echo $rawr['product_name']?></div>
                    </a>
                </div>
                <div class="overlay" id="<?php echo $rawr['product_id']?>">
                    <div class="popup">
                        <h2>PRICE LIST</h2>
                        <a class="close" href="#populer">&times;</a>
                        <br>
                        <div class="content">
                            <?php echo $rawr['product_description']?>
                            <br>
                            <p>Note : For Games / E-Wallet orders, please copy the order then click order now.</p>
                            <a class="pesan" href="form.php" 
                            target="_blank"
                            rel="noopener noreferrer">Pesan Sekarang</a>
                            </br>
                        </div>
                    </div>
                </div>
            </div>
        
        <?php }
        ?>
    </section>
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
