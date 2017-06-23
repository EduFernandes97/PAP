//MONITOR
var confirm = 0;

function plus_img(cod_presenca, data, horas, ass_aluno, ass_monitor, obs, table){
	
	var table = document.getElementById("reg_pre_"+table);
	var row = table.insertRow( Math.floor(table.rows.length) );
	if (!(ass_monitor=="0" || ass_monitor=="1")){
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
		if (ass_monitor=="0") cell4.innerHTML = "O monitor não aceitou o registo.";
		else if (ass_monitor=="1") cell4.innerHTML = "O monitor aceitou o registo.";
		else cell4.innerHTML = ass_monitor;
		cell3.innerHTML = obs;
		cell2.innerHTML = "<input type='image' src='../img/sim.png' width='15' height='15' onclick='conf_presenca("+cod_presenca+");return false;'>";
		cell1.innerHTML = "<input type='image' src='../img/nao.png' width='15' height='15' onclick='nao_conf_presenca("+cod_presenca+");return false;'>";
		cell2.style.textAlign = "center";
		cell1.style.textAlign = "center";	
	}else {
		var cell1 = row.insertCell(0);
		var cell2 = row.insertCell(0);
		var cell3 = row.insertCell(0);
		var cell4 = row.insertCell(0);
		var cell5 = row.insertCell(0);
		
		cell5.innerHTML = data;
		cell4.innerHTML = horas;
		cell3.innerHTML = ass_aluno;
		if (ass_monitor=="0") cell2.innerHTML = "O monitor não aceitou o registo.";
		else if (ass_monitor=="1") cell2.innerHTML = "O monitor aceitou o registo.";
		else cell2.innerHTML = ass_monitor;
		cell1.innerHTML = obs;
	}


	
	return false;
}

function conf_presenca(cod_presenca){
	$.ajax({
		type: 'POST',
		url: '../php/monitor_php/conf_presenca.php',
		data:{
			cod_presenca: cod_presenca
		}
	}).done(function(e){
		alert("Presença aceite");
		$('#conteudo').load("../monitor/registo_presencas.php");
	})
}

function nao_conf_presenca(cod_presenca){
	$.ajax({
		type: 'POST',
		url: '../php/monitor_php/nao_conf_presenca.php',
		data:{
			cod_presenca: cod_presenca
		}
	}).done(function(e){
		alert("Presença não aceite");
		$('#conteudo').load("../monitor/registo_presencas.php");
	})
	
}

function confirmacao_delete(){
	var row = document.getElementById("linha1");
	row.deleteCell(4);
}function muda_mes(){
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