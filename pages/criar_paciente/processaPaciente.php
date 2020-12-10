<?php
  require "../../config/conexaoMysql.php";
	$pdo = mysqlConnect();

	// Inicializa e resgata dados do cliente
	$nome = $email = $telefone = $cep = "";
	$logradouro = $bairro = $cidade = "";
	$peso = $altura = $tipo_sanguineo = "";

	$datanascimento = $estadocivil = $altura = "";
	if (isset($_POST["inputNome"])) $nome = $_POST["inputNome"];
	if (isset($_POST["inputEmail"])) $email = $_POST["inputEmail"];
	if (isset($_POST["inputTelefone"])) $telefone = $_POST["inputTelefone"];
	if (isset($_POST["inputCep"])) $cep = $_POST["inputCep"];
	if (isset($_POST["inputLogradouro"])) $logradouro = $_POST["inputLogradouro"];
	if (isset($_POST["inputBairro"])) $bairro = $_POST["inputBairro"];
	if (isset($_POST["inputCidade"])) $cidade = $_POST["inputCidade"];
	if (isset($_POST["inputEstado"])) $estado = $_POST["inputEstado"];
	if (isset($_POST["inputPeso"])) $peso = $_POST["inputPeso"];
	if (isset($_POST["inputAltura"])) $altura = $_POST["inputAltura"];
	if (isset($_POST["inputTipoSangue"])) $tipo_sanguineo = $_POST["inputTipoSangue"];

	$sql1 = <<<SQL
	INSERT INTO pessoa (nome, email, telefone, cep, logradouro, bairro, cidade, estado)
	VALUES (?, ?, ?, ?, ?, ?, ?, ?)
	SQL;

	$sql2 = <<<SQL
	INSERT INTO paciente (peso, altura, tipo_sanguineo, codigo)
	VALUES (?, ?, ?, ?)
	SQL;

	try {
		$pdo->beginTransaction();

		$stmt1 = $pdo->prepare($sql1);
		if (!$stmt1->execute([
			$nome, $email, $telefone, $cep, $logradouro, $bairro, $cidade, $estado
		])) throw new Exception('Falha na primeira inserção');

		$idNovoPaciente = $pdo->lastInsertId();
		$stmt2 = $pdo->prepare($sql2);
		if (!$stmt2->execute([
			$peso, $altura, $tipo_sanguineo, $idNovoPaciente
		])) throw new Exception('Falha na segunda inserção');

		// Efetiva as operações
		$pdo->commit();

		exit("dados cadastrados com sucesso");
	} 
	catch (Exception $e) {
		$pdo->rollBack();
		if ($e->errorInfo[1] === 1062)
			exit('Dados duplicados: ' . $e->getMessage());
		else
			exit('Falha ao cadastrar os dados: ' . $e->getMessage());
	}
