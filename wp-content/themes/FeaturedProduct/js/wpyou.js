// SubNavigation
$(function() {
	$(".navi li").hover(function(){
		$(this).find('ul:first').css({visibility: "visible",display: "block"});
	},function(){
		$(this).find('ul:first').css({visibility: "hidden"});
	});
});
// Menu First
$(function() {
	$("ul.navibar li.current-menu-item a:first").addClass("arrow");
	$(".picList li:last").addClass("nb");
	$(".footpage li:first").addClass("nb");
});
// SearchForm
$(document).ready(function(){				   
	$('.searchInput').focus(
		function() {
			if($(this).val() == '输入关键字') {
				$(this).val('').css({color:"#333"});
			}
		}
	).blur(
		function(){
			if($(this).val() == '') {
				$(this).val('输入关键字').css({color:"#777"});
			}
		}
	);
});
// Slideshow
$(function(){
	$('#slideshow').bxSlider({
		mode: 'fade',
		controls: false, 
		auto: true,
		speed: 800,
		pause: 5000,
		pager: true
	});
});