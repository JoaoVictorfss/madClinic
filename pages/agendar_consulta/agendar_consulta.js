window.onload = function () {
    const select_especialidade = document.getElementById("especialidade");
    const select_data = document.getElementById("data_agendamento");
    const select_medico = document.getElementById("medico");
    select_especialidade.addEventListener('change', carregarMedicos);
    select_data.addEventListener('change', carregarHorarios);
    select_medico.addEventListener('change', resetDate);

    document.forms.formConsulta.onsubmit = validaForm;
    const fechar = document.getElementById("fechar");
    fechar.addEventListener("click", fecharAlerta);
}

function fecharAlerta() {
    document.getElementById('alerta').remove();
}

function validaCampo(valor, validador) {
    if (!valor.length) {
        return "campo obrigatório";
    } else if (validador && !validador.test(valor)) {
        return "formato inválido";
    } else return "";
}

function validaForm(e) {
    let form = e.target; // Dá acesso ao botão disparado

    const spanNome = form.nome.nextElementSibling;
    const spanEmail = form.email.nextElementSibling;
    const spanTelefone = form.telefone.nextElementSibling;


    // regex para validar entrada
    const telefone = /\(\d{2}\)\d{4,5}-?\d{4}/;
    const soLetras = /[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$/;

    //validação 
    spanNome.textContent = validaCampo(form.nome.value, soLetras);
    spanEmail.textContent = validaCampo(form.email.value);
    spanTelefone.textContent = validaCampo(form.telefone.value, telefone);

    return (!spanNome.textContent && !spanEmail.textContent && !spanTelefone.textContent);
}

function resetDate() {
    document.getElementById("data_agendamento").value = "";
    document.getElementById("hora").innerHTML = "";
}

function carregarMedicos(e) {
    var xmlhttp = new XMLHttpRequest();
    var url = "carregarMedicos.php?especialidade=" + e.target.value;
    xmlhttp.open("GET", url, true);

    xmlhttp.onload = function () {
        if (xmlhttp.status == 200)
            document.getElementById("medico").innerHTML = xmlhttp.responseText;
        else
            alert("Ocorreu um erro ao processar a requisição");
    }

    xmlhttp.onerror = function () {
        alert("Ocorreu um erro ao processar a requisição");
    };

    xmlhttp.send();
    resetDate();
}

function carregarHorarios(e) {
    const select_medico = document.getElementById("medico").value;

    var xmlhttp = new XMLHttpRequest();
    var url = "carregarHorarios.php?codigo_medico=" + select_medico + "&" + "data_agendamento=" + e.target.value;
    xmlhttp.open("GET", url, true);

    xmlhttp.onload = function () {
        if (xmlhttp.status == 200)
            document.getElementById("hora").innerHTML = xmlhttp.responseText;
        else
            alert("Ocorreu um erro ao processar a requisição");
    }

    xmlhttp.onerror = function () {
        alert("Ocorreu um erro ao processar a requisição");
    };

    xmlhttp.send();

}