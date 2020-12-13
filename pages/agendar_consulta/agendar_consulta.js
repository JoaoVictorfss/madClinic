window.onload = function () {
    const select_especialidade = document.getElementById("especialidade");
    const select_data = document.getElementById("data_agendamento");
    const select_medico = document.getElementById("medico");
    select_especialidade.addEventListener('change', carregarMedicos);
    select_data.addEventListener('change', carregarHorarios);
    select_medico.addEventListener('change', resetDate);
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