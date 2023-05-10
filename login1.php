<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/boostrap.min.css" />
    <link rel="stylesheet" href="css/login.css" />
    <title>LOGIN | TOKOKU</title>
  </head>
  <body>
  <div class="tampilan">
      <div class="center">
        <div class="box">
          <h2>Tokoku</h2>
          <form action="" method="post">
            <input type="text" id="un" name="user" placeholder="Username" />
            <input type="password" id="pw" name="pass" placeholder="Password" />
            <button type="submit" class="login" name="submit" value="submit">Login</button>
          </form>
        </div>
      </div>
    </div>
      <?php
        if(isset($_POST['submit'])){
          session_start();
          include 'adminmodel.php';

          $user = $_POST['user'];
          $pass = $_POST['pass'];

          $admin = new kuasa($user, $pass);
          $data = $admin->getuser();

          if(empty($data)){
            echo '<center style="color:red">data tidak ditemukan<center>';

          } 
          else{
            $_SESSION['status_login'] = true;
            $_SESSION['id'] = $data['admin_id'];
            echo '<script>alert("Selamat Datang")</script>';
            echo '<script>window.location="adminpage.php"</script>';
            
          }

        }
      ?>
    </div>
  </body>
</html>