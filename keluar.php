<?php
session_start();
session_destroy();

echo '<script>alert("Terimakasih sudah mampir")</script>';
echo '<script>window.location="index.php"</script>';
?>