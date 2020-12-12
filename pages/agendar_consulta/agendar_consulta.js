window.onload = function () {
    const select_especialidade = document.getElementById("especialidade");
    select_especialidade.addEventListener('change', carregarMedicos);
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

}