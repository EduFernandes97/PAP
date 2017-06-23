//prof

function atualiza_relatorio(){
	$.ajax({
		type: 'POST',
		url: '../php/aluno_php/atualiza_relatorio.php',
		data:{
			data_semana1: $('input[name=data_semana1]').val(),
			data_semana2: $('input[name=data_semana2]').val(),
			hora1: $('input[name=hora1]').val(),
			hora2: $('input[name=hora2]').val(),
			atividade_desenvolvida: $('textarea[name=atividade_desenvolvida]').val(),
			observacao_aluno: $('textarea[name=observacao_aluno]').val()
		}
	}).done(function(e){
		alert("Registo atualizado");
		$('#conteudo').load("../aluno/relatorio.php");
		
	})
}



function muda_semana(){
    $.ajax({
        type: 'POST',
        url: '../php/aluno_php/muda_semana.php',
        data:{
            num_semana: $( "#muda_semana" ).val()
        }
    }).done(function(e){
        $("#conteudo").load("../professor/relatorio.php");
        verif_link();

    });
}