//ALUNO

function atualiza_av() {
    var values = [];
    $("input[name^='nota']").each(function () {
        var value = $(this).val();
        var key = $(this).attr("name").replace('nota', '');
        var obj = {};
        obj[key] = value;
        values.push(obj);
    });

    $.ajax({
        type: 'POST',
        url: '../php/aluno_php/atualiza_av.php',
        data: {
            nota: values,
            obs_aluno: $('textarea[name=obs_aluno]').val()
        }
    }).done(function (e) {
        console.log(e);
        alert("Registo atualizado");
        $('#conteudo').load("../aluno/av.php");

    });

}

function insere_av() {

    var values = [];
    $("input[name^='nota']").each(function () {
        var value = $(this).val();
        var key = $(this).attr("name").replace('nota', '');
        var obj = {};
        obj[key] = value;
        values.push(obj);
    });

    $.ajax({
        type: 'POST',
        url: '../php/aluno_php/insere_av.php',
        data: {
            nota: values,
            obs_aluno: $('textarea[name=obs_aluno]').val()
        }
    }).done(function (e) {
        console.log(e);
        alert("Registo atualizado");
        $('#conteudo').load("../aluno/av.php");

    });
}

