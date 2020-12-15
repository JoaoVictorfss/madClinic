 <?php
  require "../../config/conexaoMysql.php";
  $pdo = mysqlConnect();

  $cep = $logradouro =  $bairro = $cidade = $estado =  "";

  //validação de dados
  if (isset($_POST["inputCEP"])) $cep = ($_POST["inputCEP"]);
  if (isset($_POST["inputLogradouro"])) $logradouro = ($_POST["inputLogradouro"]);
  if (isset($_POST["inputBairro"])) $bairro = ($_POST["inputBairro"]);
  if (isset($_POST["inputCidade"])) $cidade = ($_POST["inputCidade"]);
  if (isset($_POST["inputEstado"])) $estado = $_POST["inputEstado"];

  try {
    $sql = <<<SQL
    INSERT INTO base_enderecos_ajax (cep, logradouro, bairro, cidade, estado)
    VALUES (?, ?, ?, ?, ?)
    SQL;

    // Preveni ataques do tipo SQL Injection
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
      $cep, $logradouro, $bairro, $cidade, $estado
    ]);

    echo "<script>window.location.href='index.php?cadastro=1'</script>";
    exit();
  } catch (Exception $e) {
    if ($e->errorInfo[1] === 1062) {
      echo "<script>window.location.href='index.php?cadastro=-1'</script>";
      exit();
    } else {
      echo "</script>window.location.href='index.php?cadastro=-2'<script>";
      exit();
    }
  }
  ?>