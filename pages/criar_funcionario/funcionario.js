window.onload = function () {
  document.forms.formFuncionario.onsubmit = validaForm;

  const tipo = document.getElementById("inputTipo");
  tipo.addEventListener("change", tipoFuncionario);
}

function tipoFuncionario(e) {
  const crm = document.getElementById("crm");
  const especialidade = document.getElementById("esp");
  if (e.target.value === "md") {
    crm.classList.remove("disable");
    especialidade.classList.remove("disable");
  } else {
    crm.classList.add("disable");
    especialidade.classList.add("disable");
  }
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
  const spanCep = form.inputCEP.nextElementSibling;
  const spanLogradouro = form.inputLogradouro.nextElementSibling;
  const spanBairro = form.inputBairro.nextElementSibling;
  const spanCidade = form.inputCidade.nextElementSibling;
  const spanDataInicio = form.inputDataInicio.nextElementSibling;
  const spanSalario = form.inputSalario.nextElementSibling;
  const spanSenha = form.inputSenha.nextElementSibling;
  const spanCrm = form.inputCrm.nextElementSibling;
  const spanEspecialidade = form.inputEspecialidade.nextElementSibling;

  // regex para validar entrada
  const telefone = /\(\d{2}\)\d{4,5}-?\d{4}/;
  const cep = /\d{5}-\d{3}/;
  const soLetras = /[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$/;

  //validação 
  spanNome.textContent = validaCampo(form.inputNome.value, soLetras);
  spanEmail.textContent = validaCampo(form.inputEmail.value);
  spanTelefone.textContent = validaCampo(form.inputTelefone.value, telefone);
  spanCep.textContent = validaCampo(form.inputCEP.value, cep);
  spanLogradouro.textContent = validaCampo(form.inputLogradouro.value, soLetras);
  spanBairro.textContent = validaCampo(form.inputBairro.value, soLetras);
  spanCidade.textContent = validaCampo(form.inputCidade.value, soLetras);
  spanDataInicio.textContent = validaCampo(form.inputDataInicio.value);
  spanSalario.textContent = validaCampo(form.inputSalario.value)

  spanSenha.textContent = validaCampo(form.inputSenha.value);
  if (!spanSenha.textContent && form.inputSenha.value.length <= 6)
    spanSenha.textContent = "senha pequena";

  //validação do input de especialidade do médico
  if (form.inputTipo.value == "md") {
    spanCrm.textContent = validaCampo(form.inputCrm.value);
    spanEspecialidade.textContent = validaCampo(form.inputEspecialidade.value, soLetras);
  } else {
    spanEspecialidade.textContent = "";
    spanCrm.textContent = "";
  }

  return (
    !spanNome.textContent && !spanEmail.textContent && !spanTelefone.textContent && !spanCep.textContent && !spanLogradouro.textContent && !spanBairro.textContent &&
    !spanCidade.textContent && !spanDataInicio.textContent && !spanSalario.textContent && !spanSenha.textContent && !spanCrm.textContent && !spanEspecialidade.textContent
  );
}