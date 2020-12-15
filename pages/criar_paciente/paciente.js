window.onload = function () {
  document.forms.formPaciente.onsubmit = validaForm;

  const fechar = document.getElementById("fechar");
  if (fechar) 
    fechar.addEventListener("click", fecharAlerta);
  
  const cep = document.getElementById("inputCep");
  cep.addEventListener("change", (e) => buscaEndereco(cep.value));
}

function buscaEndereco(cep) {
  if (cep.length != 9) {
    return;
  }
  const form = document.forms[1];

  const xmlhttp = new XMLHttpRequest();
  const url = `carregarEndereco.php?cep=${cep}`;
  xmlhttp.open("GET", url, true);

  xmlhttp.onload = function () {
    if (xmlhttp.status == 200) {
      if (xmlhttp.responseText != "") {
        try {
          const { logradouro, bairro, cidade, estado } = JSON.parse(xmlhttp.responseText);
          
          form.inputLogradouro.value = logradouro
          form.inputBairro.value = bairro;
          form.inputCidade.value = cidade;
          form.inputEstado.value = estado;
        } catch (e) {
          alert("A string retornada não é um JSON válido: " + xmlhttp.responseText);
        }
      }
    } else 
      alert("Ocorreu um erro ao processar a requisição");
    
  }

  xmlhttp.onerror = function () {
    alert("Ocorreu um erro ao processar a requisição");
  };

  xmlhttp.send();
}
function fecharAlerta() {
  document.getElementById('alerta').remove();
}

function validaCampo(valor, validador) {
  if (! valor.length) {
    return "campo obrigatório";
  } else if (validador && ! validador.test(valor)) {
    return "formato inválido";
  } else 
    return "";
}

function validaForm(e) {
  let form = e.target; 
  const spanNome = form.inputNome.nextElementSibling;
  const spanEmail = form.inputEmail.nextElementSibling;
  const spanTelefone = form.inputTelefone.nextElementSibling;
  const spanCep = form.inputCep.nextElementSibling;
  const spanLogradouro = form.inputLogradouro.nextElementSibling;
  const spanBairro = form.inputBairro.nextElementSibling;
  const spanCidade = form.inputCidade.nextElementSibling;

  const spanPeso = form.inputPeso.nextElementSibling;
  const spanAltura = form.inputAltura.nextElementSibling;

  // regex para validar entrada
  const telefone = /\(\d{2}\)\d{4,5}-?\d{4}/;
  const cep = /\d{5}-\d{3}/;
  const soLetras = /[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$/;

  // validação
  spanNome.textContent = validaCampo(form.inputNome.value, soLetras);
  spanEmail.textContent = validaCampo(form.inputEmail.value);
  spanTelefone.textContent = validaCampo(form.inputTelefone.value, telefone);

  spanCep.textContent = validaCampo(form.inputCep.value, cep);
  if (! spanCep.textContent && form.inputCep.value.length != 9) 
    spanCep.textContent = "formato inválido";
  
  spanLogradouro.textContent = validaCampo(form.inputLogradouro.value);
  spanBairro.textContent = validaCampo(form.inputBairro.value, soLetras);
  spanCidade.textContent = validaCampo(form.inputCidade.value, soLetras);
  spanPeso.textContent = validaCampo(form.inputPeso.value);
  spanAltura.textContent = validaCampo(form.inputAltura.value);

  return(! spanNome.textContent && ! spanEmail.textContent && ! spanTelefone.textContent && ! spanCep.textContent && ! spanLogradouro.textContent && ! spanBairro.textContent && ! spanCidade.textContent && ! spanPeso.textContent && ! spanAltura.textContent);
}
