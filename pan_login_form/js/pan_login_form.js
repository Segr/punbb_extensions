$(document).ready(function() {
	$('#navlogin, #brd-pagepost-top .posting a[href*=login], #brd-pagepost-end .posting a[href*=login]').click( function(event){ 
		event.preventDefault(); 
		$('.pan_login_form_overlay').fadeIn(400,
		 	function(){ 
				$('#pan_login_form') 
					.css('display', 'block') 
					.animate({opacity: 1, top: '50%'}, 200);
		});
	});

	$('.pan_login_form_close, .pan_login_form_overlay').click( function(){ 
		$('#pan_login_form')
			.animate({opacity: 0, top: '45%'}, 200,
				function(){ 
					$(this).css('display', 'none'); 
					$('.pan_login_form_overlay').fadeOut(400);
				}
			);
	});
});
