<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>Privateacher</title>
	<meta name="description" content="Esta es la descripción que irá en la imagen que saldrá en Facebook">
	<link href="{{ asset('css/main.css') }}" rel="stylesheet">
	<link href="{{ asset('../bower_components/selectize/dist/css/selectize.default.css') }}" rel="stylesheet">
</head>
<body>
	<script>
		var data_friends = {}, friends_selected = [];
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

		function login ($btn) {
			FB.login(function(resp){
				if (resp.status === 'connected') {
					friends($btn);
				}
			}, {scope: 'publish_actions,manage_friendlists'});
		}

		function friends($btn) {
			FB.api('/me/taggable_friends', function(response) {
				if (response && response.data){
					data_friends = response.data;
					$btn.prop('disabled', false).text('INVITAR');

					var i = 0, options = '';
					for (i; i < data_friends.length; i++) {
						options += '<option value="'+ data_friends[i].id +'">'+ data_friends[i].name +'</option>';
					}

					$('#fb-select-friends').html('<select multiple="multiple" id="cboFriends" name="friends">'+ options +'</select>');

					$('#cboFriends').selectize({
						plugins: ['remove_button'],
					    maxItems: 2,
						onItemAdd: function(val) {
							friends_selected.push(val);
						},
						onItemRemove: function(val) {
							for (var i = 0; i < friends_selected.length; i++) {
								if(friends_selected[i] == val) {
									friends_selected.splice(i, 1);
									return false;
								}
							};
						}
					});

					$('#fb-login-app').off().on('click', function(e) {
						e.preventDefault();
						publicar();
					});
				} else {
					alert('Something goes wrong', response);
				}
			});
		}

		function searchFriend (value) {
			return Lazy(data_friends)
				.filter(function(m) {
					return Lazy(m.name).contains(value);
				})
				.toArray();
		}

		function publicar() {
			if (friends_selected.length === 2) {
				FB.api("/me/feed", "POST", {
					message: "Este es un mensaje enviado de pruebas desde la web de QRoche",
					privacy: {value: "SELF"},
					link: 'http://104.236.180.75:8000',
					description: "Aqui debe ir alguna descripción si es que se desea poner una, tambien podría ir vacio.\nAhora si creo q me irá bien esto.",
					// caption: 'Este es el caption', //por defecto pone el dominio
					place: 225798754190938,
					tags: friends_selected.join(',')
				}, function(resp) {
					console.info(resp);
					// location.href = 'thanks';
				});
			} else {
				$('#alert').removeClass('hidden').children('span').text('Debe elegir 2 amigos para poder continuar');
			}
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
	<script src="{{ asset('../bower_components/lazy.js/lazy.js') }}"></script>
	<script src="{{ asset('../bower_components/selectize/dist/js/standalone/selectize.js') }}"></script>
	<script>
		$('#fb-login-app').on('click', function(e) {
			e.preventDefault();
			var $this = $(this);
			$this.prop('disabled', true).text('CARGANDO...');
			login($this);
		});
		$('button.close').on('click', function(e) {
			e.preventDefault();
			$(this).parent().addClass('hidden');
		});
	</script>
</body>
</html>