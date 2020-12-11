<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--Bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-CuOF+2SnTUfTwSZjCXf01h7uYhfOBuxIhGKPbfEJ3+FqH/s6cIFN9bGr1HmAg4fQ" crossorigin="anonymous">
  <?php
  include "../../templates/includes.php";
  ?>
  <script src="./endereco.js"></script>
  <title>MAD Clinic - Cadastrar Endereço</title>
</head>

<body>

  <?php
  include "../../templates/header.php";
  include "../../templates/nav.php";
  ?>

  <div class="container mt-3">
    <main>
      <h2>Agendamento</h2>
      <form name="formEndereco" class="row g-2" action="./agendarConsulta.php" method="POST">
        <div class="col-md-4 form-floating ">
          <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
          <span></span>
          <label for="nome">Nome</label>
        </div>

        <div class="col-md-4 form-floating ">
          <input type="email" class="form-control" id="email" name="email" placeholder="Email">
          <span></span>
          <label for="email">Email</label>
        </div>

        <div class="col-md-4 form-floating ">
          <input type="tel" class="form-control" id="telefone" name="telefone" placeholder="Telefone">
          <span></span>
          <label for="telefone">Telefone</label>
        </div>

        <div class="col-md-6 form-floating ">
          <select id="especialidade" class="form-select" required>
            <option selected value="">Opção 1</option>
            <option value="">Opção 2</option>
            <option value="">Opção 3</option>
          </select>
          <label for="especialidade" class="form-label">Especialidade</label>
        </div>

        <div class="col-md-6 form-floating ">
          <select id="medico" class="form-select" required>
            <option selected value="">Opção 1</option>
            <option value="">Opção 2</option>
            <option value="">Opção 3</option>
          </select>
          <label for="medico" class="form-label">Médico</label>
        </div>

        <div class="col-md-6 form-floating">
          <input type="date" class="form-control" id="data" name="data" placeholder="Data">
          <span></span>
          <label for="data">Data</label>
        </div>

        <div class="col-md-6 form-floating">
          <select id="hora" class="form-select" required>
            <?php
            for ($i = 8; $i <= 17; $i++)
              echo "<option value=''> {$i}h</option>";
            ?>
          </select>
          <label for="hora" class="form-label">Hora</label>
        </div>

        <div class="col-md-12">
          <button type="submit" class="btn btn-primary btn-lg">Agendar
            <!-- adicionar svg check -->
          </button>
        </div>
      </form>
    </main>
  </div>

  <?php
  include "../../templates/footer.php";
  ?>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-popRpmFF9JQgExhfw5tZT4I9/CI5e2QcuUZPOVXb1m7qUmeR2b50u+YFEYe1wgzy" crossorigin="anonymous"></script>

</body>

</html>