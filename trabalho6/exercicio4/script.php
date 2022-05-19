<?php

require "conexaoMysql.php";
$pdo = mysqlConnect();

// Inicializa e resgata dados da pessoa
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

// Inicializa e resgata os dados do paciente
$cep = $endereco = $bairro = $cidade = "";
if (isset($_POST["peso"])) $peso = $_POST["peso"];
if (isset($_POST["altura"])) $altura = $_POST["altura"];
if (isset($_POST["tipo_sanguineo"])) $tipo_sanguineo = $_POST["tipo_sanguineo"];

$sql1 = <<<SQL
  INSERT INTO pessoa (nome, email, telefone, cep, 
                       logradouro, bairro, cidade, estado)
  VALUES (?, ?, ?, ?, ?, ?, ?, ?)
  SQL;

$sql2 = <<<SQL
  INSERT INTO paciente 
    (peso, altura, tipo_sanguineo, codigo) 
  VALUES (?, ?, ?, ?)
  SQL;

try {
  $pdo->beginTransaction();

  // Inserção na tabela pessoa
  // Neste caso utilize prepared statements para prevenir
  // ataques do tipo SQL Injection, pois estamos
  // inseririndo dados fornecidos pelo usuário
  $stmt1 = $pdo->prepare($sql1);
  if (!$stmt1->execute([
    $nome, $email, $telefone,
    $cep, $logradouro, $bairro,  $cidade, $estado
  ])) throw new Exception('Falha na primeira inserção');
  // Inserção na tabela endereco_pessoa
  // Precisamos do id da pessoa cadastrado, que
  // foi gerado automaticamente pelo MySQL
  // na operação acima (campo auto_increment), para
  // prover valor para o campo chave estrangeira
  $codigo = $pdo->lastInsertId();
  $stmt2 = $pdo->prepare($sql2);
  if (!$stmt2->execute([
    $peso, $altura, $tipo_sanguineo, $codigo
  ])) throw new Exception('Falha na segunda inserção');

  // Efetiva as operações
  $pdo->commit();

  header("location: index.html");
  exit();
} 
catch (Exception $e) {
  $pdo->rollBack();
  if ($e->errorInfo[1] === 1062)
    exit('Dados duplicados: ' . $e->getMessage());
  else
    exit('Falha ao cadastrar os dados: ' . $e->getMessage());
}
