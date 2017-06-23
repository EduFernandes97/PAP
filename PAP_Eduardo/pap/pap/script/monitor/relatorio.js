//ALUNO

function atualiza_relatorio(){

	$.ajax({
		type: 'POST',
		url: '../php/monitor_php/atualiza_relatorio.php',
		data:{
            observacao_monitor: $('textarea[name=observacao_monitor]').val()
		}
	}).done(function(e){
        console.info(e);
		alert("Registo atualizado");
		$('#conteudo').load("../monitor/relatorio.php");
		
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
        $("#conteudo").load("../monitor/relatorio.php");
        verif_link();
    });
}