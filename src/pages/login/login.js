window.onload = function () {
  document.forms.formLogin.onsubmit = validaForm;
}

function validaForm(e) {
  let form = e.target; //Dá acesso ao botão disparado
  let formValido = true; //Indica se o form é válido

  const spanEmail = form.email.nextElementSibling;
  const spanSenha = form.senha.nextElementSibling;
  spanEmail.textContent = "";
  spanSenha.textContent = "";

  if (form.email.value === "") {
    spanEmail.textContent = "O email é obrigatório";
    formValido = false;
  }
  if (form.senha.value === "") {
    spanSenha.textContent = "A senha é obrigatória";
    formValido = false;
  } else if (form.senha.value.length < 6) {
    spanSenha.textContent = "A senha deve conter pelo menos 6 dígitos";
    formValido = false;
  }

  if (!formValido) return formValido;

  verificaEmail(form.email.value, form.senha.value); // verificaEmail chama a funcao verifica senha caso o email seja encontrado
  return false;
}

function verificaEmail(email, senha) {
  const xmlhttp = new XMLHttpRequest();
  const url = "verificaEmail.php?email=" + email;
  xmlhttp.open("GET", url, true);

  xmlhttp.onload = function () {
    if (xmlhttp.status == 200) {
      if (xmlhttp.responseText != "") {
        try {
          const obj = JSON.parse(xmlhttp.responseText);
          if (obj.resposta !== 'SUCCESS') {
            const alert =
              `<div class="alert alert-warning alert - dismissible" role="alert">
                  <strong> Email não encontrado</strong>
                  <button type="button" class="btn-close" data-dismiss="alert"></button>
                </div>`;

            document.getElementById('email_error_alert').innerHTML = alert;
          } else
            verificaSenha(email, senha);
        } catch (e) {
          alert("A string retornada não é um JSON válido: " + xmlhttp.responseText);
        }
      } else {
        alert("Ocorreu um erro ao processar a requisição")
      }
    } else
      alert("Ocorreu um erro ao processar a requisição");
  }

  xmlhttp.onerror = function () {
    alert("Ocorreu um erro ao processar a requisição");
  };

  xmlhttp.send();
}

function verificaSenha(email, senha) {
  const xmlhttp = new XMLHttpRequest();
  const url = "verificaSenha.php?email=" + email + "&senha=" + senha;
  xmlhttp.open("GET", url, true);

  xmlhttp.onload = function () {
    if (xmlhttp.status == 200) {
      if (xmlhttp.responseText != "") {
        try {
          const obj = JSON.parse(xmlhttp.responseText);
          if (obj.resposta !== 'SUCCESS') {
            const alert =
              `<div class="alert alert-warning alert-dismissible" role="alert">
                <strong>Senha inválida</strong>
                <button type="button" class="btn-close" data-dismiss="alert"></button>
              </div>`;

            document.getElementById('senha_error_alert').innerHTML = alert;
          } else {
            const success_alert =
              `<div class="alert alert-success alert-dismissible" role="alert">
                <strong>Você efetuou o login com sucesso!</strong>
                <button type="button" class="btn-close" data-dismiss="alert"></button>
              </div>`;

            const home_bnt =
              `<a href="../home/" class="btn btn-secondary mt-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                  <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                </svg>
              </a>`;

            const login_box = document.querySelector(".loginBox");

            document.querySelector("form").remove();
            var aux = document.createElement("div");
            aux.innerHTML = success_alert;
            login_box.appendChild(aux);
            var aux = document.createElement("div");
            aux.innerHTML = home_bnt;
            login_box.appendChild(aux);
          }
        } catch (e) {
          alert("A string retornada não é um JSON válido: " + xmlhttp.responseText);
        }
      } else {
        alert("Ocorreu um erro ao processar a requisição")
      }
    } else
      alert("Ocorreu um erro ao processar a requisição");
  }

  xmlhttp.onerror = function () {
    alert("Ocorreu um erro ao processar a requisição");
  };

  xmlhttp.send();
}