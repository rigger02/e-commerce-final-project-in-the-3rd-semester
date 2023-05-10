<?php
include 'database.php';
session_start();
if ($_SESSION['status_login'] != true){
  echo '<script>alert("Silahkan Login")</script>';
  echo '<script>window.location="home.php"</script>';
}
?>
<!doctype html>
<html lang="en">
  <head>
  <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> PRODUCTS | TOKOKU</title>
    <link rel="stylesheet" href="css/produk.css" />
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
          <li><a href="antrian.php"><i class="fa-solid fa-cart-shopping"></i>Queue</a></li>
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
<!-- tambah produk -->
<div class="add">
  <h2>Product</h2>
  <a href="tambahproduk.php">Add Product</a>
  <div class="product">
    <table border="1px" cellspacing="0" class="table">
      <thead>
        <tr>
          <th width="5px">No</th>
          <th width="60px">Name Product</th>
          <th width="200px">Description</th>
          <th width="90px">Picture</th>
          <th width="10px">Status</th>
          <th width="60px">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if(isset($_GET['search'])){
          $search = $_GET['search'];
          $produk=mysqli_query($konek,"SELECT * FROM buat_produk WHERE product_name LIKE '%".$search."%'" );
        } else {
          $produk=mysqli_query($konek,"SELECT * FROM buat_produk ORDER BY product_id ASC" );
        }

        $no=1;
        while ($row = mysqli_fetch_array($produk)){
        ?>
        <tr>
          <td><?php echo $no++ ?></td>
          <td><?php echo $row['product_name']?></td>
          <td style="white-space:pre-wrap"><?php echo $row['product_description'] ?></td>
          <td><img src="produk/<?php echo $row['product_image']?>" width="100%" height="200px"></td>
          <td><?php echo ($row['product_status'] ==0)?'Inactive':'Active';?></td>
          <td><a href="editproduk.php?id=<?php echo $row['product_id']?>">Edit</a> || <a href="hapus.php?idp=<?php echo $row['product_id']?>"onclick="return confirm('yakin ingin menghapus produk')">Delete</a></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>

<!-- Footer -->
<footer>
        <div class="waves">
            <div class="wave" id="wave1"></div>
            <div class="wave" id="wave2"></div>
            <div class="wave" id="wave3"></div>
            <div class="wave" id="wave4"></div>
        </div>
        <p>If there are problems, please contact us</p>

        <ul class="social_icon">
            <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
            <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
            <li><a href="#"><i class="fa-brands fa-whatsapp"></i></a></li>
        </ul>
        <p>&copy; <script>document.write(new Date().getFullYear())</script> Website Top Up Games & E-Wallet | Created By IF21A</p>
    </footer>

  <script src="./js/script.js"></script>
  </body>
</html>
