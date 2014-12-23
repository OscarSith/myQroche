<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>Privateacher</title>
	<link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>
<body>
	<div class="container">
		<header>
			<img src="img/logo.png" alt="Logo Privateacher" class="push-left">
			<div class="push-right" id="socials">
				<a href="#"></a>
				<a href="#" id="yt"></a>
			</div>
			<div class="clearfix"></div>
		</header>
	@show
	@yield('content')
	</div>
</body>
</html>