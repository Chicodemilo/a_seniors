<div id='wrapper'>
    <div id="login_form">
		<h2>Please Login</h2>
		<?php 
			echo form_open('login/validate_credentials');
			$opts = 'placeholder="Username"';
			echo form_input('username', '', $opts);
			$opts = 'placeholder="Password"';
			echo form_password('password', '', $opts);
			echo form_submit('submit', 'Login');
			$opts = 'style="display:inline; font-weight:bold;"';
			echo anchor('login/signup', 'Create Account', $opts);
		 ?>
	 </div>
</div>