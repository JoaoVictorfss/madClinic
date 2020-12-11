<?php

  session_start();

  require "../../config/conexaoMysql.php";
  $pdo = mysqlConnect();

  $email = $senha = "";

  if (isset($_POST["email"]))
    $email = $_POST["email"];
  if (isset($_POST["senha"]))
    $senha = $_POST["senha"];

  $sql1 = <<<SQL
  SELECT senha_hash, nome, pessoa.codigo
  FROM pessoa INNER JOIN funcionario ON pessoa.codigo = funcionario.codigo
  WHERE email = ?
  SQL;

  // checa se eh medico
  $sql2 = <<< SQL
  SELECT medico.codigo
  FROM medico INNER JOIN funcionario ON medico.codigo = funcionario.codigo
  WHERE medico.codigo = ?
  SQL;

  try {
    $stmt = $pdo->prepare($sql1);
    $stmt->execute([$email]);
    $row = $stmt->fetch();

    if(!$row) {
      echo "<script>window.alert('Email não encontrado!');</script>";
    } else if(password_verify($senha, $row["senha_hash"])) {
      
        $_SESSION["nome"]  = $row["nome"];
        $_SESSION["email"] = $email;
        $_SESSION["codigo"] = $row["codigo"];

        $stmt = $pdo->prepare($sql2);
        $stmt->execute([$_SESSION["codigo"]]);
        $row = $stmt->fetch();

        if(isset($row["codigo"])) {
          $_SESSION["medico"] = true;
        }

        // require "../home";

      } else {
        echo "<script>window.alert('Senha incorreta');</script>";
      }

  } catch (Exception $e) {
      exit('Falha ao validar dados: ' . $e->getMessage());
  }

?>