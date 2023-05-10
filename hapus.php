<?php
include 'database.php';
session_start();
if ($_SESSION['status_login'] != true){
  echo '<script>alert("Silahkan Login")</script>';
  echo '<script>window.location="home.php"</script>';
}
?>


<?php
include 'database.php';

if (isset($_GET['idp'])){
  $penghapus = mysqli_query($konek,"SELECT product_image FROM buat_produk WHERE product_id ='".$_GET['idp']."'");
  $p = mysqli_fetch_object($penghapus);
  unlink('./produk/'.$p->product_image);

    $delete=mysqli_query($konek,"DELETE FROM buat_produk WHERE product_id='".$_GET['idp']."' ");
    echo '<script>window.location="produk.php"</script>';
}
?>
<?php
include 'database.php';
if(isset($_GET['idq'])){
    $delete=mysqli_query($konek,"DELETE FROM buat_pesan WHERE id_order='".$_GET['idq']."' ");
    echo '<script>window.location="antrian.php"</script>';
}
?>