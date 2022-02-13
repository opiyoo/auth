<?php

require 'core/init.php';

$dbh = DB::get_instance();
$data = [
	'fname' => 'Susan',
	'lname' => 'Apiyo',
	'email' => 'susan@beautypeagents.io',
	'password' => password_hash('Susan', PASSWORD_DEFAULT),
	'joined' => date(Config::get('mysql/date_format'))
];

echo (int) $dbh->insert('users', $data);
