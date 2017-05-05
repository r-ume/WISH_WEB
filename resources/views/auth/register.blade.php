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

	<!-- Site Properties -->
	<title>Sign Up</title>
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
					});
				$('.ui.dropdown')
						.dropdown()
				;
			})
		;
	</script>
</head>
<body>

	<div class="ui middle aligned center aligned grid" style = "background-image:url('{{ URL::asset($image) }}'); background-size: cover;">
		<div class="column">
			<h2 class="ui teal image header">
				<div class="content">Sign Up</div>
			</h2>
			<form class="ui large form" role = "form" method = "POST" action = "/auth/register">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">

				<div class="ui stacked segment">
					<div class="field">
						<div class="ui left icon input">
							<i class="write icon"></i>
							<input type="text" name="first_name" placeholder="Enter your first name" >
						</div>
					</div>
					<div class = "field">
						<div class="ui left icon input">
							<i class="write icon"></i>
							<input type="text" name="last_name" placeholder="Enter your last name" >
						</div>
					</div>
					<div class = "field">
						<div class="ui left icon input">
							<i class="mail icon"></i>
							<input type="text" name="email" placeholder="Enter your email " >
						</div>
					</div>
					<div class = "field">
						<div class="ui selection dropdown">
							<input type="hidden" name="language_id">
							<i class="dropdown icon"></i>
							<div class="default text">Select your language</div>
							<div class="menu">
								@foreach($languages as $language)
									<div class="item">
										{{$language->id}} {{$language->language}}
									</div>
								@endforeach
							</div>
						</div>
					</div>
					<div class = "field">
						<div class="ui selection dropdown">
							<input type="hidden" name="sex">
							<i class="dropdown icon"></i>
							<div class="default text">Select your sex</div>
							<div class="menu">
								<div class="item">male</div>
								<div class="item">female</div>
							</div>
						</div>
					</div>
					<div class = "field">
						<div class="ui left icon input">
							<i class="list layout icon"></i>
							<input type="text" name="floor" placeholder="Enter your floor" >
						</div>
					</div>
					<div class="field">
						<div class="ui left icon input">
							<i class="lock icon"></i>
							<input type="password" name="password" placeholder="Password" >
						</div>
					</div>
					<div class="field">
						<div class="ui left icon input">
							<i class="lock icon"></i>
							<input type="password" name="password_confirmation" placeholder="Password Confirmation" >
						</div>
					</div>
					<div class="ui fluid large teal submit button">
						Sign up
					</div>
				</div>
			</form>

			@if (count($errors) > 0)
				<div class = "ui error message">
					<strong>Whoops!</strong> There were some problems with your input.<br><br>
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif

			<div class="ui message">
				New to us? <a href="/auth/register">Sign Up</a>
			</div>
		</div>
	</div>
</body>

</html>

