<?php
// menghubungkan sc dengan mysql
$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'tokoku';

$konek = mysqli_connect($hostname, $username, $password, $dbname) or die('gagal terhubung');

?>