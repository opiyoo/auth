<?php


class Session {
	public static function flash($name, $value = '') {
		if(!isset($_SESSION[$name])) {
			if('' !== $value)
				$_SESSION[$name] = $value;
			
			return false;
		}

		unset($_SESSION[$name]);
		return true;
	}
}