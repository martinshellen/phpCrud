<!DOCTYPE html>
<html>

<head>
    <title>Editar Funcionário</title>
</head>

<body>
    <!-- Formulário de edição de Funcionário -->
    <form id="formulario" action="?page=funcionario-salvar" method="POST">
        <!-- Campo oculto para ação de edição -->
        <input type="hidden" name="acao" value="editar">
        <!-- Campo oculto para o ID do Funcionário a ser editado -->
        <input type="hidden" name="id_funcionario" value="<?php print $rowFuncionario->id_funcionario; ?>">

        <!-- Container para os campos do formulário -->
        <div class="form-group row">
            <!-- Campo para inserir o nome do Funcionário -->
            <div class="form-group col-md-4">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?php print $rowFuncionario->nome_funcionario; ?>" placeholder="Nome do atendente" maxlength="45" />
            </div>

            <!-- Campo para inserir o CPF do Funcionário -->
            <div class="col-md-4">
                <label for="cpf">CPF*</label>
                <input type="text" class="form-control" id="cpf" name="cpf" value="<?php print $rowFuncionario->cpf_funcionario; ?>" placeholder="Apenas números" maxlength="14" />
            </div>
        </div>

        <br>

        <div class="form-group row">
            <!-- Campo para inserir o email do Funcionário -->
            <div class="col-md-3">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="<?php print $rowFuncionario->email_funcionario; ?>" placeholder="Digite seu e-mail" maxlength="45" />
            </div>

            <!-- Campo para inserir o telefone do Funcionário -->
            <div class="col-md-3">
                <label for="fone">Fone</label>
                <input type="text" class="form-control" id="fone" name="fone" value="<?php print $rowFuncionario->fone_funcionario; ?>" placeholder="() xxxxx-xxxx" maxlength="20" />
            </div>
        </div>

        <br>

        <!-- Botões para editar e limpar o formulário -->
        <div class="row col-md-6">
            <div class="form-group">
                <button type="button" onclick="editarFuncionario();" class="btn btn-success">
                    Editar
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

        // Função para editar um funcionário
        function editarFuncionario() {
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

            // Submeter o formulário para salvar as alterações
            formulario.submit();
        }
    </script>
</body>

</html>