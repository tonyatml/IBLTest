<script>
$( document ).ready(function() {
//twitter icon hover annimation
var tw_icon_left = document.querySelectorAll(".tw_icon_left");
var img_blue = document.querySelectorAll(".image-46.blue");
var img_dark = document.querySelectorAll(".image-46.dark");

if(tw_icon_left){
	for (var i = 0; i < tw_icon_left.length; i++) {
	tw_icon_left[i].addEventListener('mouseenter', function(i) {
		img_blue[i].style.display ="none";
		img_dark[i].style.display ="block";
	}.bind(null, i));
	}

	for (var i = 0; i < tw_icon_left.length; i++) {
	tw_icon_left[i].addEventListener('mouseleave', function(i) {
		img_blue[i].style.display ="block";
		img_dark[i].style.display ="none";
	}.bind(null, i));
	}

}


//mobile menu animation
var mob_c_courses = document.getElementsByClassName("mob_c_courses");
var submenu_div = document.getElementsByClassName("submenu_div-2");
var menu_clicked = 0;
for (var i = 0; i < mob_c_courses.length; i++) {
mob_c_courses[i].addEventListener('click', function(i) {
	if(menu_clicked==0){
		submenu_div[i].firstElementChild.style.display = "block";
		menu_clicked=1;
	}else {
		submenu_div[i].firstElementChild.style.display = "none";
		menu_clicked=0;
	}
}.bind(null, i));
}


	var $form = $('#mailchimp_form');
	if ( $form.length > 0 ) {
			$('#mailchimp_sub').bind('click', function ( event ) {
					if ( event ) event.preventDefault();
					// alert('btn_clicked');
					// var fail_not = document.getElementById('newsletter_fail');
					// fail_not.style.display="block"
					register($form);
			});
	}
	//
	function register($form) {
	    $.ajax({
	        type: $form.attr('method'),
	        url: $form.attr('action'),
	        data: $form.serialize(),
	        cache       : false,
	        dataType    : 'json',
	        contentType: "application/json; charset=utf-8",
					error       : function(err) { console.log("Could not connect to the registration server. Please try again later."); },

	        success     : function(data) {
						var fail_not = document.getElementById('newsletter_fail');
						var succ_not = document.getElementById('newsletter_success');

	            if (data.result != "success") {
								//construct error msg
								var error_message='Oops! Something went wrong while submitting the form.';
								if(data.msg=='0 - Please enter a value'){
									error_message = "Please enter a value";
								}else if (data.msg.includes('email address is invalid') || data.msg.includes('email address must contain') ) {
									error_message = "Please enter a valid email adress";
								}else if (data.msg.includes('already subscribed')) {
									error_message = "The user is already subscribed";
								}
	                fail_not.style.display="block";
									fail_not.innerHTML=error_message;
									succ_not.style.display="none";

	            } else {
								fail_not.style.display="none";
	              succ_not.style.display="block";
								succ_not.innerHTML=data.msg;


	            }
	        }
	    });
	}


// hide video overlay
var video_overlay = document.getElementsByClassName("video_p-2");

var hideOverlay = function() {
	for (var i = 0; i < video_overlay.length; i++) {
	    video_overlay[i].style.display="none";
	}

};

for (var i = 0; i < video_overlay.length; i++) {
    video_overlay[i].addEventListener('click', hideOverlay, false);
}

var tab_options = document.querySelectorAll(".tab_option");
var graphs = document.querySelectorAll(".graph");
var tab_options = document.querySelectorAll(".tab_option");
var graphs = document.querySelectorAll(".graph");
if(tab_options){
for (var i = 0, len = tab_options.length; i < len; i++)
{
		(function(index){
				tab_options[i].onclick = function(){
							for (var x = 0; x < tab_options.length; x++) {
								if (index != x){
									tab_options[x].classList.remove("active");
									graphs[x].classList.remove("active");
								}
							}
							tab_options[index].classList.add("active");
							graphs[index].classList.add("active");
				}
		})(i);
}
}
var $sticky = $('.sticky_sidebar');
var $stickyrStopper = $('.stopper');
if (!!$sticky.offset()) { // make sure ".sticky" element exists
	var generalSidebarHeight = $sticky.innerHeight();
	var stickyTop = $sticky.offset().top;
	var stickOffset = 0;
	var stickyStopperPosition = $stickyrStopper.offset().top;
	var stopPoint = stickyStopperPosition - generalSidebarHeight - stickOffset;
	var diff = stopPoint + stickOffset;
	$(window).scroll(function(){ // scroll event
		var windowTop = $(window).scrollTop(); // returns number
		if (stopPoint < windowTop) {
				$sticky.css({ position: 'absolute', top: diff });
		} else if (stickyTop < windowTop+stickOffset) {
				$sticky.css({ position: 'fixed', top: stickOffset });
		} else {
				$sticky.css({position: 'absolute', top: 'initial'});
		}
	});
}
});
</script>


<script>
var mobile_menu_btn = document.querySelector(".open_menu");
var close_menu_btn = document.querySelector(".close_mobile_menu.w-inline-block");
var mob_menu_wr = document.querySelector(".mob_menu_wr");
if(mobile_menu_btn){
mobile_menu_btn.addEventListener("click", function(){
	mob_menu_wr.style.display = "block";
});
}
if(close_menu_btn){
close_menu_btn.addEventListener("click", function(){
	mob_menu_wr.style.display = "none";
});
}
</script>


<noscript><style>.lazyload{display:none;}</style></noscript><script data-noptimize="1">window.lazySizesConfig=window.lazySizesConfig||{};window.lazySizesConfig.loadMode=1;</script><script async data-noptimize="1" src='https://ibleducation.com/wp-content/plugins/autoptimize/classes/external/js/lazysizes.min.js?ao_version=2.9.5.1'></script><script type='text/javascript' id='main-js-extra'>
/* <![CDATA[ */
var jsVars = {"templateUrl":"https:\/\/ibleducation.com\/wp-content\/themes\/ibl-web-ibleducation-theme"};
/* ]]> */
</script>
<script type='text/javascript' src='https://ibleducation.com/wp-content/themes/ibl-web-ibleducation-theme/js/webflow.js?ver=1.0.0' id='webflow-js'></script>
<script type='text/javascript' src='https://ibleducation.com/wp-includes/js/hoverIntent.min.js?ver=1.10.2' id='hoverIntent-js'></script>
<script type='text/javascript' src='https://ibleducation.com/wp-includes/js/dist/vendor/regenerator-runtime.min.js?ver=0.13.9' id='regenerator-runtime-js'></script>
<script type='text/javascript' src='https://ibleducation.com/wp-includes/js/dist/vendor/wp-polyfill.min.js?ver=3.15.0' id='wp-polyfill-js'></script>
<script type='text/javascript' src='https://ibleducation.com/wp-includes/js/dist/hooks.min.js?ver=c6d64f2cb8f5c6bb49caca37f8828ce3' id='wp-hooks-js'></script>
<script type='text/javascript' src='https://ibleducation.com/wp-includes/js/dist/i18n.min.js?ver=ebee46757c6a411e38fd079a7ac71d94' id='wp-i18n-js'></script>
<script type='text/javascript' id='wp-i18n-js-after'>
wp.i18n.setLocaleData( { 'text direction\u0004ltr': [ 'ltr' ] } );
wp.i18n.setLocaleData( { 'text direction\u0004ltr': [ 'ltr' ] } );
</script>