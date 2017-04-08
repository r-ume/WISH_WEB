<!DOCTYPE html>
<html>
<head>
	<!-- Standard Meta -->
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
	<link rel = "stylesheet" type = "text/css" href = "https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.9/semantic.css" />
	<script type ="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.9/semantic.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
	<script type="text/javascript" src="javascript/easyng.js"></script>

	<!-- Site Properties -->
	<title>WISH_WEB Login</title>
	<style type="text/css">
		body {
			background-color: #DADADA;
		}
		body > .grid {
			height: 100%;
		}
		.image {
			margin-top: -100px;
		}
		.column {
			max-width: 450px;
		}
	</style>
	<script>
		$(document)
				.ready(function() {
					$('.ui.form')
							.form({
								fields: {
									email: {
										identifier  : 'email',
										rules: [
											{
												type   : 'empty',
												prompt : 'Please enter your e-mail'
											},
											{
												type   : 'email',
												prompt : 'Please enter a valid e-mail'
											}
										]
									},
									password: {
										identifier  : 'password',
										rules: [
											{
												type   : 'empty',
												prompt : 'Please enter your password'
											},
											{
												type   : 'length[6]',
												prompt : 'Your password must be at least 6 characters'
											}
										]
									}
								}
							})
					;
				})
		;
	</script>
</head>
<body>

<div class="ui middle aligned center aligned grid">
	<div class="column">
		<h2 class="ui teal image header">
			<img src="assets/images/logo.png" class="image">
			<div class="content" style = "color: white;">
				Log-in to your account
			</div>
		</h2>
		<form class="ui large form" role = "form" method = "POST" action = "/auth/login">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="ui stacked segment">
				<div class="field">
					<div class="ui left icon input">
						<i class="mail icon"></i>
						<input type="text" name="email" placeholder="E-mail address">
					</div>
				</div>
				<div class="field">
					<div class="ui left icon input">
						<i class="lock icon"></i>
						<input type="password" name="password" placeholder="Password">
					</div>
				</div>
				<div class="ui fluid large teal submit button">Login</div>
			</div>

			<div class="ui error message"></div>

		</form>

		<div class="ui message">
			New to us? <a href="/auth/register">Sign Up</a>
		</div>
	</div>
</div>

</body>

</html>
