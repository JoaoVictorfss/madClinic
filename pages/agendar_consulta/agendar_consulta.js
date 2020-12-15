window.onload = function () {
    const select_especialidade = document.getElementById("especialidade");
    const select_data = document.getElementById("data_agendamento");
    const select_medico = document.getElementById("medico");
    select_especialidade.addEventListener('change', carregarMedicos);
    select_data.addEventListener('change', carregarHorarios);
    select_medico.addEventListener('change', resetDate);

    document.forms.formConsulta.onsubmit = validaForm;
    const fechar = document.getElementById("fechar");
    if(fechar) fechar.addEventListener("click", fecharAlerta);
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
    const select = document.getElementById("medico");
    select.innerHTML = "";

    const xmlhttp = new XMLHttpRequest();
    const url = "carregarMedicos.php?especialidade=" + e.target.value;
    xmlhttp.open("GET", url, true);

    xmlhttp.onload = function () {
        if (xmlhttp.status == 200) {
            if (xmlhttp.responseText != "") {
                try {
                    const medicos = JSON.parse(xmlhttp.responseText);
                    for (let i = 0; i < medicos.nome.length; i++) {
                        const option = document.createElement("option");
                        option.textContent = medicos.nome[i];
                        option.value = medicos.codigo[i];
                        select.appendChild(option);
                    }
                } catch (e) {
                    alert("A string retornada não é um JSON válido: " + xmlhttp.responseText);
                }
            } else {
                alert("Não foram encontrados médicos com essa especialidade");
            }
        } else
            alert("Ocorreu um erro ao processar a requisição");
    }

    xmlhttp.onerror = function () {
        alert("Ocorreu um erro ao processar a requisição");
    };

    xmlhttp.send();
    resetDate();
}

function carregarHorarios(e) {
    const select = document.getElementById("hora");
    select.innerHTML = "";

    const select_medico = document.getElementById("medico").value;

    const xmlhttp = new XMLHttpRequest();
    const url = "carregarHorarios.php?codigo_medico=" + select_medico + "&" + "data_agendamento=" + e.target.value;
    xmlhttp.open("GET", url, true);

    xmlhttp.onload = function () {
        if (xmlhttp.status == 200) {
            if (xmlhttp.responseText != "") {
                const horarios = JSON.parse(xmlhttp.responseText);
                for (let i = 0; i < horarios.hora.length; i++) {
                    const option = document.createElement("option");
                    option.textContent = horarios.hora[i];
                    option.value = horarios.value[i];
                    select.appendChild(option);
                }

            } else {
                alert("Não foram encontrados horários disponíveis")
            }
        } else
            alert("Ocorreu um erro ao processar a requisição");
    }

    xmlhttp.onerror = function () {
        alert("Ocorreu um erro ao processar a requisição");
    };

    xmlhttp.send();

}