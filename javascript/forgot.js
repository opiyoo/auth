let submitted = false;

$('#email').onchange = () => Validate.email();

document.forms[0].onsubmit = function() {
	if(!Validate.email())
		$('#email').focus();

	if(!Validate.email() || submitted)
		return false;


	$('[type="submit"]').innerHTML = '<div class="spinner-border spinner-border-sm text-light"></div>';
	submitted = true;
}

