<?php
  session_start();

  // $url_anterior = "http://joaovictorprojects.atwebpages.com/Trabalho_Final_PPI/pages/criar_paciente/processaPaciente.php";
  $url_anterior = "http://trabalho-final-ppi-2020-2-mateus-joao.atwebpages.com/Trabalho_final/pages/criar_paciente/processaPaciente.php";
  if (isset($_GET["cadastro"]) && $_SERVER['HTTP_REFERER'] == $url_anterior) $cad = $_GET["cadastro"];

  if (!isset($_SESSION["codigo"])) {
    header("Location: ../home/");
    exit();
  }
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-CuOF+2SnTUfTwSZjCXf01h7uYhfOBuxIhGKPbfEJ3+FqH/s6cIFN9bGr1HmAg4fQ" crossorigin="anonymous">

  <?php
  include "../../templates/includes.php";
  ?>
  <title>Mad Clinic - Paciente</title>
  <script src="./paciente.js"></script>
</head>

<body>
  <?php
  include "../../templates/header.php";
  include "../../templates/nav.php";
  ?>

  <div class="container">
    <main>
      <h2 class="mb-4">Cadastro de Paciente</h2>
      <form name="formPaciente" class="row g-2" action="./processaPaciente.php" method="POST">
        <div class="col-md-6 form-floating">
          <input type="text" class="form-control" name="inputNome" id="inputNome" placeholder="seu nome">
          <span></span>
          <label for="inputNome">Nome</label>
        </div>

        <div class="col-md-4 form-floating">
          <input type="email" class="form-control" name="inputEmail" id="inputEmail" placeholder="seu e-mail">
          <span></span>
          <label for="inputEmail">E-mail</label>
        </div>

        <div class="col-md-2 form-floating">
          <input type="tel" class="form-control" name="inputTelefone" id="inputTelefone" placeholder="seu telefone">
          <span></span>
          <label for="inputTelefone">Telefone</label>
        </div>

        <div class="col-md-4 form-floating ">
          <input type="text" class="form-control" id="inputCep" name="inputCep" placeholder="seu cep">
          <span></span>
          <label for="inputCep">CEP</label>
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
          <select id="inputEstado" name="inputEstado" class="form-select">
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

        <div class="col-md-5 form-floating ">
          <input type="number" class="form-control" id="inputPeso" name="inputPeso" placeholder="Seu peso">
          <span></span>
          <label for="inputPeso">Peso(kg)</label>
        </div>

        <div class="col-md-5 form-floating ">
          <input type="number" class="form-control" id="inputAltura" name="inputAltura" placeholder="Sua altura">
          <span></span>
          <label for="inputAltura">Altura(cm)</label>
        </div>


        <div class="col-md-2 form-floating">
          <select id="inputTipoSangue" name="inputTipoSangue" class=" form-select">
            <option selected value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
          </select>
          <label for="inputTipoSangue" class="form-label">Tipo sanguíneo</label>
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

    <?php
    if ($cad == "1") {
      echo <<<HTML
      <div class="alerta alert-success" id="alerta">
        <strong>Sucesso!</strong>Paciente cadastrado com sucesso.
        <span id="fechar">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
            <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
          </svg>
        </span>
      </div>
HTML;
    }
    ?>

    <?php
    if ($cad == "-1") {
      echo <<<HTML
      <div class="alerta alert-danger" id="alerta">
        <strong>Falha!</strong> Dados duplicados.
        <span id="fechar">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
            <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
          </svg>
        </span>
      </div>
HTML;
    }
    ?>

    <?php
    if ($cad == "-2") {
      echo <<<HTML
      <div class="alerta alert-danger" id="alerta">
        <strong>Falha!</strong> Ocorreu algo inesperado.
        <span id="fechar">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
            <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
          </svg>
        </span>
      </div>
HTML;
    }
    ?>
  </div>

  <?php
  include "../../templates/footer.php";
  ?>
  <!-- JavaScript Bundle with Popper.js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-popRpmFF9JQgExhfw5tZT4I9/CI5e2QcuUZPOVXb1m7qUmeR2b50u+YFEYe1wgzy" crossorigin="anonymous">
  </script>
</body>

</html>