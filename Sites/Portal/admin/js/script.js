$(document).ready(function() {

	//Content boxes expand/collapse
	$(".initial-expand").hide();

	$("div.content-module-heading").click(function(){
		$(this).next("div.content-module-main").slideToggle();

		$(this).children(".expand-collapse-text").toggle();
	});
	
	$( "#main_download_datetime" ).datepicker({
		inline:true,
		showOtherMonths:true,
		changeMonth: true,
		dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
		dateFormat:"yy-mm-dd",
		onClose: function( selectedDate ) {
			$( "#main_download_datetime" ).datepicker( "option", "minDate", selectedDate );
		}
	});
	
});