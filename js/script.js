$(document).ready(function(){
	$('nav a').on('click', function(){
		// Current class assignment
		$('nav li.current').removeClass('current');
		$(this).parent().addClass('current');

		// Set the heading text
		$('h1#heading').text($(this).text());

		// Get & Filter link text
		var category = $(this).text().toLowerCase().replace(' ','-');

		// Remove hidden class if 'ALL' is selected.
		if(category == 'all'){
			$('ul#gallery li:hidden').fadeIn('slow').removeClass('hidden');
		}else{
			$('ul#gallery li').each(function(){
				if(!$(this).hasClass(category)){
					$(this).hide().addClass('hidden');
				}else{
					$(this).fadeIn('slow').removeClass('hidden');
				}
			});
		}
		// Stop link behavior
		return false;
	});

	$('ul#gallery li').on('mouseenter', function(){
		//Get data attribute
		var title = $(this).children().data('title');
		var desc = $(this).children().data('desc');

		//Check if there's already an overlay div
		var contains = document.className.contains('overlay');

		//Create overlay div
		$(this).append('<div class="overlay" id="'+title+'"></div>');

		//Get overlay div
		var overlay = $(this).children('.overlay');

		//Add html to overlay
		overlay.html('<h3>'+title+'</h3><p>'+desc+'</p>');

		//Fade in overlay
		overlay.fadeIn(250);
	});

	$('ul#gallery li').on('mouseleave', function(){
		//Get overlay div
		var overlay = $(this).children('.overlay');

		//Fade out overlay
		overlay.fadeOut(250);
	});
});