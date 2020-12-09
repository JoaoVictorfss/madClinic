window.onload = function () {
  console.log("Entrou");
  document.forms.formFuncionario.onsubmit = validaForm;
}

function validaForm(e) {
  let form = e.target; //Dá acesso ao botão disparado
  let formValido = true; //Indica se o form é válido

  const spanNome = form.inputNome.nextElementSibling;
  const spanEmail = form.inputEmail.nextElementSibling;
  const spanTelefone = form.inputTelefone.nextElementSibling;
  const spanCep = form.inputCEP.nextElementSibling;
  const spanLogradouro = form.inputLogradouro.nextElementSibling;
  const spanBairro = form.inputBairro.nextElementSibling;
  const spanCidade = form.inputCidade.nextElementSibling;
  const spanDataInicio = form.inputDataInicio.nextElementSibling;
  const spanSalario = form.inputSalario.nextElementSibling;
  const spanSenha = form.inputSenha.nextElementSibling;

  //regex para validar entrada
  const telefone = /\(\d{2}\)\d{4,5}-?\d{4}/;
  const cep = /\d{5}-?\d{3}/;
  const soLetras = /[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$/;

  if (form.inputNome.value === "") {
    spanNome.textContent = "O Nome é obrigatório";
    formValido = false;
  } else if (!soLetras.test(form.inputNome.value)) {
    spanNome.textContent = "formato inválido";
    formValido = false;
  } else spanNome.textContent = "";

  if (form.inputNome.value === "") {
    spanNome.textContent = "O Nome é obrigatório";
    formValido = false;
  } else if (!soLetras.test(form.inputNome.value)) {
    spanNome.textContent = "formato inválido";
    formValido = false;
  } else spanNome.textContent = "";

  if (form.inputEmail.value === "") {
    spanEmail.textContent = "O Email é obrigatório";
    formValido = false;
  } else spanEmail.textContent = "";

  if (form.inputTelefone.value === "") {
    spanTelefone.textContent = "O Telefone é obrigatório";
    formValido = false;
  } else if (!telefone.test(form.inputTelefone.value)) {
    spanTelefone.textContent = "formato inválido";
    formValido = false;
  } else spanTelefone.textContent = "";

  if (form.inputCEP.value === "") {
    spanCep.textContent = "O CEP é obrigatório";
    formValido = false;
  } else if (!cep.test(form.inputCEP.value)) {
    spanCep.textContent = "formato inválido";
    formValido = false;
  } else spanCep.textContent = "";

  if (form.inputLogradouro.value === "") {
    spanLogradouro.textContent = "O logradouro é obrigatório";
    formValido = false;
  } else if (!soLetras.test(form.inputLogradouro.value)) {
    spanLogradouro.textContent = "formato inválido";
    formValido = false;
  } else spanLogradouro.textContent = "";

  if (form.inputBairro.value === "") {
    spanBairro.textContent = "O bairro é obrigatório";
    formValido = false;
  } else if (!soLetras.test(form.inputBairro.value)) {
    spanBairro.textContent = "formato inválido";
    formValido = false;
  } else spanBairro.textContent = "";

  if (form.inputCidade.value === "") {
    spanCidade.textContent = "O nome da cidade é obrigatório";
    formValido = false;
  } else if (!soLetras.test(form.inputCidade.value)) {
    spanCidade.textContent = "formato inválido";
    formValido = false;
  } else spanCidade.textContent = "";

  if (form.inputDataInicio.value === "") {
    spanDataInicio.textContent = "A data é obrigatória";
    formValido = false;
  } else spanDataInicio.textContent = "";

  if (form.inputSalario.value === "") {
    spanSalario.textContent = "A data é obrigatória";
    formValido = false;
  } else spanSalario.textContent = "";

  if (form.inputSenha.value === "") {
    spanSenha.textContent = "A senha é obrigatória";
    formValido = false;
  } else if (form.inputSenha.value.length < 6) {
    spanSenha.textContent = "Senha inválida";
    formValido = false;
  } else spanSenha.textContent = "";

  return formValido;
}