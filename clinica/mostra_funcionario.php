<?php

require "conexaoMysql.php";
$pdo = mysqlConnect();

try {

  $sql = <<<SQL
  
      SELECT nome, email, telefone, cep, logradouro, bairro, cidade, estado,
      data_contrato, salario, senha_hash
    FROM pessoa INNER JOIN funcionario ON pessoa.codigo = funcionario.codigo
  SQL;

  $stmt = $pdo->query($sql);
} catch (Exception $e) {
  exit('Ocorreu uma falha: ' . $e->getMessage());
}

      while ($row = $stmt->fetch()) {


        $nome = htmlspecialchars($row['nome']);
        $cpf = htmlspecialchars($row['cpf']);
        $email = htmlspecialchars($row['email']);
        $logradouro = htmlspecialchars($row['logradouro']);
        $bairro = htmlspecialchars($row['bairro']);
        $cidade = htmlspecialchars($row['cidade']);

        $data = new DateTime($row['data_contrato']);
        $dataFormatoDiaMesAno = $data->format('d-m-Y');

        echo <<<HTML
          <tr>
            <td>$nome</td> 
            <td>$cpf</td>
            <td>$email</td>
            <td>$dataFormatoDiaMesAno</td>
            <td>$logradouro</td>
            <td>{$row['salario']}</td>
          </tr>      
        HTML;
      }
      ?>

