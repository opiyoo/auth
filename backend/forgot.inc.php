<?php

require './core/init.php';

$email = $email_e = '';

if($_SERVER['REQUEST_METHOD'] == 'POST' && Token::verify($_POST['token'])) {

	$email = $_POST['email'];

	// if($v_email && $v_password)
		// User::register();
}