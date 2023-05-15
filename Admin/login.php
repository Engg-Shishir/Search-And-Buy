<!-- Session Check -->
<?php session_start();if(isset($_SESSION['adminSession'])){header("location:./home.php");}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login</title>
    <?php include_once("./layout/link-for-head-tag.php"); ?>
    <link rel="stylesheet" href="../Asset/css/admin/login.css">
</head>
<body>


<div class="container">
		<div class="row d-flex justify-content-center mt-5">
			<div class="col-12 col-md-8 col-lg-6 col-xl-5">
				<div class="card py-3 px-2">
					<div class="division">
						<div class="row">
							<div class="col-12"><span class="form-title">Admin Login Form</span></div>
						</div>
					</div>
					<form class="myform" id="login-form">
						<div class="form-group">
							<input type="email" class="form-control" placeholder="Email address" name="user_email" id="user_email" autocomplete="on" />
						</div>
						<div class="form-group">
							<input type="password" class="form-control" placeholder="Password" name="password" id="password" />
						</div>
						<div class="row">
							<div class="col-md-9">
								<a href="">Reset Password</a>
							</div>
							<div class="col-md-3">
							  <button id="login_button" type="button" class="btn btn-light ml-auto">
									<span class="small">
										<i class="fas fa-solid fa-paper-plane mr-2"></i>
										<span class="login-btn-text">Signin</span>
									</span>
								</button>
						  </div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

<!-- Include Script Tag -->
<?php include_once("./layout/link-for-body-tag.php");?>
<script src="../Asset/js/admin/login.js"></script>
</body>
</html>
