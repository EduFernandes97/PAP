//ALUNO
var confirm = 0;

function plus_img(verif,cod_presenca,nome_aluno, data, horas, ass_aluno, ass_monitor, obs, edit, table){
	
	if (verif==0){ //se for 0 é para adicionar dados da bd
		
		var table = document.getElementById("reg_pre_"+table);
		var row = table.insertRow( Math.floor(table.rows.length) );
		var cell1 = row.insertCell(0);
		var cell2 = row.insertCell(0);
		var cell3 = row.insertCell(0);
		var cell4 = row.insertCell(0);
		var cell5 = row.insertCell(0);
		var cell6 = row.insertCell(0);
		var cell7 = row.insertCell(0);
		
		cell7.innerHTML = data;
		cell6.innerHTML = horas;
		cell5.innerHTML = ass_aluno;
		cell4.innerHTML = ass_monitor;
		cell3.innerHTML = obs;

		cell1.className = "no_border";
		cell2.className = "no_border";
	}

	if (confirm==1 && verif != 3) alert("Confirme a presença antes de criar uma nova."); //se clicou no + e nao confirmou
	
	if (verif==3){ // se confirmou
		confirm=0;
	}
}

function nova_presenca(){
	
	$.ajax({
		type: 'POST',
		url: '../php/aluno_php/nova_presenca.php',
		data:{
			aluno: $('input[name=nome_aluno]').val(),
			data: $('input[name=data_presen]').val(),
			hora: $('input[name=hora_presen]').val(),
			obser: $('textarea[name=obs_presen]').val()
		}
	}).done(function(e){
		alert("Registo adicionado");
		$('#conteudo').load("../aluno/registo_presencas.php");
		
	})
}


function edita_presenca(cod_presenca){
	var horas = prompt("Insira o numero de horas");
	if (horas=="" || horas==null) return false;
	$.ajax({
		type: 'POST',
		url: '../php/aluno_php/edita_presenca.php',
		data:{
			cod_presenca: cod_presenca,
			horas: horas
		}
	}).done(function(e){
		alert("Registo editado");
		$('#conteudo').load("../aluno/registo_presencas.php");
	})
	return false;

}

function apaga_presenca(cod_presenca){	

    if (true) {
		   $.ajax({
			type: 'POST',
			url: '../php/aluno_php/apaga_presenca.php',
			data:{
				cod_presenca: cod_presenca,
			}
		}).done(function(e){
			alert("Registo apagado");
			$('#conteudo').load("../aluno/registo_presencas.php");
		})
    } else {
        return false;
    }
	
}

function apaga_coluna(){
	var row = document.getElementById("linha1");
	row.deleteCell(4);
}
function muda_mes(){
    $('table[id^=reg_pre_]').hide();

    $("#reg_pre_"+$('select[name=mes]').val()).show();
    $('#mes_sele').text($('select[name=mes]  option:selected').text());

}

function add_select(sel, val, tex){
    $('select[name=mes]').append($('<option>', {
        value: val,
        text: tex
    }));
    if (sel == 1){
        $('select[name=mes]').val(val);
        $('#mes_sele').text(tex);
    }

}