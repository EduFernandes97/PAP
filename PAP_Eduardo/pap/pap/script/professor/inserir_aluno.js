function troca_prof(){
	if ($('select[name="prof"]').val() != '0'){
		$('#prof_table').hide();
	}
	else 
		$('#prof_table').show();
	
}
function troca_entidade(){
	if ($('select[name="entidade"]').val() != '0'){
		$('#entidade_table').hide();
		$('#novo_monitor').show();
		$('select[name="monitor"]').show();
		$('input[name="email_entidade"]').val('');

        $.ajax({
            type: 'POST',
            url: '../php/professor_php/muda_entidade.php',
            data:{
                nif: $('select[name="entidade"]').val()
            }
        }).done(function(e){
            console.info(e);
            $('#monitor_select').load("../php/professor_php/monitor_select.php");
        })
	}
	else {
		$('#entidade_table').show();
		$('select[name="monitor"]').hide();
		$('#monitor_table').show();
	}
}

function troca_monitor(){
	if ($('select[name="monitor"]').val() != '0'){
		$('#monitor_table').hide();
        $('input[name=email_monitor]').val('');
		
	}
	else {
		$('#monitor_table').show();
		
	}
	
}


function novo_aluno(curso){
	var novo_monitor = 0;
	var novo_prof= 0;
	var novo_entidade= 0;

	if ($('select[name="monitor"]').val() == '0')
		novo_monitor = 1;
	if ($('select[name="entidade"]').val() == '0')
		novo_entidade = 1;
	if ($('select[name="prof"]').val() == '0')
		novo_prof = 1;

	$.ajax({
		type: 'POST',
		url: '../php/professor_php/novo_aluno.php',
		data:{
			novo_monitor: novo_monitor,
			novo_entidade: novo_entidade,
			novo_prof: novo_prof,
			num_processo: $('input[name=num_processo]').val(),
			curso: curso,
			nome_aluno: $('input[name=nome_aluno]').val(),
			ano: $('select[name=ano]').val(),
			turma: $('input[name=turma]').val(),
			morada_aluno: $('input[name=morada_aluno]').val(),
			codigo_postal_aluno: $('input[name=codigo_postal_aluno]').val(),
			bi_cc_aluno: $('input[name=bi_cc_aluno]').val(),
			arquivo_aluno: $('input[name=arquivo_aluno]').val(),
			validade_aluno: $('input[name=validade_aluno]').val(),
			contato_aluno: $('input[name=contato_aluno]').val(),
			email_aluno: $('input[name=email_aluno]').val(),
			
			nome_ee: $('input[name=nome_ee]').val(),
			grau: $('input[name=grau]').val(),
			morada_ee: $('input[name=morada_ee]').val(),
			codigo_postal_ee: $('input[name=codigo_postal_ee]').val(),
			contato_ee: $('input[name=contato_ee]').val(),
			email_ee: $('input[name=email_ee]').val(),
			
			prof: $('select[name=prof]').val(),
			nome_prof: $('input[name=nome_prof]').val(),
			contato_prof: $('input[name=contato_prof]').val(),
			email_prof: $('input[name=email_prof]').val(),
			
			entidade: $('select[name=entidade]').val(),
			denominacao: $('input[name=denominacao]').val(),
			nif: $('input[name=nif]').val(),
			morada_entidade: $('input[name=morada_entidade]').val(),
			codigo_postal_entidade: $('input[name=codigo_postal_entidade]').val(),
			contato_entidade: $('input[name=contato_entidade]').val(),
			email_entidade: $('input[name=email_entidade]').val(),
			natureza: $('input[name=natureza]').val(),
			tipo_entidade: $('input[name=tipo_entidade]').val(),
			atividade_entidade: $('input[name=atividade_entidade]').val(),
			cae_entidade: $('input[name=cae_entidade]').val(),
			
			monitor: $('select[name=monitor]').val(),
			nome_monitor: $('input[name=nome_monitor]').val(),
			contato_monitor: $('input[name=contato_monitor]').val(),
			email_monitor: $('input[name=email_monitor]').val(),
			cargo_monitor: $('input[name=cargo_monitor]').val()
		}
	}).done(function(e){
		console.info(e);
		alert("Registo adicionado");
		//$('#conteudo').load("../aluno/plano_estagio.php");
		
	})
}


