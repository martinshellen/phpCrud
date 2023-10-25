<h1>Cadastrar Funcionário</h1>
<hr>

<?php
// Conexão com o banco de dados e recuperação dos funcionários da tabela funcionario
$sql = "SELECT * FROM funcionario";
$res = $conn->query($sql);
$qtd = $res->num_rows;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Título da página -->
    <title>Cadastro de Funcionário</title>

    <!-- Incluindo o CSS do Bootstrap -->
    <link rel="stylesheet" href="./bootstrap-3.4.1-dist/css/bootstrap.min.css" />
</head>

<body>
    <!-- Formulário de cadastro de Funcionário -->
    <form id="formulario" action="?page=funcionario-salvar" method="POST">
        <!-- Campo oculto para ação de cadastro -->
        <input type="hidden" name="acao" value="cadastrar">

        <!-- Container para os campos do formulário -->
        <div class="form-group row">
            <!-- Campo para inserir o nome do Funcionário -->
            <div class="form-group col-md-4">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do funcionário" value="" maxlength="45" />
            </div>

            <!-- Campo para inserir o CPF do Funcionário -->
            <div class="col-md-4">
                <label for="cpf">CPF*</label>
                <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Apenas números" maxlength="14" />
            </div>
        </div>

        <br>

        <div class="form-group row">

            <br>

            <!-- Campo para inserir o email do Funcionário -->
            <div class="col-md-3">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Digite o email" maxlength="45" />
            </div>

            <!-- Campo para inserir o telefone do Funcionário -->
            <div class="col-md-3">
                <label for="fone">Fone</label>
                <input type="text" class="form-control" id="fone" name="fone" placeholder="() xxxxx-xxxx" maxlength="20" />
            </div>
        </div>

        <br>

        <!-- Botões para cadastrar e limpar o formulário -->
        <div class="row col-md-6">
            <div class="form-group">
                <button type="button" onclick="cadastrarFuncionario();" class="btn btn-success">
                    Cadastrar
                </button>
                <button type="button" onclick="limparFormulario();" class="btn btn-danger">
                    Limpar
                </button>
            </div>
        </div>
        <!-- Fim do container -->
    </form>

    <script>
        // Função para limpar o formulário
        function limparFormulario() {
            var formulario = document.getElementById("formulario");
            formulario.reset();
        }

        // Função para cadastrar um funcionário
        function cadastrarFuncionario() {
            var formulario = document.getElementById("formulario");
            var nome = document.getElementById("nome").value;
            var cpf = document.getElementById("cpf").value;
            var email = document.getElementById("email").value;
            var fone = document.getElementById("fone").value;

            if (nome === "" || cpf === "" || email === "" || fone === "") {
                alert("Por favor, preencha todos os campos.");
                return;
            }

            // Objeto Funcionário com os dados preenchidos
            var funcionario = {
                nome: nome,
                cpf: cpf,
                email: email,
                fone: fone,
            };

            /* Diferença entre os tipos de botão:
                O botão do tipo "button" não realiza a ação por padrão e você precisa adicionar a lógica para executar uma ação quando clicado.
                O botão do tipo "submit" submeterá o formulário ao ser clicado, é importante observar as configurações do atributo "action" e "method"
                do formulário */
            formulario.submit();
        }
    </script>
</body>

</html>