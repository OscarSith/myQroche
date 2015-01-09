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

	$('#posts').on('click', 'p', showPost);
});