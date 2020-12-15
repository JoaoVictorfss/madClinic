<?php
if (isset($_GET["cep"]))
  $cep = $_GET["cep"];
else
  exit();

require "conexaoMysql.php";
$pdo = mysqlConnect();

$sql = <<< SQL
SELECT *
FROM base_enderecos_ajax 
WHERE cep = ?;
SQL;

try {
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$cep]);

  $endereco = new \stdClass();
  $endereco->logradouro;
  $endereco->bairro;
  $endereco->cidade;
  $endereco->estado;
  while ($row = $stmt->fetch()) {
    $endereco->logradouro = htmlspecialchars($row["logradouro"]);
    $endereco->bairro = htmlspecialchars($row["bairro"]);
    $endereco->cidade = htmlspecialchars($row["cidade"]);
    $endereco->estado = htmlspecialchars($row["estado"]);
  }

  $endereco = json_encode($endereco);
  echo $endereco;
  
} catch (Exception $e) {
  exit('Ocorreu uma falha: ' . $e->getMessage());
}
