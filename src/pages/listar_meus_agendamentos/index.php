<?php
    session_start();
    if(!isset($_SESSION["codigo"])) {
        header("Location: ../home/");
        exit();
    }

    require "../../config/conexaoMysql.php";
    $pdo = mysqlConnect();

    $sql1 = <<<SQL
    SELECT codigo
    FROM medico
    WHERE codigo = ?
    SQL;


    $sql2 = <<<SQL
    SELECT data_agendamento, horario, nome, email, telefone
    FROM agenda
    WHERE codigo_medico = ?
    SQL;

    try {
        $stmt = $pdo->prepare($sql1);
        $stmt->execute([$_SESSION["codigo"]]);
        if($row = $stmt->fetch()) {
            $stmt = $pdo->prepare($sql2);
            $stmt->execute([$_SESSION["codigo"]]);
        } else {
            header("Location: ../home/");
            exit();
        }
    } catch (Exception $e) {
    exit('Ocorreu uma falha: ' . $e->getMessage());
    }
?>

<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-CuOF+2SnTUfTwSZjCXf01h7uYhfOBuxIhGKPbfEJ3+FqH/s6cIFN9bGr1HmAg4fQ" crossorigin="anonymous">
  <?php
  include "../../templates/includes.php";
  ?>
  <title>Mad Clinic - Agendamentos</title>
</head>

<body>
  <?php
  include "../../templates/header.php";
  include "../../templates/nav.php";
  ?>

  <div class="container">
    <main>
      <h2 class="mb-4">Agendamentos</h2>

      <div class="table-responsive">
        <table class="table table-light table-hover">
          <caption>Lista de agendamentos</caption>
          <thead class="table-primary">
            <tr>
              <th scope="col">Data</th>
              <th scope="col">Horário</th>
              <th scope="col">Nome</th>
              <th scope="col">Email</th>
              <th scope="col">Telefone</th>
            </tr>
          </thead>
          <tbody>

            <?php
                while ($row = $stmt->fetch()) {
                // Previni ataque XSS
                $data = date('d/m/Y', strtotime(htmlspecialchars($row["data_agendamento"])));
                $horario = htmlspecialchars($row["horario"]);
                $nome = htmlspecialchars($row['nome']);
                $email = htmlspecialchars($row['email']);
                $telefone = htmlspecialchars($row['telefone']);

                    echo <<<HTML
                        <tr>
                        <td scope="row" >$data</td>
                        <td>$horario</td>
                        <td>$nome</td>
                        <td>$email</td>
                        <td>$telefone</td>
                        </tr>      
                    HTML;
                }
            ?>
            
          </tbody>
        </table>
      </div>
    </main>
  </div>
  <?php
  include "../../templates/footer.php";
  ?>
  <!-- JavaScript Bundle witdth Popper.js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-popRpmFF9JQgExhfw5tZT4I9/CI5e2QcuUZPOVXb1m7qUmeR2b50u+YFEYe1wgzy" crossorigin="anonymous">
  </script>
</body>

</html>