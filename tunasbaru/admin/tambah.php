<?php 

	session_start();
	if(!isset($_SESSION['login'])){
		header("Location: login.php");
		exit;
	}
	require_once '../functions/db.php';

	if (isset($_POST['submit'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$nama = $_POST['nama'];
		$email = $_POST['email'];

		$password = password_hash($password, PASSWORD_DEFAULT);
		$query_insert = "INSERT INTO admin(username,password,nama,email) VALUES ('$username','$password','$nama','$email')";
		if (mysqli_query($koneksi,$query_insert)){
			$_SESSION['notif'] = 'Sign Up Succes ! Silahkan Log In';
		}
	}
 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SMP Tunas Baru | Sign Up</title>
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
    <a href="#">SMP Tunas Baru Ciparay</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
  	<img src="../assets/dist/img/tb1.jpg" style="display: block; margin: auto;" />
    <p class="login-box-msg">Sign Up to start</p>
    <?php if(isset($_SESSION['notif'])) : ?>
          			<div class="alert alert-success">
          				<?= $_SESSION['notif']; ?>
          				<?php 
          					if(isset($_SESSION['notif'])){
          						unset($_SESSION['notif']);
          					}
          				 ?>
          			</div>
          		<?php endif; ?>
		<form action="" method="POST">
			<div class="form-group has-feedback">
				<input type="text" class="form-control" name="username" placeholder="Username">
				<span class="glyphicon glyphicon-user form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback" >
				<input type="Password" class="form-control" name="password" placeholder="Password">
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
				<input type="text" class="form-control" name="nama" placeholder="Nama Lengkap">
				<span class="glyphicon glyphicon-exclamation-sign form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
				<input type="text" class="form-control" name="email" placeholder="Email">
				<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
			</div>
			<div class="btn-group btn-group-justified" role="group">
          		<div class="btn-group" role="group">
					<button type="submit" name="submit" class="btn btn-primary">Sign Up</button>
				</div>
			<div class="btn-group" role="group">
            	<a href="../admin/logout.php" class="btn btn-success">Log In</a>
            </div>
		</form>
</body>
</html>