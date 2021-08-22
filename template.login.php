<?php
$koneksi    = koneksi();

if(isset($_POST['input_submit'])) {
  $username   = $_POST['input_username'];
  $password   = $_POST['input_password'];
  $string     = "SELECT * FROM `admin` WHERE `username`='$username' AND `password`='$password'";
  $q          = $koneksi->query($string);
  if ($q && $q->rowCount () > 0) {
			$f 				= $q->fetchAll(PDO::FETCH_NUM);
      $_SESSION['login']    = 'admin';
      $_SESSION['id']       = $f[0][0];
      header("Location: index.php");
		} else {
			$error          = "Username dan password tidak cocok";
		}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Hiswana Migas</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
      <?php
      if(isset($error)) {
        ?>
        <div class="alert alert-warning">
          <?php echo "$error"; ?>
        </div>
        <?php
      }
      ?>
				<form class="login100-form validate-form" action="" method="post">
					<span class="login100-form-title p-b-26">
						<center><img src="images/hiswana2.png" width="50%"></center>
						LOGIN
					</span>
					<span class="login100-form-title p-b-48">
					
					</span>

					<div class="wrap-input100 validate-input" data-validate="Enter username">
						<input class="input100" type="text" name="input_username">
						<span class="focus-input100" data-placeholder="Username" autofocus="off"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="input_password">
						<span class="focus-input100" data-placeholder="Password" autofocus="off"></span>
					</div>

					<!-- <div class="container-login100-form-btn"> -->
						<center><div class="btn button">
							<div class="login100-form-bgbtn"></div>
							<button class="btn btn-lg btn-primary btn-block" name="input_submit">
								Masuk</center>
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="js/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
