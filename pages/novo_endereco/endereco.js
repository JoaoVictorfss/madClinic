 window.onload = function () {
   document.forms.formEndereco.onsubmit = validaForm;
 }

 function validaForm(e) {
   let form = e.target; //Dá acesso ao botão disparado
   let formValido = true; //Indica se o form é válido

   const spanCep = form.inputCEP.nextElementSibling;
   const spanLogradouro = form.inputLogradouro.nextElementSibling;
   const spanBairro = form.inputBairro.nextElementSibling;
   const spanCidade = form.inputCidade.nextElementSibling;
   //regex para validar entrada
   const cep = /\d{5}-\d{3}/;
   const soLetras = /[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$/;

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
   }else spanBairro.textContent = "";

   if (form.inputCidade.value === "") {
     spanCidade.textContent = "O nome da cidade é obrigatório";
     formValido = false;
   } else if (!soLetras.test(form.inputCidade.value)) {
      spanCidade.textContent = "formato inválido";
      formValido = false;
   }else spanCidade.textContent = "";

   return formValido;
 }