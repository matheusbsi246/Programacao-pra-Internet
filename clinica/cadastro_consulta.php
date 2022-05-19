<?php

require "conexaoMysql.php";
$pdo = mysqlConnect();

$nome = $email = $telefone = "";
$datacons = $horario = "";
if (isset($_POST["nome"])) $nome = $_POST["nome"];
if (isset($_POST["email"])) $email = $_POST["email"];
if (isset($_POST["telefone"])) $telefone = $_POST["telefone"];
if (isset($_POST["datacons"])) $datacons = $_POST["datacons"];
if (isset($_POST["horario"])) $horario = $_POST["horario"];



$sql = <<<SQL
            INSERT INTO agenda (nome, email, telefone, data_agendamento, horario) 
            VALUES (?, ?, ?, ?, ?)
        SQL;
try {
    $pdo->beginTransaction();
    $stmt = $pdo->prepare($sql);

    if (!$stmt->execute([
        $nome, $email, $telefone,
        $datacons, $horario
    ])) throw new Exception('Falha');

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
