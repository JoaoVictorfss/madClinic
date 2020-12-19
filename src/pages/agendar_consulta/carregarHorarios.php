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

    $sql = <<<SQL
    SELECT horario FROM agenda
    WHERE codigo_medico = ? AND data_agendamento = ?
    SQL;

    try {    
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$codigo_medico, $data_agendamento]);

        // remove os horários já marcados com aquele médico
        while($row = $stmt->fetch())
            unset($horarios[$row["horario"]]);

        $hora_consulta = new \stdClass(); // iniciando a variável para remover o warning
        $hora_consulta->value = array_keys($horarios);
        $hora_consulta->hora = array_values($horarios);
        $hora_consulta = json_encode($hora_consulta);
        echo $hora_consulta;

    } catch (Exception $e) {
      exit('Falha ao validar dados: ' . $e->getMessage());
    }

?>