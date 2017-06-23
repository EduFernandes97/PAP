
function insere_nova_av(num_obj){
	$.ajax({
		type: 'POST',
		url: '../php/professor_php/nova_av.php',
		data:{
            num_obj: num_obj,
            objetivo: $('input[name=objetivo]').val(),
            dominio: $('select[name=dominio]').val()
		}
	}).done(function(e){
		console.info(e);
		alert("Registo adicionado");
		$('#conteudo').load("../professor/inserir_av.php");
		
	})
}



function apaga_av(num_obj){
    $.ajax({
        type: 'POST',
        url: '../php/professor_php/apaga_av.php',
        data:{
            num_obj: num_obj
        }
    }).done(function(e){
        console.info(e);
        alert("Registo adicionado");
        $('#conteudo').load("../professor/inserir_av.php");

    })
}
