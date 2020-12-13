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
         while ($row = $stmt->fetch()) {
            $nome_medico = $row["nome"];
            $codigo_medico = $row["codigo"];
            echo  "<option value='$codigo_medico'>$nome_medico</option>";
        }
    } catch (Exception $e) {
      exit('Falha ao validar dados: ' . $e->getMessage());
    }
?>