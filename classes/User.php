<?php


class User {

	public static function login() {
		$dbh = DB::get_instance();
		$users = $dbh->select('*', 'users', ['email = ?', $_POST['email']]);

		if(!count($users)) {
			$GLOBALS['email_e'] = 'This email address is not linked to any account. <a href="join.php">Sign up</a> instead?';
			return;
		}

		$user = $users[0];
		if(self::check_password($_POST['password'], $user->password, $user->id)) {
			$_SESSION['user_id'] = $user->id;
			header('Location: index.php');
			exit;
		}

		$GLOBALS['password_e'] = 'Your password is incorrect';
	}

	public static function register() {
		$dbh = DB::get_instance();
		$users = $dbh->select('id', 'users', ['email = ?', $_POST['email']]);

		if(count($users)) {
			$GLOBALS['email_e'] = 'A Crealli account already exists for this email address. <a href="login.php">Log in</a> instead?';
			return;
		}

		$data = [
			'email' => strtolower($_POST['email']),
			'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
			'joined' => date(Config::get('mysql/date_format'))
		];

		if($dbh->insert('users', $data)) {
			Session::flash('is_new', true);
			Redirect::to('login.php');
		}

		$GLOBALS['error'] = 'We couldn\t process your registration due to unknown errors. Please try again later';
	}

	private static function check_password($password, $hash, $id) {
		$dbh = DB::get_instance();

		if(password_verify($password, $hash)) {
			if(password_needs_rehash($hash, PASSWORD_DEFAULT)) {
				$dbh->update('users', ['password' => password_hash($password, PASSWORD_DEFAULT)], ['id = ? ', $id], 1);
			}

			return true;
		}

		return false;
	}
}