<?php
	session_start();
	
	// Check if user is already logged in
	if(isset($_SESSION['loggedIn'])){
		header('Location: ../IMS/public/index.php');
		exit();
	}
	
	require_once 'config/database.php';
	require_once 'config/db.php';
?>
  
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="assets/style.css" rel="stylesheet"/>
    <link href="assets/bootstrap.min.css" rel="stylesheet"/>


    <!-- Bootstrap core CSS -->
    <!-- <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
	<link rel="stylesheet" href="vendor/bootstrap/css/cerulean.theme.min.css">
	
	<!-- Datatables CSS -->
	<link rel="stylesheet" type="text/css" href="vendor/DataTables/datatables.css">
	
	<!-- Datepicker CSS -->
	<link rel="stylesheet" href="vendor/datepicker164/css/bootstrap-datepicker.min.css">

     <!-- fontawesome -->
     <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">


    <title>Inv</title>
	</head>

<body>
<div class="login-con">
		<?php
		// Variable to store the action (login, register, passwordReset)
		$action = '';
			if(isset($_GET['action'])){
				$action = $_GET['action'];
				if($action == 'register'){
		?>
					<div class="container">
					<div class="row justify-content-center">
					<div class="col-sm-12 col-md-5 col-lg-5">
						<div class="card">
						<div class="card-header">
							Register
						</div>
						<div class="card-body">
							<form action="">
							<div id="registerMessage"></div>
							<div class="form-group">
								<label for="registerFullName">Name<span class="requiredIcon">*</span></label>
								<input type="text" class="form-control" id="registerFullName" name="registerFullName">
								<!-- <small id="emailHelp" class="form-text text-muted"></small> -->
							</div>
							<div class="form-group">
								<label for="registerUsername">Username<span class="requiredIcon">*</span></label>
								<input type="email" class="form-control" id="registerUsername" name="registerUsername" autocomplete="on">
							</div>
							<div class="form-group">
								<label for="registerPassword1">Password<span class="requiredIcon">*</span></label>
								<input type="password" class="form-control" id="registerPassword1" name="registerPassword1">
							</div>
							<div class="form-group">
								<label for="registerPassword2">Re-enter password<span class="requiredIcon">*</span></label>
								<input type="password" class="form-control" id="registerPassword2" name="registerPassword2">
							</div>
							<a href="login.php" class="btn btn-primary">Login</a>
							<button type="button" id="register" class="btn btn-success">Register</button>
							<a href="login.php?action=resetPassword" class="btn btn-warning">Reset Password</a>
							<button type="reset" class="btn">Clear</button>
							</form>
						</div>
						</div>
						</div>
					</div>
					</div>
		<?php
					require 'inc/footer.php';
					echo '</body></html>';
					exit();
				} elseif($action == 'resetPassword'){
		?>
					<div class="container">
					<div class="row justify-content-center">
					<div class="col-sm-12 col-md-5 col-lg-5">
						<div class="card">
						<div class="card-header">
							Reset Password
						</div>
						<div class="card-body">
							<form action="">
							<div id="resetPasswordMessage"></div>
							<div class="form-group">
								<label for="resetPasswordUsername">Username</label>
								<input type="text" class="form-control" id="resetPasswordUsername" name="resetPasswordUsername">
							</div>
							<div class="form-group">
								<label for="resetPasswordPassword1">New Password</label>
								<input type="password" class="form-control" id="resetPasswordPassword1" name="resetPasswordPassword1">
							</div>
							<div class="form-group">
								<label for="resetPasswordPassword2">Confirm New Password</label>
								<input type="password" class="form-control" id="resetPasswordPassword2" name="resetPasswordPassword2">
							</div>
							<a href="login.php" class="btn btn-primary">Login</a>
							<a href="login.php?action=register" class="btn btn-success">Register</a>
							<button type="button" id="resetPasswordButton" class="btn btn-warning">Reset Password</button>
							<button type="reset" class="btn">Clear</button>
							</form>
						</div>
						</div>
						</div>
					</div>
					</div>
		<?php
					require 'inc/footer.php';
					echo '</body></html>';
					exit();
				}
			}	
		?>
			<!-- Default Page Content (login form) -->
			<div class="container">
			<div class="row justify-content-center">
			<div class="col-sm-12 col-md-5 col-lg-5">
				<div class="card">
				<div class="card-header">
					Login
				</div>
				<div class="card-body">
					<form action="">
					<div id="loginMessage"></div>
					<div class="form-group">
						<label for="loginUsername">Username</label>
						<input type="text" class="form-control" id="loginUsername" name="loginUsername">
					</div>
					<div class="form-group">
						<label for="loginPassword">Password</label>
						<input type="password" class="form-control" id="loginPassword" name="loginPassword">
					</div>
					<button type="button" id="login" class="btn btn-primary">Login</button>
					<a href="login.php?action=register" class="btn btn-success">Register</a>
					<a href="login.php?action=resetPassword" class="btn btn-warning">Reset Password</a>
					<button type="reset" class="btn">Clear</button>
					</form>
				</div>
				</div>
				</div>
			</div>
			</div>
		<?php
			require 'inc/footer.php';
		?>
</div>

<!-- Footer -->
<footer class="footer bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white" class="footer" >Copyright &copy; Inventory System <?php echo date('Y'); ?></p>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	
	<!-- Datatables script -->
	<script type="text/javascript" charset="utf8" src="vendor/DataTables/datatables.js"></script>
	<script type="text/javascript" charset="utf8" src="vendor/DataTables/sumsum.js"></script>
	
	<!-- Chosen files for select boxes -->
	<script src="vendor/chosen/chosen.jquery.min.js"></script>
	<link rel="stylesheet" href="vendor/chosen/chosen.css" />
	
	<!-- Datepicker JS -->
	<script src="vendor/datepicker164/js/bootstrap-datepicker.min.js"></script>
	
	<!-- Bootbox JS -->
	<script src="vendor/bootbox/bootbox.min.js"></script>

	<!-- Custom scripts -->
	<script src="assets/js/login.js"></script>
</body>
</html>
