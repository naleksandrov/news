$(document).ready(function() {

	$('.datepicker').datepicker({
		dateFormat: "yy-mm-dd"
	});

	$('.news-edit').on('click', '.form-submit', function() {
		var thisElement = $(this);
		var form = thisElement.parents('form').serialize();
		$.ajax({
			url: '/news/admin/news/update',
			method: 'POST',
			data: form,
			dataType: 'json',
			success: function(response) {
				$('.alert').fadeIn('fast', function() {
					setTimeout(function() {
						$('.alert').fadeOut('fast');
					}, 3000);
				});
				thisElement.hide();
			}
		});
	})
	.on('input change', 'input', function() {
		$(this).parents('form').find('button').show();
	});

	$('.news-list').on('click', '.news-delete', function() {
		var thisElement = $(this);
		var alert = confirm("Сигурни ли сте че искате да изтриете тази новина");
		if (alert === true) {
			var newsId = thisElement.data('id');
			$.ajax({
				url: '/news/admin/news/delete/' + newsId,
				method: 'POST',
				dataType: 'json',
				success: function(response) {
					thisElement.closest('tr').remove();

				}
			});
		}
	});

	$('.change-lang').on('change', function() {
		var id = $(this).find('option:selected').data('lang-id');
		var lang = $(this).find('option:selected').data('lang-name');
		$.ajax({
			url: '/news/site/ajaxSetLanguage/' + lang + '/' + id,
			method: 'GET',
			dataType: 'json',
			success: function(response) {
				window.location.reload();
			}
		});
	});
});

