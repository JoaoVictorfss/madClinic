<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-CuOF+2SnTUfTwSZjCXf01h7uYhfOBuxIhGKPbfEJ3+FqH/s6cIFN9bGr1HmAg4fQ" crossorigin="anonymous">
  <link rel="stylesheet" href="./style.css">
  <?php
  include "../../templates/includes.php";
  ?>

  <title>Mad Clinic - Funcionário</title>
  <script src="./funcionario.js"></script>
  <style>

  </style>
</head>

<body>
  <?php
  include "../../templates/header.php";
  include "../../templates/nav.php";
  ?>

  <div class="container">
    <main>
      <form name="formFuncionario" class="row g-2" action="./processaFuncionario.php" method="POST">

        <div class="col-md-2 form-floating">
          <select id="inputTipo" name="inputTipo" class="form-select">
            <option selected value="func">funcionário</option>
            <option value="md">médico</option>
          </select>
          <label for="inputTipo" class="form-label">Tipo</label>
        </div>

        <div class="col-md-4 form-floating">
          <input type="text" class="form-control" name="inputNome" id="inputNome" placeholder="seu nome">
          <span></span>
          <label for="inputNome">Nome</label>
        </div>

        <div class="col-md-3 form-floating">
          <input type="email" class="form-control" name="inputEmail" id="inputEmail" placeholder="seu e-mail">
          <span></span>
          <label for="inputEmail">E-mail</label>
        </div>

        <div class="col-md-3 form-floating">
          <input type="tel" class="form-control" name="inputTelefone" id="inputTelefone" placeholder="seu telefone">
          <span></span>
          <label for="inputTelefone">Telefone</label>
        </div>

        <div class="col-md-4 form-floating ">
          <input type="text" class="form-control" id="inputCEP" name="inputCEP" placeholder="seu cep">
          <span></span>
          <label for="inputCEP">CEP</label>
        </div>

        <div class="col-md-8 form-floating ">
          <input type="text" class="form-control" id="inputLogradouro" name="inputLogradouro" placeholder="Avenida João Naves de Avila">
          <span></span>
          <label for="inputLogradouro">Logradouro</label>
        </div>

        <div class="col-md-5 form-floating ">
          <input type="text" class="form-control" id="inputBairro" name="inputBairro" placeholder="Seu bairro">
          <span></span>
          <label for="inputBairro">Bairro</label>
        </div>

        <div class="col-md-5 form-floating ">
          <input type="text" class="form-control" id="inputCidade" name="inputCidade" placeholder="Sua cidade">
          <span></span>
          <label for="inputCidade">Cidade</label>
        </div>

        <div class="col-md-2 form-floating">
          <select id="inputEstado" name="estado" class="form-select">
            <option selected value="AC">Acre</option>
            <option value="AL">Alagoas</option>
            <option value="AP">Amapá</option>
            <option value="AM">Amazonas</option>
            <option value="BA">Bahia</option>
            <option value="CE">Ceará</option>
            <option value="DF">Distrito Federal</option>
            <option value="ES">Espírito Santo</option>
            <option value="GO">Goiás</option>
            <option value="MA">Maranhão</option>
            <option value="MT">Mato Grosso</option>
            <option value="MS">Mato Grosso do Sul</option>
            <option value="MG">Minas Gerais</option>
            <option value="PA">Pará</option>
            <option value="PB">Paraíba</option>
            <option value="PR">Paraná</option>
            <option value="PE">Pernambuco</option>
            <option value="PI">Piauí</option>
            <option value="RJ">Rio de Janeiro</option>
            <option value="RN">Rio Grande do Norte</option>
            <option value="RS">Rio Grande do Sul</option>
            <option value="RO">Rondônia</option>
            <option value="RR">Roraima</option>
            <option value="SC">Santa Catarina</option>
            <option value="SP">São Paulo</option>
            <option value="SE">Sergipe</option>
            <option value="TO">Tocantins</option>
          </select>
          <label for="inputEstado" class="form-label">Estado</label>
        </div>

        <div class="col-md-4 form-floating ">
          <input type="date" class="form-control" id="inputDataInicio" name="inputDataInicio" placeholder="Data inicio">
          <span></span>
          <label for="inputDataInicio">Data de início</label>
        </div>

        <div class="col-md-4 form-floating ">
          <input type="number" class="form-control" id="inputSalario" name="inputSalario" min="0" placeholder="Salário">
          <span></span>
          <label for="inputAltura">Salário</label>
        </div>

        <div class="col-md-4 form-floating ">
          <input type="password" class="form-control" id="inputSenha" name="inputSenha" placeholder="Senha">
          <span></span>
          <label for="inputSenha">Senha</label>
        </div>

        <div class="col-md form-floating disable" id="esp">
          <input type="text" class="form-control" id="inputEspecialidade" name="inputEspecialidade" placeholder="epecialidade">
          <span></span>
          <label for="inputEspecialidade">Especialidade</label>
        </div>

        <div class="col-md form-floating disable" id="crm">
          <input type="text" class="form-control" id="inputCrm" name="inputCrm" placeholder="crm">
          <span></span>
          <label for="inputCrm">CRM</label>
        </div>

        <div class="col-md-12">
          <button type="submit" class="btn btn-primary btn-lg">Cadastrar
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
              <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
            </svg>
          </button>
        </div>
      </form>
    </main>
  </div>

  <?php
  include "../../templates/footer.php";
  ?>
  <!-- JavaScript Bundle with Popper.js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-popRpmFF9JQgExhfw5tZT4I9/CI5e2QcuUZPOVXb1m7qUmeR2b50u+YFEYe1wgzy" crossorigin="anonymous">
  </script>

</body>

</html>