<h1>Cadastrar Livro</h1>
<hr>

<?php
// Conexão com o banco de dados e recuperando as categorias salvas no banco, na tabela de categorias
$sql = "SELECT * FROM categoria";
$res = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Título da página -->
    <title>Cadastro</title>

    <!-- Incluindo o CSS do Bootstrap -->
    <link rel="stylesheet" href="./bootstrap-3.4.1-dist/css/bootstrap.min.css" />
</head>

<body>
    <!-- Formulário de cadastro de livro -->
    <form id="formulario" action="?page=livro-salvar" method="POST">
        <!-- Campo oculto para ação de cadastro -->
        <input type="hidden" name="acao" value="cadastrar">

        <!-- Container para os campos do formulário -->
        <div class="form-group row">
            <!-- Campo para inserir o título do livro -->
            <div class="form-group col-md-4">
                <label for="titulo">Título do livro</label>
                <input type="text" class="form-control" id="titulo" name="titulo" value="" maxlength="200" />
            </div>

            <!-- Campo para inserir o autor do livro -->
            <div class="col-md-4">
                <label for="autor">Autor</label>
                <input type="text" class="form-control" id="autor" name="autor" placeholder="Autor do Livro" maxlength="45" />
            </div>
        </div>

        <br>

        <div class="form-group row">

            <br>

            <!-- Campo para inserir o autor do livro -->
            <div class="col-md-3">
                <label for="edicao">Edição</label>
                <input type="text" class="form-control" id="edicao" name="edicao" placeholder="Edição" maxlength="3" />
            </div>

            <!-- Campo para inserir a editora do livro -->
            <div class="col-md-3">
                <label for="editora">Editora</label>
                <input type="text" class="form-control" id="editora" name="editora" placeholder="Editora do Livro" maxlength="20" />
            </div>
        </div>

        <br>

        <div class="form-group row">
            <!-- Campo para inserir o local do livro -->
            <div class="col-md-3">
                <label for="local">Local</label>
                <input type="text" class="form-control" id="local" name="local" placeholder="" maxlength="20" />
            </div>

            <!-- Campo para inserir o ano de publicação do livro -->
            <div class="col-md-3">
                <label for="ano">Ano de Publicação</label>
                <input type="text" class="form-control" id="ano" name="ano" placeholder="Ex: 2023" />
            </div>

            <!-- Dropdown para selecionar a categoria do livro -->
            <div class="col-md-3">
                <label for="categoria">Categoria</label>
                <select name="categoria" class="form-select">
                    <option value="">Selecione uma categoria</option>
                    <?php
                    // Loop para listar as categorias do banco de dados
                    while ($categoria = $res->fetch_object()) {
                        echo "<option value='$categoria->id_categoria'>$categoria->nome_categoria</option>";
                    }
                    ?>
                </select>
            </div>
        </div>

        <br>

        <!-- Botões para cadastrar e limpar o formulário -->
        <div class="row col-md-6">
            <div class="form-group">
                <button type="button" onclick="cadastrarLivro();" class="btn btn-success">
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

        // Função para cadastrar um livro
        function cadastrarLivro() {
            var formulario = document.getElementById("formulario");
            var titulo = document.getElementById("titulo").value;
            var autor = document.getElementById("autor").value;
            var editora = document.getElementById("editora").value;
            var local = document.getElementById("local").value;
            var ano = document.getElementById("ano").value;

            if (titulo === "" || autor === "" || editora === "" || local === "" || ano === "") {
                alert("Por favor, preencha todos os campos.");
                return;
            }

            //diferença entre  type button e submit
            //button é burro vc tem que dá vida ao botão
            //o submit ele vai submter o formulário ao ser clicado, então sempre oberve o action do formulario e method
            formulario.submit();

        }
    </script>
</body>

</html>