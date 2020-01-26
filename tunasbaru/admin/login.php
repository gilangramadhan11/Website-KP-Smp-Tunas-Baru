<?php  
  session_start();
  if(isset($_SESSION["login"])){
    header("Location: index.php");
    exit;
  }
  require_once '../functions/db.php';
  $error = '';
  if(isset($_POST['login'])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

      //validasi
      if(!empty(trim($username)) && !empty(trim($password))){

        $query_read = "SELECT * FROM admin WHERE username ='$username'";
        $result_read = mysqli_query($koneksi, $query_read);

          //cek username
          if($user = mysqli_num_rows($result_read) != 0) {

            //cek password
            $row = mysqli_fetch_assoc($result_read);
              if(password_verify($password, $row["password"])) {
                //set session
                $_SESSION['login'] = $username;
                   header("Location: ../index.php");
            
              }else{
              $error = 'Username atau password salah !';
            }

            }else{
              $error = 'Username belum ada !';
            }
          }else{
            $error = 'Data tidak boleh kosong !';
          }
        }
 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SMP Tunas Baru | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="login.php">SMP Tunas Baru Ciparay</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
      <img src="../assets/dist/img/tb1.jpg" style="display: block; margin: auto;" /><p class="login-box-msg">Log in to start</p>
    <?php if($error) : ?>
      <div class="alert alert-danger" role="alert">
       <?= $error; ?>
       </div>
    <?php endif; ?>
    <form action="" method="POST">
        <div class="form-group has-feedback">
          <!-- <label for="username">Username </label> -->
          <input type="text" class="form-control" name="username" id="username" placeholder="Username">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
       </div>
        <div class="form-group has-feedback">
          <!-- <label for="password">Password </label> -->
          <input type="password" class="form-control" name="password" id="password" placeholder="Password">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="btn-group btn-group-justified" role="group">
          <div class="btn-group" role="group">
          <button type="submit" name="login" class="btn btn-primary">Login</button>
        </div>
      </div>
    </form>
    <!-- /.social-auth-links -->
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
</body>
</html>
