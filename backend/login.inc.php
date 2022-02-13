<?php

require './core/init.php';

$email = $password = $remember = '';
$email_e = $password_e = '';

if($_SERVER['REQUEST_METHOD'] == 'POST' && Token::verify($_POST['token'])) {

	$email = $_POST['email'];
	$password = $_POST['password'];
	$remember = $_POST['remember'] ?? null;

	$v_email = Validate::email();
	$v_password = Validate::password(1);

	if($v_email && $v_password)
		User::login();
}