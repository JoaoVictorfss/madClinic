 <?php
  require "../../config/conexaoMysql.php";
  $pdo = mysqlConnect();

  //Pega o tipo do funcionário
  $medico = false;
  if (isset($_POST["inputTipo"]) && strcmp($_POST["inputTipo"], "md") === 0) {
    $medico = true;
  }

  //Inicializa e resgata os dados de pessoa
  $nome = $email =  $telefone = $cep = $logradouro =  $bairro = $cidade = $estado =  "";
  if (isset($_POST["inputNome"])) $nome = $_POST["inputNome"];
  if (isset($_POST["inputEmail"])) $email = $_POST["inputEmail"];
  if (isset($_POST["inputTelefone"])) $telefone = $_POST["inputTelefone"];
  if (isset($_POST["inputCEP"])) $cep = $_POST["inputCEP"];
  if (isset($_POST["inputLogradouro"])) $logradouro = $_POST["inputLogradouro"];
  if (isset($_POST["inputBairro"])) $bairro = $_POST["inputBairro"];
  if (isset($_POST["inputCidade"])) $cidade = $_POST["inputCidade"];
  if (isset($_POST["estado"])) $estado = $_POST["estado"];

  //inicializa e resgata os dados do funcionário
  $data_contrato = $salario = $senha = "";
  if (isset($_POST["inputDataInicio"])) $data_contrato = $_POST["inputDataInicio"];
  if (isset($_POST["inputSalario"])) $salario = $_POST["inputSalario"];
  if (isset($_POST["inputSenha"])) $senha = $_POST["inputSenha"];
  // calcula um hash de senha seguro para armazenar no BD
  $hashsenha = password_hash($senha, PASSWORD_DEFAULT);

  //inicializa e resgata os dados do médico, caso o funcionário seja um
  $especialidade = $crm = false;
  if ($medico) {
    if (isset($_POST["inputEspecialidade"])) $especialidade = $_POST["inputEspecialidade"];
    if (isset($_POST["inputCrm"])) $crm = $_POST["inputCrm"];
  }

  //sql para inserção de pessoa
  $sql1 = <<<SQL
	INSERT INTO pessoa (nome, email, telefone, cep, logradouro, bairro, cidade, estado)
	VALUES (?, ?, ?, ?, ?, ?, ?, ?)
	SQL;

  //sql para inserção de funcionario
  $sql2 = <<<SQL
  INSERT INTO funcionario (data_contrato, salario, senha_hash, codigo)
  VALUES (?, ?, ?, ?)
  SQL;

  //sql para inserção de medico
  $sql3 = <<<SQL
    INSERT INTO medico (especialidade, crm, codigo)
    VALUES (?, ?, ?)
    SQL;

  try {
    //transações
    $pdo->beginTransaction();

    $stmt1 = $pdo->prepare($sql1);
    if (!$stmt1->execute([
      $nome, $email, $telefone, $cep, $logradouro, $bairro, $cidade, $estado
    ])) throw new Exception('Falha na primeira inserção');

    $idNovoPaciente = $pdo->lastInsertId();
    $stmt2 = $pdo->prepare($sql2);
    if (!$stmt2->execute([
      $data_contrato, $salario, $hashsenha, $idNovoPaciente
    ])) throw new Exception('Falha na segunda inserção');

    if ($medico) {
      $stmt3 = $pdo->prepare($sql3);
      if (!$stmt3->execute([
        $especialidade, $crm, $idNovoPaciente
      ])) throw new Exception('Falha na terceira inserção');
    }

    // Efetiva as operações
    $pdo->commit();
    echo "<script>window.location.href='index.php?cadastro=1'</script>";
    exit();
  } catch (Exception $e) {
    //Desfaz as operações
    $pdo->rollBack();
    if ($e->errorInfo[1] === 1062) {
      echo "<script>window.location.href='index.php?cadastro=-1'</script>";
      exit();
    } else {
      echo "</script>window.location.href='index.php?cadastro=-2'<script>";
      exit();
    }
  }
  ?>