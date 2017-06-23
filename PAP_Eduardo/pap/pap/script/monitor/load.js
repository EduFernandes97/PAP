//MONITOR
$(document).ready(function() {
	$('#conteudo').load("../monitor/plano_estagio.php");
	$('#plano_estagio').addClass("active");
	verif_link();
    setInterval("verif_link()",250);
});

var ult_url="";

function verif_link(hash)
{

    if(!hash) hash=window.location.hash;
	if (hash==""){}
    if(hash != ult_url)	// se a pagina muda
    {
		$("#plano_estagio").removeClass('active'); //desativa do menu a 1ª pagina
		remove_class=ult_url.replace('#','');
		remove_class=ult_url.replace('.php','');
		$(remove_class).removeClass('active');//remover activo do menu anterior



        ult_url=hash;	//atualiza o ultimo url
        loadPage(hash);	// chama a funcao load e envia o hash
    }
}
function loadPage(url)
{
	url=url.replace('#','');
    url_class=url.replace('.php','');
	document.cookie="pag="+url_class;
	$('#'+url_class).addClass('active');//ativar o menu atual
    $.ajax({
        type: "POST",
        url: "../php/monitor_php/verif_link_monitor.php",
        data: 'page='+url,
        dataType: "html",
        success: function(msg){

            if(parseInt(msg)!=0)
            {


                $( "#conteudo" ).slideUp( "fast", function(){
                    $('#conteudo').load(msg, function(){
                        $( "#conteudo" ).slideDown(1000);
                        confirm = 0; // variavel do registo de presencas
                        conf_roteiro = 1; // variavel do roteiro
                    });
                } );

            }
        }

    });

}

function muda_aluno(){
	$.ajax({
		type: 'POST',
		url: '../php/monitor_php/muda_aluno.php',
		data:{
			cod_aluno: $( "#muda_aluno" ).val()
		}
	}).done(function(e){
        $("body").load("../pag/monitor.php");
        verif_link();

	});
}
