<?php
    require "../../config/conexaoMysql.php";
    $pdo = mysqlConnect();

    $nome = $email = $telefone = "";
    $codigo_medico = $data_agendamento = $horario = "";

    if(isset($_POST["nome"])) $nome = $_POST["nome"];
    if(isset($_POST["email"])) $email = $_POST["email"];
    if(isset($_POST["telefone"])) $telefone = $_POST["telefone"];
    if(isset($_POST["medico"])) $codigo_medico = $_POST["medico"];
    if(isset($_POST["data_agendamento"]))
        $data_agendamento = date('Y-m-d', strtotime($_POST["data_agendamento"]));
    if(isset($_POST["hora"])) $horario = date('h:i:s', strtotime($_POST["hora"]));

    $sql = <<< SQL
    INSERT INTO agenda (data_agendamento, horario, nome, email, telefone, codigo_medico)
    VALUES (?, ?, ?, ?, ?, ?)
    SQL;

   try {

        $stmt = $pdo->prepare($sql);
        $stmt->execute([$data_agendamento, $horario, $nome, $email, $telefone, $codigo_medico]);
        
        header("Location: ../home/");
        exit();
   }  catch (Exception $e) {
       exit('Falha ao inserir dados: ' . $e->getMessage());
   }

?>