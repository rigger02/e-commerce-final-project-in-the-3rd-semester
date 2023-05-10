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
    <title>Order Queue | TOKOKU</title>
    <link rel="stylesheet" href="css/antrian.css" />
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fontawesome/css/all.css"/>
  </head>
  <body>
<!--navbar-->
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
  <div class="add">
    <h2>Order History</h2>
    <div class="product">
      <?php
      if(isset($_GET['search'])){
        $arr = array();
        $id=$_GET['search'];
        $sql=mysqli_query($konek,"SELECT * FROM buat_pesan");

        while ($row=mysqli_fetch_assoc($sql)){
          $arr[]=$row;
        }
        $status = false;
        $jumlah_data = count($arr);

        for ($i=0; $i < $jumlah_data; $i++) { 

            if ($arr[$i]['id_order'] == $id) {
              $pesan = mysqli_query($konek,"SELECT * FROM buat_pesan WHERE id_order = $id");
              echo $h = $arr[$i]['nickname']." berada di antrian  ".$id."";
              $status = true;
            }
        }

        if ($status == false) {
            echo "Data yang dicari tidak ada";
            $pesan=mysqli_query($konek,"SELECT * FROM buat_pesan ORDER BY id_order ASC" );
            
        }

      }else{
      $pesan=mysqli_query($konek,"SELECT * FROM buat_pesan ORDER BY id_order ASC" );}

      ?>
    <table class="hstry" border="1px" cellspacing="0" class="table" width="100%">
      <thead>
        <tr style="font-size: small;">
          <th>No</th>
          <th>Id Order</th>
          <th>App Name</th>
          <th>Order</th>
          <th>NickName</th>
          <th>Game ID</th>
          <th>Email</th>
          <th>Tax</th>
          <th>Proof of Transfer</th>
          <th>Action</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <?php
        
        $no=1;
        while ($row = mysqli_fetch_array($pesan)){
        ?>
        <tr style="font-size: small; text-align: center;">
          <td><?php echo $no++ ?></td>
          <td align="center"><?php echo $row['id_order']?></td>
          <td style="width: 10%;"><?php echo $row['order_name']?></td>
          <td style="width: 20%;"><?php echo $row['order_description'] ?></td>
          <td><?php echo $row['nickname'] ?></td>
          <td style="width: 8%;"><?php echo $row['tag_game'] ?></td>
          <td><?php echo $row['email'] ?></td>
          <td>Rp.2.000</td>
          <td><img src="validasi/<?php echo $row['acc_img']?>" width="100%" height="70px"></td>
          <td><a href="hapus.php?idq=<?php echo $row['id_order']?>"onclick="return confirm('yakin ingin menghapus pesanan')">Delete Order</a></td>
          <td><a href="imel.php?id=<?php echo $row['id_order']?>"><i class="fa-solid fa-circle-check fa-fw"></i></a></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>

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

