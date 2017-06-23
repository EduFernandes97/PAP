//ALUNO

function atualiza_plano(cod_plano){
	
	$.ajax({
		type: 'POST',
		url: '../php/aluno_php/atualiza_plano.php',
		data:{
			cod_plano : cod_plano,
			duracao_estagio: $('input[name=duracao_estagio]').val(),
			dias_semana: $('input[name=dias_semana]').val(),
			periodo_estagio1: $('input[name=periodo_estagio1]').val(),
			periodo_estagio2: $('input[name=periodo_estagio2]').val(),
			horario_diario11: $('input[name=horario_diario11]').val(),
			horario_diario12: $('input[name=horario_diario12]').val(),
			horario_diario21: $('input[name=horario_diario21]').val(),
			horario_diario22: $('input[name=horario_diario22]').val(),
			num_visitas: $('input[name=num_visitas]').val(),
			num_visitas_escola: $('input[name=num_visitas_escola]').val(),
			num_visitas_estagio: $('input[name=num_visitas_estagio]').val(),
			objetivos: $('textarea[name=objetivos]').val(),
			conteudos: $('textarea[name=conteudos]').val()
		}
	}).done(function(e){
		alert("Registo atualizado");
		$('#conteudo').load("../aluno/plano_estagio.php");
		
	})
}

function novo_plano(){
	$.ajax({
		type: 'POST',
		url: '../php/aluno_php/novo_plano.php',
		data:{
			duracao_estagio: $('input[name=duracao_estagio]').val(),
			dias_semana: $('input[name=dias_semana]').val(),
			periodo_estagio1: $('input[name=periodo_estagio1]').val(),
			periodo_estagio2: $('input[name=periodo_estagio2]').val(),
			horario_diario11: $('input[name=horario_diario11]').val(),
			horario_diario12: $('input[name=horario_diario12]').val(),
			horario_diario21: $('input[name=horario_diario21]').val(),
			horario_diario22: $('input[name=horario_diario22]').val(),
			num_visitas: $('input[name=num_visitas]').val(),
			num_visitas_escola: $('input[name=num_visitas_escola]').val(),
			num_visitas_estagio: $('input[name=num_visitas_estagio]').val(),
			objetivos: $('textarea[name=objetivos]').val(),
			conteudos: $('textarea[name=conteudos]').val()
		}
	}).done(function(e){
		alert("Registo adicionado");
		$('#conteudo').load("../aluno/plano_estagio.php");
		
	})
}


