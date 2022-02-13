let submitted = false;

$('#email').onchange = () => Validate.email();
$('#password').onchange = () => Validate.password();

document.forms[0].onsubmit = function() {

	const A = Validate.email(), B = Validate.password();

	if(!A)
		$('#email').focus();
	else if(!B)
		$('#password').focus();

	if(!A || !B || submitted)
		return false;


	$('[type="submit"]').innerHTML = '<div class="spinner-border spinner-border-sm text-light"></div>';
	submitted = true;
}