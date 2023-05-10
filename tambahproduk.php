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
    <title>Add Produk | TOKOKU</title>
    <link rel="stylesheet" href="css/tambah.css" />
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
    <!-- content -->
  <div class="add">
    <h3>Add Product Data</h3>
    <div class="add-product">
        <form action=""method="POST" enctype="multipart/form-data">
            <input type="text" name="namaproduk" class="control" placeholder="Enter a Product Name" required>
            <textarea name="deskripsi" class="control" placeholder="Enter a Product Description" required></textarea>
            <input type="file" name="gambar" class="control" required>
            <select class="control" name="status">
                <option value="">--->Choose<---</option>
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
            <input type="submit" name="submit" value="Submit" class="btn">
        </form>
        <?php
        if (isset($_POST['submit'])){
            // print_r($_FILES['gambar']);
            // menampung inputan dari form
            $namaproduk = $_POST['namaproduk'];
            $deskripsi  = $_POST['deskripsi'];
            $status     = $_POST['status'];

            // menampung data file/gambar yang diupload
            $filename   = $_FILES['gambar']['name'];
            $tmp_name   = $_FILES['gambar']['tmp_name'];
            $type1      = explode('.',$filename);
            $type2      = $type1[1];
            //type 1 = nama file /[0]
            //type 2 = format file[ /1]

            //menampung data format file yang diizinkan
            $tipe_diizinkan =array('jpg','jpeg','png');

            // validasi format file
            if(!in_array($type2,$tipe_diizinkan)){
                //kalau format file tidak ada di array $tipe_diizinkan
                echo '<script>alert("Format File Tidak Diizinkan")</script>';
            }
            else{
                //jmengirim ke folder produk
                move_uploaded_file($tmp_name,'./produk/'.$filename);

                //proses upload file insert ke mysql
                $add=mysqli_query($konek,"INSERT INTO buat_produk VALUES
                (null,'".$namaproduk."','".$deskripsi."','".$filename."','".$status."')");

                if($add){
                    echo '<script>alert("Tambah Data Berhasil")</script>';
                    echo '<script>window.location="produk.php"</script>';
                }else{
                    echo 'tambah data gagal'. mysqli_error($konek);
                }
            }
        }
        ?>
    </div>
  </div>
  <footer>
        <div class="waves">
            <div class="wave" id="wave1"></div>
            <div class="wave" id="wave2"></div>
            <div class="wave" id="wave3"></div>
            <div class="wave" id="wave4"></div>
        </div>
        <p>If There Are Problems, Please Contact US</p>

        <ul class="social_icon">
            <li><a href="https://www.facebook.com/"><i class="fa-brands fa-facebook-f"></i></a></li>
            <li><a href="https://twitter.com/?lang=en-id"><i class="fa-brands fa-twitter"></i></a></li>
            <li><a href="https://www.instagram.com/ianwijayaa__/"><i class="fa-brands fa-instagram"></i></a></li>
            <li><a href="https://wa.me/6285173122742"><i class="fa-brands fa-whatsapp"></i></a></li>
        </ul>
        <p>&copy; <script>document.write(new Date().getFullYear())</script> Website Top Up Games & E-Wallet | Created By IF21A</p>
    </footer>

  <script src="./js/script.js"></script>
</body>
</html>
