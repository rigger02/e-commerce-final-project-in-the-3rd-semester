<?php 
include 'database.php';
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

if(isset($_GET['id'])){

    $id = $_GET['id'];

    $user=mysqli_query($konek,"SELECT * FROM buat_pesan WHERE id_order = $id");
    $data = mysqli_fetch_array($user);
    $email = $data['email'];
    $name = $data['nickname'];
    $judul = $data['order_name'];
    $harga = $data['order_description'];


    $mail = new PHPMailer();


    //Server settings
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'badrio.yt.gaming@gmail.com';                    //SMTP username
    $mail->Password   = 'gwtdvflruziifjvt';                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('badrio.yt.gaming@gmail.com', 'TOKOKU');
    $mail->addAddress($email, $name);     //Add a recipient
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Hey '.$name.'!!! Message nih';
    $mail->Body    = 'Transaksi '.$name.'<br>'.' untuk pembelian '.$judul.'<br>'.' dengan jumlah '.$harga. '<br>'.'telah berhasil..!!'.'<br>'.'Terimakasih Telah Berbelanja di TOKOKU :)';
    if($mail->send()){
        header("location: antrian.php");
    }else{
        echo 'Email tidak ditemukan';
    }

}

