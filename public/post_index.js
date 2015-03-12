require.config({
	paths: {
		'jquery': 'bower_components/jquery/dist/jquery.min',
		'bootstrap'	: 'bower_components/bootstrap/dist/js/bootstrap.min'
	}
});

require(['jquery', 'bootstrap'], function($) {
	function showPost(e) {
		e.preventDefault();
		var $this = $(this),
			id = $this.data('id'),
			$modal = $('#modal-show-post'),
			$modalTitle = $modal.find('.modal-title span'),
			$modalBody = $modal.find('.modal-body p');

		$modal.modal('show');
		$modalTitle.text('');
		$modalBody.text('Cargando...');

		$.getJSON('show-history-post-'+id)
			.done(function(rec) {
				if (rec.load === undefined) {
					$modal.find('.modal-title span').text(rec.alias);
					$modalBody.text(rec.post);
				} else {
					$modalBody.text(rec.message);
				}
			});
	}

	function paginatePosts (e) {
		e.preventDefault();
		var $this = $(this),
			url = $this.attr('href'),
			$links = $this.closest('.pager').children('li:not(:disabled)'),
			$alert = $('#inline-alert');

		if (!$this.parent().hasClass('disabled')) {
			$links.addClass('disabled');
			$alert.removeClass('hidden');
			$.ajax({
				url: url,
				type: 'get',
				dataType: 'json'
			}).done(function(rec) {
				var li = '';
				for (var i = 0; i < rec.data.length; i++) {
					li += '<li class="text-right">'
							+'<div class="post-content col-sm-8"><b><small>'+rec.data[i].alias+'</small></b>'
								+'<p data-id="'+rec.data[i].id+'">'+ rec.data[i].post.substring(0, 54)+'...</p>'
							+'</div><div class="col-sm-4"><img src="img/avatars/'+ rec.data[i].genero +'_'+(rec.data[i].genero === 'm' ? Math.floor((Math.random() * 11) + 1) : Math.floor((Math.random() * 17) + 1))+'.jpg" alt="Avatar" class="img-responsive"></div>'
						+'</li>';
				}

				$('#postsLinks').html(rec.paginator);
				$('#posts').html(li);
			}).complete(function() {
				$links.removeClass('disabled')
				$alert.addClass('hidden');
			});
		}
	}

	$('#posts').on('click', 'p', showPost);
	$('#postsLinks').on('click', 'a', paginatePosts);
});