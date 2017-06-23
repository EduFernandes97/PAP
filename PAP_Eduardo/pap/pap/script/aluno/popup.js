$(document).ready(function() {
	//popup
	
	var h = window.innerHeight;
	$('.popupConteudo').css("height",h-100);
	$( window ).resize(function() {
		h = window.innerHeight;
		$('.popupConteudo').css("height",h-100);
	});
	$('#popup').click(function() {
		$('#popup').css('display','none');
		$('html').css('overflow','auto');
	});
	$('.popupConteudo').click(function(e) {
		e.stopPropagation();
	});
});
function popup_visible(id) {
	var e = document.getElementById("popup");
	if (e.style.display == "block"){
		e.style.display = "none";
		$('html').css('overflow','auto');
		
	}
	else{

        $('.popupConteudo').load('popup/'+id);

		e.style.display = "block";
		$('html').css('overflow','hidden');
		
	}
	
}