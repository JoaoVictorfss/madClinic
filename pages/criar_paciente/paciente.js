window.onload = function () {
  document.forms.formPaciente.onsubmit = validaForm;

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

  //validação 
  spanNome.textContent = validaCampo(form.inputNome.value, soLetras);
  spanEmail.textContent = validaCampo(form.inputEmail.value);
  spanTelefone.textContent = validaCampo(form.inputTelefone.value, telefone);
  spanCep.textContent = validaCampo(form.inputCep.value, cep);
  spanLogradouro.textContent = validaCampo(form.inputLogradouro.value, soLetras);
  spanBairro.textContent = validaCampo(form.inputBairro.value, soLetras);
  spanCidade.textContent = validaCampo(form.inputCidade.value, soLetras);
  spanPeso.textContent = validaCampo(form.inputPeso.value);
  spanAltura.textContent = validaCampo(form.inputAltura.value);

  return (
    !spanNome.textContent && !spanEmail.textContent && !spanTelefone.textContent && !spanCep.textContent && !spanLogradouro.textContent
    && !spanBairro.textContent && !spanCidade.textContent && !spanPeso.textContent && !spanAltura.textContent 
  );
}