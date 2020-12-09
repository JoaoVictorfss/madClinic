 <?php
  require "../../config/conexaoMysql.php";
  $pdo = mysqlConnect();
  
  $cep = $logradouro =  $bairro = $cidade = $estado =  "";
  //validação de dados
  if (isset($_POST["inputCEP"]))
    $cep = htmlspecialchars($_POST["inputCEP"]);
  if (isset($_POST["inputLogradouro"]))
    $logradouro = htmlspecialchars($_POST["inputLogradouro"]);
  if (isset($_POST["inputBairro"]))
    $bairro = htmlspecialchars($_POST["inputBairro"]);
  if (isset($_POST["inputCidade"]))
    $cidade = htmlspecialchars($_POST["inputCidade"]);
  if (isset($_POST["inputEstado"]))
    $estado = htmlspecialchars($_POST["inputEstado"]);

  //fim validação
  try {
    $sql = <<<SQL
    INSERT INTO base_enderecos_ajax (cep, logradouro, bairro, cidade, 
                        estado)
    VALUES (?, ?, ?, ?, ?)
    SQL;

    // Preveni ataques do tipo SQL Injection
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
      $cep, $logradouro, $bairro, $cidade, $estado
    ]);
    //colocar um modal avisando que deu certo e voltar para o login
  } catch (Exception $e) {
    if ($e->errorInfo[1] === 1062)
      exit('Dados duplicados: ' . $e->getMessage());
    else
      exit('Falha ao cadastrar os dados: ' . $e->getMessage());
  }
  ?>