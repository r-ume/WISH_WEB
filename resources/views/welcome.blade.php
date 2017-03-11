<html>
	<head>
		<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
		<script type="text/javascript" src="http://gsgd.co.uk/sandbox/jquery/easing/jquery.easing.1.3.js"></script>
		<script type="text/javascript" src="javascript/easyng.js"></script>

		<style>
			body {
				margin: 0;
				padding: 0;
				width: 100%;
				height: 100%;
				color: #B0BEC5;
				display: table;
				font-weight: 100;
				font-family: 'Lato';
			}

			.container {
				text-align: center;
				display: table-cell;
				vertical-align: middle;
			}

			.content {
				text-align: center;
				display: inline-block;
			}

			.title {
				font-size: 96px;
				margin-bottom: 40px;
			}

			.quote {
				font-size: 24px;
			}

			a{
				text-decoration: none;
			}

			a:visited { color: #B0BEC5; }
		</style>

	</head>
	<body>
		<div class="container">
			<div class="content">
				<div class="title" data-ft="WISH_WEB"></div>
				<a class="quote" href = "/auth/login" data-ft="{{ Inspiring::quote() }}"></a>
			</div>
		</div>

		<script type="text/javascript">
			$(function(){
				$('.title').easyng({
					dir : 'bottom' ,
					pattern : 'easeInQuad',
					time : 380
				});
				$('.quote').easyng({dir : 'top'});
			});
		</script>
	</body>
</html>
