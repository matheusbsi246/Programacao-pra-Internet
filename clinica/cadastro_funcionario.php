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

$salario = $data_contrato = $senha = "";
if (isset($_POST["salario"])) $salario = $_POST["salario"];
if (isset($_POST["data_contrato"])) $data_contrato = $_POST["data_contrato"];
if (isset($_POST["senha"])) $senha = $_POST["senha"];
$senhahash = password_hash($senha, PASSWORD_DEFAULT);

$especialidade = $crm = "";
if (isset($_POST["especialidade"])) $especialidade = $_POST["especialidade"];
if (isset($_POST["crm"])) $crm = $_POST["crm"];

$sql1 = <<<SQL
  INSERT INTO pessoa (nome, email, telefone, cep, 
                       logradouro, bairro, cidade, estado)
  VALUES (?, ?, ?, ?, ?, ?, ?, ?)
  SQL;

if ($salario != NULL) {
  $sql2 = <<<SQL
  INSERT INTO funcionario (data_contrato, salario, senha_hash, codigo) 
  VALUES (?, ?, ?, ?)
  SQL;
}

if ($crm != NULL) {
  $sql3 = <<<SQL
  INSERT INTO medico (especialidade, crm, codigo) 
  VALUES (?, ?, ?)
  SQL;
}
try {
  $pdo->beginTransaction();
  $stmt1 = $pdo->prepare($sql1);
  if (!$stmt1->execute([
    $nome, $email, $telefone,
    $cep, $logradouro, $bairro, $cidade, $estado
  ])) throw new Exception('Falha na primeira inserção');

  if ($salario != NULL) {
    $codigo = $pdo->lastInsertId();
    $stmt2 = $pdo->prepare($sql2);
    if (!$stmt2->execute([
      $data_contrato, $salario, $senhahash, $codigo
    ])) throw new Exception('Falha na segunda inserção');
  }
  if ($crm != NULL) {
    $stmt3 = $pdo->prepare($sql3);
    if (!$stmt3->execute([
      $especialidade, $crm, $codigo
    ])) throw new Exception('Falha na terceira inserção');
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
