<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>Privateacher</title>
	<meta name="description" content="Esta es la descripción de la aplicación de privateacher QRoche">
	<link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>
<body>
	<div id="fb-root"></div>
	<div class="container">
		<header>
			<img src="img/logo.png" alt="Logo Privateacher" class="push-left">
			<div class="push-right" id="socials">
				<a href="#"><img src="img/facebook.png" alt="Facebook"></a>
				<a href="#"><img src="img/youtube.png" alt="Youtube"></a>
			</div>
			<div class="clearfix"></div>
		</header>
	@show
	@yield('content')
	</div>
</body>
</html>