<?php
    if(isset($_GET["especialidade"]))
        $especialidade = $_GET["especialidade"];
    else
        exit();

    require "../../config/conexaoMysql.php";
	$pdo = mysqlConnect();
    
    $sql = <<< SQL
    SELECT pessoa.nome, pessoa.codigo FROM medico INNER JOIN pessoa ON medico.codigo = pessoa.codigo
    WHERE medico.especialidade = ?
    SQL;

     try {    
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$especialidade]);

        $medicos = new \stdClass(); // iniciando a variável para remover o warning
        $medicos->nome = [];
        $medicos->codigo = [];
         while ($row = $stmt->fetch()) {
            $medicos->nome[] = htmlspecialchars($row["nome"]);
            $medicos->codigo[] = htmlspecialchars($row["codigo"]);
        }

        $medicos = json_encode($medicos);
        echo $medicos;

    } catch (Exception $e) {
      exit('Falha ao validar dados: ' . $e->getMessage());
    }
?>