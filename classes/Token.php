<?php


class Token {
	public static function generate() {
		return $_SESSION['token'] = bin2hex(random_bytes(64));
	}

	public static function verify($hash) {
		if(!isset($_SESSION['token']))
			return false;

		$known = $_SESSION['token'];
		unset($_SESSION['token']);

		return hash_equals($known, $hash);
	}
}