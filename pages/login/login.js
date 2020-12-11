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
  } else if (form.senha.value.length < 6) {
    spanSenha.textContent = "A senha deve conter pelo menos 6 dígitos";
    formValido = false;
  }

  if (formValido) header("Location: ../home");
  return formValido;
}