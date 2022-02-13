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
	<title>Crealli - Register</title>
</head>
<body>
	

	<div class="col-8 col-sm-7 col-md-6 col-lg-4 mx-auto">
		<div class="text-center my-3"><i class="fa-solid fa-user-plus fa-2x text-success"></i></div>

		<div class="form-text mb-2">
			Create an account in under a minute! Enter your details to continue. Have an account? <a href="login.php">Log in</a>
		</div>
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" novalidate>
			<div class="form-group mb-2">
				<label for="email" class="form-label">Email</label>
				<input type="email" name="email" id="email" class="form-control <?php if($email_e) echo 'is-invalid'; ?>" value="<?php echo $email; ?>">
				<div class="invalid-feedback"><?php echo $email_e; ?></div>
			</div>

			<div class="form-group mb-2">
				<label for="password" class="form-label">Password <small class="text-muted">- 5 characters minimum - </small></label>
				<input type="password" name="password" id="password" class="form-control <?php if($password_e) echo 'is-invalid'; ?>" value="<?php echo $password; ?>">
				<div class="invalid-feedback"><?php echo $password_e; ?></div>
			</div>

			<div class="form-group mb-3">
				<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
				<button type="submit" class="btn btn-sm btn-success col-12">JOIN</button>
			</div>
		</form>

		<div class="privacy text-center form-text">
			<small>By using Crealli, you agree to our <a href="#">Terms of Service</a> and <a href="#">Privacy Statement</a></small>
			<br>
			<small>Need help? Mail us at <a href="#">help@crealli.com</a></small>
		</div>
	</div>

<script src="./javascript/main.js"></script>
<script src="./javascript/join.js"></script>
</body>
</html>