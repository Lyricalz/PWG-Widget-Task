// smaller file for wordpress

// Core widget script

jQuery(function($) {

	// One ajax request to server for widget functionality
	var content = $('.entry-content').text();

	$.post('http://projects.michaelolukoya.uk/pmg/standalone/server.php', {content: content}, function(res){
		if(res.success) {
			$('.pmg-widget-container').empty().html(res.response);
		}
		else {
			alert('No content exists.');
		}
	});
});