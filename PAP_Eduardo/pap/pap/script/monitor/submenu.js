$(document).ready(function() {
	$('li.menu_sub' ).mouseover(function() {
		var child = $(this).closest('li').children('ul');
		var posicao = $(this).offset();
		$('#down').html($(child).html());
		$('#down').css("display","block");
		var pos_top=posicao.top+49;
		var pos_left=posicao.left+7;
		$( "#down" ).offset({ top: pos_top, left: pos_left });
		
		$('li:not(.menu_sub)').mouseover(function() {
			var className = $(this).attr('class');
			if(!(className == 'sub')) $('#down').css("display","none");
		});
		$('#conteudo, #cabeca').mouseover(function() {
			$('#down').css("display","none");
		});

	});
});