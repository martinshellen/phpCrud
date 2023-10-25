<h1>Editar Usuário</h1>
<hr>

<?php
// Conexão com o banco de dados e recuperação dos funcionários da tabela funcionario
$sql = "SELECT * FROM usuario";
$res = $conn->query($sql);
$qtd = $res->num_rows;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Incluindo o CSS do Bootstrap -->
    <link rel="stylesheet" href="./bootstrap-3.4.1-dist/css/bootstrap.min.css" />
</head>

<body>
    <!-- Formulário de cadastro de Funcionário -->
    <form id="formulario" action="?page=usuario-salvar" method="POST">
        <!-- Campo oculto para ação de cadastro -->
        <input type="hidden" name="acao" value="editar">
        <input type="hidden" name="id_usuario" value="<?php print $rowLivro->id_usuario; ?>">

        <div class="form-group row">
            <div class="col-md-4">
                <label for="cpf">CPF*</label>
                <input type="text" class="form-control" id="cpf" name="cpf" value="<?php print $rowLivro->cpf_usuario; ?>" placeholder="Apenas números" maxlength="14" />
            </div>

            <div class="form-group col-md-4">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?php print $rowLivro->nome_usuario; ?>" placeholder="Nome do Usuario" value="" maxlength="45" />
            </div>

        </div>

        <br>

        <div class="form-group row">

            <br>

            <!-- Campo para inserir o email do Funcionário -->
            <div class="col-md-3">
                <label for="dataNasc">Data de Nascimento</label>
                <input type="text" class="form-control" id="dataNasc" name="dataNasc" placeholder="Digite sua data de nascimento" />
            </div>

            <!-- Campo para inserir o telefone do Funcionário -->
            <div class="col-md-3">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Digite um email válido" maxlength="45" />
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
                <button type="button" onclick="cadastrarUsuario();" class="btn btn-success">
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
        function cadastrarUsuario() {
            var formulario = document.getElementById("formulario");
            var cpf = document.getElementById("cpf").value;
            var nome = document.getElementById("nome").value;
            var dataNasc = document.getElementById("dataNasc").value;
            var email = document.getElementById("email").value;
            var fone = document.getElementById("fone").value;

            if (cpf === "" || nome === "" || dataNasc === "" || email === "" || fone === "") {
                alert("Por favor, preencha todos os campos.");
                return;
            }

            // Objeto Funcionário com os dados preenchidos
            var usuario = {
                cpf: cpf,
                nome: nome,
                dataNasc: dataNasc,
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