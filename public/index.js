require.config({
	paths: {
		'jquery': 'bower_components/jquery/dist/jquery.min',
		'lazy'	: 'bower_components/lazy.js/lazy.min',
		'selectize': 'bower_components/selectize/dist/js/standalone/selectize'
	}
});

require([
	'jquery',
	'lazy',
	'selectize'
], function($m, Lazy, selectize) {

	(function(d, s, id){
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) {return;}
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/es_LA/sdk.js";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));

	var data_friends = {}, friends_selected = [];
	window.fbAsyncInit = function() {
		FB.init({
			appId      : '394543680722009',
			xfbml      : true,
			version    : 'v2.2'
		});
	};

	function login ($btn) {
		FB.login(function(resp){
			if (resp.status === 'connected') {
				friends($btn);
			} else {
				$btn.prop('disabled', false).text('CONECTAR CON FB');
			}
		}, {scope: 'publish_actions,user_friends'});
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
				alert(response.error.message +"\nEsta app no tiene permisos para usar el etiquetado, se necesita las politicas de privacidad de esta App, para poder revisar y autorizar el etiquetado.");
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
		var $message = $('#message'),
			$alert = $('#alert');
		if (friends_selected.length !== 2) {
			$alert.removeClass('hidden').children('span').text('Debe elegir 2 amigos para poder continuar');
		} else {
			$('#fb-login-app').prop('disabled', true).text('CARGANDO...')
			FB.api("/me/feed", "POST", {
				message: $message.val(),
				privacy: {value: "FRIENDS_OF_FRIENDS"},
				place: 225798754190938,
				tags: friends_selected.join(',')
			}, function(resp) {
				if (resp.id) {
					$.ajax({
						url: 'change',
						type: 'put',
						dataType: 'json'
					}).done(function(rec) {
						if (rec.load) {
							location.href = 'thanks';
						} else {
							alert('Ups, sucedió algo inesperado');
						}
					});
				}
			});
		}
	}

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
});