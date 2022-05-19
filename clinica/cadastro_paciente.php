<?php

require "conexaoMysql.php";
$pdo = mysqlConnect();

$nome = $email = $telefone = $cep = "";
$logradouro = $bairro = $cidade = "";
if (isset($_POST["nome"])) $nome = $_POST["nome"];
if (isset($_POST["email"])) $email = $_POST["email"];
if (isset($_POST["telefone"])) $telefone = $_POST["telefone"];
if (isset($_POST["cep"])) $cep = $_POST["cep"];
if (isset($_POST["logradouro"])) $logradouro = $_POST["logradouro"];
if (isset($_POST["bairro"])) $bairro = $_POST["bairro"];
if (isset($_POST["cidade"])) $cidade = $_POST["cidade"];
if (isset($_POST["estado"])) $estado = $_POST["estado"];

$peso = $altura = $tipo_sanguineo = "";
if (isset($_POST["peso"])) $peso = $_POST["peso"];
if (isset($_POST["altura"])) $altura = $_POST["altura"];
if (isset($_POST["tipo_sanguineo"])) $tipo_sanguineo = $_POST["tipo_sanguineo"];


$sql1 = <<<SQL
  INSERT INTO pessoa (nome, email, telefone, cep, 
                       logradouro, bairro, cidade, estado)
  VALUES (?, ?, ?, ?, ?, ?, ?, ?)
  SQL;

if ($tipo_sanguineo != NULL) {
  $sql2 = <<<SQL
INSERT INTO paciente (peso, altura, tipo_sanguineo,
                      codigo)
VALUES (?, ?, ?, ?)
SQL;
}

try {
  $pdo->beginTransaction();
  $stmt1 = $pdo->prepare($sql1);

  if (!$stmt1->execute([
    $nome, $email, $telefone,
    $cep, $logradouro, $bairro, $cidade, $estado
  ])) throw new Exception('Falha na primeira inserção');

  if ($tipo_sanguineo != NULL) {
    $codigo = $pdo->lastInsertId();
    $stmt2 = $pdo->prepare($sql2);
    if (!$stmt2->execute([
      $peso, $altura, $tipo_sanguineo, $codigo
    ])) throw new Exception('Falha na segunda inserção');
  }
  $pdo->commit();

  header("location: restrito.php");
  exit();
} catch (Exception $e) {
  $pdo->rollBack();
  if ($e->errorInfo[1] === 1062)
    exit('Dados duplicados: ' . $e->getMessage());
  else
    exit('Falha ao cadastrar os dados: ' . $e->getMessage());
}
