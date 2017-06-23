function inserir_prof(){
	$.ajax({
		type: 'POST',
		url: '../php/admin_php/inserir_prof.php',
		data:{
			nome: $('input[name=nome]').val(),
            contato: $('input[name=contato]').val(),
            email: $('input[name=email]').val(),
            cursos11: $('select[name=cursos11]').val(),
            cursos12: $('select[name=cursos12]').val(),
            turma: $('select[name=turma]').val(),
			dir_curso: $(".dir:checked").val()
		}
	}).done(function(e){
		console.info(e);
		alert("Registo adicionado");
	})
}

function muda_turma_np(){
    if ($(".dir:checked").val()=='s') {
        if ($('#turma_np').val() == '12') {
            $('#cursos11').css("display", "none");
            $('#cursos12').css("display", "");
        }
        if ($('#turma_np').val() == '11') {
            $('#cursos12').css("display", "none");
            $('#cursos11').css("display", "");
        }
    }
}

function op_dir_curso(op){
    if (op == 's'){
        $('#tr_curso').css( "display", "" );
    }
    if (op == 'n'){
        $('#tr_curso').css( "display", "none" );


    }


}


