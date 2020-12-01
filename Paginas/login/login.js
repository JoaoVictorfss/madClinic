 window.onload = function () { 
      document.forms.formCadastro.onsubmit = validaForm; 
    }

    function validaForm(e) {
      let form = e.target; //Dá acesso ao botão disparado
      let formValido = true; //Indica se o form é válido

      const spanUsuario = form.usuario.nextElementSibling; 
      const spanSenha = form.senha.nextElementSibling; 
      const spanEmail = form.email.nextElementSibling;

      if (form.usuario.value === "") { 
        spanUsuario.textContent = "O usuário deve ser preenchido"; 
        formValido = false; 
      }

      if (form.senha.value === "") { 
        spanSenha.textContent = "A senha deve ser preenchida"; 
        formValido = false;
      }

      if (form.email.value === "") {
        spanEmail.textContent = "O email deve ser preenchido"; 
        formValido = false; 
      }

      return formValido; 
    }