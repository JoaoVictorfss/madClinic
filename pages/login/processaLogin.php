<?php
  session_start();
?>

<?php

  require "../../config/conexaoMysql.php";
  $pdo = mysqlConnect();

  $email = $senha = "";

  if (isset($_POST["email"]))
    $email = $_POST["email"];
  if (isset($_POST["senha"]))
    $senha = $_POST["senha"];

  if($email != "" && $senha != "") {

    $sql = <<<SQL
    SELECT senha_hash, nome, pessoa.codigo
    FROM pessoa INNER JOIN funcionario ON pessoa.codigo = funcionario.codigo
    WHERE email = ?
    SQL;

    try {
      $stmt = $pdo->prepare($sql);
      $stmt->execute([$email]);
      $row = $stmt->fetch();

      if(!$row) {
        echo "<script>window.alert('Email não encontrado!');</script>";
      } else if(password_verify($senha, $row["senha_hash"])) {
        
          $_SESSION["nome"]  = $row["nome"];
          $_SESSION["email"] = $email;
          $_SESSION["codigo"] = $row["codigo"];
          // require "../home";

        } else {
          echo "<script>window.alert('Senha incorreta');</script>";
        }

    } catch (Exception $e) {
        exit('Falha ao validar dados: ' . $e->getMessage());
    }

  }else{
     //reload na página 
     return;
  }
?>