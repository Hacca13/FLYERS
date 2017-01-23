$(document).ready(function(e){
    $('.search-panel .dropdown-menu').find('a').click(function(e) {
    	e.preventDefault();
		var param = $(this).text();
		var concept = $(this).text();
		$('.search-panel span#search_concept').text(concept);
		$('.input-group #search_param').val(param);
	});
});