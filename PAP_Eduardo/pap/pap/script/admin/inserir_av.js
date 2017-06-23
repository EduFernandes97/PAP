
function insere_nova_av(num_obj){
	$.ajax({
		type: 'POST',
		url: '../php/admin_php/nova_av.php',
		data:{
            num_obj: num_obj,
            objetivo: $('input[name=objetivo]').val(),
            dominio: $('select[name=dominio]').val(),
            curso: $('select[name=curso]').val()

        }
	}).done(function(e){
		console.info(e);
		alert("Registo adicionado");
		$('#conteudo').load("../admin/inserir_av.php");
		
	})
}



function apaga_av(num_obj){
    $.ajax({
        type: 'POST',
        url: '../php/admin_php/apaga_av.php',
        data:{
            num_obj: num_obj
        }
    }).done(function(e){
        console.info(e);
        alert("Registo adicionado");
        $('#conteudo').load("../admin/inserir_av.php");

    })
}

function muda_curso(){
    $.ajax({
        type: 'POST',
        url: '../php/admin_php/muda_turma.php',
        data:{
            curso: $('select[name=curso]').val()
        }
    }).done(function(e){
        $("#conteudo").load("../admin/inserir_av.php");
        verif_link();

    });
}

function muda_ano(){
    $.ajax({
        type: 'POST',
        url: '../php/admin_php/muda_ano.php'
    }).done(function(e){
        $("#conteudo").load("../admin/mudar_anoletivo.php");
        verif_link();

    });
}
