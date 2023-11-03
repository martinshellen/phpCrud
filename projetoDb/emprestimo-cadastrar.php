<h1>Cadastrar Empréstimo</h1>
<hr>

<?php

// Consulta para obter os IDs de livro
$sqlLivro = "SELECT id_livro , titulo_livro FROM livro";
$resLivro = $conn->query($sqlLivro);

// Consulta para obter os IDs de usuário
$sqlUsuario = "SELECT id_usuario, nome_usuario FROM usuario";
$resUsuario = $conn->query($sqlUsuario);

// Consulta para obter os IDs de funcionário
$sqlFuncionario = "SELECT id_funcionario, nome_funcionario FROM funcionario";
$resFuncionario = $conn->query($sqlFuncionario);

// Feche a conexão com o banco de dados quando terminar de usar as variáveis
$conn->close();
?>

<!-- Incluindo o CSS do Bootstrap -->
<link rel="stylesheet" href="./bootstrap-3.4.1-dist/css/bootstrap.min.css" />

<!-- Formulário de cadastro de empréstimo -->
<form id="formulario" action="?page=emprestimo-salvar" method="POST">
    <!-- Campo oculto para ação de cadastro -->
    <input type="hidden" name="acao" value="cadastrar">


    <div class="form-group row">

        <!-- Dropdown para selecionar o Livro -->
        <div class="col-md-4">
            <label for="livro_id_livro">ID do Livro</label>
            <select name="livro_id_livro" id="livro_id_livro" class="form-select">
                <option value="">Selecione um ID</option>
                <?php
                while ($livro = $resLivro->fetch_object()) {
                    echo "<option value='$livro->id_livro'>$livro->titulo_livro</option>";
                }
                ?>
            </select>
        </div>

        <!-- Dropdown para selecionar o Usuário -->
        <div class="col-md-3">
            <label for="usuario_id_usuario">ID do Usuário</label>
            <select name="usuario_id_usuario" id="usuario_id_usuario" class="form-select">
                <option value="">Selecione um ID</option>
                <?php
                while ($usuario = $resUsuario->fetch_object()) {
                    echo "<option value='$usuario->id_usuario'>$usuario->nome_usuario</option>";
                }
                ?>
            </select>
        </div>

        <!-- Dropdown para selecionar o Funcionário -->
        <div class="col-md-3">
            <label for="funcionario_id_funcionario">ID do Funcionário</label>
            <select name="funcionario_id_funcionario" id="funcionario_id_funcionario" class="form-select">
                <option value="">Selecione um ID</option>
                <?php
                while ($funcionario = $resFuncionario->fetch_object()) {
                    echo "<option value='$funcionario->id_funcionario'>$funcionario->nome_funcionario</option>";
                }
                ?>
            </select>
        </div>

        <!-- Container para os campos do formulário -->
        <div class="form-group row mt-3">
            <!-- Campo para inserir a Data de Empréstimo -->
            <div class="form-group col-md-4">
                <label for="data_emprestimo">Data de Empréstimo</label>
                <input type="date" class="form-control" id="data_emprestimo" name="data_emprestimo" />
            </div>

            <!-- Campo para inserir a Data de Devolução -->
            <div class="col-md-4">
                <label for="data_devolucao">Data de Devolução</label>
                <input type="date" class="form-control" id="data_devolucao" name="data_devolucao" />
            </div>
        </div>


    </div>

    <!-- Botões para cadastrar e limpar o formulário -->
    <div class="form-group mt-3">
        <button type="button" onclick="cadastrarEmprestimo();" class="btn btn-success">
            Cadastrar
        </button>
        <button type="button" onclick="limparFormulario();" class="btn btn-danger">
            Limpar
        </button>
    </div>
    </div>
    <!-- Fim do container -->

    <script>
        // Função para limpar o formulário
        function limparFormulario() {
            var formulario = document.getElementById("formulario");
            formulario.reset();
        }

        // Função para cadastrar um empréstimo
        function cadastrarEmprestimo() {
            var formulario = document.getElementById("formulario");
            var livroId = document.getElementById("livro_id_livro").value;
            var usuarioId = document.getElementById("usuario_id_usuario").value;
            var funcionarioId = document.getElementById("funcionario_id_funcionario").value;
            var dataEmprestimo = document.getElementById("data_emprestimo").value;
            var dataDevolucao = document.getElementById("data_devolucao").value;

            if (livroId === "" || usuarioId === "" || funcionarioId === "" || dataEmprestimo === "" || dataDevolucao === "") {
                alert("Por favor, preencha todos os campos.");
                return;
            }

            // Submeter o formulário
            formulario.submit();
        }
    </script>
    

</form>

