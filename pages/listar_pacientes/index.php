<?php
session_start();
require "../../config/conexaoMysql.php";
$pdo = mysqlConnect();

try {

  $sql = <<<SQL
        SELECT nome, email, telefone, cep, logradouro, bairro, cidade, estado,
          peso, altura, tipo_sanguineo
        FROM pessoa INNER JOIN paciente ON pessoa.codigo = paciente.codigo
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
  <title>Mad Clinic - Pacientes</title>
</head>

<body>
  <?php
  include "../../templates/header.php";
  include "../../templates/nav.php";
  ?>

  <div class="container">
    <main>
      <h2 class="mb-4">Pacientes Cadastrados</h2>

      <div class="table-responsive">
        <table class="table table-light table-hover">
          <caption>Lista de pacientes</caption>
          <thead class="table-primary">
            <tr>
              <th scope="col">Nome</th>
              <th scope="col">Email</th>
              <th scope="col">Telefone</th>
              <th scope="col">Cep</th>
              <th scope="col">logradouro</th>
              <th scope="col">Bairro</th>
              <th scope="col">Cidade</th>
              <th scope="col">Estado</th>
              <th scope="col">Peso</th>
              <th scope="col">Altura</th>
              <th scope="col">Sangue</th>
            </tr>
          </thead>
          <tbody>

            <?php
                  while ($row = $stmt->fetch()) {
                    // Previni ataque XSS
                    $telefone = htmlspecialchars($row['telefone']);
                    $email = htmlspecialchars($row['email']);
                    $nome = htmlspecialchars($row['nome']);
                    $cep = htmlspecialchars($row['cep']);
                    $logradouro = htmlspecialchars($row['logradouro']);
                    $bairro = htmlspecialchars($row['bairro']);
                    $cidade = htmlspecialchars($row['cidade']);
                    $estado = htmlspecialchars($row['estado']);
                    $peso = htmlspecialchars($row['peso']);
                    $altura = htmlspecialchars($row['altura']);
                    $tipo_sanguineo = htmlspecialchars($row['tipo_sanguineo']);

                    echo <<<HTML
                                  <tr>
                                    <td scope="row" >$nome</td>
                                    <td>$email</td>
                                    <td>$telefone</td>
                                    <td>$cep</td>
                                    <td>$logradouro</td>
                                    <td>$bairro</td>
                                    <td>$cidade</td>
                                    <td>$estado</td>
                                    <td>$peso</td>
                                    <td>$altura</td>
                                    <td>$tipo_sanguineo</td>
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