//ALUNO

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
        $("#conteudo").load("../aluno/relatorio.php");
        verif_link();
    });
}

function validate_semana(){
    var data = new Date($('#data_semana_1').val());
    data.setDate(data.getDate() + 7);

    var dd = data.getDate();
    var mm = data.getMonth()+1; //January is 0!

    var yyyy = data.getFullYear();
    if(dd<10){
        dd='0'+dd
    }
    if(mm<10){
        mm='0'+mm
    }
    var prox = yyyy+'-'+mm+'-'+dd;

    $('#data_semana_2').val(prox);
    $('#data_semana_2').attr({ "min": $('#data_semana_1').val() });

}