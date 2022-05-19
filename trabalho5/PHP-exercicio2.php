<!DOCTYPE html>

<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title> Exercício 02 </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-CuOF+2SnTUfTwSZjCXf01h7uYhfOBuxIhGKPbfEJ3+FqH/s6cIFN9bGr1HmAg4fQ" crossorigin="anonymous">
    <style>
        body {
            padding: 1rem;
        }
       
    </style>
</head>

<body>

    <?php
    $produtos = ["The Shining", "Pet Sematary", "Misery", "Mr Mercedes", "The Gunslinger", "Finders Keepers", "End of Watch", "The Drawing of the Three", "The Waste Lands", "Wizard and Glass"];
    $descricao = ["Livro de terror sobre uma familia que se isola em um Hotel", "Livro de terror que roda em torno de um cemitério indígena ", "Livro de terror sobre uma fã que sequestra seu autor preferido", "Livro de terror sobre um assassina que mata uma multidão com uma Mercedes", "Livro sobre um pistoleiro que busca a misteriosa Torre Negra", "Livro de ivestigação sobre um cara que é fã de um autor que assassina e rouba os livros manuscrito de seu ídolo", "Continuação da estória do assassino da Mercedes", "Sequencia do livro do pistoleiro que procura aliados pra prosseguir com sua busca", "Terceiro livro daa aventura do pistoleiro no qual ele enfrenta um trem que gosta de advinhações", "Quarta continuação do pistoleiro onde conta um grande amor do seu passado"];
    $qde = $_POST['qde'];
    for ($i = 1; $i < $qde + 1; $i++) {
        $roul = (rand(0, 9));
        echo <<<HTML
            
                       
                    
                     <table class="table">
                     <tbody>
                        <tr>
                        <th scope="row">$i</th>
                        <td>$descricao[$roul]</td>
                        <td>$produtos[$roul]</td>
                        </tr>
                    </table>
                   
                        
                    HTML;
    }

    ?>

</body>

</html>