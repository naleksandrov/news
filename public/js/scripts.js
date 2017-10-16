$(document).ready(function() {
	$('.languages').on('click', 'a', function() {
		var id = $(this).data('lang-id');
		var lang = $(this).data('lang-name');
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
