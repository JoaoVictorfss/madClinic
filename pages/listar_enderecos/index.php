<?php
  session_start();
  if(!isset($_SESSION["codigo"])) {
    header("Location: ../home/");
    exit();
  }
?>

<?php
  require "../../config/conexaoMysql.php";
  $pdo = mysqlConnect();

  try {

    $sql = <<<SQL
          SELECT cep, logradouro, bairro, cidade, estado
          FROM base_enderecos_ajax 
    SQL;

    $stmt = $pdo->query($sql);
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
  <title>Mad Clinic - Enderecos</title>
</head>

<body>

  <?php
  include "../../templates/header.php";
  include "../../templates/nav.php";
  ?>

  <div class="container">
    <main>
      <h2 class="mb-4">Endereços Cadastrados</h2>

      <div class="table-responsive">
        <table class="table table-light table-hover">
          <caption>Lista de endereços</caption>
          <thead class="table-primary">
            <tr>
              <th scope="col">Cep</th>
              <th scope="col">Logradouro</th>
              <th scope="col">Bairro</th>
              <th scope="col">Cidade</th>
              <th scope="col">Estado </th>
            </tr>
          </thead>
          <tbody>

            <?php
            while ($row = $stmt->fetch()) {
              // Previni ataque XSS
              $cep = htmlspecialchars($row['cep']);
              $logradouro = htmlspecialchars($row['logradouro']);
              $bairro = htmlspecialchars($row['bairro']);
              $cidade = htmlspecialchars($row['cidade']);
              $estado = htmlspecialchars($row['estado']);

              echo <<<HTML
                              <tr>
                                <td scope="row">$cep</td> 
                                <td>$logradouro</td>
                                <td>$bairro</td>
                                <td>$cidade</td>
                                <td>$estado</td>
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