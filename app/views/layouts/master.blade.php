<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>Privateacher</title>
	<link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>
<body>
	<script>
		window.fbAsyncInit = function() {
			FB.init({
				appId      : '394543680722009',
				xfbml      : true,
				version    : 'v2.2',
				status	   : true
			});

			// FB.getLoginStatus(function(resp) {
			// 	if (resp.status === 'not_authorized') {
					
			// 	}
			// }, true);
		};

		function login () {
			FB.login(function(resp){
				console.info(resp);
			}, {scope: 'publish_actions,user_friends,manage_friendlists'});
		}

		function invokeDialog() {
			FB.ui({
				method: 'friends',
				id: 'Juan Bernaola Ramirez'
			}, function(resp) {
				console.info(resp);
			});
		}

		function friends() {
			FB.api('/me/taggable_friends', function(response) {
				if (response && response.data){
				// Handle response
				} else {
					alert('Something goes wrong', response);
				}
			});
		}

		function publicar() {
			FB.api("/me/feed", "POST", {
				message: "Este es un mensaje nomas de pruebas",
				privacy: {value: "SELF"}
			}, function(resp) {
				console.info(resp);
			});
		}

		(function(d, s, id){
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) {return;}
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/es_LA/sdk.js";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>
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
	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script>
		$('#fb-login-app').on('click', function(e) {
			e.preventDefault();
			login();
		});
	</script>
</body>
</html>