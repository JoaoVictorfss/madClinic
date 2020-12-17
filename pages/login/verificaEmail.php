<?php

    require "../../config/conexaoMysql.php";
    $pdo = mysqlConnect();

    $email = isset($_GET["email"]) ? $_GET["email"] : "";
    
    $sql = <<<SQL
    SELECT codigo
    FROM pessoa
    WHERE email = ?
    SQL;


    $obj = new \stdClass();
    $obj->resposta = "FAIL";

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$email]);

        if($stmt->fetchColumn()) $obj->resposta = "SUCCESS";
    } catch (Exception $e) {
      exit('Falha ao validar dados: ' . $e->getMessage());
  }

    $obj = json_encode($obj);
    echo $obj;

?>