$(document).ready(function() {	
	$("ul#topnav li").hover(function() { //Hover over event on list item
		$(this).css({ 'background' : '#E1E9EF'}); //Add background color + image on hovered list item
		$(this).find("span").show(); //Show the subnav
	} , function() { //on hover out...
		$(this).css({ 'background' : 'none'}); //Ditch the background
		$(this).find("span").hide(); //Hide the subnav
	});
	
	$('ul.nav-title li:not(:last-child)').addClass('ic-nav-title');	
});

function login_form_keypress(e) {
	if (e.keyCode == 13) {
		document.getElementById("login-form").submit();
	}
}