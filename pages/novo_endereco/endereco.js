 window.onload = function () {
   document.forms.formEndereco.onsubmit = validaForm;
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
   let form = e.target; //Dá acesso ao botão disparado

   const spanCep = form.inputCEP.nextElementSibling;
   const spanLogradouro = form.inputLogradouro.nextElementSibling;
   const spanBairro = form.inputBairro.nextElementSibling;
   const spanCidade = form.inputCidade.nextElementSibling;
   //regex para validar entrada
   const cep = /\d{5}-\d{3}/;
   const soLetras = /[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$/;

   spanCep.textContent = validaCampo(form.inputCEP.value, cep);
   spanLogradouro.textContent = validaCampo(form.inputLogradouro.value, soLetras);
   spanBairro.textContent = validaCampo(form.inputBairro.value, soLetras);
   spanCidade.textContent = validaCampo(form.inputCidade.value, soLetras);

   return (
     !spanCep.textContent && !spanLogradouro.textContent &&
     !spanBairro.textContent && !spanCidade.textContent
   );
 }