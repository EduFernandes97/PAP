//ALUNO
var conf_roteiro=1;
function atualiza_roteiro(cod_roteiro, num_roteiro){
	$.ajax({
		type: 'POST',
		url: '../php/aluno_php/atualiza_roteiro.php',
		data:{
			cod_roteiro : cod_roteiro,
			atividade: $('textarea[name=atividade'+num_roteiro+']').val(),
			obs: $('textarea[name=obs'+num_roteiro+']').val()
		}
	}).done(function(e){
		alert("Registo atualizado");
		conf_roteiro=1;
		$('#conteudo').load("../aluno/roteiro.php");
		
	})
}

function apaga_roteiro(cod_roteiro){
	$.ajax({
		type: 'POST',
		url: '../php/aluno_php/apaga_roteiro.php',
		data:{
			cod_roteiro : cod_roteiro
		}
	}).done(function(e){
		alert("Registo apagado");
		conf_roteiro=1;
		$('#conteudo').load("../aluno/roteiro.php");
		
	})
}

function novo_roteiro(x){
	
	
	$.ajax({
		type: 'POST',
		url: '../php/aluno_php/novo_roteiro.php',
		data:{
			atividade: $('textarea[name=atividade'+x+']').val(),
			obs: $('textarea[name=obs'+x+']').val()
		}
	}).done(function(e){
		alert("Registo adicionado");
		conf_roteiro=1;
		$('#conteudo').load("../aluno/roteiro.php");
	})
}

function mostra_edita(num_roteiro){
	$('.edita_roteiro'+num_roteiro).css("display","block");
}
function plus_roteiro(z){
	if (conf_roteiro==0){
		alert("Confirme o registo anterior");
		return;
	}

	var table = document.getElementById("tab_roteiro");
	var row = table.insertRow( Math.floor(table.rows.length-1));
	var cell1 = row.insertCell(0);
	var cell2 = row.insertCell(0);
	var cell3 = row.insertCell(0);
	var cell4 = row.insertCell(0);
	var x=z+1;
	cell4.innerHTML = x;
	cell3.innerHTML = "<textarea style='height:100px;width:633px;' onkeypress='mostra_edita("+x+")' name='atividade"+x+"'></textarea>";
	cell2.innerHTML = "<textarea style='height:100px;' onkeypress='mostra_edita("+x+")' name='obs"+x+"'></textarea>";
	cell1.innerHTML = "<input type='image' src='../img/sim.png' onclick='novo_roteiro("+x+");return false;' style='display: block;'>";
	conf_roteiro=0;
}