<?php
  session_start();

  $url_anterior = "http://joaovictorprojects.atwebpages.com/Trabalho_Final_PPI/pages/agendar_consulta/agendarConsulta.php";
  if (isset($_GET["cadastro"]) && $_SERVER['HTTP_REFERER'] == $url_anterior) $cad = $_GET["cadastro"];

  require "../../config/conexaoMysql.php";
	$pdo = mysqlConnect();

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
    <script src="./agendar_consulta.js"></script>
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
        <form name="formConsulta" class="row g-2" action="./agendarConsulta.php" method="POST">
          <div class="col-md-4 form-floating ">
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" required>
            <span></span>
            <label for="nome">Nome</label>
          </div>

          <div class="col-md-4 form-floating ">
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
            <span></span>
            <label for="email">Email</label>
          </div>

          <div class="col-md-4 form-floating ">
            <input type="tel" class="form-control" id="telefone" name="telefone" placeholder="Telefone" required>
            <span></span>
            <label for="telefone">Telefone</label>
          </div>

          <div class="col-md-6 form-floating ">
            <select class="form-select" id="especialidade" required>
              <option disabled selected></option>
              <?php

                $sql = <<< SQL
                SELECT DISTINCT especialidade FROM medico
                SQL;

                try { 
                  $stmt = $pdo->query($sql);
                  while ($row = $stmt->fetch()) {
                    $especialidade = htmlspecialchars($row["especialidade"]);
                    echo  "<option value='$especialidade'>$especialidade</option>";
                  }
                } catch (Exception $e) {
                    exit('Falha ao validar dados: ' . $e->getMessage());
                }

              ?>
            </select>
            <label for="especialidade" class="form-label">Especialidade</label>
          </div>

          <div class="col-md-6 form-floating ">
            <select class="form-select" id="medico" name="medico" required>
            </select>
            <label for="medico" class="form-label">Médico</label>
          </div>

          <div class="col-md-6 form-floating">
            <input type="date" class="form-control" id="data_agendamento"
             name="data_agendamento" placeholder="Data" min=<?php echo date('Y-m-d'); ?>
             required
            >
            <span></span>
            <label for="data_agendamento">Data</label>
          </div>

          <div class="col-md-6 form-floating">
            <select class="form-select" id="hora" name="hora" required>
            </select>
            <label for="hora" class="form-label">Hora</label>
          </div>

          <div class="col-md-12">
            <button type="submit" class="btn btn-primary btn-lg">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z"/>
              </svg>
              Agendar
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