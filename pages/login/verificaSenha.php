<?php
    session_start();

    require "../../config/conexaoMysql.php";
    $pdo = mysqlConnect();

    $email = isset($_GET["email"]) ? $_GET["email"] : "";
    $senha = isset($_GET["senha"]) ? $_GET["senha"] : "";

    $sql1 = <<<SQL
    SELECT senha_hash, nome, pessoa.codigo
    FROM pessoa INNER JOIN funcionario ON pessoa.codigo = funcionario.codigo
    WHERE email = ?
    SQL;

    // checa se eh medico
    $sql2 = <<< SQL
    SELECT codigo
    FROM medico
    WHERE codigo = ?
    SQL;

    $obj = new \stdClass();
    $obj->resposta = "FAIL";
    try {    
        $stmt = $pdo->prepare($sql1);
        $stmt->execute([$email]);
        $row = $stmt->fetch();

        if(password_verify($senha, $row["senha_hash"])) {
            $obj->resposta = "SUCCESS";            

            $_SESSION["nome"]  = $row["nome"];
            $_SESSION["email"] = $email;
            $_SESSION["codigo"] = $row["codigo"];
            $_SESSION["saudacao"] = true; // exibe mensagem de saudação na página de login

            // checa se é médico
            $stmt = $pdo->prepare($sql2);
            $stmt->execute([$_SESSION["codigo"]]);
            $_SESSION["medico"] = $stmt->fetchColumn();
        }

    } catch (Exception $e) {
      exit('Falha ao validar dados: ' . $e->getMessage());
  }

    $obj = json_encode($obj);
    echo $obj;

?>