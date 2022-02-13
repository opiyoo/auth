<?php

function rem_state() {
	if($_SERVER['REQUEST_METHOD'] == 'GET' || isset($_POST['remember']))
		return 'checked';

	return '';
}