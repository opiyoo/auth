const $ = elm => document.querySelector(elm);


class Validate {
	static email() {
		let email = $('#email').value;

		if('' === email.trim()) {
			$('#email').classList.add('is-invalid');
			$('#email + .invalid-feedback').innerHTML = 'Enter your email address';
			return false;
		}

		if(!email.includes('@')) {
			$('#email').classList.add('is-invalid');
			$('#email + .invalid-feedback').innerHTML = 'Invalid email address';
			return false;
		}

		$('#email').classList.remove('is-invalid');
		$('#email + .invalid-feedback').innerHTML = '';
		return true;
	}

	static password(msg = 0) {
		let password = $('#password').value;

		if('' === password) {
			$('#password').classList.add('is-invalid');
			$('#password + .invalid-feedback').innerHTML = msg ? 'Enter your password' : 'Choose a password';
			return false;
		}

		if(!msg && password.length < 5) {
			$('#password').classList.add('is-invalid');
			$('#password + .invalid-feedback').innerHTML = 'Your password is too short';
			return false;
		}

		$('#password').classList.remove('is-invalid');
		$('#password + .invalid-feedback').innerHTML = '';
		return true;
	}
}