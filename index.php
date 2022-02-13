<?php
require 'core/init.php';

if(!isset($_SESSION['user_id']))
	Redirect::to('login.php');


$dbh = DB::get_instance();
$user = $dbh->select('*', 'users', ['id = ?', $_SESSION['user_id']])[0];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/fontawesome/css/all.css">
	<link rel="stylesheet" href="./styles/global.css">
	<title>Crealli - Welcome</title>
</head>
<body>

	<div class="col-8 col-sm-7 col-md-6 col-lg-4 mx-auto mt-5">
		<div class="alert alert-success p-2">
			<p>Hello <b><?php echo $user->fname ?? 'User'; ?></b>!</p>

			<div class="d-flex flex-row justify-content-start">
				<a href="logout.php" class="btn btn-sm btn-danger">Log out</a>
				<a href="logout.php" class="btn btn-sm btn-info mx-2">Change password</a>
			</div>
		</div>
	</div>

</body>
</html>


