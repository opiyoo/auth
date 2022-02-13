<?php

require './core/init.php';

$email = $password = '';
$email_e = $password_e = '';

if($_SERVER['REQUEST_METHOD'] == 'POST' && Token::verify($_POST['token'])) {

	$email = $_POST['email'];
	$password = $_POST['password'];

	$v_email = Validate::email();
	$v_password = Validate::password();

	if($v_email && $v_password)
		User::register();
}