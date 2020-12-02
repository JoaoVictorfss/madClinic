 window.onload = function () { 
      document.forms.formLogin.onsubmit = validaForm; 
    }

    function validaForm(e) {
      let form = e.target; //Dá acesso ao botão disparado
      let formValido = true; //Indica se o form é válido

      const spanEmail = form.email.nextElementSibling; 
      const spanSenha = form.senha.nextElementSibling; 

      if (form.email.value === "") {
        spanEmail.textContent = "O email é obrigatório"; 
        formValido = false; 
      }
      
      if (form.senha.value === "") { 
        spanSenha.textContent = "A senha é obrigatória"; 
        formValido = false;
      }

      if (form.senha .value.length< 6) {
        spanSenha.textContent = "A senha está incorreta"; 
        formValido = false;
      }

      return formValido; 
    }