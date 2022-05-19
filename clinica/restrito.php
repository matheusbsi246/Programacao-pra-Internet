<!DOCTYPE html>

<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-CuOF+2SnTUfTwSZjCXf01h7uYhfOBuxIhGKPbfEJ3+FqH/s6cIFN9bGr1HmAg4fQ" crossorigin="anonymous">
    <title> Home </title>
    <style>
        nav button {
            border: none;
            outline: none;
            padding: 0 10px;
            background-color: inherit;
            height: 30px;
            margin: 0;
        }

        nav button:hover {
            color: rgb(255, 255, 255);
            cursor: pointer;
            text-decoration: underline;
        }

        button.buttonActive {
            font-weight: bold;
            color: rgb(255, 255, 255);
            ;
        }

        .tabs section {
            display: none;
        }

        section.tabActive {
            display: block;
        }

        header {
            height: 105px;
            width: 100%;
            padding: 5px;
            background-image: url("images/esunaclinicbg2.png");
            background-size: cover;
        }

        strong {
            font-size: 2rem;
            color: white;
        }

        body {
            margin: 0%;

        }

        main {
            line-height: 1.5rem;
            width: 80%;
            margin: auto;
            background-color: rgb(226, 226, 226);
            padding: 40px 40px 40px 40px;

        }

        img {

            border-radius: 10px;
        }

        nav {
            text-align: center;
            padding: 1px;
            background-color: rgb(76, 122, 252);
            background-size: cover;
            font-size: 1.5rem;
        }

        ul {
            text-align: center;
        }

        ul li {
            display: inline;
            margin: 0px 20px 0px 0px;
        }

        h1 {
            font-size: 1.5rem;
            color: rgb(100, 184, 223);
        }

        div {
            padding: 3px;
        }
    </style>
</head>

<body>

    <header>

        <figure>
            <a href="index.html"> <img src="images/logo.png " width="100" height="100" alt="perfil"> </a>

        </figure>
    </header>
    <nav>
        <ul>
            <li><button>Novo Funcionário</button> | </li>
            <li><button>Novo Paciente</button> | </li>
            <li><button>Listar Funcionários</button> | </li>
            <li><button>Listar Pacientes</button> | </li>
            <li><button>Listar Endereços</button> | </li>
            <li><button>Listar todos Agendamentos</button></li>
            <li><button style="display:none">Listar meus Agendamentos</button></li>



        </ul>
    </nav>

    <main>
        <div class="tabs">
            <section>
                <div>
                    <h3>Dados da pessoa </h3>
                </div>
                <form class="row g-2" method="POST" action="cadastro_funcionario.php">
                    <div class="form-floating col-md-12">
                        <input type="text" class="form-control" id="nome" placeholder="Nome Completo" name="nome">
                        <label for="nome">Nome Completo</label>
                    </div>
                    <div class="col-md-9 form-floating">
                        <input type="email" class="form-control" id="email" placeholder="Email" name="email">
                        <label for="email">E-mail</label>
                    </div>
                    <div class="col-md-3 form-floating">
                        <input type="tel" class="form-control" id="telefone" placeholder="Telefone" name="telefone" pattern="[0-9]{10}">
                        <label for="tel">Telefone</label>
                    </div>
                    <div class="col-md-5  form-floating ">
                        <input type="text" class="form-control" placeholder="CEP" id="cep" name="cep">
                        <label for="cep">CEP</label>
                    </div>
                    <div class="col-md-7  form-floating">
                        <input type="text" class="form-control" placeholder="logradouro" id="logradouro" name="logradouro">
                        <label for="logradouro">Logradouro</label>
                    </div>
                    <div class="col-md-5 form-floating">
                        <input type="text" class="form-control" placeholder="Bairro" id="bairro" name="bairro">
                        <label for="bairro">Bairro</label>
                    </div>
                    <div class="col-md-5 form-floating">
                        <input type="text" class="form-control" placeholder="Cidade" id="cidade" name="cidade">
                        <label for="cidade">Cidade</label>
                    </div>
                    <div class="col-md-2">
                        <label for="estado" class="form-floating">Estado</label>
                        <select id="estado" class="form-select" name="estado">
                            <option value="AC">Acre</option>
                            <option value="AL">Alagoas</option>
                            <option value="AP">Amapá</option>
                            <option value="AM">Amazonas</option>
                            <option value="BA">Bahia</option>
                            <option value="CE">Ceará</option>
                            <option value="DF">Distrito Federal</option>
                            <option value="ES">Espírito Santo</option>
                            <option value="GO">Goiás</option>
                            <option value="MA">Maranhão</option>
                            <option value="MT">Mato Grosso</option>
                            <option value="MS">Mato Grosso do Sul</option>
                            <option value="MG">Minas Gerais</option>
                            <option value="PA">Pará</option>
                            <option value="PB">Paraíba</option>
                            <option value="PR">Paraná</option>
                            <option value="PE">Pernambuco</option>
                            <option value="PI">Piauí</option>
                            <option value="RJ">Rio de Janeiro</option>
                            <option value="RN">Rio Grande do Norte</option>
                            <option value="RS">Rio Grande do Sul</option>
                            <option value="RO">Rondônia</option>
                            <option value="RR">Roraima</option>
                            <option value="SC">Santa Catarina</option>
                            <option value="SP">São Paulo</option>
                            <option value="SE">Sergipe</option>
                            <option value="TO">Tocantins</option>
                            <option value="EX">Estrangeiro</option>
                        </select>
                    </div>
                    <div>
                        <h3> Dados do funcionário</h3>
                    </div>

                    <div class="row g-2">
                        <div class="col-md-4 form-floating">
                            <input type="number" class="form-control" placeholder="Salário" id="salario" name="salario">
                            <label for="salario">Salário</label>
                        </div>
                        <div class="col-md-4 form-floating">
                            <input type="password" class="form-control" placeholder="Senha" id="senha" name="senha">
                            <label for="senha">Senha</label>
                        </div>
                        <div class="col-md-4 form-floating">
                            <input type="date" class="form-control" placeholder="Data contrato" id="data_contrato" name="data_contrato">
                            <label for="data_contrato">Data</label>
                        </div>
                    </div>


                    <div>
                        <input type="checkbox" id="medicoCheck" onclick="medicoFuncion()"> Cadadstrar médico
                    </div>
                    <div id="medico" style="display:none">
                        <div>
                            <h3> Dados do Médico</h3>
                            <div class="row g-2">
                                <div class="col-md-6 form-floating">
                                    <input type="text" class="form-control" placeholder="especialidade" id="especialidade" name="especialidade">
                                    <label for="especialidade">Especialidade</label>
                                </div>
                                <div class="col-md-6 form-floating">
                                    <input type="text" class="form-control" placeholder="crm" id="crm" name="crm">
                                    <label for="crm">CRM</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-forward" fill="currentcol-mdor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M9.502 5.513a.144.144 0 0 0-.202.134V6.65a.5.5 0 0 1-.5.5H2.5v2.9h6.3a.5.5 0 0 1 .5.5v1.003c0 .108.11.176.202.134l3.984-2.933a.51.51 0 0 1 .042-.028.147.147 0 0 0 0-.252.51.51 0 0 1-.042-.028L9.502 5.513zM8.3 5.647a1.144 1.144 0 0 1 1.767-.96l3.994 2.94a1.147 1.147 0 0 1 0 1.946l-3.994 2.94a1.144 1.144 0 0 1-1.767-.96v-.503H2a.5.5 0 0 1-.5-.5v-3.9a.5.5 0 0 1 .5-.5h6.3v-.503z" />
                            </svg>
                            Cadastrar
                        </button>
                    </div>

                </form>

            </section>

            <section>
                <div>
                    <h3>Dados da pessoa </h3>
                </div>
                <form class="row g-2" method="POST" action="cadastro_paciente.php">
                    <div class="form-floating col-md-12">
                        <input type="text" class="form-control" id="nome" placeholder="Nome Completo" name="nome">
                        <label for="nome">Nome Completo</label>
                    </div>
                    <div class="col-md-9 form-floating">
                        <input type="email" class="form-control" id="email" placeholder="Email" name="email">
                        <label for="email">E-mail</label>
                    </div>
                    <div class="col-md-3 form-floating">
                        <input type="tel" class="form-control" id="telefone" placeholder="Telefone" name="telefone" pattern="[0-9]{10}">
                        <label for="tel">Telefone</label>
                    </div>
                    <div class="col-md-5  form-floating ">
                        <input type="text" class="form-control" placeholder="CEP" id="cep" name="cep">
                        <label for="cep">CEP</label>
                    </div>
                    <div class="col-md-7  form-floating">
                        <input type="text" class="form-control" placeholder="logradouro" id="logradouro" name="logradouro">
                        <label for="logradouro">Logradouro</label>
                    </div>
                    <div class="col-md-5 form-floating">
                        <input type="text" class="form-control" placeholder="Bairro" id="bairro" name="bairro">
                        <label for="bairro">Bairro</label>
                    </div>
                    <div class="col-md-5 form-floating">
                        <input type="text" class="form-control" placeholder="Cidade" id="cidade" name="cidade">
                        <label for="cidade">Cidade</label>
                    </div>
                    <div class="col-md-2">
                        <label for="estado" class="form-floating">Estado</label>
                        <select id="estado" class="form-select" name="estado">
                            <option value="AC">Acre</option>
                            <option value="AL">Alagoas</option>
                            <option value="AP">Amapá</option>
                            <option value="AM">Amazonas</option>
                            <option value="BA">Bahia</option>
                            <option value="CE">Ceará</option>
                            <option value="DF">Distrito Federal</option>
                            <option value="ES">Espírito Santo</option>
                            <option value="GO">Goiás</option>
                            <option value="MA">Maranhão</option>
                            <option value="MT">Mato Grosso</option>
                            <option value="MS">Mato Grosso do Sul</option>
                            <option value="MG">Minas Gerais</option>
                            <option value="PA">Pará</option>
                            <option value="PB">Paraíba</option>
                            <option value="PR">Paraná</option>
                            <option value="PE">Pernambuco</option>
                            <option value="PI">Piauí</option>
                            <option value="RJ">Rio de Janeiro</option>
                            <option value="RN">Rio Grande do Norte</option>
                            <option value="RS">Rio Grande do Sul</option>
                            <option value="RO">Rondônia</option>
                            <option value="RR">Roraima</option>
                            <option value="SC">Santa Catarina</option>
                            <option value="SP">São Paulo</option>
                            <option value="SE">Sergipe</option>
                            <option value="TO">Tocantins</option>
                            <option value="EX">Estrangeiro</option>
                        </select>
                    </div>

                    <div>
                        <h3> Dados do paciente</h3>
                    </div>

                    <div class="row g-2">
                        <div class="col-md-4 form-floating">
                            <input type="number" class="form-control" placeholder="Peso" id="peso" name="peso">
                            <label for="peso">Peso</label>
                        </div>
                        <div class="col-md-4 form-floating">
                            <input type="number" class="form-control" placeholder="Altura" id="altura" name="altura">
                            <label for="altura">Altura</label>
                        </div>
                        <div class="col-md-4 form-floating">
                            <input type="text" class="form-control" placeholder="Tipo sanguineo" id="tipo_sanguineo" name="tipo_sanguineo">
                            <label for="tipo_sanguineo">Tipo Sanguineo</label>
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-forward" fill="currentcol-mdor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M9.502 5.513a.144.144 0 0 0-.202.134V6.65a.5.5 0 0 1-.5.5H2.5v2.9h6.3a.5.5 0 0 1 .5.5v1.003c0 .108.11.176.202.134l3.984-2.933a.51.51 0 0 1 .042-.028.147.147 0 0 0 0-.252.51.51 0 0 1-.042-.028L9.502 5.513zM8.3 5.647a1.144 1.144 0 0 1 1.767-.96l3.994 2.94a1.147 1.147 0 0 1 0 1.946l-3.994 2.94a1.144 1.144 0 0 1-1.767-.96v-.503H2a.5.5 0 0 1-.5-.5v-3.9a.5.5 0 0 1 .5-.5h6.3v-.503z" />
                            </svg>
                            Cadastrar
                        </button>
                    </div>
                </form>
            </section>


            <section>
                <div class="container">
                    <h3>Funcionários Cadastrados</h3>
                    <table class="table table-striped table-hover">
                        <tr>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Telefone</th>
                            <th>Salário</th>
                            <th>Data do Contrato</th>
                        </tr>
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
                            $email = htmlspecialchars($row['email']);
                            $data = new DateTime($row['data_contrato']);
                            $especialidade = htmlspecialchars($row['especialidade']);
                            $dataFormatoDiaMesAno = $data->format('d-m-Y');

                            echo <<<HTML
                    
                                    <tr>
                                    <div class="container">
                                        <td>$nome</td> 
                                        <td>$email</td>
                                        <td>{$row['telefone']}</td>
                                        <td>{$row['salario']}</td>
                                        <td>$dataFormatoDiaMesAno</td>
                                    </tr>      
                                                </div>
                                    HTML;
                        }
                        ?>
                    </table>
                </div>
            </section>
            <section>
                <div class="container">
                    <h3>Pacientes Cadastrados</h3>
                    <table class="table table-striped table-hover">
                        <tr>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Telefone</th>
                            <th>Peso</th>
                            <th>Altura</th>
                            <th>Tipo Sanguíneo</th>
                        </tr>

                        <?php

                        $pdo = mysqlConnect();

                        try {

                            $sql = <<<SQL
                            SELECT nome, email, telefone, cep, logradouro, bairro, cidade, estado,
                            peso, altura, tipo_sanguineo
                            FROM pessoa INNER JOIN paciente ON pessoa.codigo = paciente.codigo
                            SQL;


                            $stmt = $pdo->query($sql);
                        } catch (Exception $e) {
                            exit('Ocorreu uma falha: ' . $e->getMessage());
                        }
                        while ($row = $stmt->fetch()) {

                            $nome = htmlspecialchars($row['nome']);
                            $email = htmlspecialchars($row['email']);
                            $tipo_sanguineo = htmlspecialchars($row['tipo_sanguineo']);

                            echo <<<HTML
                      <tr>
                        <td>$nome</td>
                        <td>$email</td>
                        <td>{$row['telefone']}</td>
                        <td>{$row['peso']}</td>
                        <td>{$row['altura']}</td>
                        <td>$tipo_sanguineo</td>
                      </tr>      
                    HTML;
                        }
                        ?>

                    </table>
                </div>
            </section>
            <section>
                <?php
                $pdo = mysqlConnect();

                try {

                    $sql = <<<SQL
                        SELECT *
                        FROM base_enderecos_ajax

  SQL;

                    $stmt = $pdo->query($sql);
                } catch (Exception $e) {
                    exit('Ocorreu uma falha: ' . $e->getMessage());
                }
                ?>

                <div class="container">
                    <h3>Endereços Cadastrados</h3>
                    <table class="table table-striped table-hover">
                        <tr>
                            <th>CEP</th>
                            <th>Logradouro</th>
                            <th>Bairro</th>
                            <th>Cidade</th>
                            <th>Estado</th>
                        </tr>

                        <?php
                        while ($row = $stmt->fetch()) {

                            $cep = htmlspecialchars($row['cep']);
                            $logradouro = htmlspecialchars($row['logradouro']);
                            $bairro = htmlspecialchars($row['bairro']);
                            $cidade = htmlspecialchars($row['cidade']);
                            $estado = htmlspecialchars($row['estado']);

                            echo <<<HTML
          <tr>
            <td>$cep</td>
            <td>$logradouro</td> 
            <td>$bairro</td>
            <td>$cidade</td>
            <td>$estado</td>
          </tr>      
        HTML;
                        }
                        ?>

                    </table>
                </div>
            </section>
            <section>
                <div class="container">
                    <h3>Todos os Agendametnos</h3>
                    <table class="table table-striped table-hover">
                        <tr>
                            <th>Data</th>
                            <th>Horario</th>
                            <th>Paciente</th>
                            <th>E-mail</th>
                            <th>Telefone</th>
                            <th>Médico</th>
                        </tr>
                    </table>
            </section>
            <section>
                <div class="container">
                    <h3>Seus Agendamentos</h3>
                    <table class="table table-striped table-hover">
                        <tr>
                            <th>Data</th>
                            <th>Horario</th>
                            <th>Paciente</th>
                            <th>E-mail</th>
                            <th>Telefone</th>
                        </tr>
                    </table>
            </section>
        </div>


    </main>
    <script>
        window.onload = function() {

            const buttons = document.querySelectorAll("nav button");
            for (let button of buttons) {
                button.addEventListener("click", changeTab);

            }

            openTab(0);

        }

        function changeTab(e) {
            const botaoAcionado = e.target;
            const liDoBotao = botaoAcionado.parentNode;
            const nodes = Array.from(liDoBotao.parentNode.children);
            const index = nodes.indexOf(liDoBotao);
            openTab(index);
        }

        function medicoFuncion() {
            var medico = document.getElementById("medico");
            var medicoCheck = document.getElementById("medicoCheck");
            if (medicoCheck.checked == true) {
                medico.style.display = "block";
            } else {
                medico.style.display = "none";
            }
        } //https://www.w3schools.com/howto/howto_js_display_checkbox_text.asp
        function openTab(i) {
            const tabActive = document.querySelector(".tabActive");
            if (tabActive !== null)
                tabActive.className = "";

            const buttonActive = document.querySelector(".buttonActive");
            if (buttonActive !== null)
                buttonActive.className = "";

            document.querySelectorAll(".tabs section")[i].className = "tabActive";
            document.querySelectorAll("nav button")[i].className = "buttonActive";
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-popRpmFF9JQgExhfw5tZT4I9/CI5e2QcuUZPOVXb1m7qUmeR2b50u+YFEYe1wgzy" crossorigin="anonymous"></script>
</body>

</html>