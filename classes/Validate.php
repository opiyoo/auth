<?php


class Validate {
	public static function email() {
		$email = $_POST['email'];

		if('' === trim($email)) {
			$GLOBALS['email_e'] = 'Enter your email address';
			return false;
		}

		if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$GLOBALS['email_e'] = 'Invalid email address';
			return false;
		}

		return true;
	}

	public static function password($msg = 0) {
		$password = $_POST['password'];

		if('' === $password) {
			$GLOBALS['password_e'] = $msg ? 'Enter your password' : 'Choose a password';
			return false;
		}

		if(!$msg && strlen($password) < 5) {
			$GLOBALS['password_e'] = 'Your password is too short';
			return false;
		}

		return true;
	}

}