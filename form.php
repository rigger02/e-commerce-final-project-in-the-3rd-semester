<?php
include 'database.php';
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
  <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Payment Form | TOKOKU</title>
    <link rel="stylesheet" href="css/form.css" />
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
    </div>
  </nav>

<!-- content -->
    <section class="payment">

        <div class="payment-card">

            <div class="card">
                <img src="payment-img/Mandiri.png" alt="">
                    <p>01104677958</p>
                    <p>a/n Juliana Wijaya</p>
                </img>
            </div>

            <div class="card">
                <img src="payment-img/BCA.png" alt="">
                    <p>47221312776545</p>
                    <p>a/n Citra Aura Kristalia</p>
                </img>
            </div>

            <div class="card">
                <img src="payment-img/BNI.png" alt="">
                    <p>721987657877</p>
                    <p>a/n Danis Fikri</p>
                </img>
            </div>

            <div class="card">
                <img src="payment-img/BRI.png" alt="">
                    <p>288722307003</p>
                    <p>a/n Rigger Damaiarta T.</p>
                </img>
            </div>

            <div class="card">
                <img src="payment-img/Dana.png" alt="">
                    <p>85882173122742</p>
                    <p>a/n Juliana Wijaya</p>
                </img>
            </div>

            <div class="card">
                <img src="payment-img/GoPay.png" alt="">
                    <p>083819590026</p>
                    <p>a/n Citra Aura Kristalia</p>
                </img>
            </div>

            <div class="card">
                <img src="payment-img/Ovo.png" alt="">
                    <p>645520119762</p>
                    <p>a/n Danis Fikri</p>
                </img>
            </div>

            <div class="card">
                <img src="payment-img/ShopeePay.png" alt="">
                    <p>06481200435445</p>
                    <p>a/n Rigger Damaiarta T.</p>
                </img>
            </div>
            
        </div>

        
    </section>

    <div class="add">
        <h3>Confirm Payment</h3>
        <div class="add-product">
            <form action=""method="POST" enctype="multipart/form-data">
                <input type="text" name="namaproduk" class="control" placeholder="Input Name App / Game" required>
                +Tax : Rp. 2.000
                <textarea name="deskripsi" class="control" placeholder="Enter Order" required></textarea>
                <input type="email" class="control" name="email" placeholder="Enter Email" required>
                <input type="text" class="control" name="nickname" placeholder="Enter Nickname / Name" required>
                ID / Tag (games Only)<input type="text" class="control" name="tag" placeholder="User ID/Tag in Game">           
                Proof of Payment<input type="file" name="gambar" class="control" required>
                <input type="submit" name="submit" value="Submit" class="btn">
            </form>
            <?php
            if (isset($_POST['submit'])){
                // print_r($_FILES['gambar']);
                // menampung inputan dari form
                $namaproduk = $_POST['namaproduk'];
                $deskripsi  = $_POST['deskripsi'];
                $nickname  = $_POST['nickname'];
                $email  = $_POST['email'];
                $tag = $_POST['tag'];

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
                    move_uploaded_file($tmp_name,'./validasi/'.$filename);

                    //proses upload file insert ke mysql
                    $add=mysqli_query($konek,"INSERT INTO buat_pesan VALUES
                    (null,'".$namaproduk."','".$deskripsi."','".$nickname."','".$tag."','".$email."','".$filename."')");

                    if($add){
                        echo '<script>alert("Pesanan Terkirim, Harap tunggu beberapa menit")</script>';
                        echo '<script>alert("jika ada kendala silakan hubungi admin tertera")</script>';
                        echo '<script>window.location="home.php"</script>';
                    }else{
                        echo 'tambah data gagal'. mysqli_error($konek);
                    }
                }
            }
            ?>
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
        <p>If There Are Problems, Please Contact US</p>

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
