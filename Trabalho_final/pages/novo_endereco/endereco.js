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


      if (form.inputCEP.value === "") {
        spanCep.textContent = "O CEP é obrigatório"; 
        formValido = false; 
      }
      
      if (form.inputLogradouro.value === "") { 
        spanLogradouro.textContent = "O logradouro é obrigatório"; 
        formValido = false;
      }

      if (form.inputBairro.value === "") {
        spanBairro.textContent = "O bairro é obrigatório"; 
        formValido = false;
      }

      if (form.inputCidade.value === "") {
        spanCidade.textContent = "O nome da cidade é obrigatório"; 
        formValido = false;
      }

      return formValido; 
    }