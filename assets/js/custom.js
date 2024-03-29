$(function() {
	'use strict'
	
	// ______________ Page Loading
	$("#global-loader").fadeOut("slow");
	
	// ______________ Card
	const DIV_CARD = 'div.card';
	
	// ______________ Function for remove card
	$(document).on('click', '[data-toggle="card-remove"]', function(e) {
		let $card = $(this).closest(DIV_CARD);
		$card.remove();
		e.preventDefault();
		return false;
	});
	
	// ______________ Functions for collapsed card
	$(document).on('click', '[data-toggle="card-collapse"]', function(e) {
		let $card = $(this).closest(DIV_CARD);
		$card.toggleClass('card-collapsed');
		e.preventDefault();
		return false;
	});
	
	// ______________ Card full screen
	$(document).on('click', '[data-toggle="card-fullscreen"]', function(e) {
		let $card = $(this).closest(DIV_CARD);
		$card.toggleClass('card-fullscreen').removeClass('card-collapsed');
		e.preventDefault();
		return false;
	});
	
	// ______________Main-navbar
	if (window.matchMedia('(min-width: 992px)').matches) {
		$('.main-navbar .active').removeClass('show');
		$('.main-header-menu .active').removeClass('show');
	}
	$('.main-header .dropdown > a').on('click', function(e) {
		e.preventDefault();
		$(this).parent().toggleClass('show');
		$(this).parent().siblings().removeClass('show');
	});
	$('.main-navbar .with-sub').on('click', function(e) {
		e.preventDefault();
		$(this).parent().toggleClass('show');
		$(this).parent().siblings().removeClass('show');
	});
	$('.dropdown-menu .main-header-arrow').on('click', function(e) {
		e.preventDefault();
		$(this).closest('.dropdown').removeClass('show');
	});
	$('#mainNavShow, #azNavbarShow').on('click', function(e) {
		e.preventDefault();
		$('body').addClass('main-navbar-show');
	});
	$('#mainContentLeftShow').on('click touch', function(e) {
		e.preventDefault();
		$('body').addClass('main-content-left-show');
	});
	$('#mainContentLeftHide').on('click touch', function(e) {
		e.preventDefault();
		$('body').removeClass('main-content-left-show');
	});
	$('#mainContentBodyHide').on('click touch', function(e) {
		e.preventDefault();
		$('body').removeClass('main-content-body-show');
	})
	$('body').append('<div class="main-navbar-backdrop"></div>');
	$('.main-navbar-backdrop').on('click touchstart', function() {
		$('body').removeClass('main-navbar-show');
	});
	
	// ______________Dropdown menu
	$(document).on('click touchstart', function(e) {
		e.stopPropagation();
		var dropTarg = $(e.target).closest('.main-header .dropdown').length;
		if (!dropTarg) {
			$('.main-header .dropdown').removeClass('show');
		}
		if (window.matchMedia('(min-width: 992px)').matches) {
			var navTarg = $(e.target).closest('.main-navbar .nav-item').length;
			if (!navTarg) {
				$('.main-navbar .show').removeClass('show');
			}
			var menuTarg = $(e.target).closest('.main-header-menu .nav-item').length;
			if (!menuTarg) {
				$('.main-header-menu .show').removeClass('show');
			}
			if ($(e.target).hasClass('main-menu-sub-mega')) {
				$('.main-header-menu .show').removeClass('show');
			}
		} else {
			if (!$(e.target).closest('#mainMenuShow').length) {
				var hm = $(e.target).closest('.main-header-menu').length;
				if (!hm) {
					$('body').removeClass('main-header-menu-show');
				}
			}
		}
	});
	
	// ______________MainMenuShow
	$('#mainMenuShow').on('click', function(e) {
		e.preventDefault();
		$('body').toggleClass('main-header-menu-show');
	})
	$('.main-header-menu .with-sub').on('click', function(e) {
		e.preventDefault();
		$(this).parent().toggleClass('show');
		$(this).parent().siblings().removeClass('show');
	})
	$('.main-header-menu-header .close').on('click', function(e) {
		e.preventDefault();
		$('body').removeClass('main-header-menu-show');
	})
	
	// ______________Tooltip
	$('[data-toggle="tooltip"]').tooltip();
	
	// ______________Toast
	$(".toast").toast();
	
	// ______________ Page Loading
	$(window).on("load", function(e) {
		$("#global-loader").fadeOut("slow");
	})
	
	// ______________Back-top-button
	$(window).on("scroll", function(e) {
		if ($(this).scrollTop() > 0) {
			$('#back-to-top').fadeIn('slow');
		} else {
			$('#back-to-top').fadeOut('slow');
		}
	});
	$(document).on("click", "#back-to-top", function(e) {
		$("html, body").animate({
			scrollTop: 0
		}, 600);
		return false;
	});
	
	// ______________Full screen
	$(document).on("click", ".fullscreen-button", function toggleFullScreen() {
		if ((document.fullScreenElement !== undefined && document.fullScreenElement === null) || (document.msFullscreenElement !== undefined && document.msFullscreenElement === null) || (document.mozFullScreen !== undefined && !document.mozFullScreen) || (document.webkitIsFullScreen !== undefined && !document.webkitIsFullScreen)) {
			if (document.documentElement.requestFullScreen) {
				document.documentElement.requestFullScreen();
			} else if (document.documentElement.mozRequestFullScreen) {
				document.documentElement.mozRequestFullScreen();
			} else if (document.documentElement.webkitRequestFullScreen) {
				document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
			} else if (document.documentElement.msRequestFullscreen) {
				document.documentElement.msRequestFullscreen();
			}
		} else {
			if (document.cancelFullScreen) {
				document.cancelFullScreen();
			} else if (document.mozCancelFullScreen) {
				document.mozCancelFullScreen();
			} else if (document.webkitCancelFullScreen) {
				document.webkitCancelFullScreen();
			} else if (document.msExitFullscreen) {
				document.msExitFullscreen();
			}
		}
	})
	
	// ______________ RATING STAR
	var ratingOptions = {
		selectors: {
			starsSelector: '.rating-stars',
			starSelector: '.rating-star',
			starActiveClass: 'is--active',
			starHoverClass: 'is--hover',
			starNoHoverClass: 'is--no-hover',
			targetFormElementSelector: '.rating-value'
		}
	};
	$(".rating-stars").ratingStars(ratingOptions);
	
	// ______________Cover Image
	$(".cover-image").each(function() {
		var attr = $(this).attr('data-image-src');
		if (typeof attr !== typeof undefined && attr !== false) {
			$(this).css('background', 'url(' + attr + ') center center');
		}
	});
	
	// ______________ SWITCHER-toggle ______________//
	
	/*Theme Layouts*/
	$(document).on("click", '#myonoffswitch', function () {    
		if (this.checked) {
			$('body').addClass('light-theme');
			$('body').removeClass('dark-theme');
			localStorage.setItem("light-theme", "True");
		}
		else {
			$('body').removeClass('light-theme');
			localStorage.setItem("light-theme", "false");
		}
	});
	$(document).on("click", '#myonoffswitch1', function () {    
		if (this.checked) {
			$('body').addClass('dark-theme');
			$('body').removeClass('light-theme');
			localStorage.setItem("dark-theme", "True");
		}
		else {
			$('body').removeClass('dark-theme');
			localStorage.setItem("dark-theme", "false");
		}
	});
	
	/*Body Styles*/
	$(document).on("click", '#myonoffswitch13', function () {    
		if (this.checked) {
			$('body').addClass('default');
			$('body').removeClass('boxed');
			localStorage.setItem("default", "True");
		}
		else {
			$('body').removeClass('default');
			localStorage.setItem("default", "false");
		}
	});
	$(document).on("click", '#myonoffswitch14', function () {    
		if (this.checked) {
			$('body').addClass('boxed');
			$('body').removeClass('default');
			localStorage.setItem("boxed", "True");
		}
		else {
			$('body').removeClass('boxed');
			localStorage.setItem("boxed", "false");
		}
	});
	
	/*Header Styles*/
	$(document).on("click", '#myonoffswitch2', function () {    
		if (this.checked) {
			$('body').addClass('light-header');
			$('body').removeClass('color-header');
			$('body').removeClass('gradient-header');
			$('body').removeClass('light-horizontal');
			$('body').removeClass('color-horizontal');
			$('body').removeClass('dark-horizontal');
			$('body').removeClass('gradient-horizontal');
			$('body').removeClass('light-leftmenu');
			$('body').removeClass('dark-leftmenu');
			$('body').removeClass('color-leftmenu');
			$('body').removeClass('gradient-leftmenu');
			localStorage.setItem("dark-theme", "True");
		}
		else {
			$('body').removeClass('light-header');
			localStorage.setItem("light-header", "false");
		}
	});
	$(document).on("click", '#myonoffswitch3', function () {    
		if (this.checked) {
			$('body').addClass('color-header');
			$('body').removeClass('light-header');
			$('body').removeClass('gradient-header');
			$('body').removeClass('light-horizontal');
			$('body').removeClass('color-horizontal');
			$('body').removeClass('dark-horizontal');
			$('body').removeClass('gradient-horizontal');
			$('body').removeClass('light-leftmenu');
			$('body').removeClass('dark-leftmenu');
			$('body').removeClass('color-leftmenu');
			$('body').removeClass('gradient-leftmenu');
			localStorage.setItem("color-header", "True");
		}
		else {
			$('body').removeClass('color-header');
			localStorage.setItem("color-header", "false");
		}
	});
	$(document).on("click", '#myonoffswitch4', function () {    
		if (this.checked) {
			$('body').addClass('gradient-header');
			$('body').removeClass('light-header');
			$('body').removeClass('color-header');
			$('body').removeClass('light-horizontal');
			$('body').removeClass('color-horizontal');
			$('body').removeClass('dark-horizontal');
			$('body').removeClass('gradient-horizontal');
			$('body').removeClass('light-leftmenu');
			$('body').removeClass('dark-leftmenu');
			$('body').removeClass('color-leftmenu');
			$('body').removeClass('gradient-leftmenu');
			localStorage.setItem("gradient-header", "True");
		}
		else {
			$('body').removeClass('gradient-header');
			localStorage.setItem("gradient-header", "false");
		}
	});
	
	
	/*Horizontal-menu Styles*/
	$(document).on("click", '#myonoffswitch5', function () {    
		if (this.checked) {
			$('body').addClass('light-horizontal');
			$('body').removeClass('color-horizontal');
			$('body').removeClass('dark-horizontal');
			$('body').removeClass('gradient-horizontal');
			$('body').removeClass('light-header');
			$('body').removeClass('color-header');
			$('body').removeClass('gradient-header');
			localStorage.setItem("dark-theme", "True");
		}
		else {
			$('body').removeClass('light-horizontal');
			localStorage.setItem("light-horizontal", "false");
		}
	});
	$(document).on("click", '#myonoffswitch6', function () {    
		if (this.checked) {
			$('body').addClass('color-horizontal');
			$('body').removeClass('light-horizontal');
			$('body').removeClass('dark-horizontal');
			$('body').removeClass('gradient-horizontal');
			$('body').removeClass('light-header');
			$('body').removeClass('color-header');
			$('body').removeClass('gradient-header');
			localStorage.setItem("color-horizontal", "True");
		}
		else {
			$('body').removeClass('color-horizontal');
			localStorage.setItem("color-horizontal", "false");
		}
	});
	$(document).on("click", '#myonoffswitch7', function () {    
		if (this.checked) {
			$('body').addClass('dark-horizontal');
			$('body').removeClass('light-horizontal');
			$('body').removeClass('color-horizontal');
			$('body').removeClass('gradient-horizontal');
			$('body').removeClass('light-header');
			$('body').removeClass('color-header');
			$('body').removeClass('gradient-header');
			localStorage.setItem("dark-horizontal", "True");
		}
		else {
			$('body').removeClass('dark-horizontal');
			localStorage.setItem("dark-horizontal", "false");
		}
	});
	$(document).on("click", '#myonoffswitch8', function () {    
		if (this.checked) {
			$('body').addClass('gradient-horizontal');
			$('body').removeClass('light-horizontal');
			$('body').removeClass('color-horizontal');
			$('body').removeClass('dark-horizontal');
			$('body').removeClass('light-header');
			$('body').removeClass('color-header');
			$('body').removeClass('gradient-header');
			localStorage.setItem("gradient-horizontal", "True");
		}
		else {
			$('body').removeClass('gradient-horizontal');
			localStorage.setItem("gradient-horizontal", "false");
		}
	});
	
	/*Left-menu Styles*/
	$(document).on("click", '#myonoffswitch9', function () {    
		if (this.checked) {
			$('body').addClass('light-leftmenu');
			$('body').removeClass('color-leftmenu');
			$('body').removeClass('dark-leftmenu');
			$('body').removeClass('gradient-leftmenu');
			$('body').removeClass('light-header');
			$('body').removeClass('color-header');
			$('body').removeClass('gradient-header');
			localStorage.setItem("light-leftmenu", "True");
		}
		else {
			$('body').removeClass('light-leftmenu');
			localStorage.setItem("light-leftmenu", "false");
		}
	});
	$(document).on("click", '#myonoffswitch10', function () {    
		if (this.checked) {
			$('body').addClass('color-leftmenu');
			$('body').removeClass('light-leftmenu');
			$('body').removeClass('dark-leftmenu');
			$('body').removeClass('gradient-leftmenu');
			$('body').removeClass('light-header');
			$('body').removeClass('color-header');
			$('body').removeClass('gradient-header');
			localStorage.setItem("color-leftmenu", "True");
		}
		else {
			$('body').removeClass('color-leftmenu');
			localStorage.setItem("color-leftmenu", "false");
		}
	});
	$(document).on("click", '#myonoffswitch11', function () {    
		if (this.checked) {
			$('body').addClass('dark-leftmenu');
			$('body').removeClass('light-leftmenu');
			$('body').removeClass('gradient-leftmenu');
			$('body').removeClass('color-leftmenu');
			$('body').removeClass('light-header');
			$('body').removeClass('color-header');
			$('body').removeClass('gradient-header');
			localStorage.setItem("dark-leftmenu", "True");
		}
		else {
			$('body').removeClass('dark-leftmenu');
			localStorage.setItem("dark-leftmenu", "false");
		}
	});
	$(document).on("click", '#myonoffswitch12', function () {    
		if (this.checked) {
			$('body').addClass('gradient-leftmenu');
			$('body').removeClass('light-leftmenu');
			$('body').removeClass('dark-leftmenu');
			$('body').removeClass('color-leftmenu');
			$('body').removeClass('light-header');
			$('body').removeClass('color-header');
			$('body').removeClass('gradient-header');
			localStorage.setItem("gradient-leftmenu", "True");
		}
		else {
			$('body').removeClass('gradient-leftmenu');
			localStorage.setItem("gradient-leftmenu", "false");
		}
	});

	$(document).on('click','#withdraw', function(){
		alert('არასაკმარისი ბალანსი');
	})
});

$(document).ready(function(){
	setInterval(function () {
		$.ajax({
			url: "ajax/menu.ajax.php",
			type: "POST",
			data: "act=get_count",
			dataType: "json",
			success: function (data) {
				if(typeof data != 'undefined'){
					data.forEach(function(i, x){
						if(typeof i.active == 'undefined'){
							$("#proccess_"+i.id).html(i.title+` <span style="color: red;">(`+i.queue+`)</span> `);
						}
						else{
							$("#proccess_"+i.id).html(i.title+` <span style="color: green;">(`+i.finished+`)</span> <span style="color: #95952a;">(`+i.active+`)</span> <span style="color: red;">(`+i.queue+`)</span> `);
						}
						
					})
				}
			}
		});


		$.ajax({
			url: "ajax/menu.ajax.php",
			type: "POST",
			data: "act=get_notification_new",
			dataType: "json",
			success: function (data) {
				if(typeof data != 'undefined'){
					if(data != null){
						$(".pulse").css("display", 'block');
						data.forEach(function(i, x){
							if($(".media[notif-id='"+i.id+"']").length == 0){
								var url = '#'
								if(i.page != ''){
									url = "?page="+i.page;
								}
								$(".main-notification-list").prepend(`	<a href="`+url+`">
																			<div style="background-color:`+i.color+`" notif-id="`+i.id+`" class="media new">
																				<div class="media-body">
																					<p>`+i.text+`</p>
																					<span>`+i.datetime+`</span> 
																				</div>
																			</div>
																		</a>`);
							}
						})
					}
					
				}
			}
		});
	}, 30000);
})


$(document).on('click', '.main-header-notification', function(){
	$.ajax({
		url: "ajax/menu.ajax.php",
		type: "POST",
		data: "act=read_notification_all",
		dataType: "json",
		success: function (data) {
			$(".pulse").css("display", 'none');
		}
	});
})


$(document).on('keyup', '.atxod_width,.atxod_height', function(e){
	var num = parseInt($(this).val());

	if(typeof $(this).attr('max') != 'undefined'){
		if(num > $(this).attr('max')){
			$(this).val($(this).attr('max'))
/* 			if ( !(e.which == '46' || e.which == '8' || e.which == '13') ) // backspace/enter/del
            	e.preventDefault(); */
		}
	}
});