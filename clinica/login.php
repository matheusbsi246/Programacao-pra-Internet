<?php

function checkLogin($pdo, $email, $senha)
{
  $sql = <<<SQL
    SELECT senha_hash
    FROM pessoa INNER JOIN funcionario ON pessoa.codigo = funcionario.codigo
    WHERE email = ?
    SQL;

  try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    $row = $stmt->fetch();
    if (!$row)
      return false;
    else
      return password_verify($senha, $row['senha_hash']);
  } catch (Exception $e) {
    exit('Falha inesperada: ' . $e->getMessage());
  }
}

$errorMsg = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  require "conexaoMysql.php";
  $pdo = mysqlConnect();

  $email = $senha = "";

  if (isset($_POST["email"]))
    $email = $_POST["email"];
  if (isset($_POST["senha"]))
    $senha = $_POST["senha"];

  if (checkLogin($pdo, $email, $senha)) {
    header("location: restrito.php");
    exit();
  } else
    $errorMsg = "Dados incorretos";
}

?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && $errorMsg !== "") {
  echo <<<HTML
        <div class="alert alert-warning alert-dismissible" role="alert">
          <strong>$errorMsg</strong>
          <button type="button" class="btn-close" data-dismiss="alert"></button>
        </div>
        HTML;
}
?>
