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
				<a href="#"></a>
				<a href="#" id="yt"></a>
			</div>
			<div class="clearfix"></div>
		</header>
	@show
	@yield('content')
	</div>
	<!--<script src="{{ asset('../node_modules/requirejs/require.js') }}" data-main="js/index"></script>-->
	<script src="{{ asset('js/app.min.js') }}"></script>
</body>
</html>