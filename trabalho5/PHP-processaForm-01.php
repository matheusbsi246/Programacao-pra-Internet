<!DOCTYPE html>

<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title> Exercício 01 </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-CuOF+2SnTUfTwSZjCXf01h7uYhfOBuxIhGKPbfEJ3+FqH/s6cIFN9bGr1HmAg4fQ" crossorigin="anonymous">
    <style>
        td {
            border: solid 1px gray;
            padding: 10px;
        }
        body {
            padding: 1rem;
        }
    </style>
</head>

<body>

    <?php
        $CEP = $_POST["CEP"];
        $logradouro = $_POST["logradouro"];
        $Bairro = $_POST["Bairro"];
        $cidade = $_POST["cidade"]; 
        $estado = $_POST["estado"];

        $CEP = htmlspecialchars($CEP);
        $logradouro = htmlspecialchars($logradouro);
        $Bairro = htmlspecialchars($Bairro);
        $cidade = htmlspecialchars($cidade);

            echo <<<HTML

                        <div class="row gy-3 gx-4">
                            <div class="col-md-2">$CEP</div>
                            <div class="col-md-4">$logradouro</div>
                            <div class="col-md-2">$Bairro</div>
                            <div class="col-md-2">$cidade</div>
                            <div class="col-md-2">$estado</div>
                        </div>

                        
                    HTML;
    ?>

</body>

</html>