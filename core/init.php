<?php
session_start();

date_default_timezone_set('Africa/Nairobi');

const CONFIG = [
	'mysql' => [
		'host' => '127.0.0.1',
		'username' => 'erick',
		'password' => 'QF4DqxX4Yijwy@4Q',
		'dbname' => 'crealli',
		'date_format' => "Y-m-d H:i:s"
	]
];


spl_autoload_register(function($class) {
	require './classes/' . $class . '.php';
});

require_once 'includes/functions.php';