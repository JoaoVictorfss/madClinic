<?php

    $codigo_medico = $data_agendamento = "";
    if(isset($_GET["codigo_medico"]) && isset($_GET["data_agendamento"])) {
        $codigo_medico = $_GET["codigo_medico"];
        $data_agendamento = date('Y-m-d', strtotime($_GET["data_agendamento"]));
    } else
        exit();

    require "../../config/conexaoMysql.php";
    $pdo = mysqlConnect();

    $horarios = array(
        "08:00:00" => 8,
        "09:00:00" => 9,
        "10:00:00" => 10,
        "11:00:00" => 11,
        "12:00:00" => 12,
        "13:00:00" => 13,
        "14:00:00" => 14,
        "15:00:00" => 15,
        "16:00:00" => 16,
        "17:00:00" => 17,
    );

    $sql= <<<SQL
    SELECT horario FROM agenda
    WHERE codigo_medico = ? AND data_agendamento = ?
    SQL;

    try {    
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$codigo_medico, $data_agendamento]);

        while($row = $stmt->fetch())
            unset($horarios[htmlspecialchars($row["horario"])]);
        
        foreach($horarios as $key => $value)
            echo "<option value='$key'>$value</option>";

    } catch (Exception $e) {
      exit('Falha ao validar dados: ' . $e->getMessage());
    }

?>