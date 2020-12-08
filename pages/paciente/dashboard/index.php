<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-CuOF+2SnTUfTwSZjCXf01h7uYhfOBuxIhGKPbfEJ3+FqH/s6cIFN9bGr1HmAg4fQ" crossorigin="anonymous">

  <?php
  include "../../../templates/includes.php";
  ?>
  <title>Mad Clinic - Paciente</title>

</head>

<body>
  <?php
  include "../../../templates/header.php";
  include "../../../templates/nav.php";
  ?>

  <div class="container">
    <main>
      <div class="table-responsive">
        <table class="table  table-sm table-hover">
          <thead>
            <tr>
              <th scope="col">Número sequencial</th>
              <th scope="col">Nome</th>
              <th scope="col">Email</th>
              <th scope="col">Telefone</th>
              <th scope="col">Cep</th>
              <th scope="col">Altura</th>
              <th scope="col">Peso</th>
              <th scope="col">Sangue</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $pacientes = [
              "Joõa Victor", "Maria", "John", "Rick", "Matheus"
            ];
            $email = [
              "paciente", "paciente", "paciente", "paciente", "paciente"
            ];
            $telefones = [
              "99999999", "99999999", "99999999", "99999999", "99999999"
            ];
            $ceps = [
              "0000000", "0000000", "0000000", "0000000", "0000000"
            ];
            $alturas = [
              "1,70", "1,70", "1,70", "1,70", "1,70"
            ];
            $pesos = [
              "80", "80", "80", "80", "80"
            ];
            $Tipossangue = [
              "O-", "O-", "O-", "O-", "O-"
            ];
            for ($i = 0; $i < 5; $i++) {
              echo <<<HTML
                          <tr>
                            <th scope="row">#$i</th>
                            <td>$pacientes[$i]</td>
                            <td>$email[$i]</td>
                            <td>$telefones[$i]</td>
                            <td>$ceps[$i]</th>
                            <td>$alturas[$i]</td>
                            <td>$pesos[$i]</td>
                            <td>$Tipossangue[$i]</td>
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
  include "../../../templates/footer.php";
  ?>
  <!-- JavaScript Bundle witdth Popper.js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-popRpmFF9JQgExhfw5tZT4I9/CI5e2QcuUZPOVXb1m7qUmeR2b50u+YFEYe1wgzy" crossorigin="anonymous">
  </script>
</body>

</html>