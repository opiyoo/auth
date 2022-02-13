<?php require './backend/login.inc.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/fontawesome/css/all.css">
	<link rel="stylesheet" href="./styles/global.css">
	<title>Crealli - Log in</title>
</head>
<body>

	<div class="col-8 col-sm-7 col-md-6 col-lg-4 mx-auto">
		<div class="text-center my-3"><i class="fa-solid fa-user-circle fa-2x text-success"></i></div>

		<?php if(Session::flash('is_new')) { ?>
			<div class="alert alert-success">
				<small>Registration successful!</small>
				<small style="float: right; cursor: pointer;" class="fa-solid fa-times-circle text-secondary mx-1"></small>
			</div>
		<?php } ?>

		<div class="form-text mb-2 text-dark">
			Enter your account details to log in. Not a member yet? <a href="join.php">Sign up</a>
		</div>
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" novalidate>
			<div class="form-group mb-2">
				<label for="email" class="form-label">Email</label>
				<input type="email" name="email" id="email" class="form-control <?php if($email_e) echo 'is-invalid'; ?>" value="<?php echo $email; ?>">
				<div class="invalid-feedback"><?php echo $email_e; ?></div>
			</div>

			<div class="form-group mb-2">
				<label for="password" class="form-label flex-label">Password <a class="text-danger" href="forgot.php" tabindex="-1">Reset password</a></label>
				<input type="password" name="password" id="password" class="form-control <?php if($password_e) echo 'is-invalid'; ?>" value="<?php echo $password; ?>">
				<div class="invalid-feedback"><?php echo $password_e; ?></div>
			</div>

			<div class="form-check mb-3">
				<label for="remember" class="form-check-label">Remember me</label>
				<input type="checkbox" name="remember" id="remember" class="form-check-input" <?php echo rem_state(); ?>>
			</div>

			<div class="form-group mb-2">
				<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
				<button type="submit" class="btn btn-sm btn-success col-12">LOG IN</button>
			</div>
		</form>

		<div class="privacy text-center form-text">
			<small>By using Crealli, you agree to our <a href="#">Terms of Service</a> and <a href="#">Privacy Statement</a></small>
			<br>
			<small>Need help? Mail us at <a href="#">help@crealli.com</a></small>
		</div>
	</div>

<script src="./javascript/main.js"></script>
<script src="./javascript/login.js"></script>
</body>
</html>