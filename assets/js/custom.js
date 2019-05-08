/**
 *	Custom jQuery Scripts
 *	
 *	Developed by: Austin Crane	
 *	Designed by: Austin Crane
 */

jQuery(document).ready(function ($) {

	/*
        FAQ dropdowns
	__________________________________________
	*/
	$('.question').click(function() {
		var parent = $(this).parents('.faqrow');
		parent.toggleClass('collapse');
	   	$(this).next('.answer').slideToggle();
	});

	/*
	*
	*	Responsive iFrames
	*
	------------------------------------*/
	var $all_oembed_videos = $("iframe[src*='youtube']");
	
	$all_oembed_videos.each(function() {
	
		$(this).removeAttr('height').removeAttr('width').wrap( "<div class='embed-container'></div>" );
 	
 	});
	

	/*
	*
	*	Wow Animation
	*
	------------------------------------*/
	new WOW().init();


	$(document).on("click","#toggleMenu",function(){
		$(this).toggleClass('open');
		$('.mobile-navigation').toggleClass('open');
		$('body').toggleClass('open-mobile-menu');
		$('.site-header .logo').toggleClass('fixed');
		var parentdiv = $(".mobile-navigation").outerHeight();
		var mobile_nav_height = $(".mobile-main-nav").outerHeight();
		if(mobile_nav_height>parentdiv) {
			$('.mobile-navigation').addClass("overflow-height");
		}
	});

	$('#featuredTestimonial').cycle({ 
	    timeout:   10000,
	    fx:      'carousel',
	    slides: '> .testimonial-text',
	    speed: 900,
	    pager: '.pager-nav'
  	});   

	$("select#input_1_4_4").select2({
		placeholder: "Select a state...",
	    allowClear: true
	}).on("select2:unselecting", function(e) {
	    $(this).data('state', 'unselected');
	    $('input.allow-reset').val("");
	}).on("select2:open", function(e) {
	    if ($(this).data('state') === 'unselected') {
	        $(this).removeData('state'); 
	        var self = $(this);
	        setTimeout(function() {
	            self.select2('close');
	        }, 1);
	    }    
	});

});// END #####################################    END